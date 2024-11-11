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
}
?>
