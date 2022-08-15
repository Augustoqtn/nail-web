<?php

namespace Clientes;

class Clientes
{
    private \PDO $conn;


    public function __construct(\PDO $pdo)
    {
        $this->conn = $pdo;
    }

    public function listar(): array
    {
        $queryCLiente = "SELECT * FROM clientes";
        $stmt = $this->conn->prepare($queryCLiente);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function listarUmCliente(int $id)
    {
        $queryCLiente = "SELECT * FROM clientes WHERE id= :id LIMIT 1";
        $stmt = $this->conn->prepare($queryCLiente);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}
