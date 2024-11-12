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

// src/models/cobranca.php
public function listar()
{
    $sql = "SELECT 
                c.id,
                a.nome AS associado, -- Adicionando alias para nome do associado
                an.ano AS anuidade_ano,
                c.valor,
                c.pago AS status
            FROM 
                cobrancas c
            JOIN 
                associados a ON c.associado_id = a.id
            JOIN 
                anuidades an ON c.anuidade_id = an.id";
    
    $stmt = $this->conn->prepare($sql);
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
