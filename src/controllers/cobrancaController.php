<?php
require_once __DIR__ . '/../models/cobranca.php';

class cobrancaController {

    private $db;
    private $cobranca;

    public function __construct($db) {
        $this->db = $db;
        $this->cobranca = new Cobranca($db);
    }

    // Função para cadastrar uma cobrança
    public function cadastrarCobranca($associado_id, $valor, $data_vencimento) {
        // Valida os dados
        if ($this->cobranca->cadastrar($associado_id, $valor, $data_vencimento)) {
            return true;
        } else {
            return false;
        }
    }

    // Função para listar todas as cobranças
    public function listarCobrancas() {
        return $this->cobranca->listar();
    }
}
?>
