<?php

$nomeServidor = "127.0.0.1";
$nomeUsuario = "root";
$senha = "pw1234";
$bdNome = "clientes";
$bdPorta = "3307";

try {
    $conn = new PDO("mysql:host=$nomeServidor;port=$bdPorta", $nomeUsuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

