<?php
require_once __DIR__ . '/..//../../src/controllers/cobrancaController.php';
require_once __DIR__ . '/..//../../src/controllers/associadoController.php';
require_once __DIR__ . '/..//../../src/controllers/anuidadeController.php';

$database = new connection();
$db = $database->getConnection();
$cobrancaController = new cobrancaController($db);
$associadoController = new associadoController($db);
$anuidadeController = new anuidadeController($db);

// Recuperando os associados e anuidades
$associados = $associadoController->listarAssociados();
$anuidades = $anuidadeController->listarAnuidades();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"])) {
    if ($_POST["action"] === "cadastrar_cobranca") {
        $associado_id = $_POST["associado_id"];
        $anuidade_id = $_POST["anuidade_id"];
        $valor = $_POST["valor"];
        $status = $_POST["status"];

        // Chama o controlador para cadastrar a cobrança
        if ($cobrancaController->cadastrarCobranca($associado_id, $anuidade_id, $valor, $status)) {
            echo "<p>Cobrança cadastrada com sucesso!</p>";
        } else {
            echo "<p>Erro ao cadastrar cobrança.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cobrança</title>
</head>
<body>
    <h1>Cadastrar Cobrança</h1>

    <form method="POST" action="">
        <input type="hidden" name="action" value="cadastrar_cobranca">

        <label for="associado_id">Associado:</label>
        <select name="associado_id" required>
            <?php foreach ($associados as $associado): ?>
                <option value="<?php echo $associado['id']; ?>"><?php echo $associado['nome']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="anuidade_id">Anuidade:</label>
        <select name="anuidade_id" required>
            <?php foreach ($anuidades as $anuidade): ?>
                <option value="<?php echo $anuidade['id']; ?>"><?php echo $anuidade['ano']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="valor">Valor:</label>
        <input type="text" name="valor" required><br>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="pendente">Pendente</option>
            <option value="pago">Pago</option>
        </select><br>

        <button type="submit">Cadastrar Cobrança</button>
    </form>
</body>
</html>
