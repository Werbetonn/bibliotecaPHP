<?php
namespace db;

class Database {
    private $conn;

    public function __construct() {
        $servername = "127.0.0.1";
        $username = "root"; // Substitua pelo seu usuário do MySQL
        $password = ""; // Substitua pela sua senha do MySQL
        $dbname = "bibliotecadb"; // Substitua pelo nome do seu banco de dados

        // Criar conexão
        $this->conn = new \mysqli($servername, $username, $password, $dbname);

        // Verificar conexão
        if ($this->conn->connect_error) {
            die("Conexão falhou: " . $this->conn->connect_error);
        } else {
            echo"Conexão bem-sucedida!" . PHP_EOL; // Adicione esta linha
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}

new Database();
?>
