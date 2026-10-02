<?php
require 'conexao.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE brinquedos SET nome = ?, categoria = ?, faixa_etaria = ?, preco = ?, quantidade = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param(
            "sssdii", 
            $_POST['nome'], 
            $_POST['categoria'], 
            $_POST['faixa_etaria'], 
            $_POST['preco'], 
            $_POST['quantidade'], 
            $id
        );
        $stmt->execute();
        $stmt->close();
        header("Location: index.php");
        exit;
    }
}

$stmt = $mysqli->prepare("SELECT * FROM brinquedos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$b = $resultado->fetch_assoc();
$stmt->close();

if (!$b) {
    die("Brinquedo não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt">
<body>
    <h1>Editar Brinquedo</h1>
    <form method="POST">
        Nome: <input type="text" name="nome" value="<?= htmlspecialchars($b['nome']) ?>" required><br><br>
        Categoria: <input type="text" name="categoria" value="<?= htmlspecialchars($b['categoria']) ?>" required><br><br>
        Faixa Etária: <input type="text" name="faixa_etaria" value="<?= htmlspecialchars($b['faixa_etaria']) ?>" required><br><br>
        Preço: <input type="number" step="0.01" name="preco" value="<?= $b['preco'] ?>" required><br><br>
        Quantidade: <input type="number" name="quantidade" value="<?= $b['quantidade'] ?>" required><br><br>
        <button type="submit">Atualizar</button>
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>