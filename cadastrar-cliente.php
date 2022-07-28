<?php
include "conexao.php";
$tituloPagina = "novo(a) cliente";
require_once "./src/Clientes/Formulario.php";

$form = new \Clientes\Formulario($conn);

include "./templates/formulario-cliente.php";
