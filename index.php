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

$app->get('/master/users', function() {

	User::verifyLogin();

	$users = User::listUsers();
	
	$page = new PageAdmin();
	$page->setTpl("users", array(
		"users"=>$users
		));

});

$app->get('/master/users/create', function() {

	User::verifyLogin();
    $ufs = User::listUfs();
    $tipoconta = User::listTipoConta();

    $idadm = $_SESSION['User'];
    $senha = rand(000000,999999);
	$options = [
    'cost' => 10,
	];
	$hash = password_hash($senha, PASSWORD_BCRYPT, $options);

	$page = new PageAdmin();
	$page->setTpl("users-create", array(
		"ufs"=>$ufs,
		"tipoconta"=>$tipoconta,
		"adm"=>$idadm,
		"hash"=>$hash
	));

});

$app->get('/master/users/:id/del', function($id) {

	User::verifyLogin();
   
});

$app->get('/master/users/:id', function($id) {

	User::verifyLogin();
	$ufs = User::listUfs();

	$user = new User();
	$dado = $user->getUser((int)$id);
    
	$page = new PageAdmin();
	$page->setTpl("users-update", array(
			"user"=>$user->getData()
	));

});

$app->post('/master/users/create', function() {

	User::verifyLogin();

	$user = new User();

	$user->setData($_POST);

	$user->createUser();

	header("location: /master/users");
	exit;

	    
});

$app->post('/master/users/:id', function($id) {

	User::verifyLogin();
   
});




$app->run();

 ?>