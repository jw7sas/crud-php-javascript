<?php

# import routes
include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');

# imports
require_once(DAO_REPO_PATH . 'StateRepository.php');
require_once(MODEL_PATH . 'State.php');
require_once(DAO_SERV_PATH. "BaseService.php");
require_once(DB_PATH . 'TConfig.php');

class StateService extends BaseService implements StateRepository {
    # Atributos 
    private $states;
    # Constructor
    public function __construct(){
        try{
            parent::__construct();
        }catch(Exception $ex){
            throw new Exception($ex);
        }
    }

    public function createState(State $st){
        try{
            $query =  "INSERT INTO ". TConfig::TSTATE . " (" . TConfig::TSTATE_NAME . ",".TConfig::TSTATE_PROCESS.") VALUES(?,?)";
            return parent::executeUpdate($query, [$st->getName(), $st->getProcess()]); 
        }catch(Exception $ex){
            throw new Exception($ex);
        }     
    }

    public function readAllStates(){
        try{
            $this->states = [];
            $obj = parent::executeQuery("SELECT * FROM " . TConfig::TSTATE);
            if($obj)
                foreach ($obj  as $key => $value) {
                    $s = new State();
                    $s->setId($value->id);
                    $s->setName($value->name);
                    $s->setProcess($value->process);

                    $this->states[$key] = $s;
                }
            
            return $this->states;
        }catch(Exception $ex){
            throw new Exception($ex);
        }
    }

    public function readStatesByFilters(State $st){
        try{
            return null;
        }catch(Exception $ex){
            throw new Exception($ex);
        }
    }

    public function updateState(State $st){
        try{
            $query = "UPDATE " . TConfig::TSTATE . " SET " . TConfig::TSTATE_NAME . "=?, " . TConfig::TSTATE_PROCESS . "=? WHERE " . TConfig::TSTATE_ID . "=?";
            return parent::executeQuery($query, [$st->getName(), $st->getProcess(), $st->getId()]);
        }catch(Exception $ex){
            throw new Exception($ex);
        }
    }

    public function deleteState(State $st){
        try{
            $query =  "DELETE FROM ". TConfig::TSTATE . " WHERE " . TConfig::TSTATE_ID . "=?";
            return parent::executeUpdate($query, [$st->getId()]); 
        }catch(Exception $ex){
            throw new Exception($ex);
        }
    }
}