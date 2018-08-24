<?php

class homeController extends Controller {

	public function __construct() {
		$u = new Usuarios();
		$u->verificarLogin();
	}

	public function index() {
		$dados = array();
		$c = new Casos();
		$dados['totalAbertos'] = $c->totalOpen($_SESSION['login']);
		$dados['abertos'] = $c->getOpenCases($_SESSION['login']);
		$this->loadTemplate('home', $dados);
	}
}