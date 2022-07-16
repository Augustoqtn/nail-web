<?php

include "conexao.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $resultadoClientes = $conn->prepare("SELECT * FROM clientes");
    $resultadoClientes->execute();

    while ($linhaCliente = $resultadoClientes->fetch(PDO::FETCH_ASSOC)) {
        echo "nome:" . $linhaCliente["nome"] . "<br>";
        echo "telefone:" . $linhaCliente["telefone"] . "<br>";
        echo "cpf:" . $linhaCliente["cpf"] . "<br><hr>";
    }
    ?>

</body>

</html>