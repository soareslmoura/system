<?php 
session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Traders\Page;
use \Traders\PageAdmin;
use \Traders\Model\System;
use \Traders\Model\User;
use \Traders\DB\Sql;


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

	$user = new User();
	$user->getUser((int)$_SESSION["User"]["id_User"]);	
	
	$page = new PageAdmin();
	$page->setTpl("cupom", array(			
			"cupons"=>$cupons,
			"adm"=>$user->getData()
	));

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

$app->get('/master/cupom/:id', function($id) {// Página de detalhes do cupom criado

	User::verifyLogin();
	
	$sys = new System();
	$sys->getCupom((int)$id);	

	$user = new User();
	$user->getUser((int)$_SESSION["User"]["id_User"]);

	date_default_timezone_set("UTC");
	$date = date('Y-m-d H:i:s');
	
	$page = new PageAdmin();
	$page->setTpl("cupom-detail", array(
								"cupom"=>$sys->getData(),
								"adm"=>$user->getData(),
								"date"=>$date
								));

});

$app->post('/master/cupom/create-personal', function() {// Página de castramento de novo cupom individual POST
   
    User::verifyLogin();

   
    $sys = new System();

    $sys->setData($_POST);

    $msg = $sys->createCupom();
   // var_dump($msg);
	
	header("location: /master/cupom");
	exit;

});

$app->post('/master/cupom/create-multi', function() {// Página de castramento de novo cupom multiplo POST
   
    User::verifyLogin();

    $sys = new System();

    $sys->setData($_POST);

    $msg = $sys->createCupom();

    header("location: /master/cupom");
	//var_dump($msg);
	exit;

});




$app->run();

 ?>