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
			$user->setiduser($data_user['id_User']);
/*			exit;
			$user->setData($data_user);

			$_SESSION[User::SESSION] = $user->getData();

			return $user;*/

		}else{

			throw new \Exception("Usuário inexistente ou senha inválida senha");
		}
	}

	public static function verifyLogin($inadmin = true)
	{
		if(
			!isset($_SESSION[User::SESSION]) 
			||			
			!(int)$_SESSION[User::SESSION]["iduser"]>0 
			|| 
			(bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin )
		{
			header("Location: /ecommerce/admin/login");
			
			exit;

		}


	}

	public static function logout()
	{
		$_SESSION[User::SESSION] = NULL;

	}


}



?>