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
        <?php $resultadoClientes = $conn->prepare("SELECT * FROM clientes");
        $resultadoClientes->execute(); ?>
        <table border=1>
            <tr>
                <td>nome:</td>
                <td>telefone:</td>
                <td>CPF:</td>
            </tr>
            <?php while ($linhaCliente = $resultadoClientes->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $linhaCliente["nome"] ?></td>
                <td><?php echo $linhaCliente["telefone"] ?></td>
                <td><?php echo $linhaCliente["cpf"] ?></td>
            </tr>
            <?php endwhile ?>
        </table>
    </body>

    </html>