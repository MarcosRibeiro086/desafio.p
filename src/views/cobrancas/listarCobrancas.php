<?php
require_once __DIR__ . '/../../controllers/cobrancaController.php';

$database = new connection();
$db = $database->getConnection();
$cobrancaController = new cobrancaController($db);

// Obtém a lista de cobranças
$cobrancas = $cobrancaController->listarCobrancas();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Cobranças</title>
</head>
<body>
    <h1>Listar Cobranças</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Associado</th>
                <th>Anuidade</th>
                <th>Valor</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cobrancas as $cobranca): ?>
                <tr>
                    <td><?php echo $cobranca['associado']; ?></td>
                    <td><?php echo $cobranca['anuidade_ano']; ?></td>
                    <td><?php echo $cobranca['valor']; ?></td>
                    <td><?php echo $cobranca['status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
