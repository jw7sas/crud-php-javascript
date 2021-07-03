<?php

class State {
    # Atributos
    private $id;
    private $name;
    private $process;

    # constructor
    public function __construct(){

    }

    # Métodos getter and setter
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setProcess($process){
        $this->process = $process;
    }

    public function getProcess(){
        return $this->process;
    }

    public function getJSON(){
        return array(
            "id" => $this->id,
            "name" => $this->name,
            "process" => $this->process
        );
    }

}