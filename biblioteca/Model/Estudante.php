<?php
namespace Model;

class Estudante {
    private $id;
    private $nome;


    public function __construct($id, $nome) {
        $this->id = $id;
        $this->nome = $nome;
    }

    public function getIdEstudante(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        return $this->nome = $nome;
    }

}
?>