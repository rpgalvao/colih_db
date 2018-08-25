<?php
require 'environment.php';

date_default_timezone_set("America/Sao_Paulo");

$config = array();

if (ENVIRONMENT == 'development') {
	define("BASE_URL", 'http://localhost/colih/');
	$config['dbname'] = 'colih';
	$config['dbhost'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = 'root';
} else {
	define("BASE_URL", 'http://....');
	$config['dbname'] = '';
	$config['dbhost'] = '';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
}

global $db;
try {
	$db = new PDO('mysql:host='.$config['dbhost'].';dbname='.$config['dbname'], $config['dbuser'], $config['dbpass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "<h3>NÃO FOI POSSÍVEL CONECTAR AO BANCO DE DADOS</h3>".$e->getMessage();
	die();
}