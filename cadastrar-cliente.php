<?php

use Clientes\Formulario;

include "conexao.php";
$tituloPagina = "novo(a) cliente";
include "./templates/cabecalho.php";
require_once "./src/Clientes/Formulario.php";

$formulario = new Formulario($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formulario->definirDados($_POST);
    if($formulario->valido()) {
        $formulario->salvarNovoCliente();
        header("Location: /"); 
        exit();
    } else {
        echo "favor preencher todos os campos";
    }
}
?>

<form name="cadCliente" method="POST" action="">

    <br><input type="text" name="nome" id="nome" value="<?php echo $formulario->getNome(); ?>"placeholder="nome do cliente"></br>

    <br><input type="text" name="telefone" id="telefone"value="<?php echo $formulario->getTelefone(); ?>" placeholder="telefone do cliente"></br>

    <br><input type="text" name="cpf" id="cpf" value="<?php echo $formulario->getCpf(); ?>" placeholder="CPF do cliente"></br>

    <br><input type="submit" name="cadCliente" value="salvar"></br> 
    
</form>

<?php include "./templates/rodape.php"; ?>  