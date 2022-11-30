<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Categoria;
use App\Repository\CategoriaRepository;
use App\Security\UserSecurity;
use Dompdf\Dompdf;

class CategoriaController extends AbstractController
{
   
    private CategoriaRepository $repository;

    public function __construct()
    {
        $this->repository = new CategoriaRepository();
    }

    public function listar(): void
    {
        if(UserSecurity::isLogged() === false)
        {
            die('Erro, precisa estar logado');
        }
        
        $categorias = $this->repository->buscarTodos();

        $this->render('categoria/listar', [
            'categorias' => $categorias,
        ]);
    }

    public function cadastrar(): void
    {
        if (true === empty($_POST)) {
            $this->render('categoria/cadastrar');
            return;
        }

        $categoria = new Categoria();
        $categoria->nome = $_POST['nome'];

        $this->repository->inserir($categoria);

        $this->redirect('/categorias/listar');
    }

    public function editar(): void
    {
        $id = $_GET['id'];
        $rep = new CategoriaRepository();
        $categoria = $rep->buscarUm($id);
        $this->render('categoria/editar', [$categoria]);
        if (false === empty($_POST)) {
            $categoria->nome = $_POST['nome'];
            $rep->atualizar($categoria, $id);

            $this->redirect('/categorias/listar');
        }
    }

    public function excluir(): void
    {
        $id = $_GET['id'];

        $this->repository->excluir($id);
        
        $this->redirect('/categorias/listar');

    }

    public function relatorio(): void
    {
        $hoje = date('d/m/Y');

        $categorias = $this->repository->buscarTodos();

        $design = "
            <h1>Relatorio de Categorias</h1>
            <hr>
            <em>Gerado em {$hoje}</em>

            <table border='1' width='100%' style='margin-top: 30px;'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{$categorias[0]->id}</td>
                        <td>{$categorias[0]->nome}</td>
                    </tr>

                    <tr>
                        <td>{$categorias[1]->id}</td>
                        <td>{$categorias[1]->nome}</td>
                    </tr>

                    <tr>
                        <td>{$categorias[2]->id}</td>
                        <td>{$categorias[2]->nome}</td>
                    </tr>
                </tbody>
            </table>
        ";

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait'); // tamanho da pagina

        $dompdf->loadHtml($design); //carrega o conteudo do PDF

        $dompdf->render(); //aqui renderiza 
        $dompdf->stream('relatorio-categorias.pdf', [
            'Attachment' => 0,
        ]); //é aqui que a magica acontece
    }
}