<?php
namespace Model;

class Livro {
    private $id;
    private $titulo;
    private $ano;
    private $idAutor;

    public function __construct($id, $titulo, $ano, $idAutor) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->ano = $ano;
        $this->idAutor = $idAutor;
    }

    public function getIdLivro() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        return $this->titulo = $titulo;
    }

    public function getAno() {
        return $this->ano;
    }

    public function setAno($ano) {
        return $this->ano = $ano;
    }

    public function getIdAutor() {
        return $this->idAutor;
    }

    public function setIdAutor($idAutor) {
        return $this->idAutor = $idAutor;
    }
}
?>
