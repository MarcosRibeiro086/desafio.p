<?php
require_once __DIR__ . '/../../src/controllers/anuidadeController.php';

$database = new connection();
$db = $database->getConnection();
$anuidadeController = new anuidadeController($db);

// Obtém a lista de anuidades cadastradas
$anuidades = $anuidadeController->listarAnuidades();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Anuidades</title>
</head>
<body>
    <h1>Listar Anuidades</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Ano</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anuidades as $anuidade): ?>
                <tr>
                    <td><?php echo $anuidade['ano']; ?></td>
                    <td><?php echo $anuidade['valor']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
