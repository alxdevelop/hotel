<?php
class QuarkORMQueryBuilder
{
  private $_orm_class_name;
  private $_ORMInfo;
  private $_QuarkORMFetchTarget;
  private $_sql = array();
  private $_arguments = array();
  private $_limit = 0;

  /**
   * Constructor del QueryBuilder
   * @param string $orm_class_name Nombre del ORM al que pertenece
   */
  public function __construct($orm_class_name)
  {
    $this->_orm_class_name = $orm_class_name;

    // Guardar la referencia del ORMInfo que le pertenece a este query builder
    $this->_ORMInfo = QuarkORMEngine::getORMInfo($orm_class_name);
  }

  /**
   * Prepara el query para realizar un insert
   * @return QuarkORMQueryBuilder
   */
  public function insert($key_value_pairs)
  {
    $this->expandPlaceholders($key_value_pairs, $placeholders, $arguments);
    $placeholders = implode(',', $placeholders);
    $keys = implode(',', $this->quoteFields(array_keys($key_value_pairs)));
    $this->appendSQL('insert'
      , "INSERT INTO `{$this->_ORMInfo->table}`($keys)VALUES($placeholders)", $arguments);

    return $this;
  }

  /**
   * Prepara el query para realizar un select
   * @return QuarkORMQueryBuilder
   */
  public function select($fields = '*')
  {
    $this->appendSQL('select', "SELECT * FROM `{$this->_ORMInfo->table}`");

    return $this;
  }

  /**
   * Prepara el query para seleccionar solo un elemento
   * @param  string $fields
   * @return QuarkORMQueryBuilder
   */
  public function selectOne($fields = '*')
  {
    return $this->select($fields)->limit(1);
  }

  /**
   * Prepara el query para realizar un UPDATE
   * @return QuarkORMQueryBuilder
   */
  public function update($key_value_pairs)
  {
    $this->expandPlaceholders($key_value_pairs, $placeholders, $arguments, true);
    $placeholders = implode(',', $placeholders);
    $this->appendSQL('update', "UPDATE `{$this->_ORMInfo->table}` SET $placeholders"
      , $arguments);

    return $this;
  }

  /**
   * Prepara el query para realizar un DELETE
   * @return QuarkORMQueryBuilder
   */
  public function delete()
  {
    $this->appendSQL('delete', "DELETE FROM `{$this->_ORMInfo->table}`");

    return $this;
  }

  /**
   * Genera el WHERE para un query preparado, si WHERE es invocado varias veces se
   * irán concatenando las condicionas utilizando AND, si quiere concatenar al WHERE
   * utilizando OR definalo en el argumento $logic_operator o utilice el metodo or();
   * 
   * @param string|array Condicion
   * @param array $arguments Argumentos para la condicion
   * @param string $logic_operator Operador logico para unir con condiciones ya
   *                               definidas
   */
  public function where($where, $arguments = null, $logic_operator = 'AND')
  {
    if( is_array($where) ) {
      $this->expandPlaceholders($where, $placeholders, $arguments, true);
      $where = implode(" AND ", $placeholders);
    }

    // Crear o completar el where
    $this->appendSQL('where'
      , !isset($this->_sql['where']) ? "WHERE ($where)"
        : $this->_sql['where'] . " $logic_operator ($where)"
      , $arguments);

    return $this;
  }

  /**
   * Agrega una condicion al WHERE utilizando el operar logico OR
   * @param  string|array $where
   * @param  array $arguments
   * @return QuarkORMQueryBuilder
   */
  public function orWhere($where, $arguments = null)
  {
    return $this->where($where, $arguments, 'OR');
  }

  /**
   * Agrega una condicion al WHERE utilizando el operar logico AND
   * @param  string|array $where
   * @param  array $arguments
   * @return QuarkORMQueryBuilder
   */
  public function andWhere($where, $arguments = null)
  {
    return $this->where($where, $arguments, 'AND');
  }

  /**
   * Establece el LIMIT para un query preparado
   */
  public function limit($skip, $limit = 0)
  {
    $this->_limit = $limit > 0 ? $limit : $skip;
    $this->appendSQL('limit', "LIMIT $skip" . ($limit > 0 ? ",$limit" : null) );
    return $this;
  }

  /**
   * Establece el ORDER BY para un query preparado
   */
  public function order($order_by, $type = 'ASC')
  {
    // Crear o completar el ORDER BY
    $this->appendSQL('orderby',
      !isset($this->_sql['orderby']) ? "ORDER BY $order_by $type"
      : $this->_sql['orderby'] . ", $order_by $type");
    return $this;
  }

  /**
   * Busca un registro por primary key y devuelve su ORM
   * @param  mixed|array $pk Valor o valores de primary key
   * @return QuarkORM
   */
  public function findByPk($pk)
  {
    if( !is_array($pk) ){
      // En este caso se asume que el primary key esta formado solo por un campo.
      $pk = array(
        $this->_ORMInfo->pk_fields[0] => $pk
      );
    }

    // Super combo!
    return $this->select()->where($pk)->limit(1)->execute();
  }

