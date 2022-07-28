<?php

namespace Clientes;

class Formulario
{
    
    private \PDO $conn;
    private ?int $id;

    private array $dados = [
        'nome' => null,
        'cpf' => null,
        'telefone' => null,
    ];

    public function __construct(\PDO $pdo, ?int $id = null) 
    {
        $this->conn = $pdo;
        $this->id = $id;
    }

    public function carregarDoBancoDeDados() 
    {
        $sql =  "SELECT id, nome, telefone, cpf FROM clientes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $this->id]);
        $result = $stmt->fetch();
        $this->definirDados($result);
    }

    public function definirDados(array $dados)
    {
        $this->dados["nome"] = $dados["nome"];
        $this->dados["cpf"] = $dados["cpf"];
        $this->dados["telefone"] = $dados["telefone"];
    }

    public function getNome() : ?string
    {
        return $this->dados['nome'];
    }

    public function getCpf() : ?string
    {
        return $this->dados['cpf'];
    }

    public function getTelefone() : ?string
    {
        return $this->dados['telefone'];
    }

    public function valido(): bool
    {
        $valido = true;

        if (!isset($this->dados["nome"]) || $this->dados["nome"]  === "") {
            $valido = false;
        }

        if (!isset($this->dados["telefone"]) || $this->dados["telefone"]  === "") {
            $valido = false;
        }

        if (!isset($this->dados["cpf"]) || $this->dados["cpf"]  === "") {
            $valido = false;
        }

        return $valido;
    }

    public function salvar(): void
    {
        $params = $this->dados;

        if ($this->id) {
            $params["id"] = $this->id;
            $sql = "UPDATE clientes SET nome = :nome, cpf = :cpf, telefone = :telefone WHERE id = :id";
        } else {
            $sql = "INSERT INTO clientes (nome, cpf, telefone) VALUES (:nome, :cpf, :telefone)";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
    }
}
