<?php
require_once __DIR__ . '/../../../src/controllers/AnuidadeController.php';
require_once __DIR__ . '/../../../config/connection.php';


$database = new connection();
$db = $database->getConnection();
$anuidadeController = new anuidadeController($db);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"])) {
    if ($_POST["action"] === "cadastrar_anuidade") {
        $ano = $_POST["ano"];
        $valor = $_POST["valor"];

        // Chama o controlador para cadastrar a anuidade
        if ($anuidadeController->cadastrarAnuidade($ano, $valor)) {
            echo "<p>Anuidade cadastrada com sucesso!</p>";
        } else {
            echo "<p>Erro ao cadastrar anuidade.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Anuidade</title>
</head>
<body>
    <h1>Cadastrar Anuidade</h1>

    <form method="POST" action="">
        <input type="hidden" name="action" value="cadastrar_anuidade">
        <label for="ano">Ano:</label>
        <input type="text" name="ano" required><br>

        <label for="valor">Valor:</label>
        <input type="text" name="valor" required><br>

        <button type="submit">Cadastrar Anuidade</button>
    </form>
</body>
</html>
