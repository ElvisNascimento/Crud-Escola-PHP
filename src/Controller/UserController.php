<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use App\Repository\UserRepository;
use App\Security\UserSecurity;

class UserController extends AbstractController
{
    private UserRepository $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }


    public function list(): void
    {
        if(UserSecurity::isLogged() === false)
        {
            die('Erro, precisa estar logado');
        }
       
        if(UserSecurity::isAdmin() === false)
        {
            die('Erro, Voce nao tem permissão pra ver este conteudo');
        }

        $users = $this->repository->findAll();

        $this->render('user/list', [
            'users' => $users,
        ]);
    }

    public function add(): void
    {
        if (true === empty($_POST)) {
            $this->render('user/add');
            return;
        }

        //encriptação
        $password = password_hash($_POST['password'], PASSWORD_ARGON2I);

        $user = new User();
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = $password;
        $user->profile = $_POST['profile'];

        $this->repository->insert($user);

        $this->redirect('/usuarios/listar');
    }
    public function remove(): void
    {
        $id = $_GET['id'];

        $this->repository->remove($id);
        
        $this->redirect('/usuarios/listar');

    }
}