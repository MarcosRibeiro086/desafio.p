<?php
class associado {
    private $conn;
    private $table_name = "associados";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Função para verificar se o CPF já está cadastrado
    public function verificarCpfExistente($cpf) {
        $query = "SELECT id FROM " . $this->table_name . " WHERE cpf = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$cpf]);
        return $stmt->rowCount() > 0; // Retorna true se CPF já existe
    }

    // Função para cadastrar um novo associado
    public function cadastrar($nome, $email, $cpf, $data_filiacao) {
        $query = "INSERT INTO " . $this->table_name . " (nome, email, cpf, data_filiacao) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nome, $email, $cpf, $data_filiacao]);
    }

    // Função para listar todos os associados
    public function listar() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
