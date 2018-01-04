<?php
namespace Traders\Model;

use \Traders\DB\Sql;
use \Traders\Model;

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


}



?>