  /**
   * Prepara el query builder para hacer un select count
   * @return [type] [description]
   */
  public function count()
  {
    $this->appendSQL('count', "SELECT COUNT(*) FROM `{$this->_ORMInfo->table}`");

    return $this;
  }

  /**
   * Define un objeto QuarkORM donde se hara el fetch al seleccionar 1 registro
   * 
   * @param  QuarkORM $ORM Instancia de un objeto QuarkORM
   * @return QuarkORMQueryHandler
   */
  public function fetchInto(QuarkORM $ORMObject)
  {
    $this->_QuarkORMFetchTarget = $ORMObject;

    return $this;
  }

  /**
   * Expande un array key/value pairs $fields a place holders y argumentos
   * para ser utilizados en un query generado.
   */
  protected function expandPlaceholders($fields, &$placeholders, &$arguments,
    $assignment = false)
  {
    // Inicializar variables de salida
    $placeholders = $arguments = array();

    foreach($fields as $key => $value)
    {
      if(!($value instanceof QuarkSQLExpression)){
        if($assignment == true) {
          $placeholders[] = "`$key`=:$key";
        } else {
          $placeholders[] = ":$key";
        }
        $arguments[":$key"] = $value;
      } else {
        if($assignment == true){
          $placeholders[] = "`$key`=" . $value->getExpression();
        } else {
          $placeholders[] = $value->getExpression();
        }
        $arguments = array_merge($arguments, $value->getArguments());
      }
    }
  }

  /**
   * Ejecuta el query generado y devuelve el resultado esperado
   * 
   * @param QuarkORM Instancia donde se hara el fetch into en caso de ser select one
   * @return mixed Puede devolver un QuarkORM, un array(QuarkORM), el numero de
   *               filas afectadas, false o un array vacio.
   */
  public function execute()
  {
    // Formar el SQL concatenando las sentencias SQL en el orden correcto.
    $sql = (isset($this->_sql['select']) ? $this->_sql['select'] : null)
      . (isset($this->_sql['insert'])  ? $this->_sql['insert'] : null)
      . (isset($this->_sql['update'])  ? $this->_sql['update'] : null)
      . (isset($this->_sql['delete'])  ? $this->_sql['delete'] : null)
      . (isset($this->_sql['count'])   ? $this->_sql['count']  : null)

      . (isset($this->_sql['where'])   ? ' ' . $this->_sql['where']   : null)
      . (isset($this->_sql['orderby']) ? ' ' . $this->_sql['orderby'] : null)
      . (isset($this->_sql['limit'])   ? ' ' . $this->_sql['limit']   : null)
    ;
    
    $St = QuarkORMEngine::query($sql, $this->_arguments
      , $this->_ORMInfo->connection);

    // Obtener el resultado dependiendo de la sentencia ejecutada
    if( isset($this->_sql['select']) ){

      // Devolver objetos de la clase especificada
      $St->setFetchMode(PDO::FETCH_CLASS, $this->_orm_class_name);
      
      if( $this->_limit == 1 ){
        if($this->_QuarkORMFetchTarget != null){
          $St->setFetchMode(PDO::FETCH_INTO, $this->_QuarkORMFetchTarget);
        }
        $result = $St->fetch();
      } else {
        $result = $St->fetchAll();
      }

    } elseif( isset($this->_sql['count']) ) {
      // Se realizo un SELECT COUNT(*)
      $result = $St->fetchColumn(0);
    } else {
      // Devolver el número de filas afectadas
      $result = $St->rowCount();
    }

    // Limpiar los datos del query builder, para no interferir en futuras consultas
    $this->_sql            = array();
    $this->_arguments      = array();
    $this->_limit          = 0;
    $this->_QuarkORMFetchTarget = null;

    return $result;
  }

  public function puff()
  {
    return $this->execute();
  }

  /**
   * Agrega apostrofes a los campos $fields.
   * $fields puede ser un string con campos separadas por comas o un array de
   * campos. Devuelve un array con los campos con apostrofes
   *
   * @static
   * @access public
   * @param mixed $fields
   * @return array(string)
   */
  protected function quoteFields($fields)
  {
    // Convertir cadena en array de campos
    if( is_string($fields) ){
      $fields = array_map('trim', explode(',', $fields));
    }
    return array_map(create_function('$e', 'return "`$e`";'), $fields);
  }

  /**
   * Agrega partes de una sentencia SQL al query builder, con su lista de argumentos
   * opcional.
   * 
   * @param  string $sql
   * @param  array $arguments
   */
  protected function appendSQL($tag, $sql, $arguments = null)
  {
    $this->_sql[$tag] = $sql;

    if( is_array($arguments) ) {
      $this->_arguments = array_merge($this->_arguments, $arguments);
    }
  }
}