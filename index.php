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
    <h1>tabela</h1>
    <table border="2">
        <tr>
            <td>nome</td>
            <td>idade</td>
            <td>CPF</td>
        </tr>
        <tr>
            <td>nome pessoa</td>
            <td>idade pessoa</td>
            <td>cpf pessoa</td>
        </tr>
    </table>
</body>

</html>

<!-- <?php
        $resultadoClientes = $conn->prepare("SELECT * FROM clientes");
        $resultadoClientes->execute();

        echo "<table border=1>";
        echo "<tr><td>nome:</td>"
            . "<td>telefone:</td>"
            . "<td>CPF</td></tr>";

        while ($linhaCliente = $resultadoClientes->fetch(PDO::FETCH_ASSOC)) {


            echo "<tr><td>{$linhaCliente["nome"]}</td>"
                . "<td>{$linhaCliente["telefone"]}</td>"
                . "<td>{$linhaCliente["cpf"]}</td></tr>";
        }
        echo "</table>";
        ?> -->