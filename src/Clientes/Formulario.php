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

    public function __construct(\PDO $pdo, int $id = null) 
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

    public function salvarCliente(): void
    {
        $params = $this->dados;
        $params["id"] = $this->id;

        $sql = "UPDATE clientes SET nome = :nome, cpf = :cpf, telefone = :telefone WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
    }

    public function salvarNovoCliente(): void
    {
        $params = $this->dados;
        $queryNovoCliente = "INSERT INTO clientes (nome, telefone, cpf) VALUES (:nome, :telefone, :cpf)";
        $stmt = $this->conn->prepare($queryNovoCliente);
        $stmt->execute($params);

    }

    public function excluirCliente(): void
    {
        $params = [];
        $params["id"] = $this->id;
        $queryExcluirCliente = "DELETE FROM clientes WHERE id = :id";
        $stmt = $this->conn->prepare($queryExcluirCliente);
        $stmt->execute($params);
    }
}
