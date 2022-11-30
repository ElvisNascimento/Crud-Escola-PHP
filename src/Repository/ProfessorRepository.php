<?php

declare(strict_types=1);

namespace App\Repository;

use App\Connection\DatabaseConnection;
use App\Model\Professor;
use PDO;

class ProfessorRepository implements RepositoryInterface
{
    public const TABLE = 'tb_professores';

    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::abrirConexao();
    }

    public function buscarTodos(): iterable
    {
        $sql = 'SELECT * FROM ' . self::TABLE;

        //preparando para executar no banco
        $query = $this->pdo->query($sql);

        //executando o comando lá no banco de dados
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS, Professor::class); //pegando os dados e tranformando em array
    }

    public function buscarUm(string $id): object
    {
        $sql = "SELECT * FROM " . self::TABLE . " WHERE id = '{$id}'";
        $query = $this->pdo->query($sql);
        $query->execute();
        return $query->fetchObject(Professor::class);
    }

    public function inserir(object $dados): object
    {
        $sql = "INSERT INTO " . self::TABLE .
            "(nome, status,endereco, formacao, cpf) " .
            "VALUES (
                '{$dados->nome}', 
                '1', 
                '{$dados->endereco}', 
                '{$dados->formacao}',
                '{$dados->cpf}'
            );";

        $this->pdo->query($sql);

        return $dados;
    }

    public function atualizar(object $novosDados, string $id): object
    {
        $sql = "UPDATE " . self::TABLE .
            " SET 
                nome='{$novosDados->nome}',
                endereco='{$novosDados->endereco}',
                cpf='{$novosDados->cpf}',
                formacao='{$novosDados->formacao}'
            WHERE id = '{$id}';";

        $this->pdo->query($sql);

        return $novosDados;
    }

    public function excluir(string $id): void
    {
        $sql = "DELETE FROM " . self::TABLE . " WHERE id = '{$id}'";
        $query = $this->pdo->query($sql);
        $query->execute();
    }
}
