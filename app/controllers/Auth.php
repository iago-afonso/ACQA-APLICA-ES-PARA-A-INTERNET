<?php

class Auth extends Controller
{
    public function index()
    {
        if (isset($_SESSION['usuario_id'])) {
            header('Location: ' . URL . 'dashboard');
            exit;
        }
        $this->view('auth/login');
    }

    public function login()
    {
        $erro = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $senha = $_POST['senha'];

            $usuario = $this->model('Usuario')->buscarPorEmail($email);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                header('Location: ' . URL . 'dashboard');
                exit;
            }
            $erro = 'E-mail ou senha invalidos.';
        }
        $this->view('auth/login', ['erro' => $erro]);
    }

    public function cadastro()
    {
        $erro = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome']);
            $email = trim($_POST['email']);
            $senha = $_POST['senha'];

            $usuario = $this->model('Usuario');

            if ($usuario->buscarPorEmail($email)) {
                $erro = 'Este e-mail ja esta cadastrado.';
            } else {
                $usuario->cadastrar($nome, $email, $senha);
                header('Location: ' . URL);
                exit;
            }
        }
        $this->view('auth/cadastro', ['erro' => $erro]);
    }

    public function sair()
    {
        session_destroy();
        header('Location: ' . URL);
        exit;
    }
}
