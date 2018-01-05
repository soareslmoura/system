<?php
namespace Traders\Model;

use \Traders\DB\Sql;
use \Traders\Model;
use \Traders\Model\Conta;

class User extends Model{

	const SESSION = "User";

	public static function login($login, $password){

		$sql = new Sql();

		$result = $sql->select("SELECT * FROM st_user WHERE email_User = :LOGIN", array(":LOGIN"=>$login));
		
		if (!$result) {
			throw new \Exception("Usuário inexistente ou senha inválida");// Contra-barra no exception pq o exception está fora do namespace Traders			
		}

		$data_user = $result[0];
		
		if(password_verify($password, $data_user["password_User"]))
		{

			$user = new User();
			$user->setData($data_user);	
		
			$_SESSION[User::SESSION] = $user->getData();

			return $user;

		}else{

			throw new \Exception("Usuário inexistente ou senha inválida senha");
		}
	}

	public static function verifyLogin($inadmin = true)
	{
		if(
			!isset($_SESSION[User::SESSION]) 
			||			
			!(int)$_SESSION[User::SESSION]["id_User"]>0 
			|| 
			(int)$_SESSION[User::SESSION]["userLevel_id_User_Level"] < 4 )
		{
			header("Location: /master/login");			
			exit;

		}


	}

	public static function logout()
	{
		$_SESSION[User::SESSION] = NULL;

	}

	public static function listUsers()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM st_user u INNER JOIN st_conta c ON u.id_User = c.user_id_User 
													 INNER JOIN st_tipoconta t ON c.tipoConta_id_tipo_Conta = t.id_tipo_Conta 
													 INNER JOIN st_address a ON c.user_id_User = a.user_id_User 
													 ORDER BY u.nome_User");

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
									 		  INNER JOIN st_address a ON c.user_id_User = a.user_id_User WHERE u.id_User = :IDUSER", array(":IDUSER"=>$iduser));

		$this->setData($results[0]);

	}


}



?>