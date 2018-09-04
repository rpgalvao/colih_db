<?php

/**
 * Created by PhpStorm.
 * User: renat
 * Date: 07/16/2018
 * Time: 10:00
 */
class Usuarios extends Model {

    public function verificarLogin(){
        if(!isset($_SESSION['login']) || (isset($_SESSION['login']) && empty($_SESSION['login']))){
            header("Location:".BASE_URL."login");
            die();
        }else{
            return true;
        }
    }

    public function verificarUsuario($usuario, $email){
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario OR email = :email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":usuario", $usuario);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return false;
        }else{
            return true;
        }

    }

    public function cadastrarUsuario($nome, $email, $usuario, $senha){
        $sql = "INSERT INTO usuarios SET usuario = :usuario, senha= :senha, nome= :nome, email = :email, permissao = 0";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":usuario", $usuario);
        $sql->bindValue(":senha", $senha);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($this->db->lastInsertId()){
            return true;
        }else{
            return false;
        }
    }

    public function changeToken($token){
        $query = "UPDATE new_users SET used = 1 WHERE hash = :hash";
        $query = $this->db->prepare($query);
        $query->bindValue(":hash", $token);
        $query->execute();
    }

    public function logar($usuario, $senha){
        $resp = array();

        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":usuario", $usuario);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            $resp = $sql->fetch();
            return $resp;
        }else{
            return "Usuário e/ou senha incorretos!";
        }
    }

    public function checkEmail($email){
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $user = $sql->fetch();
            return $user['id'];
        }
    }

    public function gerarToken($id_user, $hash){
        $validade = date("Y-m-d H:i:s", strtotime("+24 hours"));
        $sql = "INSERT INTO usuarios_token SET id_usuario = :id_usuario, hash = :hash, used = 0, expired = :expired";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_usuario", $id_user);
        $sql->bindValue(":hash", $hash);
        $sql->bindValue(":expired", $validade);
        $sql->execute();

        return true;
    }

    public function validarToken($token){
        $sql = "SELECT * FROM usuarios_token WHERE hash = :hash AND used = 0 AND expired > NOW()";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":hash", $token);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $id = $sql['id_usuario'];
            return $id;
        }else{
            return 0;
        }
    }

    public function mudarSenha($senha, $token, $usuario){
        $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":senha", $senha);
        $sql->bindValue(":id", $usuario);
        $sql->execute();

        $sql = "UPDATE usuarios_token SET used = 1 WHERE hash = :hash";
        $sql= $this->db->prepare($sql);
        $sql->bindValue(":hash", $token);
        $sql->execute();
    }

    public function getPermissao(){
        if (isset($_SESSION['permissao']) && $_SESSION['permissao'] == 0) {
            echo 'style="display:none;"';
        }
    }

    public function insertNewMember($email, $token){
        $sql = "INSERT INTO new_users SET email = :email, hash = :hash, used = 0";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":hash", $token);
        $sql->execute();
    }

    public function validarTokenCadastro($token){
        $sql = "SELECT * FROM new_users WHERE hash = :hash AND used = 0";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":hash", $token);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $id = $sql['id'];
            return $id;
        }else{
            return 0;
        }
    }

    public function getUsuarios(){
        $resp = array();
        $sql = "SELECT * FROM usuarios";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0){
            $resp = $sql->fetchAll();
        }
        return $resp;
    }

    public function excluirUsuario($id){
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function getEmailCadastro($token){
        $resp = array();
        $sql = "SELECT email from new_users WHERE hash = :hash";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":hash", $token);
        $sql->execute();

        if($sql->rowCount() > 0){
            $resp = $sql->fetch();
        }
        return $resp;
    }

    public function getPerfil($id){
        $resp = array();
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $resp = $sql->fetchAll();
        }
        return $resp;
    }

    public function updatePerfil($id, $nome, $email, $senha = null){
        if(!empty($senha)){
            $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->bindValue(":id", $id);
            $sql->execute();
        }
        $sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
}