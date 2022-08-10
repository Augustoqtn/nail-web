<?php

include "conexao.php";
$tituloPagina = "Todos clientes";
include "./templates/cabecalho.php";

$resultadoClientes = $conn->prepare("SELECT * FROM clientes");
$resultadoClientes->execute(); 
?> 
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
<a href="cadastrar-cliente.php">
    <br><input type="button" value="novo cliente">
</a>
<?php include "./templates/rodape.php";?>