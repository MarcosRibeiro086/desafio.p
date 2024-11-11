<?php
require_once __DIR__ . '/../models/associado.php';

class associadoController {
    private $db;
    private $associado;

    public function __construct($db) {
        $this->db = $db;
        $this->associado = new Associado($db);
    }

    public function cadastrarAssociado($nome, $email, $cpf, $data_filiacao) {
        // Verificar se o CPF já está cadastrado
        if ($this->associado->verificarCpfExistente($cpf)) {
            return false; // CPF já existe, não pode cadastrar
        }

        // Cadastrar o associado caso o CPF não exista
        return $this->associado->cadastrar($nome, $email, $cpf, $data_filiacao);
    }
}

?>
