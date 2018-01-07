<?php 
session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Traders\Page;
use \Traders\PageAdmin;
use \Traders\Model\System;
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

	$user = new User();
	$user->getUser((int)$id);
	$user->deleteUser();

	header("location: /master/users");
	exit;

   
});

$app->get('/master/users/:id', function($id) {

	User::verifyLogin();
	$ufs = User::listUfs();
	var_dump($_SESSION["User"]["id_User"]);
	$user = new User();
	$dado = $user->getUser((int)$id);
    
	$page = new PageAdmin();
	$page->setTpl("users-update", array(
			"user"=>$user->getData(),
			"ufs"=>$ufs
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

$app->post('/master/users/:id', function($id) {// Update de usuarios pelo ADM

	User::verifyLogin();

	$user= new User();

	$user->getUser((int)$id);
	$user->setData($_POST);
	$user->updateUser();
	header("location: /master/users");
	exit;
   
});

$app->get('/cdemo', function() {// Página de cdastramento conta demo pelo usuário
    
	$page = new Page();
	$page->setTpl("cdemo");

});

$app->post('/cdemo', function() {// Cadastro de conta demo pelo usuário comum 	

	$user = new User();

	$user->setData($_POST);

	$msg = $user->createUserExternal();
	var_dump($msg);
	//header("location: /cdemo");
	exit;	    
});

//-----------  CUPONS -------------------

$app->get('/master/cupom', function() {// Página lista de cupons criados
    User::verifyLogin();

	$cupons = System::listCupons();
	
	$page = new PageAdmin();
	$page->setTpl("cupons", array(
		"cupons"=>$cupons
		));
	$page->setTpl("cupom");

});

$app->get('/master/cupom/create-personal', function() {// Página de castramento de novo cupom individual GET
   
    User::verifyLogin();

	$page = new PageAdmin();
	$page->setTpl("cupom-create-personal");

});

$app->get('/master/cupom/create-multi', function() {// Página de cdastramento de novo cupom multiplo
   
    User::verifyLogin();

	$page = new PageAdmin();
	$page->setTpl("cupom-create-multi");

});

$app->post('/master/cupom/create-personal', function() {// Página de castramento de novo cupom individual POST
   
    User::verifyLogin();

   
    $sys = new System();

    $sys->setData($_POST);

    $sys = $sys->createCupom();
	
	//header("location: /master/cupom");
	exit;

});
/*
$app->post('/master/cupom/create-multi', function() {// Página de castramento de novo cupom multiplo POST
   
    User::verifyLogin();

    $user = new User();
    $sys = new System();

    $user->setData($_POST);

//    $msg = $sys->createCupom($user->gettipocupom(), $user->getcategoriacupom());

	var_dump($user);
	exit;

});

*/


$app->run();

 ?>