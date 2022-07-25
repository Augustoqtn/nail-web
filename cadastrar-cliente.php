<?php
include "conexao.php";
include "./templates/cabecalho.php";
?>

<?php
//recebe dados do formulario
$dadosCliente = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// verifica se usuario clicou no botão
if (!empty($dadosCliente["cadCliente"])) {
    $inputVazio = false;

    $dadosCliente = array_map("trim", $dadosCliente);
    if (in_array("", $dadosCliente)) {
        $inputVazio = true;
        echo "ERRO: Nescessário preencher todos os campos";
    }
    if (!$inputVazio) {
        $queryNovoCliente = ("INSERT INTO clientes (nome, telefone, cpf) VALUES (:nome, :telefone, :cpf)");
        $cadastraCliente = $conn->prepare($queryNovoCliente);
        $cadastraCliente->bindParam(":nome", $dadosCliente["nome"], PDO::PARAM_STR);
        $cadastraCliente->bindParam(":telefone", $dadosCliente["telefone"], PDO::PARAM_STR);
        $cadastraCliente->bindParam(":cpf", $dadosCliente["cpf"], PDO::PARAM_STR);
        $cadastraCliente->execute();
        if ($cadastraCliente->rowCount()) {
            echo "Cliente cadastrado com sucesso!<br>";
        } else {
            echo "ERRO: Cliente não cadastrado.<br>";
        }
    }
    
}
?>


<form name="cadCliente" method="POST" action="">

    <br><input type="text" name="nome" id="nome" placeholder="nome do cliente"></br>

    <br><input type="text" name="telefone" id="telefone" placeholder="telefone do cliente"></br>

    <br><input type="text" name="cpf" id="cpf" placeholder="CPF do cliente"></br>

    <br><input type="submit" name="cadCliente" value="salvar"></br>  
</form>
<?php include "./templates/rodape.php"; ?>  