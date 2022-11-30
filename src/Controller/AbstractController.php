<?php

declare(strict_types=1);

namespace App\Controller;
use App\Security\UserSecurity;

abstract class AbstractController
{
    public function render(string $view, ?array $dados = null, bool $navbar = true): void
    {
        if(isset($dados)){
            extract($dados);
        }

        include_once '../views/template/header.phtml';

        $navbar === true && include_once '../views/template/menu.phtml';

        include_once "../views/{$view}.phtml";

        include_once '../views/template/footer.phtml';
    }

    public function redirect(string $local):void
    {
        header('location: '. $local);
    }
    public function checkLogin()
    {
        if(UserSecurity::isLogged() === false)
        {
            $this->redirect('/login');
        }
    }
}
