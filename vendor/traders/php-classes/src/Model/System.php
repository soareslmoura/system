<?php

namespace Traders\Model;

use \Traders\DB\Sql;
use \Traders\Model;
use \Traders\Model\Conta;
use \Traders\Model\User;
use \Traders\Page;
use \Datetime;

class System extends Model{


	public function getUserCupom($email = null , $used, $tipo, $cat)// verifica se existe um cupom já gerado para o usuario
	{
		$sql = new Sql();

		return $sql->select("SELECT email_cupom FROM st_cupons WHERE email_cupom = :EMAIL AND tipo_Cupom = :TIPO AND categoria_Cupom = :CAT AND used_Cupom = :USED", array(
																				"EMAIL"=>$email,
																				"TIPO"=>$tipo,
																				"CAT"=>$cat,
																				"USED"=>$used
																				));
	}

	public function getVerCodCupom($codcupom)//Verifica exclusivamente se o código do cupom ja foi gerado
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM st_cupons WHERE cod_Cupom = :CUPOM ", array(
																				"CUPOM"=>$codcupom
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
		$rand = $senha = rand(00000,99999);
		$prefix = "22TR";
		return $codcupom = $prefix.$date.$cat.$rand;
	}


	public function createCupom()//tipo é se geral ou individual e Tipo é desconto ou gratuidade
	{

		$sql = new Sql();		

		if($this->getcategoriacupomgeral() != null)
		{
			$codcupom = $this->generateCodCupom($this->getcategoriacupomgeral());
		}else
		{
			$codcupom = $this->generateCodCupom($this->getcategoriacupom());
	    }


		while($codcupom == $this->getVerCodCupom($codcupom))
		{
			if($this->getcategoriacupomgeral() != null)
			{
				$codcupom = $this->generateCodCupom($this->getcategoriacupomgeral());
			}else
			{
				$codcupom = $this->generateCodCupom($this->getcategoriacupom());
		    }
		}

		if($this->getcategoriacupomgeral() != null)
			{
				$cupomexists = $this->getUserCupom(null, 0, $this->gettipocupom(), $this->getcategoriacupomgeral());
			}else
			{
				$cupomexists = $this->getUserCupom($this->getemail(), 0, $this->gettipocupom(), $this->getcategoriacupom());
		    }

		
		
		if($cupomexists != null)
		{
			return $msg = "Este usuário já recebeu um cupom deste tipo e não utilizou";
			exit;			
		}

		if($this->gettipocupom() == "multiplo")
		{
			$date = new DateTime(str_replace("/", "-", $this->getvalidadegeral()));
			$validade_Cupom = $date->format('Y-m-d')." 23:59:59"; 

			if($this->getcategoriacupomgeral()=="D")
			{
				$results = $sql->query("INSERT INTO st_cupons (tipo_Cupom, cod_Cupom, desconto_Cupom, dias_desc_Cupom, id_create_Cupom, categoria_Cupom, validade_Cupom, justify_Cupom, qtde_Cupom, used_Cupom)
				 	VALUES (:TIPO, :COD, :DESCONTO, :DIASDESCONTO, :IDCREATOR, :CATCUPOM, :VALIDADECUPOM, :JUSTIFICATIVA, :QTDCUPOM, :USED)", array(
																						 		":TIPO"=>$this->gettipocupom(),
																						 		":COD"=>$codcupom,	 		
																						 		":DESCONTO"=>$this->getdescontogeral(),
																						 		":DIASDESCONTO"=>$this->getduracaodescontogeral(),
																						 		":IDCREATOR"=>$_SESSION["User"]["id_User"], 	
																						 		":CATCUPOM"=>$this->getcategoriacupomgeral(),	
																						 		":VALIDADECUPOM"=>$validade_Cupom,	
																						 		":JUSTIFICATIVA"=>$this->getuser_justify(),	
																						 		":QTDCUPOM"=>$this->getqtdecuponsgeral(),	
																						 		":USED"=>0
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
				$results = $sql->query("INSERT INTO st_cupons (tipo_Cupom, cod_Cupom, dias_desc_Cupom, id_create_Cupom, categoria_Cupom, validade_Cupom, qtde_Cupom, justify_Cupom, used_Cupom)
				 	VALUES (:TIPO, :COD, :DIASDESCONTO, :IDCREATOR, :CATCUPOM, :VALIDADECUPOM, :QTDCUPOM, :JUSTIFICATIVA, :USED)", array(
																						 		":TIPO"=>$this->gettipocupom(),
																						 		":COD"=>$codcupom, 		
																						 		":DIASDESCONTO"=>$this->getdiasdemogeral(),
																						 		":IDCREATOR"=>$_SESSION["User"]["id_User"], 	
																						 		":CATCUPOM"=>$this->getcategoriacupomgeral(),	
																						 		":VALIDADECUPOM"=>$validade_Cupom,
																						 		":QTDCUPOM"=>$this->getqtdecuponsgeral(),
																						 		":JUSTIFICATIVA"=>$this->getuser_justify(),
																						 		":USED"=>0
																						 		));

				
				
				if($results)
				{
					return $msg = "Cupom gerado com sucesso 2";
				}else
				{
					return $msg = "Ocorreu um problema. Cupom não foi gerado 2";	
				}

			}


		}else
		{
			
			$date = new DateTime(str_replace("/", "-", $this->getvalidade()));
			$validade_Cupom = $date->format('Y-m-d')." 23:59:59"; 
							
			if($this->getcategoriacupom()=="D")
			{
				$results = $sql->query("INSERT INTO st_cupons (tipo_Cupom, cod_Cupom, email_cupom, cel_Cupom, desconto_Cupom, dias_desc_Cupom, id_create_Cupom, categoria_Cupom, validade_Cupom, justify_Cupom, qtde_Cupom, used_Cupom)
				 	VALUES (:TIPO, :COD, :EMAIL, :CEL, :DESCONTO, :DIASDESCONTO, :IDCREATOR, :CATCUPOM, :VALIDADECUPOM, :JUSTIFICATIVA, :QTDCUPOM, :USED)", array(
																						 		":TIPO"=>$this->gettipocupom(),
																						 		":COD"=>$codcupom,
																						 		":EMAIL"=>$this->getemail(),
																						 		":CEL"=>$this->getcel(),
																						 		":DESCONTO"=>$this->getdesconto(),
																						 		":DIASDESCONTO"=>$this->getduracaodesconto(),
																						 		":IDCREATOR"=>$_SESSION["User"]["id_User"], 	
																						 		":CATCUPOM"=>$this->getcategoriacupom(),	
																						 		":VALIDADECUPOM"=>$validade_Cupom,	
																						 		":JUSTIFICATIVA"=>$this->getuser_justify(),	
																						 		":QTDCUPOM"=>1,	
																						 		":USED"=>0
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
				$results = $sql->query("INSERT INTO st_cupons (tipo_Cupom, cod_Cupom, email_cupom, cel_Cupom, dias_desc_Cupom, id_create_Cupom, categoria_Cupom, validade_Cupom, qtde_Cupom, justify_Cupom, used_Cupom)
				 	VALUES (:TIPO, :COD, :EMAIL, :CEL, :DIASDESCONTO, :IDCREATOR, :CATCUPOM, :VALIDADECUPOM, :QTDCUPOM, :JUSTIFICATIVA, :USED)", array(
																						 		":TIPO"=>$this->gettipocupom(),
																						 		":COD"=>$codcupom,
																						 		":EMAIL"=>$this->getemail(),
																						 		":CEL"=>$this->getcel(),					 		
																						 		":DIASDESCONTO"=>$this->getdiasdemo(),
																						 		":IDCREATOR"=>$_SESSION["User"]["id_User"], 	
																						 		":CATCUPOM"=>$this->getcategoriacupom(),	
																						 		":VALIDADECUPOM"=>$validade_Cupom,
																						 		":QTDCUPOM"=>1,
																						 		":JUSTIFICATIVA"=>$this->getuser_justify(),
																						 		":USED"=>0
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



	public function getCupom($id)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM st_cupons WHERE id_Cupom = :ID ", array(
																				":ID"=>$id
																				));

		$this->setData($results[0]);		

		if($this->getused_Cupom())
		{
			return $results = $sql->select("SELECT * FROM st_cupons c INNER JOIN st_user u ON c.id_Cupom_id_User = u.id_User 
											WHERE c.id_Cupom = :ID AND c.id_Cupom_id_User = :IDUSER ", array(
																								":ID"=>$id,
																								":IDUSER"=>$this->getused_Cupom()
																								));
			$this->setData($results[0]);
		}
	}


}




?>
