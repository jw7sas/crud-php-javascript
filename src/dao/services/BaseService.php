<?php
# import routes
include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');

# imports
require_once(DB_PATH . 'MysqlConnection.php');

/**
 * Clase Base para los servicios del proyecto
 */
class BaseService {
    private $conn = null;

    public function __construct(){
        try{
            $session_conn = new MysqlConnection();
            $this->conn = $session_conn->getConn();
        }catch(Exception $ex){
            throw new Exception($ex);
        }
    }

    /**
     * Método para ejecutar sentencia SQL
     */
    protected function executeUpdate($query, $params = []){
        try {
            $st = $this->conn->prepare($query);
            return $st->execute($params);
        }catch(Exception $ex){
            throw new Exception($ex);
        }
    }

    /**
     * Método para ejecutar una sentencia y obtener resultados
     */
    protected function executeQuery($query, $params = []){
        try{
            $st = $this->conn->prepare($query);
            $st->execute($params);

            $data = $st->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }catch(Exception $ex){
            throw new Exception($ex);
        }
    }
}