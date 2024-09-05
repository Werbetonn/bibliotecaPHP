<?php
namespace Controller;

use Model\BibliotecaEmprestimo;
use Model\Livro;
use Model\Estudante;
use Repository\BibliotecaRepository;

class BibliotecaController {
    private $bibliotecaRepository;

    public function __construct() {
        $this->bibliotecaRepository = new BibliotecaRepository();
    }

    public function emprestarLivro(Livro $livro, Estudante $estudante): bool {
        return $this->bibliotecaRepository->emprestarLivro($livro, $estudante);
    }

    public function devolverLivro(Livro $livro, Estudante $estudante): bool {
        return $this->bibliotecaRepository->devolverLivro($livro, $estudante);
    }

    public function livrosEmprestados(Estudante $estudante): array {
        return $this->bibliotecaRepository->livrosEmprestados($estudante);
    }
}
?>
