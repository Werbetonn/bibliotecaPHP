<?php

namespace Repository;

require_once '../db/Database.php';
include_once '../Model/Livro.php';
use Model\Livro;
use db\Database;

class LivroRepository {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function save(Livro $livro) {
        $conn = $this->db->getConnection();

        if ($livro->getIdLivro()) {
            $sql = "UPDATE livro SET titulo=?, ano=?, idAutor=? WHERE idLivro=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("siii", $livro->getTitulo(), $livro->getAno(), $livro->getIdAutor(), $livro->getIdLivro());
        } else {
            $sql = "INSERT INTO livro (titulo, ano, idAutor) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sii", $livro->getTitulo(), $livro->getAno(), $livro->getIdAutor());
        }

        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $conn = $this->db->getConnection();
        
        $sql = "DELETE FROM livro WHERE idLivro=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function findById($id) {
        $conn = $this->db->getConnection();
        
        $sql = "SELECT idLivro, titulo, ano, idAutor FROM livro WHERE idLivro=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($id, $titulo, $ano, $idAutor);

        if ($stmt->fetch()) {
            $stmt->close();
            return new Livro($id, $titulo, $ano, $idAutor);
        }

        $stmt->close();
        return null;
    }

    public function findAll() {
        $conn = $this->db->getConnection();
        
        $sql = "SELECT idLivro, titulo, ano, idAutor FROM livro";
        $result = $conn->query($sql);
        $livros = [];
        while ($row = $result->fetch_assoc()) {
            $livros[] = new Livro($row['idLivro'], $row['titulo'], $row['ano'], $row['idAutor']);
        }

        $result->free();
        return $livros;
    }

    public function __destruct() {
        $this->db->closeConnection();
    }
}
?>
