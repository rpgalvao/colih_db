<?php

/**
 * Created by PhpStorm.
 * User: renat
 * Date: 07/13/2018
 * Time: 19:42
 */
class contatosController extends Controller {

    public function index(){
        $dados = array();
        $con = new Contatos();
        $dados['especs'] = $con->getEspecialidades();
        $dados['contatos'] = $con->getContatos();
        if(isset($_POST['acao'])){
            $espec = addslashes($_POST['especialidade']);
            $dados['contatos'] = $con->getContatos($espec);
        }
        $this->loadTemplate("contatos", $dados);
    }

    public function cadastrar(){
        $dados = array(
            'aviso' => '',
            'erro' => ''
        );
        $con = new Contatos();
        $dados['especs'] = $con->getEspecialidades();

        if(isset($_POST['acao'])){
            $nome = addslashes($_POST['nome']);
            $espec = addslashes($_POST['especialidade']);
            $celular = addslashes($_POST['celular']);
            $con_2 = addslashes($_POST['contato_2']);
            $con_3 = addslashes($_POST['contato_3']);

            if($con->inserirContato($espec, $nome, $celular, $con_2, $con_3)){
                $dados['aviso'] = 'Contato inserido com sucesso!';
            }else{
                $dados['erro'] = 'Não foi possível inserir esse contato';
            }
        }

        $this->loadTemplate('cadastrar-contato', $dados);
    }

    public function cadastrarEspec(){
        $dados = array(
            'aviso' => '',
            'erro' => ''
        );
        if(isset($_POST['acao'])) {
            $espec = addslashes($_POST['especialidade']);
            $con = new Contatos();
            if($con->insertEspec($espec)){
                $dados['aviso'] = 'Especialidade inserida com sucesso!';
            }else{
                $dados['erro'] = 'Não foi possível inserir a especialidade!';
            }
        }

        $this->loadTemplate('cadastrar-especialidade', $dados);
    }

    public function editar($id){
        $dados = array(
            'erro' => '',
            'aviso' => ''
        );
        $id = addslashes($id);
        $con = new Contatos();
        $dados['info'] = $con->getContatoById($id);
        $dados['especs'] = $con->getEspecialidades();

        if(isset($_POST['editarContato'])){
            $nome = addslashes($_POST['nome']);
            $espec = addslashes($_POST['especialidade']);
            $celular = addslashes($_POST['celular']);
            $con_2 = addslashes($_POST['contato_2']);
            $con_3 = addslashes($_POST['contato_3']);

            if($con->editarContato($id, $espec, $nome, $celular, $con_2, $con_3)){
                $dados['info'] = $con->getContatoById($id);
                $dados['aviso'] = "Contato editado com sucesso!";
            }else{
                $dados['info'] = $con->getContatoById($id);
                $dados['erro'] = "Não foi possível editar esse contato!";
            }
        }

        $this->loadTemplate('editar-contato', $dados);
    }

    public function listarEspecs(){
        $dados = array();
        $con = new Contatos();
        $dados['info'] = $con->getEspecialidades();

        $this->loadTemplate('listar-especialidades', $dados);
    }

    public function editarEspec($id){
        $dados = array(
            'erro' => '',
            'aviso' => ''
        );
        $con = new Contatos();
        $dados['info'] = $con->getEspecById($id);
        if(isset($_POST['editarEspec'])){
            $espec = addslashes($_POST['especialidade']);
            if($con->editarEspec($id, $espec)){
                $dados['info'] = $con->getEspecById($id);
                $dados['aviso'] = "Especialidade editada com sucesso!";
            }else{
                $dados['info'] = $con->getEspecById($id);
                $dados['erro'] = "Não foi possível editar essa especialidade.";
            }
        }

        $this->loadTemplate('editar-especialidade', $dados);
    }

    public function excluir($id){

        if(isset($id)){
            $con = new Contatos();
            $id = addslashes($id);
            //echo "<script>alert('Deseja realmente deletar esse caso?');</script>";
            $con->deletarContato($id);
            header("Location: ".BASE_URL."contatos");
        }
    }

    public function excluirEspec($id){
        if(isset($id)){
            $con = new Contatos();
            $id = addslashes($id);
            //echo "<script>alert('Deseja realmente deletar esse caso?');</script>";
            $con->excluirEspec($id);
            header("Location: ".BASE_URL."contatos");
        }
    }
}