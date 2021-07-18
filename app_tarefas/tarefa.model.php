<?php

class Tarfefa{
    private $id;
    private $id_stauts;
    private $tarefa;
    private $data_cadastro;

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

}