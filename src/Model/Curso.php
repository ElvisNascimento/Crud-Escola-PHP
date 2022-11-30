<?php

declare(strict_types=1);

namespace App\Model;

//aqui vai ficar a definição do caminho até essa classe

class Curso
{
    public string $nome;  
    public int $cargaHoraria;
    public string $descricao;  
    public bool $status;  
    public int $categoria_id;
}

