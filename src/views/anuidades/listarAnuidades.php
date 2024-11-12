<?php
require_once __DIR__ . '/../../../config/connection.php';
require_once __DIR__ . '/../../../src/controllers/AnuidadeController.php';

$database = new connection();
$db = $database->getConnection();
$anuidadeController = new anuidadeController($db);

// Lista as anuidades devidas para um associado
$associado_id = 1; // Exemplo de ID
$anuidades = $anuidadeController->checkoutAnuidades($associado_id);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout de Anuidades</title>
</head>
<body>
    <h1>Checkout de Anuidades</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Anuidade (Ano)</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anuidades as $anuidade): ?>
                <tr>
                    <td><?php echo $anuidade['ano']; ?></td>
                    <td><?php echo $anuidade['valor']; ?></td>
                    <td><?php echo $anuidade['pago'] ? 'Pago' : 'Não Pago'; ?></td>
                    <td>
                        <?php if (!$anuidade['pago']): ?>
                            <form method="POST" action="pagarAnuidade.php">
                                <input type="hidden" name="associado_id" value="<?php echo $associado_id; ?>">
                                <input type="hidden" name="anuidade_id" value="<?php echo $anuidade['anuidade_id']; ?>">
                                <button type="submit">Pagar</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
