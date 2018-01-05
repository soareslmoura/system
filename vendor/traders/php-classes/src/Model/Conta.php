<?php

namespace Traders\Model;

use \Traders\DB\Sql;
use \Traders\Model;

class Conta extends Model{

	public function calcularDuracao($duracao){
	
		date_default_timezone_set("UTC");
		$horaatual = $_SERVER['REQUEST_TIME'];
			
		$tempo_validade = $horaatual + (86400 * $duracao) ;
			
		return date("Y/m/d H:i:s",$tempo_validade);
	
	
	}





}



?>