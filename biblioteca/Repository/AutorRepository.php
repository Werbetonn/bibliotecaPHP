<?php

namespace Repository;

require_once '../db/Database.php';
include_once '../Model/Autor.php';
use Model\Autor;
use db\Database;

class AutorRepository {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function save(Autor $autor) {
        $conn = $this->db->getConnection();

        if ($autor->getId()) {
            $sql = "UPDATE autor SET nome=?, nacionalidade=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die('Erro na preparação da consulta: ' . $conn->error);
            }
            $stmt->bind_param("ssi", $autor->getNome(), $autor->getNacionalidade(), $autor->getId());
        } else {
            $sql = "INSERT INTO autor (nome, nacionalidade) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die('Erro na preparação da consulta: ' . $conn->error);
            }
            $stmt->bind_param("ss", $autor->getNome(), $autor->getNacionalidade());
        }

        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $conn = $this->db->getConnection();
        
        $sql = "DELETE FROM autor WHERE id=?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die('Erro na preparação da consulta: ' . $conn->error);
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function findById($id) {
        $conn = $this->db->getConnection();
        
        $sql = "SELECT id, nome, nacionalidade FROM autor WHERE id=?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die('Erro na preparação da consulta: ' . $conn->error);
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($id, $nome, $nacionalidade);

        if ($stmt->fetch()) {
            $stmt->close();
            return new Autor($id, $nome, $nacionalidade);
        }

        $stmt->close();
        return null;
    }

    public function findAll() {
        $conn = $this->db->getConnection();
        
        $sql = "SELECT id, nome, nacionalidade FROM autor";
        $result = $conn->query($sql);

        if ($result === false) {
            die('Erro na execução da consulta: ' . $conn->error);
        }

        $autores = [];
        while ($row = $result->fetch_assoc()) {
            $autores[] = new Autor($row['id'], $row['nome'], $row['nacionalidade']);
        }

        $result->free();
        return $autores;
    }

    public function __destruct() {
        $this->db->closeConnection(); // Fecha a conexão quando o objeto for destruído
    }
}
?>
