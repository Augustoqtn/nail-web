<?php

use Clientes\Formulario;
include "conexao.php";
include "./templates/cabecalho.php";
require_once "./src/Clientes/Formulario.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$form = new Formulario($conn,$_GET["id"]);
$form->excluirCliente();
header("Location: /");
exit();
}
