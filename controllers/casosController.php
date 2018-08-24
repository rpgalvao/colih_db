<?php

/**
 * Created by PhpStorm.
 * User: renat
 * Date: 07/11/2018
 * Time: 08:42
 */
class casosController extends Controller {

    public function index(){}

    public function listar() {
        $dados = array();
        $c = new Casos();
        $dados['todos_casos'] = $c->getAllCases($_SESSION['login']);
        $this->loadTemplate("listar_casos",$dados);
    }

    public function novo(){
        $dados = array(
            'aviso' => ''
        );
        $c = new Casos();

        if(isset($_POST['acao'])){
            $id_user = $_SESSION['login'];
            $nome = addslashes($_POST['nome']);
            $idade = addslashes($_POST['idade']);
            $hospital = addslashes($_POST['hospital']);
            $doenca = addslashes($_POST['doenca']);
            $medico = addslashes($_POST['medico']);
            $data_inicio = addslashes($_POST['data_inicio']);
            $descricao = addslashes($_POST['descricao_caso']);
            $contato1 = addslashes($_POST['contato_1']);
            $tel_contato1 = addslashes($_POST['tel_contato1']);
            $contato2 = addslashes($_POST['contato_2']);
            $tel_contato2 = addslashes($_POST['tel_contato2']);
            $contato3 = addslashes($_POST['contato_3']);
            $tel_contato3 = addslashes($_POST['tel_contato3']);

            if($c->cadastrar($id_user, $nome, $idade, $hospital, $doenca, $medico, $data_inicio, $descricao, $contato1, $tel_contato1, $contato2, $tel_contato2, $contato3, $tel_contato3)){
                $dados['aviso'] = "Caso inserido com sucesso";
            }else{
                $dados['aviso'] = "Não foi possível cadastrar esse caso";
            }
        }

        $this->loadTemplate("novo_caso",$dados);
    }

    public function editar($id){
        $dados = array();
        $c = new Casos();
        $dados['info'] = $c->getCasesById($id);

        if(isset($_POST['editar'])){
            $id_user = $_SESSION['login'];
            $nome = addslashes($_POST['nome']);
            $idade = addslashes($_POST['idade']);
            $hospital = addslashes($_POST['hospital']);
            $doenca = addslashes($_POST['doenca']);
            $medico = addslashes($_POST['medico']);
            $data_inicio = addslashes($_POST['data_inicio']);
            $data_final = addslashes($_POST['data_final']);
            $descricao = addslashes($_POST['descricao_caso']);
            $contato1 = addslashes($_POST['contato_1']);
            $tel_contato1 = addslashes($_POST['tel_contato1']);
            $contato2 = addslashes($_POST['contato_2']);
            $tel_contato2 = addslashes($_POST['tel_contato2']);
            $contato3 = addslashes($_POST['contato_3']);
            $tel_contato3 = addslashes($_POST['tel_contato3']);
            if(isset($_POST['fechado'])) {
                $fechado = intval($_POST['fechado']);
            }else{
                $fechado = 0;
            }
            $c->editar($id, $id_user, $nome, $idade, $hospital, $doenca, $medico, $data_inicio, $data_final, $descricao, $contato1, $tel_contato1, $contato2, $tel_contato2, $contato3, $tel_contato3, $fechado);

            $dados['info'] = $c->getCasesById($id);
        }

        $this->loadTemplate("editar-caso",$dados);
    }

    public function excluir($id){

        if(isset($id)){
            $c = new Casos();
            $id = addslashes($id);
            //echo "<script>alert('Deseja realmente deletar esse caso?');</script>";
            $c->deletarCaso($id);
            header("Location: ".BASE_URL);
        }
    }

    public function todos(){
        $dados = array(
            'erro' => ''
        );
        if(isset($_SESSION['permissao']) && $_SESSION['permissao'] == 1){
            $c = new Casos();
            $dados['todos'] = $c->listarTodos();
        }else{
            $dados['erro'] = "Você não tem permissão para acessar essa página";
        }
        $this->loadTemplate("todos_casos", $dados);
    }

    public function admview($id){
        $dados = array();

        $c = new Casos();
        $dados['info'] = $c->getCasesById($id);

        $this->loadTemplate("adm_view", $dados);
    }
}