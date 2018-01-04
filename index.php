<?php 
session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Traders\Page;
use \Traders\PageAdmin;
use \Traders\System;
use \Traders\Model\User;


$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Page();
	$page->setTpl("index");

});

$app->get('/master', function() {// LOGIN NO SITE ADMINSTRATIVO

	User::verifyLogin();
    
	$page = new PageAdmin();
	$page->setTpl("index");

});

$app->get('/system', function() {// PAGINA DO SISTEMA
    
	$page = new System();
	$page->setTpl("index");

});

$app->get('/master/login', function() {
    
	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);

	$page->setTpl("login");

});

$app->get('/master/logout', function() {
    
	User::logout();
	header("location:/master");
	exit;

});

$app->post('/master/login', function() {
    
	User::login($_POST['login'], $_POST['password']);

	header("location:/master");
	exit;

});

$app->run();

 ?>