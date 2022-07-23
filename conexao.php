<?php

$nomeServidor = "127.0.0.1";
$nomeUsuario = "root";
$senha = "pw1234";
$bdNome = "nails";
$bdPorta = "3307";

try {
    $conn = new PDO("mysql:host=$nomeServidor;dbname=$bdNome;port=$bdPorta", $nomeUsuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
$stmt = $conn->query("SELECT * FROM  clientes");
while ($row = $stmt->fetch()) {
    // echo $row["nome"];
}

