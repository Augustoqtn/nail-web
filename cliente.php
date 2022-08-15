<?php

use Clientes\Clientes;

include "conexao.php";
$tituloPagina = "cliente";
include "./templates/cabecalho.php";
require_once "./src/Clientes/Clientes.php";

$clientes = new Clientes($conn, $_GET["id"]);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cliente = $clientes->listarUmCliente($_GET["id"]);
}

?>
<table border=1>
    <caption>
        <h2>Detalhe do Cliente</h2>
    </caption>
    <tr>
        <th>Nome</th>
        <th>telefone</th>
        <th>Cpf</th>
    </tr>
    <tr>
        <td><?php echo $cliente["nome"] ?></td>
        <td><?php echo $cliente["telefone"] ?></td>
        <td><?php echo $cliente["cpf"] ?></td>
    </tr>
</table>

<a href="index.php">
    <br><input type="button" value="voltar">
</a>
<a href="editar-cliente.php?id=<?php echo $cliente["id"] ?>">
    <input type="button" value="editar">
</a>

<form name="excluir-cliente" method="POST" action="excluir-cliente.php?id=<?php echo $cliente["id"] ?>">

    <br><input type="submit" value="excluir" placeholder="<?php echo $cliente["id"] ?>"></br>

</form>

<?php include "./templates/rodape.php"; ?>