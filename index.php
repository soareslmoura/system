<?php 

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$sql = new Traders\DB\Sql();

	$res = $sql->select("SELECT * FROM user");

	echo json_encode($res);

});

$app->run();

 ?>