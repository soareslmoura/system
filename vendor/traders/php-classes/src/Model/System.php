<?php

namespace Traders\Model;

use \Traders\DB\Sql;
use \Traders\Model;
use \Traders\Model\Conta;
use \Traders\Model\User;
use \Traders\Page;

class System extends Model{


	public function getCupom($codcupom = null, $email = null)
	{
		$sql = new Sql();

		$cupom = $sql->select("SELECT * FROM st_cupons WHERE cod_Cupom = :CUPOM AND email_cupom = :EMAIL", array(
																	"CUPOM"=>$codcupom,
																	"CUPOM"=>$email
																	));
	}

	public static function listCupons()
	{
		$sql = new Sql();

		$cupom = $sql->select("SELECT * FROM st_cupons ORDER BY criacao_Cupom");
		return $cupom;
	}

	private function generateCodCupom($cat)
	{
		date_default_timezone_set("UTC");
		$date = date("Y");
		$rand = $senha = rand(0000,9999);
		$prefix = "22TR";
		return $codcupom = $prefix.$date.$cat.$rand;
	}


	public function createCupom()//tipo é se geral ou individual e Tipo é desconto ou gratuidade
	{

		$sql = new Sql();		

		$codcupom = $this->generateCodCupom($this->getcategoriacupom());
		
		if($this->gettipocupom() == "multiplo")
		{
			// CÓDIGO PRA GERAR CUPOM EM MASSA

		}else
		{
			
			$date = new DateTime($this->getvalidade());
			$validade_Cupom = $date->format('d-m-Y H:i:s'); 
			exit;
			if($tipo=="D")
			{
				$results = $sql->query("INSERT INTO st_cupons (tipo_Cupom, cod_Cupom, email_cupom, cel_Cupom, desconto_Cupom, dias_desc_Cupom, id_create_Cupom, categoria_Cupom, validade_Cupom)
				 	VALUES (:TIPO, :COD, :EMAIL, :CEL, :DESCONTO, :DIASDESCONTO, :IDCREATOR, :CATCUPOM, VALIDADECUPOM)", array(
																						 		":TIPO"=>$this->gettipocupom(),
																						 		":COD"=>$codcupom(),
																						 		":EMAIL"=>$this->getemail(),
																						 		":CEL"=>$this->getcel(),
																						 		":DESCONTO"=>$this->getdescontoindividual(),
																						 		":DIASDESCONTO"=>$this->getdias_desc_Cupom(),
																						 		":IDCREATOR"=>$_SESSIO["User"]["id_User"], 	
																						 		":CATCUPOM"=>$this->getcategoriacupom(),	
																						 		":VALIDADECUPOM"=>$validade_Cupom	
																						 		));
			

				if($results)
				{
					return $msg = "Cupom gerado com sucesso";
				}else
				{
					return $msg = "Ocorreu um problema. Cupom não foi gerado";
				}
			}else
			{
				$results = $sql->query("INSERT INTO st_cupons (tipo_Cupom, cod_Cupom, email_cupom, cel_Cupom, dias_desc_Cupom, id_create_Cupom, categoria_Cupom, validade_Cupom)
				 	VALUES (:TIPO, :COD, :EMAIL, :CEL, :DIASDESCONTO, :IDCREATOR, :CATCUPOM, :VALIDADECUPOM)", array(
																						 		":TIPO"=>$user->gettipocupom,
																						 		":COD"=>$codcupom,
																						 		":EMAIL"=>$user->getemail,
																						 		":CEL"=>$user->getcel,					 		
																						 		":DIASDESCONTO"=>$user->getdias_desc_Cupom,
																						 		":IDCREATOR"=>$_SESSIO["User"]["id_User"], 	
																						 		":CATCUPOM"=>$user->getcategoriacupom,	
																						 		":VALIDADECUPOM"=>$validade_Cupom	
																						 		));

				if($results)
				{
					return $msg = "Cupom gerado com sucesso 2";
				}else
				{
					return $msg = "Ocorreu um problema. Cupom não foi gerado 2";	
				}

			}
			
		}
																						
	}


}




?>
