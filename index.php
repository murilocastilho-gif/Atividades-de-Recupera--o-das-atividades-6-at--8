<?php
require 'conexao.php';

$stmt = $mysqli->prepare("SELECT * FROM brinquedos");
$stmt->execute();
$resultado = $stmt->get_result();
$brinquedos = $resultado->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Gestão de Brinquedos</title>
</head>
<body>
    <h1>Estoque de Brinquedos</h1>
    <a href="cadastrar.php">Cadastrar Novo Brinquedo</a>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Faixa Etária</th>
            <th>Preço (€)</th>
            <th>Qtd.</th>
        </tr>
        <?php foreach ($brinquedos as $b): ?>
        <tr>
            <td><?= htmlspecialchars($b['id']) ?></td>
            <td><?= htmlspecialchars($b['nome']) ?></td>
            <td><?= htmlspecialchars($b['categoria']) ?></td>
            <td><?= htmlspecialchars($b['faixa_etaria']) ?></td>
            <td><?= number_format($b['preco'], 2, ',', '.') ?></td>
            <td><?= htmlspecialchars($b['quantidade']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>