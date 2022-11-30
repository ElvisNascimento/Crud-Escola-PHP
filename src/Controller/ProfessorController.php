<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Professor;
use App\Repository\ProfessorRepository;
use App\Security\UserSecurity;
use Dompdf\Dompdf;
use Exception;

class ProfessorController extends AbstractController
{
    private ProfessorRepository $repository;

    public function __construct()
    {
        $this->repository = new ProfessorRepository();
    }

    public function listar(): void
    {
        if(UserSecurity::isLogged() === false)
        {
            die('Erro, precisa estar logado');
        }

        $professores = $this->repository->buscarTodos();

        $this->render('professor/listar', [
            'professores' => $professores,
        ]);
    }

    public function cadastrar(): void
    {
        if (true === empty($_POST)) {
            $this->render('professor/cadastrar');
            return;
        }

        $professor = new Professor();
        $professor->nome = $_POST['nome'];
        $professor->endereco = $_POST['endereco'];
        $professor->cpf = $_POST['cpf'];
        $professor->formacao = $_POST['formacao'];

        $this->repository->inserir($professor);
        // try {
        // } catch (Exception $exception) {
        //     if (true === str_contains($exception->getMessage(), 'cpf')) {
        //         die('CPF ja existe');
        //     }

        //     die('Vish, aconteceu um erro');
        // }

        $this->redirect('/professores/listar');
    }

    public function editar(): void
    {
        $id = $_GET['id'];
        $rep = new ProfessorRepository();
        $professor = $rep->buscarUm($id);
        $this->render('professor/editar', [$professor]);
        if (false === empty($_POST)) {
            $professor = new Professor();
            $professor->nome = $_POST['nome'];
            $professor->endereco = $_POST['endereco'];
            $professor->cpf = $_POST['cpf'];
            $professor->formacao = $_POST['formacao'];
    
            $rep->atualizar($professor, $id);

            $this->redirect('/professores/listar');
        }
    }

    public function excluir(): void
    {
        $id = $_GET['id'];

        $this->repository->excluir($id);
        
        $this->redirect('/professores/listar');

    }

    public function relatorio(): void
    {
        $hoje = date('d/m/Y');

        $professors = $this->repository->buscarTodos();

        $design = "
            <h1>Relatorio de Professors</h1>
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
                        <td>{$professors[0]->id}</td>
                        <td>{$professors[0]->nome}</td>
                    </tr>

                    <tr>
                        <td>{$professors[1]->id}</td>
                        <td>{$professors[1]->nome}</td>
                    </tr>

                    <tr>
                        <td>{$professors[2]->id}</td>
                        <td>{$professors[2]->nome}</td>
                    </tr>
                </tbody>
            </table>
        ";

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait'); // tamanho da pagina

        $dompdf->loadHtml($design); //carrega o conteudo do PDF

        $dompdf->render(); //aqui renderiza 
        $dompdf->stream('relatorio-professors.pdf', [
            'Attachment' => 0,
        ]); //é aqui que a magica acontece
    }
}