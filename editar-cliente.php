<?php
ob_start();
include "conexao.php";
$tituloPagina = "Editar cliente";
include "./templates/cabecalho.php";
require_once "./src/Clientes/Formulario.php";

$form = new \Clientes\Formulario($conn, $_GET['id']);
$form->carregarDoBancoDeDados();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form->definirDados($_POST);

    if ($form->valido()) {
        $form->salvar();
        header("Location: /");
        exit();
    } else {
        echo "ERRO: Nescessário preencher todos os campos";
    }
}
?>
<form id="editar-cliente" method="POST" action="">
    <br><input type="text" id="nome" name="nome" placeholder="Nome completo" value="<?php echo $form->getNome() ?>"><br>

    <br><input type="text" id="telefone" name="telefone" placeholder="telefone" value="<?php echo $form->getTelefone() ?>"><br>
    
    <br><input type="text" id="cpf" name="cpf" placeholder="cpf" value="<?php echo $form->getCpf() ?>"><br>
    <br><input type="submit" value="Salvar" name="editar-cliente"></br>
</form>
<?php include "./templates/rodape.php";?>
