<?php

use Clientes\Formulario;
include "conexao.php";
include "./templates/cabecalho.php";
require_once "./src/Clientes/Formulario.php";


$form = new Formulario($conn,$_GET["id"]);
$form->carregarDoBancoDeDados();
$form->definirDados($_GET);
var_dump($_GET);

?>