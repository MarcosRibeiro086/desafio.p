<?php
require_once __DIR__ . '/../../config/connection.php';

class cobranca {
    private $conn;
    private $table_name = "cobrancas";

    public function __construct() {
        $database = new connection();
        $this->conn = $database->getConnection();
    }

    public function cadastrar($associado_id, $anuidade_id) {
        $query = "INSERT INTO " . $this->table_name . " (associado_id, anuidade_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$associado_id, $anuidade_id]);
    }

    public function listar() {
        $query = "SELECT c.id, a.nome AS associado_nome, an.ano, an.valor, c.pago
                  FROM cobrancas c
                  JOIN associados a ON c.associado_id = a.id
                  JOIN anuidades an ON c.anuidade_id = an.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pagar($id) {
        $query = "UPDATE " . $this->table_name . " SET pago = 1 WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>
