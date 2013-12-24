<?php
class QuarkORMEngine{

  /**
   * Copia de $db_connections de config.php
   *
   * @static
   * @access private
   * @var array
   */
  private static $_connections = array();

  /**
   * Copia de $db_connections de config.php
   *
   * @static
   * @access private
   * @var array
   */
  private static $_connections_info = null;

  /**
   * Informacion de las clases ORM que se van utilizando
   * @var array
   */
  private static $_orms_info = array();

  /**
   * Devuelve el objeto PDO relacionado a la conexión $connection
   *
   * @static
   * @access public
   * @throws QuarkORMException
   * @var string $connection
   * @return PDO
   */
  public static function getConnection($connection)
  {

    if( !isset(self::$_connections[$connection]) ) {

      // Cargar configuracion por primera vez?
      if( self::$_connections_info == null ) {
        $database = array();
        require 'application/config/config.php';
        self::$_connections_info = $database;
      }

      // Verificar si existen los datos de conexión
      if( !isset(self::$_connections_info[$connection]) ) {
        throw new QuarkORMException(
          'Datos para conexión $connection no definidos.',
          QuarkORMException::ERR_NO_CONNECTION_INFO);
      } else {
        // Crear nueva conexión

        $PDO = new PDO(
          'mysql:host='. self::$_connections_info[$connection]['host']
          . ';dbname='. self::$_connections_info[$connection]['database'],
          self::$_connections_info[$connection]['user'],
          self::$_connections_info[$connection]['password'],
          self::$_connections_info[$connection]['options']
        );

        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Set charset
        $PDO->query(
          "SET NAMES '".self::$_connections_info[$connection]['charset']."'"
        );

        self::$_connections[$connection] = $PDO;
      }
    }
    return self::$_connections[$connection];
  }

  public static function getORMInfo($orm_class_name)
  {
    // Accedemos a las propiedades estaticas de la clase ORM
    $table      = eval("return $orm_class_name::\$table;");
    $connection = eval("return $orm_class_name::\$connection;");

    if( !isset(self::$_orms_info[$orm_class_name]) ){

      // Obtener la lista de columnas
      $St = self::query("SHOW COLUMNS FROM `$table`;", null, $connection);
      $columns = $St->fetchAll(PDO::FETCH_OBJ);

      // Obtener la lista de campos que forman el primary key, y el campo que tenga
      // AUTO_INCREMENT
      $pk_fields = array();
      $field_auto_increment = '';

      foreach($columns as $Column){
        if($Column->Key == 'PRI'){
          $pk_fields[] = $Column->Field;
        }
        if($Column->Extra == 'auto_increment'){
          $field_auto_increment = $Column->Field;
        }
      }

      // Guardar la información
      self::$_orms_info[$orm_class_name] = (object)array(
        'table'      => $table,
        'connection' => $connection,
        'columns'    => $columns,
        'pk_fields'  => $pk_fields,
        'auto_increment' => $field_auto_increment,
      );
    }

    return self::$_orms_info[$orm_class_name];
  }

  /**
   * Ejecuta la consulta $sql sobre la conexión $connection, utilizando los
   * argumentos $arguments
   *
   * @static
   * @access public
   * @throws QuarkORMException
   * @var string $sql
   * @var array $arguments
   * @var string $connection
   * @return PDOStatement
   */
  public static function query($sql, $arguments = null, $connection)
  {
    try {
      $St = self::getConnection($connection)->prepare($sql);
      $St->execute($arguments);
      return $St;
    } catch( PDOException $e ) {
      throw new QuarkORMException(
        'Error al realizar consulta en base de datos',
        QuarkORMException::ERR_QUERY,
        $e
      );
    }
  }
}