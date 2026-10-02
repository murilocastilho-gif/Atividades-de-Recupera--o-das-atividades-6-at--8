<?php
require 'conexao.php';

$stmt = $mysqli->prepare("SELECT * FROM brinquedos");
$stmt->execute();
$resultado = $stmt->get_result();
$brinquedos = $resultado->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>