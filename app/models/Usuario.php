<?php

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConexao();
    }

    public function cadastrar($nome, $email, $senha)
    {
        $hash = password_hash($senha, PASSWORD_BCRYPT);
        $sql = 'INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $hash);
        return $stmt->execute();
    }

    public function buscarPorEmail($email)
    {
        $sql = 'SELECT * FROM usuarios WHERE email = :email';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }
}
