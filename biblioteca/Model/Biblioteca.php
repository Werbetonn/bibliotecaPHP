<?php
namespace Model;

class Biblioteca{
    private $livros;

    public function __construct() {
        $this->livros = [];
    }

    public function emprestarLivro(Livro $livro, Estudante $estudante): bool {
        foreach ($this->livros as $livroEmprestado) {
            if ($livroEmprestado->getIdLivro() == $livro->getIdLivro()) {
                return false;
            }
        }

        $this->livros[] = $livro;
        return true;
    }

    public function devolverLivro(Livro $livro, Estudante $estudante): bool {
        foreach ($this->livros as $key => $livroEmprestado) {
            if ($livroEmprestado->getIdLivro() == $livro->getIdLivro()) {
                unset($this->livros[$key]);
                return true;
            }
        }
        return false;
    }

    public function livrosEmprestados(Estudante $estudante): array {
        return $this->livros;
    }
}
?>
