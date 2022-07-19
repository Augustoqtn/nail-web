<?php

include "conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cliente</title>
</head>
<body>
    <h2>detalhes do cliente:</h2>

    <?php
    $resultadoCliente = $conn->prepare("SELECT * FROM clientes WHERE id= :id LIMIT 1");
    $resultadoCliente->bindParam(":id", $id);
    $resultadoCliente->execute();
    $linhaCliente = $resultadoCliente->fetch(PDO::FETCH_ASSOC);?>
    <table border=1>
    <tr>
        <td>Nome</td>
        <td>telefone</td>
        <td>Cpf</td>
    </tr>
    <tr>
        <td><?php echo $linhaCliente["nome"]?></td>
        <td><?php echo $linhaCliente["telefone"]?></td>
        <td><?php echo $linhaCliente["cpf"]?></td>
    </tr>
    </table>
</body>
</html>