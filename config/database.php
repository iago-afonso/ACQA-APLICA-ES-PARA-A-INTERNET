<?php

class Database
{
    private static $instancia = null;
    private $conexao;

    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'agendamentos';

    private function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->banco . ';charset=utf8';
        $this->conexao = new PDO($dsn, $this->usuario, $this->senha);
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public static function getInstance()
    {
        if (self::$instancia === null) {
            self::$instancia = new Database();
        }
        return self::$instancia;
    }

    public function getConexao()
    {
        return $this->conexao;
    }
}
