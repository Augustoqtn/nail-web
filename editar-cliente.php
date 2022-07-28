<?php
ob_start();
include "conexao.php";
$tituloPagina = "Editar cliente";
include "./templates/cabecalho.php";
require_once "./src/Clientes/Formulario.php";
$form = new \Clientes\Formulario($conn, $_GET['id']);
$form->carregarDoBancoDeDados();
include "./templates/formulario-cliente.php";
