<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form->definirDados($_POST);

    if ($form->valido()) {
        header("Location: /");
        $form->salvar();
        exit();
    } else {
        echo "ERRO: Nescessário preencher todos os campos";
    }
}

include "./templates/cabecalho.php";
?>
<form id="editar-cliente" method="POST" action="">
    <br><input type="text" id="nome" name="nome" placeholder="Nome completo" value="<?php echo $form->getNome() ?>"><br>

    <br><input type="text" id="telefone" name="telefone" placeholder="telefone" value="<?php echo $form->getTelefone() ?>"><br>
    
    <br><input type="text" id="cpf" name="cpf" placeholder="cpf" value="<?php echo $form->getCpf() ?>"><br>
    <br><input type="submit" value="Salvar" name="editar-cliente"></br>
</form>
<?php include "./templates/rodape.php";?>
