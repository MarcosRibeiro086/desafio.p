<?php
// Configurações e Controllers
require_once __DIR__ . '/../config/connection.php';
require_once __DIR__ . '/../src/controllers/associadoController.php';

// Instanciando o controlador de Associados
$database = new connection();
$db = $database->getConnection();
$associadoController = new associadoController($db);

// Verificando a ação de formulário
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"])) {
    if ($_POST["action"] === "cadastrar_associado") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cpf = $_POST["cpf"];
        $data_filiacao = $_POST["data_filiacao"];

        // Cadastra o associado usando o controller
        if ($associadoController->cadastrarAssociado($nome, $email, $cpf, $data_filiacao)) {
            echo "<p>Associado cadastrado com sucesso!</p>";
        } else {
            // Se o CPF já estiver cadastrado
            echo "<p>Erro: O CPF informado já está cadastrado. <a href='/desafio.p/'>Voltar para a página principal</a></p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Associados - Devs do RN</title>
</head>
<body>
    <h1>Bem-vindo ao Gerenciador de Associados</h1>

    <ul>
        <li><a href="/desafio.p/views/associados/associado_form.php">Cadastrar Associado</a></li>
        <li><a href="/desafio.p/views/associados/listarAssociados.php">Listar Associados</a></li>
        <li><a href="/desafio.p/views/anuidades/cadastrar.php">Cadastrar Anuidade</a></li>
        <li><a href="/desafio.p/views/anuidades/listarAnuidades.php">Listar Anuidades</a></li>
        <li><a href="src\views\cobrancas\cadastrarCobrancas.php">Cadastrar Cobrança</a></li>
        <li><a href="src\views\cobrancas\listarCobrancas.php">Listar Cobranças</a></li>
    </ul>

    <h2>Cadastrar Associado</h2>
    <!-- Formulário de Cadastro de Associado -->
    <form method="POST" action="">
        <input type="hidden" name="action" value="cadastrar_associado">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" required><br>

        <label for="data_filiacao">Data de Filiação:</label>
        <input type="date" name="data_filiacao" required><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
