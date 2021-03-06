<?php

namespace Traders\Model;

use \Traders\DB\Sql;
use \Traders\Model;
use \Traders\Model\Conta;

class User extends Model{

	const SESSION = "User";	
	const SESSIONADM = "Adm";	

	public static function login($login, $password, $usertype)
	{

		$sql = new Sql();

		if($usertype == 0)
		{
			$result = $sql->select("SELECT * FROM st_user WHERE email_User = :LOGIN", array(":LOGIN"=>$login));

		}else if($usertype == 1){

			$result = $sql->select("SELECT * FROM st_useradm WHERE email_useradm = :LOGIN", array(":LOGIN"=>$login));

		}
		
		if (!$result) {
			throw new \Exception("Usuário inexistente ou senha inválida");// Contra-barra no exception pq o exception está fora do namespace Traders			
		}
		$data_user = $result[0];
		
		if($usertype == 0)
		{

			if(password_verify($password, $data_user["password_User"]))
			{
				$user = new User();
				$user->setData($data_user);	
			
				$_SESSION[User::SESSION] = $user->getData();
				return $user;
			}else{
				throw new \Exception("Usuário inexistente ou senha inválida senha");
			}

		}else if($usertype == 1){

			if(password_verify($password, $data_user["password_useradm"]))
			{

				$user = new User();
				$user->setData($data_user);	
			
				$_SESSION[User::SESSIONADM] = $user->getData();
				return $user;

			}else{
				throw new \Exception("Usuário inexistente ou senha inválida senha");
			}
			
		}

	}



	private function verifyLevelUser($email)
	{
		$sql = new Sql();
		return $sql->select("SELECT userLevel_id_User_Level FROM st_user WHERE email_User = :EMAIL", array(":EMAIL"=>$email));
	}


	public static function verifyLogin($inadmin = true)
	{
		if(
			!isset($_SESSION[User::SESSIONADM]) 
			||			
			!(int)$_SESSION[User::SESSIONADM]["id_useradm"]>0 
		)
						
		{
			header("Location: /master/login");			
			exit;

		}


	}

	public static function verifyAdmLoged()
	{
		if($_SESSION[SESSION]!= null){

			self::logout();
		}
	}

	public static function verifyLoginUserComum()
	{
		if(
			!isset($_SESSION[User::SESSION]) 
			||			
			!(int)$_SESSION[User::SESSION]["id_User"]>0 
			)
		{
			self::logout();
			header("Location: /");			
			exit;

		}


	}

	public static function logout()
	{
		$_SESSION[User::SESSION] = NULL;

	}	

	public static function logoutADM()
	{
		$_SESSION[User::SESSIONADM] = NULL;

	}

