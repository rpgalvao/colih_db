<?php

require('assets/classes/phpmailer/PHPMailerAutoload.php');
require('assets/classes/Email.php');
/**
 * Created by PhpStorm.
 * User: renat
 * Date: 08/19/2018
 * Time: 20:46
 */
class adminController extends Controller {

    public function index(){
        $dados = array();
        $u = new Usuarios();
        $dados['users'] = $u->getUsuarios();
        $this->loadTemplate("admin", $dados);
    }

    public function novoMembro(){
        $dados = array();
        $u = new Usuarios();
        if(isset($_POST['acao'])){
            $email = addslashes($_POST['email']);
            $token = md5(time().rand(0, 9999).rand(0, 9999));
            $u->insertNewMember($email, $token);
            $link = BASE_URL."admin/cadastroMembro/".$token;
            $mensagem = "Você foi convidado para participar do banco de dados de informações da COLIH Curitiba.<br>Clique no link abaixo para efetuar seu cadastro:<br><a href='".$link."'>Realizar o cadastro</a>";
            $info = array('assunto' => 'Convite para COLIH', 'corpo' => $mensagem);

            $mail = new Email();
            $mail->addAdress($email, $email);
            $mail->formatarEmail($info);
            if($mail->enviarEmail()){
                $dados['aviso'] = "Foi enviado um convite para o e-mail informado!";
            }else{
                $dados['erro'] = "Não foi possível enviar o convite. Tente novamente.";
            }
        }
        $this->loadTemplateLogin("novoMembro", $dados);
    }

    public function cadastroMembro($token = 0){
        $dados = array(
            'aviso' => '',
            'erro' => ''
        );
        if(!empty($token)) {
            $u = new Usuarios();
            $user = intval($u->validarTokenCadastro($token));
            if($user > 0) {
                if (isset($_POST['acao'])) {
                    $nome = addslashes($_POST['nome']);
                    $email = addslashes($_POST['email']);
                    $usuario = addslashes($_POST['usuario']);
                    $senha = md5($_POST['senha']);
                    if ($u->verificarUsuario($usuario, $email)) {
                        if ($u->cadastrarUsuario($nome, $email, $usuario, $senha)) {
                            $u->changeToken($token);
                            $dados['aviso'] = "Usuário cadastrado com sucesso!";
                        } else {
                            $dados['erro'] = "Não foi possível cadastrar esse usuário";
                        }
                    } else {
                        $dados['erro'] = "Nome de usuário e/ou e-mail já cadastrados!";
                    }
                }
            }else{
                $dados['erro'] = 'Link já utilizado e/ou sem validade!';
            }
        }else{
            $dados['erro'] = 'Sem autorização para essa página!';
        }
        $this->loadTemplateLogin("login-cadastro", $dados);
    }

    public function excluir($id){
        $u = new Usuarios();
        $u->excluirUsuario($id);
        header("Location: ".BASE_URL."admin");
    }
}