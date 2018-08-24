<?php 

class Controller {

	public function loadView ($viewName, $viewData = array()) {
		extract($viewData);
		require ('views/'.$viewName.'.php');
	}

	public function loadTemplate($viewName, $viewData = array()) {
		require ('views/template.php');
	}

	public function loadTemplateLogin($viewName, $viewData = array()) {
		require ('views/template_login.php');
	}

	public function loadViewInTemplate($viewName, $viewData = array()) {
		extract($viewData);
		require ('views/'.$viewName.'.php');
	}
}