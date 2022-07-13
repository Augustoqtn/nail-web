<?php

$nomeServidor = "localhost";
$nomeUsuario = "Augusto";
$senha = "senha";
$bdNome = "clientes";

$conexao = new PDO("mysql:host=$nomeServidor;dbname=$bdNome", $nomeUsuario, $senha);

try {
    $conn = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
