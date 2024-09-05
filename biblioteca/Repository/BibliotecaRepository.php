<?php
namespace Repository;

use db\Database;
use Model\Livro;
use Model\Estudante;

class BibliotecaRepository {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function emprestarLivro(Livro $livro, Estudante $estudante): bool {
        $sql = "SELECT COUNT(*) as total FROM Emprestimo WHERE idLivro = ? AND dataDevolucao IS NULL";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $livro->getIdLivro());
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['total'] > 0) {
            
            return false;
        }

        
        $sql = "INSERT INTO Emprestimo (idLivro, idEstudante, dataEmprestimo) VALUES (?, ?, NOW())";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("ii", $livro->getIdLivro(), $estudante->getIdEstudante());
        $stmt->execute();
        return true;
    }

    public function devolverLivro(Livro $livro, Estudante $estudante): bool {
        
        $sql = "UPDATE Emprestimo SET dataDevolucao = NOW() WHERE idLivro = ? AND idEstudante = ? AND dataDevolucao IS NULL";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("ii", $livro->getIdLivro(), $estudante->getIdEstudante());
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }

        
        return false;
    }

    public function livrosEmprestados(Estudante $estudante): array {
        $sql = "SELECT l.idLivro, l.titulo FROM Livro l 
                INNER JOIN Emprestimo e ON l.idLivro = e.idLivro 
                WHERE e.idEstudante = ? AND e.dataDevolucao IS NULL";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $estudante->getIdEstudante());
        $stmt->execute();

        $result = $stmt->get_result();
        $livros = [];
        while ($row = $result->fetch_assoc()) {
            $livro = new Livro($row['idLivro'], $row['titulo'], $row['ano'], $row['idAutor']);
            $livros[] = $livro;
        }

        return $livros;
    }
}
?>
