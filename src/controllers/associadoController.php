<?php

require_once __DIR__ . '/../models/associado.php';

class associadoController {

    private $db;
    private $model;

    // Construtor recebe a conexão com o banco
    public function __construct($db) {
        $this->db = $db;
        $this->model = new Associado($db);
    }

    // Método para listar todos os associados
    public function listarAssociados() {
        try {
            $associados = $this->model->listar();
            return $associados;
        } catch (Exception $e) {
            echo "Erro ao listar associados: " . $e->getMessage();
            return [];
        }
    }

    // Método para cadastrar um novo associado
    public function cadastrarAssociado($nome, $email, $cpf, $data_filiacao) {
        try {
            $resultado = $this->model->cadastrar($nome, $email, $cpf, $data_filiacao);
            return $resultado;
        } catch (Exception $e) {
            echo "Erro ao cadastrar associado: " . $e->getMessage();
            return false;
        }
    }
}

?>
