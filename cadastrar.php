<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['nome']) && !empty($_POST['categoria']) && isset($_POST['preco'])) {
        
        $sql = "INSERT INTO brinquedos (nome, categoria, faixa_etaria, preco, quantidade) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param(
                "sssdi", 
                $_POST['nome'], 
                $_POST['categoria'], 
                $_POST['faixa_etaria'], 
                $_POST['preco'], 
                $_POST['quantidade']
            );
            
            if ($stmt->execute()) {
                header("Location: index.php");
                exit;
            } else {
                $erro = "Erro: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $erro = "Erro: " . $mysqli->error;
        }
    } else {
        $erro = "Preenche todos os campos obrigatórios!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<body>
    <h1>Cadastrar Brinquedo</h1>
    <?php if(isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="POST">
        Nome: <input type="text" name="nome" required><br><br>
        Categoria: <input type="text" name="categoria" required><br><br>
        Faixa Etária: <input type="text" name="faixa_etaria" required><br><br>
        Preço: <input type="number" step="0.01" name="preco" required><br><br>
        Quantidade: <input type="number" name="quantidade" required><br><br>
        <button type="submit">Guardar</button>
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>