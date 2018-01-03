<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Traders\Page;
use \Traders\PageAdmin;


$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Page();
	$page->setTpl("index");

});

$app->get('/master', function() {
    
	$page = new PageAdmin();
	$page->setTpl("index");

});

$app->run();

 ?>