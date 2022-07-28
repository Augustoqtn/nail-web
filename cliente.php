<?php

include "conexao.php";
$tituloPagina = "cliente";
include "./templates/cabecalho.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

?>

<?php
$resultadoCliente = $conn->prepare("SELECT * FROM clientes WHERE id= :id LIMIT 1");
$resultadoCliente->bindParam(":id", $id);
$resultadoCliente->execute();
$linhaCliente = $resultadoCliente->fetch(PDO::FETCH_ASSOC);?>
<table border=1>
<caption><h2>Detalhe do Cliente</h2></caption>
<tr>
    <th>Nome</th>
    <th>telefone</th>
    <th>Cpf</th>
</tr>
<tr>
    <td><?php echo $linhaCliente["nome"]?></td>
    <td><?php echo $linhaCliente["telefone"]?></td>
    <td><?php echo $linhaCliente["cpf"]?></td>
</tr>
</table>
<a href="index.php">
    <br><input type="button" value="voltar">
</a>
<a href="editar-cliente.php?id=<?php echo $linhaCliente["id"]?>">
    <input type="button" value="editar">
</a>
<?php include "./templates/rodape.php"; ?>