<?php

/**
 * Created by PhpStorm.
 * User: renat
 * Date: 07/18/2018
 * Time: 15:39
 */
class Contatos extends Model {

    public function getEspecialidades(){
        $resp = array();

        $sql = "SELECT * from especs";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0){
            $resp= $sql->fetchAll();
        }

        return $resp;
    }

    public function getContatos($espec = ''){
        $resp = array();

        $sql = "SELECT contatos.id, nome, celular, contato_2, contato_3, especs.especialidade AS esp FROM contatos JOIN especs ON contatos.especialidade = especs.id ORDER BY esp, nome";
        if($espec != ''){
            $sql = "SELECT contatos.id, nome, celular, contato_2, contato_3, especs.especialidade AS esp FROM contatos JOIN especs ON contatos.especialidade = especs.id WHERE contatos.especialidade = :espec ORDER BY nome";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":espec", $espec);
            $sql->execute();
        }else {
            $sql = $this->db->prepare($sql);
            $sql->execute();
        }

        if($sql->rowCount() > 0){
            $resp = $sql->fetchAll();
        }

        return $resp;
    }

    public function insertEspec($espec){
        $sql = "INSERT INTO especs SET especialidade = :espec";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":espec", $espec);
        $sql->execute();

        if($this->db->lastInsertId()){
            return true;
        }else{
            return false;
        }
    }

    public function inserirContato($esp, $nome, $cel, $con_2, $con_3){
        $sql = "INSERT INTO contatos SET especialidade = :esp, nome = :nome, celular = :cel, contato_2 = :con_2, contato_3 = :con_3";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":esp", $esp);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":cel", $cel);
        $sql->bindValue(":con_2", $con_2);
        $sql->bindValue(":con_3", $con_3);
        $sql->execute();

        if($this->db->lastInsertId()){
            return true;
        }else{
            return false;
        }
    }

    public function getContatoById($id){
        $resp = array();
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $resp = $sql->fetch();
        }

        return $resp;
    }

    public function getEspecById($id){
        $resp = array();
        $sql = "SELECT * FROM especs WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $resp = $sql->fetch();
        }

        return $resp;
    }

    public function editarContato($id, $esp, $nome, $cel, $con_2, $con_3){
        $sql = "UPDATE contatos SET especialidade = :esp, nome = :nome, celular = :cel, contato_2 = :con_2, contato_3 = :con_3 WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":esp", $esp);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":cel", $cel);
        $sql->bindValue(":con_2", $con_2);
        $sql->bindValue(":con_3", $con_3);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;
    }

    public function deletarContato($id){
        $sql = "DELETE from contatos WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function editarEspec($id, $esp){
        $sql = "UPDATE especs SET especialidade = :esp WHERE id = :id";
        $sql= $this->db->prepare($sql);
        $sql->bindValue(":esp", $esp);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;
    }

    public function excluirEspec($id){
        $sql = "DELETE from contatos WHERE especialidade = :espec_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":espec_id", $id);
        $sql->execute();
        $sql = "DELETE from especs WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
}