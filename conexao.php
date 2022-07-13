<?php

$nomeServidor = "localhost";
$nomeUsuario = "Augusto";
$senha = "pw1234";
$bdNome = "clientes";
$bdPorta = "3307";

try {
    $conn = new PDO("mysql:host=$nomeServidor;dbname=$bdNome;port=$bdPorta", $nomeUsuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
