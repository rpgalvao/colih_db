<?php

/**
 * Created by PhpStorm.
 * User: renat
 * Date: 07/13/2018
 * Time: 20:00
 */
class lembretesController extends Controller {

    public function index(){
        $dados = array();
        $l = new Lembretes();
        $dados['lembretes'] = $l->getLembretes();
        $this->loadTemplate("lembretes", $dados);
    }

    public function cadastrar(){
        $dados = array(
            'erro' => '',
            'aviso' => ''
        );

        if(isset($_POST['acao'])){
            $lembrete = addslashes($_POST['lembrete']);
            $l = new Lembretes();
            if($l->cadastrarLembrete($lembrete)){
                $dados['aviso'] = "Lembrete iserido com sucesso!";
            }else{
                $dados['erro'] = "Não foi possível inserir esse lembrete.";
            }
        }

        $this->loadTemplate("cadastrar-lembrete", $dados);
    }

    public function editar($id){
        $dados = array(
            'erro' => '',
            'aviso' => ''
        );
        $l = new Lembretes();
        $dados['info'] = $l->getLembreteById($id);
        if(isset($_POST['editarLembrete'])){
            $lembrete = addslashes($_POST['lembrete']);
            if($l->editarLembrete($id, $lembrete)){
                $dados['info'] = $l->getLembreteById($id);
                $dados['aviso'] = "Lembrete editado com sucesso!";
            }else{
                $dados['info'] = $l->getLembreteById($id);
                $dados['erro'] = "Não foi possível editar esse lembrete.";
            }
        }

        $this->loadTemplate("editar-lembrete", $dados);
    }

    public function excluir($id){

        if(isset($id)){
            $l = new Lembretes();
            $id = addslashes($id);
            //echo "<script>alert('Deseja realmente deletar esse caso?');</script>";
            $l->deletarLembrete($id);
            header("Location: ".BASE_URL."lembretes");
        }
    }
}