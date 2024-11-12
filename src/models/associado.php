<?php

class associado {
    private $db;
    private $table = 'associados';

    public function __construct($db) {
        $this->db = $db;
    }

    // Método para listar todos os associados
    public function listar() {
        $query = "SELECT id, nome, email, cpf, data_filiacao FROM " . $this->table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para cadastrar um associado
    public function cadastrar($nome, $email, $cpf, $data_filiacao) {
        $query = "INSERT INTO " . $this->table . " (nome, email, cpf, data_filiacao)
                  VALUES (:nome, :email, :cpf, :data_filiacao)";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':data_filiacao', $data_filiacao);

        return $stmt->execute();
    }
}

?>
