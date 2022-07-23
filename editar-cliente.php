<?php
ob_start();
include "conexao.php";
include "./templates/cabecalho.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$queryCliente = ("SELECT id, nome, telefone, cpf FROM clientes WHERE id = $id LIMIT 1");
$resultadoCliente = $conn->prepare($queryCliente);
$resultadoCliente->execute();

if (($resultadoCliente)and($resultadoCliente->rowCount() != 0)) {
    $linhaCLiente = $resultadoCliente->fetch(PDO::FETCH_ASSOC);
} else {
    echo "ERRO! Cliente não encontrado!";
    exit();
}   

//recebe dados do formulario

$dadosCliente = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// verifica se usuario clicou no botão
if (!empty($dadosCliente["editar-cliente"])) {
    $emptyInput = false;
    $dadosCliente = array_map("trim",$dadosCliente);
    if(in_array("", $dadosCliente)) {
        $emptyInput = true;
    }
    if (!$emptyInput) {
        $queryEditaCliente = ("UPDATE clientes SET nome=:nome, telefone=:telefone, cpf=:cpf WHERE id=:id");
        $editaCliente = $conn->prepare($queryEditaCliente);
        $editaCliente->bindParam(":nome", $dadosCliente["nome"], PDO::PARAM_STR);
        $editaCliente->bindParam(":telefone", $dadosCliente["telefone"], PDO::PARAM_STR);
        $editaCliente->bindParam(":cpf", $dadosCliente["cpf"], PDO::PARAM_STR);
        $editaCliente->bindParam(":id", $id, PDO::PARAM_INT);
        if ($editaCliente->execute()) {
            echo "Cliente editado com sucesso!";
            header("location:index.php");
        } else {
            echo "cliente não cadastrado";
        }

    }
}

?>

<form id="editar-cliente" method="POST" action="">
    <label>nome:</label><br>
    <input type="text" id="nome" name="nome" placeholder="Nome completo" value="<?php 
if (isset($dadosCliente["nome"])) {
    echo $dadosCliente["nome"];
} elseif (isset($linhaCLiente["nome"])) {
    echo $linhaCLiente["nome"];
    }
    ?>"  required><br>

    <label>telefone:</label><br>
    <input type="text" id="telefone" name="telefone" placeholder="Nome completo" value="<?php 
if (isset($dadosCliente["telefone"])) {
    echo $dadosCliente["telefone"];
} elseif (isset($linhaCLiente["telefone"])) {
    echo $linhaCLiente["telefone"];
    }
    ?>"  required><br>
    
    <label>cpf</label><br>
    <input type="text" id="cpf" name="cpf" placeholder="Nome completo" value="<?php 
if (isset($dadosCliente["cpf"])) {
    echo $dadosCliente["cpf"];
} elseif (isset($linhaCLiente["cpf"])) {
    echo $linhaCLiente["cpf"];
    }
    ?>"  required><br>
    <input type="submit" value="Salvar" name="editar-cliente">
</form>