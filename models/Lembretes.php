<?php

/**
 * Created by PhpStorm.
 * User: renat
 * Date: 07/19/2018
 * Time: 13:35
 */
class Lembretes extends Model {

    public function getLembretes(){
        $resp = array();

        $sql = "SELECT * FROM lembretes";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0){
            $resp = $sql->fetchAll();
        }

        return $resp;
    }

    public function cadastrarLembrete($lembrete){
        $sql = "INSERT INTO lembretes SET lembrete = :lembrete";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":lembrete", $lembrete);
        $sql->execute();

        if($this->db->lastInsertId()){
            return true;
        } else{
            return false;
        }
    }

    public function getLembreteById($id){
        $resp = array();

        $sql = "SELECT * FROM lembretes WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount()> 0){
            $resp = $sql->fetch();
        }

        return $resp;
    }

    public function editarLembrete($id, $lembrete){
        $sql = "UPDATE lembretes SET lembrete = :lembrete WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":lembrete", $lembrete);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;
    }

    public function deletarLembrete($id){
        $sql = "DELETE from lembretes WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
}