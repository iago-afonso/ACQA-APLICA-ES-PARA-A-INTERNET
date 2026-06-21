<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . URL);
            exit;
        }
    }

    public function index()
    {
        $agendamentos = $this->model('Agendamento')->listar($_SESSION['usuario_id']);
        $this->view('dashboard/index', ['agendamentos' => $agendamentos]);
    }
}
