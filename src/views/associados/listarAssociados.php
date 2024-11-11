<?php
require_once __DIR__ . '/../../src/controllers/associadoController.php';
$controller = new associadoController();
$associados = $controller->listar();
?>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>CPF</th>
        <th>Data de Filiação</th>
    </tr>
    <?php foreach ($associados as $associado): ?>
        <tr>
            <td><?= $associado['nome'] ?></td>
            <td><?= $associado['email'] ?></td>
            <td><?= $associado['cpf'] ?></td>
            <td><?= $associado['data_filiacao'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
