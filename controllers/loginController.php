<?php

require('assets/classes/phpmailer/PHPMailerAutoload.php');
require('assets/classes/Email.php');
/**
 * Created by PhpStorm.
 * User: renat
 * Date: 07/13/2018
 * Time: 20:16
 */
class loginController extends Controller {

    public function index() {
        $dados = array(
            'erro' => ''
        );
        $u = new Usuarios();
        if(isset($_COOKIE['lembrar'])){
            $usuario = $_COOKIE['usuario'];
            $senha = $_COOKIE['senha'];
            $login = $u->logar($usuario, $senha);
            if(is_array($login)){
                $_SESSION['login'] = $login['id'];
                $_SESSION['nome'] = $login['nome'];
                $_SESSION['email'] = $login['email'];
                $_SESSION['usuario'] = $login['usuario'];
                $_SESSION['senha'] = $login['senha'];
                $_SESSION['permissao'] = $login['permissao'];
                header("Location: ".BASE_URL);
                die();
            }
        }
        if(isset($_POST['acao'])){
            $usuario = addslashes($_POST['usuario']);
            $senha = md5($_POST['senha']);
            $login = $u->logar($usuario, $senha);
            if(is_array($login)){
                $_SESSION['login'] = $login['id'];
                $_SESSION['nome'] = $login['nome'];
                $_SESSION['email'] = $login['email'];
                $_SESSION['usuario'] = $login['usuario'];
                $_SESSION['senha'] = $login['senha'];
                $_SESSION['permissao'] = $login['permissao'];
                if(isset($_POST['lembrar'])){
                    setcookie('lembrar', true, time()+(60*60*168), '/');
                    setcookie('usuario', $usuario, time()+(60*60*168), '/');
                    setcookie('senha', $senha, time()+(60*60*168), '/');
                }
                header("Location: ".BASE_URL);
                die();
            }else{
                $dados['erro'] = $login;
            }
        }
        $this->loadTemplateLogin("login", $dados);
    }

    public function sair(){
        setcookie('lembrar', true, time()-1, '/');
        session_destroy();
        header("Location: ".BASE_URL);
    }

    public function esqueci(){
        $dados = array(
            'erro' => '',
            'aviso' => ''
        );
        if(isset($_POST['novaSenha'])){
            $email = addslashes($_POST['email']);
            $u = new Usuarios();
            $id_user = $u->checkEmail($email);
            if($id_user > 0){
                $hash = md5(time().rand(0,99999).rand(0,99999));
                if($u->gerarToken($id_user, $hash)){
                    $link = BASE_URL.'login/redefinir/'.$hash;
                    $mensagem = "Olá!<br>Parece que você esqueceu a senha e solicitou uma nova!<br>Tudo bem, clique no link abaixo para redefinir a sua senha:<br> <a href='".$link."'> Redefinir Senha</a>";
                    //$headers = 'From: colih@not.com.br'."\r\n".'X-Mailer: PHP/'.phpversion();
                    $info = array('assunto' => 'Redefinir Senha', 'corpo' => $mensagem);

                    $mail = new Email();
                    $mail->addAdress($email, $email);
                    $mail->formatarEmail($info);

                    if($mail->enviarEmail()){
                        $dados['aviso'] = "Foi enviado um e-mail com instruções para redefinir a senha";
                    }else{
                        $dados['erro'] = "Não foi possível enviar o e-mail. Tente novamente!";
                    }
                }
            }else{
                $dados['erro'] = "E-mail informado não é valido!";
            }
        }

        $this->loadTemplateLogin('esqueci-senha', $dados);
    }

    public function redefinir($token){
        $dados = array(
            'aviso' => '',
            'erro' => ''
        );

        if(!empty($token)){
            $user = 0;
            $u = new Usuarios();
            $user = intval($u->validarToken($token));
            if($user > 0){
                if(isset($_POST['redefinir'])){
                    $senha = md5($_POST['senha']);
                    $u->mudarSenha($senha, $token, $user);
                    $dados['aviso'] = "Senha alterada com sucesso";
                }
            }else{
                $dados['erro'] = 'Link já utilizado e/ou sem validade!';
            }
        }

        $this->loadTemplateLogin('redefinir', $dados);
    }
}