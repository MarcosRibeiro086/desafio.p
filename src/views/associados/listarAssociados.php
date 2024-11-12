<?php
require_once __DIR__ . '/../../../config/connection.php';
require_once __DIR__ . '/../../../src/controllers/AssociadoController.php';

$database = new connection();
$db = $database->getConnection();
$associadoController = new AssociadoController($db);

// Obtém a lista de associados
$associados = $associadoController->listarAssociados();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Associados</title>
</head>
<body>
    <h1>Lista de Associados</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Data de Filiação</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($associados)): ?>
                <?php foreach ($associados as $associado): ?>
                    <tr>
                        <td><?php echo $associado['id']; ?></td>
                        <td><?php echo $associado['nome']; ?></td>
                        <td><?php echo $associado['email']; ?></td>
                        <td><?php echo $associado['cpf']; ?></td>
                        <td><?php echo $associado['data_filiacao']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">Nenhum associado encontrado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
