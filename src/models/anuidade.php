<?php
class anuidade {
    private $conn;
    private $table_name = "anuidades";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Função para cadastrar uma anuidade
    public function cadastrar($ano, $valor) {
        $query = "INSERT INTO " . $this->table_name . " (ano, valor) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);

        // Verifica se o valor foi inserido corretamente
        return $stmt->execute([$ano, $valor]);
    }

    // Função para listar todas as anuidades
    public function listar() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
