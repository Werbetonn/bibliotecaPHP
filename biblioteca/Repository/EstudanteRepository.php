<?php
namespace Repository;

use Model\Estudante;
use db\Database;

class EstudanteRepository {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function save(Estudante $estudante){
        $conn = $this->db->getConnection();

        if($estudante->getIdEstudante()){
            $sql = "UPDATE estudante SET nome=? WHERE id=?";
            $stmt=$conn->prepare($sql);
            $stmt->bind_param("si", $estudante->getNome(), $estudante->getIdEstudante());
        } else {
            $sql = "INSERT INTO estudante (nome) VALUES (?)";
            $stmt=$conn->prepare($sql);
            $stmt->bind_param("s", $estudante->getNome(), $estudante->getIdEstudante());
        }

        $stmt->execute();
        $stmt->close();
    }

    public function delete($id){
        $conn = $this->db->getConnection();

        $sql = "DELETE FROM estudante WHERE id?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

    }

    public function findById($id) {
        $conn = $this->db->getConnection();

        $sql = "SELECT id, nome FROM estudante WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($id, $nome);

        if ($stmt->fetch()) {
            $stmt->close();
            return new Estudante($id, $nome);
        }

        $stmt->close();
        return null;
    }

    public function findAll() {
        $conn = $this->db->getConnection();

        $sql = "SELECT id, nome FROM estudante";
        $result = $conn->query($sql);

        $estudantes = [];
        while ($row = $result->fetch_assoc()) {
            $estudantes[] = new Estudante($row['id'], $row['nome']);
        }

        $result->free();
        return $estudantes;
    }


    
}

?>