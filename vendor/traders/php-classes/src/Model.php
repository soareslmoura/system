<?php
namespace Traders;

class Model{

	private $values = [];

	public function __call($name_method , $args)
	/*
	O metodo __call é chamado toda vez que chamamos um metodo que não existe na classe. 
	Nesse caso ele será usado para getter e setters. Vamos passar o nome do metodo e faremos um substr
	pra pegar as 3 primeiras letras do metodo pra saber se é set ou get. Depois vamos pegar o resto
	das letras usando o strlen pra pagar o nome do campo do banco que se refere esse metodo.
	
	*/
	{
		$method = substr($name_method, 0, 3);
		$fieldName = substr($name_method, 3, strlen($name_method));

		switch ($method)
		{
			case "get":
				return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : null;
			break;

			case "set":

				$this->values[$fieldName] = $args[0];
			break;		

		}
	}


	public function setData($data = array())
	{
	
		foreach ($data as $key => $value) {
			
			$this->{"set".$key}($value);		
			
		}

	}

	public function getData()//getValues
	{
		return $this->values;
	}


	public function gerarHash($senha)
	{
		$options = [
	    			'cost' => 10,
					];
					
		return $hash = password_hash($senha, PASSWORD_BCRYPT, $options);
	}	

}


?>