	public static function listUsers()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM st_user u INNER JOIN st_conta c ON u.id_User = c.user_id_User 
													 INNER JOIN st_tipoconta t ON c.tipoConta_id_tipo_Conta = t.id_tipo_Conta 
													 INNER JOIN st_address a ON c.user_id_User = a.user_id_User 
													 WHERE u.del_User <> 1 ORDER BY u.nome_User ");

	}

	public static function listUfs()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM st_uf ORDER BY nome_uf");

	}

	public static function listTipoConta()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM st_tipoconta ORDER BY nivel_conta");

	}

	public function createUser()
	{

		$sql = new Sql();
		$conta = new Conta();

		$validadeDemo = $conta->calcularDuracao($_POST['duracaoConta']);
		
		
		$result = $sql->select("CALL user_save(:name, :email, :cel, :address, :cidade, :bairro, :estado, :numero, :cep, :levelconta, :idadm, :password, :justify, :validade)", array(
			":name"=> $this->getuser_name(),
			":email"=> $this->getuser_email(),
			":cel"=> $this->getuser_cel(),
			":address"=> $this->getuser_end(),
			":cidade"=> $this->getuser_city(),
			":bairro"=> $this->getuser_neig(),
			":estado"=> $this->getuser_uf(),
			":numero"=> $this->getuser_number(),
			":cep"=> $this->getuser_cep(),
			":levelconta"=> $this->getuser_tipoconta(),
			":idadm"=> $this->getidadm(),
			":password"=> $this->gethash(),
			":justify"=> $this->getuser_justify(),
			":validade"=> $validadeDemo

		));

		$this->setData($result);


	}

	public function getUser($iduser)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM st_user u INNER JOIN st_conta c ON u.id_User = c.user_id_User 
											  INNER JOIN st_tipoconta t ON c.tipoConta_id_tipo_Conta = t.id_tipo_Conta 
									 		  INNER JOIN st_address a ON c.user_id_User = a.user_id_User WHERE u.id_User = :IDUSER ", array(":IDUSER"=>$iduser));

		$this->setData($results[0]);

	}


	public function verifyCupom($email, $cell, $cod)
	{
		$sql = new Sql();	
		
		return $cupom = $sql->select("SELECT * FROM st_cupons WHERE cod_Cupom = :CODCUPOM AND cel_Cupom = :CELCUPOM AND email_cupom = :EMAILCUPOM", 
															array(
															":CODCUPOM"=>$cod,
															":CELCUPOM"=>$cell,
															":EMAILCUPOM"=>$email															
															));						

	}

	public function createUserExternal()
	{
		$sql = new Sql();	
		$conta = new Conta();

		$ip = $_SERVER['REMOTE_ADDR'];
/*
		$existsuser = $sql->select("SELECT * FROM st_user u INNER JOIN st_ipuser i ON u.email_User = i.ip_email_User 
									WHERE i.ip_User = :IP AND u.del_User <>1 OR i.ip_email_User = :EMAIL OR i.ip_cel_User = :CEL",
															 array(
															":IP"=>$ip,															
															":EMAIL"=>$this->getemail(),														
															":CEL"=>$this->getcel(),														
															));	*/ // INSTRUÇAO CORRETA!! Com a trava por ip pra saber se o usuário ja foi cadastrado em um determinado IP

		$existsuser = $sql->select("SELECT * FROM st_user u INNER JOIN st_ipuser i ON u.email_User = i.ip_email_User 
									WHERE u.del_User <>1 AND u.email_User = :EMAIL AND u.cel_User = :CEL",
															 array(																				
															":EMAIL"=>$this->getemail(),														
															":CEL"=>$this->getcel(),														
															));	

		if($existsuser!= null)
		{
			$msg = "Usuário já cadastrado";
			return $msg;
			exit;
		
		}else
		{
			
			if($this->getcupom()!= null)
			{
				$cupom = $this->verifyCupom($this->getemail(), $this->getnome(), $this->getcupom());
				
				if($cupom!=null || $cupom['used_Cupom']==false){
					if($cupom["tipo_Cupom"]=="g")
					{
						$validadeDemo = $conta->calcularDuracao($cupom["dias_desc_Cupom"]);
					}else
					{
						//Grava com o desconto percentual
					}
				}else{
					
					return $msg = "Cupom já utilizado ou inexistente";
					exit;
				}			
				
			}else{
				$senha = $this->gerarHash($this->getsenha());				

				if(!isset($validadeDemo))
				{
					$validadeDemo = $conta->calcularDuracao(14);
				}
				$result = $sql->select("CALL user_external_save(:name, :email, :cel, :password, :validade, :cupom, :levelconta, :ip)", 
										array(
										":name"=> $this->getnome(),
										":email"=> $this->getemail(),
										":cel"=> $this->getcel(),
										":password"=> $senha,	
										":validade"=> $validadeDemo,				
										":cupom"=> null,				
										":levelconta"=> 1,
										":ip"=> $ip										
										));
				if(isset($result))
				{
					$this->setData($result);
					return $msg = $this->getnome().", sua conta foi criada com sucesso!";
					exit;	
				}else{
					return $msg = "Ocorreu um problema em nosso servidor. Em breve tudo estará normalizado.";
					exit;
				}
			}
		}
	}



	public function gerarHash($senha)
	{
		$options = [
	    			'cost' => 10,
					];
		return $hash = password_hash($senha, PASSWORD_BCRYPT, $options);
	}	


	public function updateUser()
	{

		$sql = new Sql();
		$conta = new Conta();

		
		
		$result = $sql->select("CALL user_update(:iduser, :name, :email, :cel, :address, :cidade, :bairro, :estado, :numero, :cep, :idadm, :levelconta)", array(
			":iduser"=>$this->getid_User(),
			":name"=> $this->getuser_name(),
			":email"=> $this->getuser_email(),
			":cel"=> $this->getuser_cel(),
			":address"=> $this->getuser_end(),
			":cidade"=> $this->getuser_city(),
			":bairro"=> $this->getuser_neig(),
			":estado"=> $this->getuser_uf(),
			":numero"=> $this->getuser_number(),
			":cep"=> $this->getuser_cep(),			
			":idadm"=> $_SESSION["User"]["id_User"],
			":levelconta"=> $this->gettipoConta_id_tipo_Conta()		

		));
		
		$this->setData($result);


	}

	public function deleteUser()
	{

		$sql = new Sql();

		$sql->query("CALL user_delete(:iduser, :idadm)", array(
														":iduser"=>$this->getid_User(),			
														":idadm"=> $_SESSION["User"]["id_User"]
														));

	}																							
		

	


}



?>
