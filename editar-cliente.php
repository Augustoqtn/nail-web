<?php

include "conexao.php";
include "./templates/cabecalho.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$queryCliente = "SELECT id, nome, telefone, cpf FROM clientes WHERE id = $id LIMIT 1";
$resultadoCliente = $conn->prepare($queryCliente);
$resultadoCliente->execute();

if (($resultadoCliente)and($resultadoCliente->rowCount() != 0)) {
    $linhaCLiente = $resultadoCliente->fetch(PDO::FETCH_ASSOC);
} else {
    echo "ERRO! Cliente não encontrado!";
    exit();
}   

//rescebe dados do formulario

$dadosCliente = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dadosCliente);

?>

<form id="editar-cliente" mehod="POST" action="">
    <label>nome:</label><br>
    <input type="text" id="nome" name="nome" placeholder="Nome completo" value="<?php if(isset($linhaCLiente["nome"])){echo $linhaCLiente["nome"];}?>"  required><br>
    <label>telefone:</label><br>
    <input type="text" id="telefone" name="telefone" placeholder="Nome completo" value="<?php if(isset($linhaCLiente["nome"])){echo $linhaCLiente["telefone"];}?>"  required><br>
    <label>cpf</label><br>
    <input type="text" id="cpf" name="cpf" placeholder="Nome completo" value="<?php if(isset($linhaCLiente["nome"])){echo $linhaCLiente["cpf"];}?>"  required><br>
    <input type="submit" value="Salvar" name="editar-cliente">
</form>