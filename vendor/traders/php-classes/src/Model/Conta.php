<?php

namespace Traders\Model;

use \Traders\DB\Sql;
use \Traders\Model;

class Conta extends Model{

	public function calcularDuracao($duracao/* Dias de gratuidade*/)
	{
	
		date_default_timezone_set("UTC");
		$horaatual = $_SERVER['REQUEST_TIME'];
			
		$tempo_validade = $horaatual + (86400 * $duracao) ;
			
		return date("Y/m/d H:i:s",$tempo_validade);
	
	
	}


	public function getConta($iduser)
	{

		$sql = new Sql();
		$result = $sql->select("SELECT * FROM st_conta WHERE user_id_User = :iduser", 
			array(
				":iduser"=>$iduser
			));
		return $result[0];
		

	}





}



?>