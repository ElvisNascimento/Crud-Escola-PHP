<?php

use App\Controller\AlunoController;
use App\Controller\AuthController;
use App\Controller\CategoriaController;
use App\Controller\CursoController;
use App\Controller\DashController;
use App\Controller\ProfessorController;
use App\Controller\SiteController;
use App\Controller\UserController;

function criarRota(string $controllerNome, string $methodNome): array
{
    return [
        'controller' => $controllerNome,
        'method' => $methodNome,
    ];
}

$rotas = [
    '/' => criarRota(SiteController::class, 'inicio'),
    
    '/alunos/listar' => criarRota(AlunoController::class, 'listar'),
    '/alunos/novo' => criarRota(AlunoController::class, 'cadastrar'),
    '/alunos/editar' => criarRota(AlunoController::class, 'editar'),
    '/alunos/excluir' => criarRota(AlunoController::class, 'excluir'),
    '/alunos/relatorio' => criarRota(AlunoController::class, 'relatorio'),

    '/usuarios/listar' => criarRota(UserController::class, 'list'),
    '/usuarios/novo' => criarRota(UserController::class, 'add'),
    '/usuarios/editar' => criarRota(UserController::class, 'edit'),
    '/usuarios/excluir' => criarRota(UserController::class, 'remove'),

    '/login' => criarRota(AuthController::class, 'login'),
    '/desconectar' => criarRota(AuthController::class, 'logout'),

    '/cursos/listar' => criarRota(CursoController::class, 'listar'),
    '/cursos/novo' => criarRota(CursoController::class, 'cadastrar'),
    '/cursos/editar' => criarRota(CursoController::class, 'editar'),
    '/cursos/excluir' => criarRota(CursoController::class, 'excluir'),
    '/cursos/relatorio' => criarRota(CursoController::class, 'relatorio'),

    '/professores/listar' => criarRota(ProfessorController::class, 'listar'),
    '/professores/novo' => criarRota(ProfessorController::class, 'cadastrar'),
    '/professores/editar' => criarRota(ProfessorController::class, 'editar'),
    '/professores/excluir' => criarRota(ProfessorController::class, 'excluir'),
    
    '/categorias/listar' => criarRota(CategoriaController::class, 'listar'),
    '/categorias/novo' => criarRota(CategoriaController::class, 'cadastrar'),
    '/categorias/editar' => criarRota(CategoriaController::class, 'editar'),
    '/categorias/excluir' => criarRota(CategoriaController::class, 'excluir'),
];

return $rotas;