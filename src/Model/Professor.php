<?php

declare(strict_types=1);

namespace App\Model;

use DateTime; //importando a classe interna do PHP DateTime

//aqui vai ficar a definição do caminho até essa classe

class Professor extends Pessoa
{
    public bool $status;
    public string $endereco;
    public string $formacao;
}

