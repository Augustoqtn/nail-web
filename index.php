<?php

include "conexao.php";
$tituloPagina = "Todos clientes";
include "./templates/cabecalho.php";
require_once "./src/Clientes/Clientes.php";


$servico = new \Clientes\Clientes($conn);
$clientes = $servico->listar();


?>
<table border=1>
    <caption>
        <h2>Clientes</h2>
    </caption>
    <tr>
        <th>nome:</th>
        <th>telefone:</th>
        <th>CPF:</th>
    </tr>

    <?php foreach ($clientes as $cliente) : ?>
        <tr>
            <td><a href="cliente.php?id=<?php echo $cliente["id"] ?>">
                    <?php echo $cliente["nome"] ?></a></td>
            <td><?php echo $cliente["telefone"] ?></td>
            <td><?php echo $cliente["cpf"] ?></td>
        </tr>
    <?php endforeach ?>
</table>

<a href="cadastrar-cliente.php">
    <br><input type="button" value="novo cliente">
</a>
<?php include "./templates/rodape.php"; ?>