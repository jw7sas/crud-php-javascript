<?php
# import routes
include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');

# imports
require_once(MODEL_PATH . 'State.php');

interface StateRepository {
    // Métodos de implementación
    
    public function createState(State $st);
    public function readAllStates();
    public function readStatesByFilters(State $st);
    public function updateState(State $st);
    public function deleteState(State $st);
}