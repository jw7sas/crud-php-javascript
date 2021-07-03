<?php
# import routes
include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
# imports
require_once(DB_PATH . 'DBConfig.php');

class MysqlConnection implements DBConfig {
    # atributos
    private $conn = null;

    # construtor
    public function __construct(){
        try{
            $this->conn = $this->getPDOConnection();
            if($this->conn == NULL)
                throw new Exception("Error conexión - BASE DE DATOS - NULL");

        }catch(Exception $ex){
            throw new Exception($ex);
        }
    }

    /**
     * Método de para devolver la conexión de Mysql
     */
    private function getPDOConnection(){
        try {
            return new PDO(DBConfig::DNS_MYSQL, DBConfig::USER_MYSQL, DBConfig::PASSWORD_MYSQL);
        }catch(PDOException $pdoEx){
            throw new Exception("Error de conexión con la BASE DE DATOS");
        }catch(Exception $ex){
            throw new Exception($ex->getMessage());
        }
    }

    # Métodos Getter and Setter
    public function getConn(){
        return $this->conn;
    }
}