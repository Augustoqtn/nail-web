<?php

include "conexao.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>clientes</title>
</head>
    <body>
        <?php $resultadoClientes = $conn->prepare("SELECT * FROM clientes");
        $resultadoClientes->execute(); ?> 
        <table border=1>
        <caption><h2>Clientes</h2></caption>
            <tr>
                <th>nome:</th>
                <th>telefone:</th>
                <th>CPF:</th>
            </tr>

            <?php while ($linhaCliente = $resultadoClientes->fetch(PDO::FETCH_ASSOC)) : ?> 
            <tr>
                
                <td><a href="cliente.php?id=<?php echo $linhaCliente["id"]?>">
                <?php echo $linhaCliente["nome"] ?></a></td>
                <td><?php echo $linhaCliente["telefone"] ?></td>
                <td><?php echo $linhaCliente["cpf"] ?></td>
            </tr>
            <?php endwhile ?> 
        </table>
    </body>

</html>