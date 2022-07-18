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
    <h1></h1>
    <?php
    $resultadoClientes = $conn->prepare("SELECT * FROM clientes");
    $resultadoClientes->execute();

    echo "<table border=1>";

    while ($linhaCliente = $resultadoClientes->fetch(PDO::FETCH_ASSOC)) {

        "<th>Nome:</th>
        <th>Telefone:</th>
        <th>CPF:</th>";
        echo "<tr><td>$linhaCliente[nome]</td>"
            . "<td>$linhaCliente[telefone]</td>"
            . "<td>$linhaCliente[cpf]</td></tr>";
    }
    echo "</table>";
    ?>

</body>

</html>