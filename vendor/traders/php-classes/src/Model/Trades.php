<?php
namespace Traders\Model;

use \Traders\DB\Sql;
use \Traders\Model;
use \Traders\Model\Conta;
use \Traders\Model\System;

class Trades extends Model{

	public function createNumLote($idconta, $datalote)
	{
		$sql= new Sql();

		$numerolote = date("Y").date("m").date("d").rand(00000,99999);

		$result = $sql->select("SELECT num_Lote FROM st_ticketlote WHERE num_Lote = :num", array(":num"=>$numerolote));

		if(count($result)===0)
		{
			
			$sql->query("INSERT INTO st_ticketlote (num_Lote, data_ticketsLote, idconta_lote) VALUES (:lote, :datalote, :idconta)",
						array(
							":lote"=>$numerolote,
							":datalote"=>$datalote,
							":idconta"=>$idconta,
						));
			return $numerolote;
			
		}else
		{
			$this->createNumLote($idconta, $datalote);
		}
	}


	public function createTicket($file, $idconta)
	{
		$sql= new Sql();
		$csv= file_get_contents($file);

		$file = fopen($file, "r");
	   	$result = array();
	    $i = 0;
	    while (!feof($file)):
	      if (substr(($result[$i] = fgets($file)), 0, 10) !== ';;;;;;;;') :
	         $i++;
	      endif;
	    endwhile;
	    fclose($file);
	    
	    $initcharlen = 0;
	    $numchar = 0;
	    $dados = array_filter($result);	   
	    $titulo = explode(",",$dados[0]);
	    $datalote = explode(",",$dados[1]);
	    
		$lote = $this->createNumLote($idconta, $datalote[12]);  	  
	    for($i=1 ; $i < count($dados); $i++)
	    {		

	    	$cont = $i-1;
	    	$campos[$cont] = explode(",",$dados[$i]);
	    			
	    		for($a=0; $a< count($titulo); $a++)
	    		{
	    			//var_dump($titulo[$a],$campos[$cont][$a]);
	    			switch ($titulo[$a]) {

	    				case $titulo[$a] == "TicketID":
	    					$idticket = $campos[$cont][$a];	    				
	    				break;

	    				case $titulo[$a] == "Trader":
	    					$idtrader = $campos[$cont][$a];	    					
	    				break;

	    				case $titulo[$a] == "Account":
	    					$idcontacorretoa = $campos[$cont][$a];	    				
	    				break;

	    				case $titulo[$a] == "TYPE":
	    					$position = $campos[$cont][$a];	    				
	    				break;

	    				case $titulo[$a] == "Secsym":
	    					$stock = $campos[$cont][$a];	    					
	    				break;

	    				case $titulo[$a] == "QTY":
	    					$shares = $campos[$cont][$a];	    					
	    				break;

	    				case $titulo[$a] == "Price":
	    					$price = $campos[$cont][$a];	    					
	    				break;

	    				case $titulo[$a] == "Comm.":
	    					$comm = $campos[$cont][$a];	    					
	    				break;

	    				case $titulo[$a] == "E_date":
	    					$data = $campos[$cont][$a];	    					
	    				break;
	
	    			}						
  	
	    		}	

	    		
				$result = $sql->select("CALL create_external_trade(:idticket, :idtrader, :idcontacorretoa, :position, :stock, :shares, :price, :comm,
				    				:data, :idconta, :lote)", 
												array(
												":idticket"=> $campos[$cont][0],
												":idtrader"=> $campos[$cont][1],
												":idcontacorretoa"=> $campos[$cont][2],
												":position"=> $campos[$cont][4],
												":stock"=> $campos[$cont][5],
												":shares"=> $campos[$cont][6],
												":price"=> $campos[$cont][7],
												":comm"=> $campos[$cont][10],
												":data"=> $campos[$cont][12],
												":idconta"=> $idconta,
												":lote"=> $lote
											)); 	

	    }
	    $sys = new System();
	    $sys->apaga_files($file,'/res/files/');

