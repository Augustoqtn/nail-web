<?php

class Cliente
{
    private $nome;
    private $telefone;
    private $cpf;

    public function __construct(string $nome, string $telefone, string $cpf)
    {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->cpf = $cpf;
    }
}