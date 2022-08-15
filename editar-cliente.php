<?php
ob_start();

use Clientes\Formulario;

include "conexao.php";
$tituloPagina = "Editar cliente";
include "./templates/cabecalho.php";
require_once "./src/Clientes/Formulario.php";

$formulario = new Formulario($conn, $_GET['id']);
$formulario->carregarDoBancoDeDados();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formulario->definirDados($_POST);
    if ($formulario->valido()) {
        $formulario->salvarCliente();
        header("Location: /");
        exit();
    } else {
        echo "ERRO: Nescessário preencher todos os campos";
    }
}
?>

<form id="editar-cliente" method="POST" action="">
    <br><input type="text" id="nome" name="nome" placeholder="Nome completo" value="<?php echo $formulario->getNome() ?>"><br>

    <br><input type="text" id="telefone" name="telefone" placeholder="telefone" value="<?php echo $formulario->getTelefone() ?>"><br>

    <br><input type="text" id="cpf" name="cpf" placeholder="cpf" value="<?php echo $formulario->getCpf() ?>"><br>
    <br><input type="submit" value="Salvar" name="editar-cliente"></br>
</form>
<?php include "./templates/rodape.php"; ?>