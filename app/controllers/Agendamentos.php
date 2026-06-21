<?php

class Agendamentos extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . URL);
            exit;
        }
    }

    public function criar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model('Agendamento')->criar(
                $_SESSION['usuario_id'],
                trim($_POST['titulo']),
                trim($_POST['descricao']),
                $_POST['data'],
                $_POST['hora']
            );
            header('Location: ' . URL . 'dashboard');
            exit;
        }
        $this->view('agendamentos/criar');
    }

    public function editar($id)
    {
        $modelo = $this->model('Agendamento');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelo->atualizar(
                $id,
                $_SESSION['usuario_id'],
                trim($_POST['titulo']),
                trim($_POST['descricao']),
                $_POST['data'],
                $_POST['hora'],
                $_POST['status']
            );
            header('Location: ' . URL . 'dashboard');
            exit;
        }

        $agendamento = $modelo->buscar($id, $_SESSION['usuario_id']);
        if (!$agendamento) {
            header('Location: ' . URL . 'dashboard');
            exit;
        }
        $this->view('agendamentos/editar', ['agendamento' => $agendamento]);
    }

    public function remover($id)
    {
        $this->model('Agendamento')->remover($id, $_SESSION['usuario_id']);
        header('Location: ' . URL . 'dashboard');
        exit;
    }
}
