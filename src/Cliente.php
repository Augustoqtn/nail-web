<?php

class Cliente
{
    public function exibeTodosClientes() :array
    {
         $resultadoClientes = $conn->prepare("SELECT * FROM clientes");
        $resultadoClientes->execute();
    }


}
    // private $nome;
    // private $telefone;
    // private $cpf;

    // public function __construct(string $nome, string $telefone, string $cpf)
    // {
    //     $this->nome = $nome;
    //     $this->telefone = $telefone;
    //     $this->cpf = $cpf;
    // }