	    $tickets = $sql->select("SELECT * FROM st_tickets WHERE numerolote_Trade = :lote", array(":lote"=>	
2018011561357));
		$totalstokslote = array_column($tickets,'stock_Trade');	
		$stoksdolote = array_unique($totalstokslote); 
		$trt = array_values($stoksdolote);   
		//var_dump($trt[3]);
	    for($i=0; $i < count($stoksdolote); $i++)
	    {


	    	$stock = $trt[$i];
	    	$result = $sql->select("SELECT * FROM st_tickets WHERE stock_Trade = :stock AND numerolote_Trade = :lote" , 
	    		array(
	    			":stock"=>$stock,
	    			":lote"=>2018011561357
	    		));	    		
	    	//var_dump($result);
			$valor = [];	
			$qtdshare = [];
			$valor = [];
			$totaltickets = count($result);
			$preco = 0;
			$sumshare = 0;
			$share = 0;
			$parcial = 0;
			
		   	foreach ($result as $key => $value) 
	    	{	    
				var_dump($key);
	    		$pos[$key] = $value['possition_Trade'];
	    		$qtdshare[$key] = $value['qtd_Shares'];
	    		$valor[$key] = $value['price_ticket'];
	    		$initprice = $valor[0];
	    		$initshare = $qtdshare[0];
	    		//$initpos = $value[0];
				//var_dump($value);    		
	    		$u = $key -1;
	    		
	    		if(($key != 0))
	    		{   

					switch ($pos[$key]) {
	    			
		    			case "B":
							var_dump("Iniciou num Long");
	    					$sumshare = $qtdshare[$u] + $qtdshare[$key];
	    						if($valor[$key] >= $valor[$u])
	    						{
	    							$dif = $valor[$key] - $valor[$u];
	    						}else
	    						{
	    							$dif = $valor[$u] - $valor[$key];
	    						} 

	    					$preco = $dif * $qtdshare[$key];

	    					var_dump($sumshare, $preco);    				
		    				
		    				//$preço = $valor[$key];
		    			break;

		    			case "S":
		    				var_dump("Saida de Long");		    				
    						$sumshare = $qtdshare[$u] - $qtdshare[$key];
    							if($valor[$key] >= $valor[$u])
	    						{
	    							$dif = $valor[$key] - $valor[$u];
	    						}else
	    						{
	    							$dif = $valor[$u] - $valor[$key];
	    						} 
    						$preco = $dif * $qtdshare[$key];
    						var_dump( $preco);
		    				
		    			break;

		    			case "SS":
		    				var_dump("Iniciou de Short");
		    				$sumshare = $qtdshare[$u] + $qtdshare[$key];
			    				if($valor[$key] >= $valor[$u])
	    						{
	    							$dif = $valor[$key] - $valor[$u];
	    						}else
	    						{
	    							$dif = $valor[$u] - $valor[$key];
	    						} 
    						$preco = $dif * $qtdshare[$key];
		    				var_dump($preco);
		    			break;

		    			case "BC":
		    				var_dump("Saída de Short");
		    				$sumshare = $qtdshare[$u] - $qtdshare[$key];
		    					if($valor[$key] >= $valor[$u])
	    						{
	    							$dif = $valor[$key] - $valor[$u];
	    						}else
	    						{
	    							$dif = $valor[$u] - $valor[$key];
	    						} 
    						$preco = $dif * $qtdshare[$key];
		    				var_dump($preco);
		    			break;
	    
	    			}

	    			if($sumshare === 0){
	    				var_dump("fechou a posição");
	    			}

	    			/*


	    			$u = $key -1;
	    			
	    			if($pos[$u] == $pos[$key])
	    			{	
	    				$sumshare += $qtdshare[$key];

		    				if($initprice>$valor[$u])
		    				{
		    					$preço = ((float)$initprice - $valor[$key]);
		    					$parcial += $preço * $qtdshare[$key];
		    					//var_dump($preço);

		    				}else
		    				{
		    					$preço = ((float)$valor[$key] - $initprice);
		    					$parcial += $preço * $qtdshare[$key];
		    				}
	    				//var_dump($share, $preço);
	    			}else
	    			{
	    				//var_dump($qtdshare[$key]);
	    				$sumshare += $qtdshare[$key];	    				
	    				
		    				if($initprice>$valor[$key])
		    				{
		    					$preço = ((float)$initprice - $valor[$key]);
		    					$parcial += $preço * $qtdshare[$key];
		    					//var_dump($parcial);
		    				}else
		    				{
		    					$preço = ((float)$valor[$key] - $initprice);
		    					$parcial += $preço * $qtdshare[$key];
		    				}
	    				//var_dump($sumshare, $preço);
	    			}

    				var_dump($parcial);
	    			if($initshare == $sumshare)
	    			{
	    				var_dump("finalmente resolvi".$i);
	    			}*/
	    			
	    			
	    		}
				
	    		
	    	}
	    	//var_dump($sumshare, $preço);
	    }    	
		exit;
	}


	public function getTickes($idconta)
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM st_tickets WHERE id_conta = :idconta ORDER BY ticket_Trade", 
			array(
				":idconta"=>$idconta
			)
		);

	}

	public function getLote($data, $lote)
	{
		return $sql->select("SELECT * FROM st_tickets WHERE id_conta = :idconta AND dateTrade = :lote ORDER BY ticket_Trade", 
			array(
				":idconta"=>$idconta,
				":lote"=>$lote
			)
		);

	}



	public function calculateTrade($idconta)
	{

		$trades = $this->getTickes($idconta);

		
		foreach ($trades as $key => $value) 
		{	
			
			$stock = array_column($trades, 'stock_Trade');		
			
			//var_dump($value);
			//var_dump(in_array($value,array("KODK")));
			
	

			
		}



								
				exit;




		
	}






}


?>