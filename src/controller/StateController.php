<?php 

# import routes
include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');

# imports
require_once(DAO_SERV_PATH. "StateService.php");

class StateController {
    # Atributos
    private $service;

    # Constructor
    public function __construct(){

    }

    # MÉTODOS
    public function view(){
        try{
            // consultar registros
            $this->service = new StateService();
            $states = $this->service->readAllStates();
            require_once(VIEW_PAGES_PATH. "states/list.php");
        }catch(Exception $ex){
            $this->error500($ex);
        }
    }

    public function create(){
        if(isset($_POST["json"]) && !empty($_POST["json"])){
            try{
                // Decodificar información
                $data = json_decode($_POST["json"], true);
                $s = new State();
                $s->setName($data["name"]);
                $s->setProcess($data["process"]);
                // Crear registros
                $this->service = new StateService();
                $bool = $this->service->createState($s);
                echo json_encode(Array("response" => $bool, "error" => false));
            }catch(Exception $ex){
                echo json_encode(Array("response" => false, "error" => $ex->getMessage()));
            }
        }else{
            require_once(VIEW_PAGES_PATH. "states/management.php");
        }
    }

    public function update(){
        if(isset($_POST["json"]) && !empty($_POST["json"])){
            try{
                // Decodificar información
                $data = json_decode($_POST["json"], true);
                $s = new State();
                $s->setId($data["id"]);
                $s->setName($data["name"]);
                $s->setProcess($data["process"]);

                // Actualizar registros
                $this->service = new StateService();
                $bool = $this->service->updateState($s);
                echo json_encode(Array("response" => $bool, "error" => false));
            }catch(Exception $ex){
                echo json_encode(Array("response" => false, "error" => $ex->getMessage()));
            }
        }else{
            require_once(VIEW_PAGES_PATH. "states/management.php");
        }
    }

    public function delete(){
        // $request_body = file_get_contents('php://input');
        // $data = json_decode($request_body);
        // echo var_dump($data);
        if(isset($_POST["json"]) && !empty($_POST["json"])){
            try{
                // Decodificar registros
                $data = json_decode($_POST["json"], true);
                $s = new State();
                $s->setId($data["id"]);

                // Eliminar información
                $this->service = new StateService();
                $bool = $this->service->deleteState($s);
                echo json_encode(Array("response" => $bool, "error" => false));
            }catch(Exception $ex){
                echo json_encode(Array("response" => false, "error" => $ex->getMessage()));
            }
        }else{
            echo json_encode(Array("response" => false, "error" => "Petición NO permitida"));
        }
    }

    public function error500($error){
        require_once(VIEW_ERRORS_PATH. "error500.php");
    }
}