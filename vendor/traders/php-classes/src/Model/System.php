<?php

namespace Traders\Model;

use \Traders\DB\Sql;
use \Traders\Model;
use \Traders\Model\Conta;
use \Traders\Model\User;
use \Traders\Page;
use \Datetime;
use \Traders\Mailer;

class System extends Model{


	const SECRET = "22traders2018sys";


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



	public function createUserAdmin()
	{

		$sql = new Sql();	

		$result = $sql->query("INSERT INTO st_useradm (nome_useradm, email_useradm, celular_useradm, levelControl_useradm, idAdm_useradm, password_useradm, verified, status_useradm, del_useradm) VALUES(:name, :email, :cel, :levelconta, :idadm, :password, :verified, :status, :del)", array(
																											":name"=> $this->getadm_name(),
																											":email"=> $this->getadm_email(),
																											":cel"=> $this->getadm_cel(),			
																											":levelconta"=> $this->getadm_nivel(),
																											":idadm"=> $this->getadm_idadm(),
																											":password"=> $this->gerarHash($this->getadm_hash()),
																											":verified"=> $this->getadm_verified(),
																											":status"=> 1,
																											":del"=> 0								
																											));	

	
		

		//$this->setData($result);
	}



	public static function listAdmLevels()
	{
		$sql = new Sql();

		$admlevel = $sql->select("SELECT * FROM st_adminlevel ORDER BY level_admLevel");
		return $admlevel;
	}

	public static function listAdmins()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM st_useradm u INNER JOIN st_adminlevel l ON u.levelControl_useradm = l.level_admLevel 
						     WHERE u.del_useradm <> 1 ORDER BY u.id_useradm");

	}


	public static function getAdmin($id)
	{
		$sql = new Sql();
		$adm = new System();
		

		$results = $sql->select("SELECT * FROM st_useradm WHERE id_useradm = :ID", array(
																				":ID" =>$id			
																				));

		$adm->setData($results[0]);

		return $adm;



	}



	public static function operationAdmin($id, $operation)
	{
		$sql = new Sql();

		if($operation == "del")
		{
			return $sql->query("UPDATE st_useradm SET del_useradm = 1 WHERE id_useradm = :ID", array(
																							"ID"=>$id
																							));
		}

		return $sql->select("SELECT * FROM st_useradm u INNER JOIN st_adminlevel l ON u.levelControl_useradm = l.level_admLevel 
						     WHERE u.del_useradm <> 1 ORDER BY u.id_useradm");

	}


	public static function getForgotAdm($email)
	{

		$sql = new Sql();

		$result = $sql->select("SELECT email_useradm, id_useradm, nome_useradm FROM st_useradm WHERE email_useradm = :email", array(
																										":email"=>$email
																										));

		if(count($result)===0)
		{
			throw new \Exception('Não foi possível recuperar a senha');
		}else
		{
			$data = $result[0];

			$result2 = $sql->select("CALL sp_admpasswordsrecoveries_create (:iduseradm, :ipadm, :tipouser)", 
				array(
					":iduseradm"=>$data['id_useradm'],
					":ipadm"=>$_SERVER['REMOTE_ADDR'],
					":tipouser"=>2
			));

			if(count($result2)===0)
			{
				throw new \Exception('Não foi possível recuperar a senha');
			
			}else
			{
				$datarecovery = $result2[0];

				$code = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, System::SECRET, $datarecovery['id_passrecovery'], MCRYPT_MODE_ECB));

				$link = "http://www.systrader1.com.br/master/forgot/reset?code=$code";

				$mailer = new Mailer($email, $data['nome_useradm'], "Redefinir senha SySTrader ADM", "forgot", 
						array
						("name"=>$data['nome_useradm'],
						 "link"=>$link	
						));

				$mailer->sendMail();

				return $data;

			}

		}


	}


	public static function validForgotDecrypt($code)
	{

		$id_passrecovery = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, System::SECRET, base64_decode($code), MCRYPT_MODE_ECB);

		$sql = new Sql();

		$result3 = $sql->select("
					SELECT * 
					FROM st_passrecovery p 
					INNER JOIN st_useradm u 
					ON p.id_userrecovery = u.id_useradm 
					WHERE p.id_passrecovery = :idrecovery 
					AND
					p.dt_passrecovery is null
					AND
					DATE_ADD(p.dtrecovery_passrecovery, INTERVAL 1 Hour) >= Now();
					", array(
						":idrecovery"=>$id_passrecovery
					));

		if(count($result3)===0)
		{
			throw new \Exception('Não foi possível recuperar a senha');
		}else
		{

			return $result3[0];
		}

	}


	public static function setForgotUsed($idrecovery)
	{
		$sql = new Sql();

		$sql->query("UPDATE st_passrecovery SET dt_passrecovery = now() WHERE id_passrecovery = :idrecovery" , array(":idrecovery"=>$idrecovery));

	}


	public function setPassword($password, $id)
	{
		$sql = new Sql();

		$newhash = $this->gerarHash($password);

		$sql->query("UPDATE st_useradm SET password_useradm = :hash WHERE id_useradm = :id", array(
																								":hash"=>$newhash,
																								":id"=>$id
																								));

	}

}/* #################  FIM DA CLASSE   #######################*/




?>
