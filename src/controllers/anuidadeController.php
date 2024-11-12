<?php
require_once __DIR__ . '/../models/anuidade.php';

class anuidadeController {
    private $db;
    private $anuidade;

    public function __construct($db) {
        $this->db = $db;
        $this->anuidade = new Anuidade($this->db);
    }

    // Função para cadastrar uma nova anuidade
    public function cadastrarAnuidade($ano, $valor) {
        return $this->anuidade->cadastrar($ano, $valor);
    }

    // Função para listar todas as anuidades
    public function listarAnuidades() {
        return $this->anuidade->listar();
    }

    // Função para obter as anuidades devidas de um associado
    public function checkoutAnuidades($associado_id) {
        // Consulta SQL ajustada
        $query = "
            SELECT a.id AS associado_id, an.anuidade_id, an.ano, an.valor, c.pago
            FROM associados a
            JOIN cobrancas c ON a.id = c.associado_id  -- Verifique se a chave é 'a.id' e 'c.associado_id'
            JOIN anuidades an ON an.anuidade_id = c.anuidade_id
            WHERE a.id = :associado_id
            ORDER BY an.ano ASC
        ";
    
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':associado_id', $associado_id, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Função para registrar o pagamento de uma anuidade
    public function pagarAnuidade($associado_id, $anuidade_id) {
        $query = "UPDATE cobrancas
                  SET pago = 1
                  WHERE associado_id = :associado_id AND anuidade_id = :anuidade_id";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':associado_id', $associado_id);
        $stmt->bindParam(':anuidade_id', $anuidade_id);
        return $stmt->execute();
    }

    // Função para verificar status de pagamento
    public function verificarStatusPagamento($associado_id) {
        $query = "SELECT a.associado_id, a.nome, 
                         IF(SUM(CASE WHEN c.pago = 1 THEN 0 ELSE 1 END) > 0, 'Atrasado', 'Em Dia') AS status_pagamento
                  FROM associados a
                  LEFT JOIN cobrancas c ON a.associado_id = c.associado_id
                  LEFT JOIN anuidades an ON c.anuidade_id = an.anuidade_id
                  WHERE a.data_filiacao <= CURDATE()
                  GROUP BY a.associado_id
                  ORDER BY a.nome";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
