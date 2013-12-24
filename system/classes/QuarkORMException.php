<?php
class QuarkORMException extends Exception
{
  const ERR_NO_CONNECTION_INFO = 1;
  const ERR_QUERY = 2;
  const ERR_NO_QUERY_BUILDER = 4;
  const ERR_NEW_PARENT = 8;

  /**
   * Copia del errorInfo del PDOException
   *
   * @access private
   * @var array
   */
  private $_errorInfo;

  /**
   * Constructor
   *
   * @access public
   * @var string $message
   * @var int $code
   * @var PDOException $e
   */
  public function __construct($message, $code, PDOException $e = null)
  {
    if($e == null){
      $this->_errorInfo = array();
    } else {
      $this->_errorInfo = $e->errorInfo;
    }

    parent::__construct($message, $code);
  }

  /**
   * Devuelve el codigo SQLSTATE del error generado
   *
   * @access public
   * @return string
   */
  public function getSQLState()
  {
    return $this->_errorInfo[0];
  }

  /**
   * Devuelve el codigo de error especifico del driver
   *
   * @access public
   * @return string
   */
  public function getDriverErrCode()
  {
    return $this->_errorInfo[1];
  }

  /**
   * Devuelve el mensaje de error especifico del driver
   *
   * @access public
   * @return string
   */
  public function getDriverErrMessage()
  {
    return $this->_errorInfo[2];
  }

  /**
   * Devuelve el array errorInfo del PDOException generado
   *
   * @access public
   * @return array
   */
  public function getErrorInfo()
  {
    return $this->_errorInfo;
  }
}