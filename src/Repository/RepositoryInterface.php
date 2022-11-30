<?php

declare(strict_types=1);

namespace App\Repository;

interface RepositoryInterface
{
    public function buscarTodos(): iterable;

    public function buscarUm(string $id): ?object;

    public function inserir(object $dados): object;
    
    public function atualizar(object $dados, string $id): object;

    public function excluir(string $id): void;
}
