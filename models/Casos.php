<?php

/**
 * Created by PhpStorm.
 * User: renat
 * Date: 07/10/2018
 * Time: 14:38
 */
class Casos extends Model {

    public function totalOpen($id_user){
        $resp = 0;

        $sql = "SELECT COUNT(*) as c FROM casos WHERE fechado = 0 AND id_usuario = :id_usuario";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_usuario", $id_user);
        $sql->execute();

        if ($sql->rowCount() > 0){
            $resp = $sql->fetch()['c'];
        } else {
            $resp = 0;
        }

        return $resp;
    }

    public function getOpenCases($id_user){
        $resp = array();

        $sql = "SELECT * FROM casos WHERE fechado = 0 AND id_usuario = :id_usuario";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_usuario", $id_user);
        $sql->execute();

        if ($sql->rowCount() > 0){
            $resp = $sql->fetchAll();
        }

        return $resp;
    }

    public function getAllCases($id_user){
        $resp = array();

        $sql = "SELECT * FROM casos WHERE id_usuario = :id_usuario";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_usuario", $id_user);
        $sql->execute();

        if($sql->rowCount() > 0){
            $resp = $sql->fetchAll();
        }

        return $resp;
    }

    public function getCasesById($id){
        $resp = array();

        $sql = "SELECT * FROM casos WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $resp = $sql->fetch();
        }

        return $resp;
    }

    public function cadastrar($id_usuario, $nome, $idade, $hospital, $doenca, $medico, $data_inicio, $descricao, $contato_1, $tel_contato1, $contato_2, $tel_contato2, $contato_3, $tel_contato3){
        $sql = "INSERT INTO casos SET id_usuario = :id_usuario, nome = :nome, idade = :idade, hospital = :hospital, doenca = :doenca, medico = :medico, data_inicio = :data_inicio, data_final = '0000-00-00', descricao_caso = :descricao, contato_1 = :contato_1, tel_contato1 = :tel_contato1, contato_2 = :contato_2, tel_contato2 = :tel_contato2, contato_3 = :contato_3, tel_contato3 = :tel_contato3, fechado = 0";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":idade", $idade);
        $sql->bindValue(":hospital", $hospital);
        $sql->bindValue(":doenca", $doenca);
        $sql->bindValue(":medico", $medico);
        $sql->bindValue(":data_inicio", $data_inicio);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":contato_1", $contato_1);
        $sql->bindValue(":tel_contato1", $tel_contato1);
        $sql->bindValue(":contato_2", $contato_2);
        $sql->bindValue(":tel_contato2", $tel_contato2);
        $sql->bindValue(":contato_3", $contato_3);
        $sql->bindValue(":tel_contato3", $tel_contato3);
        $sql->execute();

        $id = $this->db->lastInsertId();
        if($id){
            return true;
        }else{
            return false;
        }
    }

    public function editar($id, $id_usuario, $nome, $idade, $hospital, $doenca, $medico, $data_inicio, $data_final, $descricao, $contato_1, $tel_contato1, $contato_2, $tel_contato2, $contato_3, $tel_contato3, $fechado){
        $sql = "UPDATE casos SET id_usuario = :id_usuario, nome = :nome, idade = :idade, hospital = :hospital, doenca = :doenca, medico = :medico, data_inicio = :data_inicio, data_final = :data_final, descricao_caso = :descricao, contato_1 = :contato_1, tel_contato1 = :tel_contato1, contato_2 = :contato_2, tel_contato2 = :tel_contato2, contato_3 = :contato_3, tel_contato3 = :tel_contato3, fechado = :fechado WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":idade", $idade);
        $sql->bindValue(":hospital", $hospital);
        $sql->bindValue(":doenca", $doenca);
        $sql->bindValue(":medico", $medico);
        $sql->bindValue(":data_inicio", $data_inicio);
        $sql->bindValue(":data_final", $data_final);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":contato_1", $contato_1);
        $sql->bindValue(":tel_contato1", $tel_contato1);
        $sql->bindValue(":contato_2", $contato_2);
        $sql->bindValue(":tel_contato2", $tel_contato2);
        $sql->bindValue(":contato_3", $contato_3);
        $sql->bindValue(":tel_contato3", $tel_contato3);
        $sql->bindValue(":fechado", $fechado);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function deletarCaso($id){
        $sql = "DELETE from casos WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function listarTodos(){
        $resp = array();
        $sql = "SELECT casos.id,casos.nome,casos.hospital,casos.doenca,casos.medico,casos.data_inicio,casos.data_final,usuarios.nome AS username FROM casos JOIN usuarios ON casos.id_usuario = usuarios.id";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0){
            $resp = $sql->fetchAll();
        }

        return $resp;
    }
}