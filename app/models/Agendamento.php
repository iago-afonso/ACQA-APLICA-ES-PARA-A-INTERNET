<?php

class Agendamento
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConexao();
    }

    public function listar($idUsuario)
    {
        $sql = 'SELECT * FROM agendamentos WHERE id_usuario = :id ORDER BY data, hora';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $idUsuario);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function buscar($id, $idUsuario)
    {
        $sql = 'SELECT * FROM agendamentos WHERE id = :id AND id_usuario = :idu';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':idu', $idUsuario);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function criar($idUsuario, $titulo, $descricao, $data, $hora)
    {
        $sql = 'INSERT INTO agendamentos (id_usuario, titulo, descricao, data, hora) VALUES (:idu, :titulo, :descricao, :data, :hora)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':idu', $idUsuario);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':hora', $hora);
        return $stmt->execute();
    }

    public function atualizar($id, $idUsuario, $titulo, $descricao, $data, $hora, $status)
    {
        $sql = 'UPDATE agendamentos SET titulo = :titulo, descricao = :descricao, data = :data, hora = :hora, status = :status WHERE id = :id AND id_usuario = :idu';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':idu', $idUsuario);
        return $stmt->execute();
    }

    public function remover($id, $idUsuario)
    {
        $sql = 'DELETE FROM agendamentos WHERE id = :id AND id_usuario = :idu';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':idu', $idUsuario);
        return $stmt->execute();
    }
}
