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

	    $tickets = $sql->select("SELECT * FROM st_tickets WHERE numerolote_Trade = :lote ORDER BY ticket_Trade", array(":lote"=>	
	
$lote));
		$totalstokslote = array_column($tickets,'stock_Trade');	
		$stoksdolote = array_unique($totalstokslote); 
		$trt = array_values($stoksdolote);   
		$trd = array_keys($stoksdolote);
		$dadosconta = $sys->getParamsAccount($idconta);
	    for($i=0; $i < count($stoksdolote); $i++)
	    {


	    	$stock = $trt[$i];
	    	$result = $sql->select("SELECT * FROM st_tickets WHERE stock_Trade = :stock AND numerolote_Trade = :lote ORDER BY ticket_Trade" , 
	    		array(
	    			":stock"=>$stock,
	    			":lote"=>$lote
	    		));	    		
	    	//var_dump($result);
			$valor = [];	
			$qtdshare = [];
			$valor = [];
			$totaltickets = count($result);
			$preco = 0;
			$sumshare = 0;
			$totalshare = 0;
			$share = 0;
			$parcial = 0;
			$idtickets = [];
			$datatrade = 0;
			$ticketstrade = [];

			//var_dump($result);
		   	foreach ($result as $key => $value) 
	    	{	
				
	    		$pos[$key] = $value['possition_Trade'];
	    		$qtdshare[$key] = $value['qtd_Shares'];
	    		$valor[$key] = $value['price_ticket'];
	    		$ticketstrade[$key] = $value['ticket_Trade'];
	    		$date = $value['dateTrade']; 
	    		//var_dump($ticketstrade);
	    		if($key == 0)
	    		{
	    			$initprice = $valor[0];
	    			$initshare = $qtdshare[0];
	    			$sumshare = $qtdshare[0];
	    			$totalshare = $qtdshare[0];
	    			
	    			
	    		}
	    		$tickettrade = $ticketstrade[$key];
	    		//$sumshare = $qtdshare[0];
	    		//$initpos = $value[0];
				//var_dump($value);    		
	    		$u = $key-1;
	    		
	    		if(($key > 0))
	    		{   

					switch ($pos[$key]) 
					{
	    			
		    			case "B":

		    			if($pos[$u] == "B")
    					{
    						$anteriorprice = $initprice;
    						$initprice = ($valor[$key]+$valor[$u])/2;
    						$sumshare = $qtdshare[$key] + $qtdshare[$u];
    						$totalshare = $qtdshare[$key] + $qtdshare[$u];
    						

    					} else 
    					{
    						$initprice = $valor[$key];
    						$initshare = $qtdshare[$key];
    						$sumshare = $sumshare + $qtdshare[$key];

    							if($pos[$u] == "SS")
		    						{
		    							$totalshare = $qtdshare[$key] + $qtdshare[$u];
		    						}else
		    						{
		    							$totalshare = $qtdshare[$key];
		    						}

    						
    						
    					}   
	    				
		    			break;

		    			case "S":
		    			//	var_dump("Saida de Long");
		    				if($pos[$u] == "S")
		    				{
		    					$sumshare = $sumshare - $qtdshare[$key];
		    					$totalshare = $qtdshare[$key] + $qtdshare[$u];
		    				
		    					//var_dump($sumshare);
		    				}else
		    				{
		    					$sumshare = $sumshare - $qtdshare[$key];
		    					$totalshare = $qtdshare[$key] + $qtdshare[$u];		    				
		    					

		    				}

		    				if($sumshare > 0)
		    				{
		    					$sumshare = $sumshare - $qtdshare[$key];
		    					$totalshare = $qtdshare[$key] + $qtdshare[$u];
		    				}else
    						{
		    					$sumshare = 0;
		    				}
		    				
		    				
    						//var_dump("QTDE SHARE é ".$sumshare);
    								
		    						if($valor[$key] > $initprice)
		    						{
		    							//var_dump("GANHEI ".$value['stock_Trade']);
		    							$dif = $valor[$key] - $initprice;
		    						}else
		    						{	
		    							//var_dump("PERDI ".$value['stock_Trade']);
		    							$dif = ($initprice - $valor[$key]);
		    							//var_dump($initprice." - ".$valor[$key]);
		    							$dif -= $dif*2;
		    						}   
		    				
    						$preco = $preco + ($dif * $qtdshare[$key]);
    						
    						if(($sumshare == 0))
		    				{

		    					
		    				//var_dump('Trade Concluída '.$value['stock_Trade']." Preço: ".$preco." TOTAL DE SHARES: ".$totalshare);
		    			//var_dump($ticketstrade);
			    				if($dadosconta['type_comission']=="S")
			    				{
			    					if(($key < 2) && ($totalshare < 301))
			    					{
			    						$totalcomission = 3.00;
			    					}else if(($key < 2) && ($totalshare > 300))
			    					{
			    						$totalcomission = $totalshare * $dadosconta['value_comission'];
			    					}else if(($key > 1) && ($totalshare < 300))
			    					{
			    						$totalcomission = 3.00;
			    					}else
			    					{
			    						$totalcomission = $totalshare * $dadosconta['value_comission'];
			    					}
			    					
			    				}else 
			    				{
			    					$totalcomission = $key * 6.95;
			    				}	
			    				//var_dump($totalcomission);
			    				$dateOperation = str_replace("/","-",$value['dateTrade']);
			    				$keyconclusion = $key;
			    				$confirm = $sql->select("CALL save_trades(:idconta, :posicao, :valor, :qtdshares, :datatrade, :stock, :numlote, :idticketinicial, :pl, :comission)", 
										    array(
										    	":idconta"=>$idconta,
										    	":posicao"=>"Long",
										    	":valor"=>$initprice,
										    	":qtdshares"=>$totalshare,
										    	":datatrade"=>$dateOperation,
										    	":stock"=>$value['stock_Trade'],
										    	":numlote"=>$lote,
										    	":idticketinicial"=>$value['ticket_Trade'],
										    	":pl"=>$preco,
										    	":comission"=>$totalcomission
										    ));

			    				if($confirm != null)
			    				{
			    					
			    					$idtrade = $confirm[0]["LAST_INSERT_ID()"];
			    					
			    					foreach ($ticketstrade as $key => $value) 
			    					{
			    					//var_dump($idconta,$value,$idtrade);
			    						//exit;
			    						
			    						$sql->select("CALL save_id_trade_ticket(:idconta, :idtiket, :idtrade)", 
										    array(
										    	":idconta"=>$idconta,
										    	":idtiket"=>$value,
										    	":idtrade"=>$idtrade
										    	));
			    					}
			    				}
			    				//var_dump($confirm);

			    				$sumshare = 0;
			    				$initprice = 0;
			    				$dif = 0;
			    				$totalshare = 0;
			    				$preco = 0;	    				
			    				
    						}
		    				
		    			break;

		    			case "SS":
		    				//var_dump("Entrou num Short". $key);
		    					
		    				if($pos[$u] == "SS")
	    					{
	    						$anteriorprice = $initprice;
	    						$initprice = ($valor[$key]+$valor[$u])/2;
	    						$sumshare = $qtdshare[$key] + $qtdshare[$u];
	    						$totalshare = $totalshare + $qtdshare[$key];
	    						
	    					} else 
	    					{
	    						$initprice = $valor[$key];
	    						$initshare = $qtdshare[$key];
	    						$sumshare = $sumshare + $qtdshare[$key];
	    						
	    						$totalshare = $totalshare + $qtdshare[$key];
		    						
	    						
	    						
	    					}   

		    				//$sumshare = $initshare + $qtdshare[$key];
		    				//var_dump($sumshare);
		    				//$anteriorprice = $initprice;
		    				
		    			break;

		    			case "BC":

	    					if($pos[$u] == "BC")
		    				{
		    					$sumshare = $sumshare - $qtdshare[$key];
		    					$totalshare = $totalshare + $qtdshare[$key];
		    					
		    					//var_dump($sumshare);
		    				}else
		    				{
		    					$sumshare = $sumshare - $qtdshare[$key];
		    					$totalshare = $totalshare + $qtdshare[$key];
		    					
		    				}
		    					 
    						if($valor[$key] > $initprice)
    						{
    							//var_dump("PERDI ".$value['stock_Trade']);
    							$dif = $initprice - $valor[$key];
    							
    						}else
    						{
    							//var_dump("GANHEI ".$initprice, $valor[$key]);
    							$dif = $initprice - $valor[$key];
    						} 

    						//$dif = $initprice - $valor[$key];    						
    						
    						$preco = $preco + ($dif * $qtdshare[$key]);
    						//var_dump("Diferença: ". $dif);
    						//var_dump("Preço: ".$preco );
    						if(($sumshare == 0))
		    				{
		    				//var_dump('Trade Concluída '.$value['stock_Trade']." Preço: ".$preco." TOTAL DE SHARES: ".$totalshare);
		    				
		    					if($dadosconta['type_comission']=="S")
			    				{
			    					if(($key < 2) && ($totalshare < 301))
			    					{
			    						$totalcomission = 3.00;
			    					}else if(($key < 2) && ($totalshare > 300))
			    					{
			    						$totalcomission = $totalshare * $dadosconta['value_comission'];
			    					}else if(($key > 1) && ($totalshare < 300))
			    					{
			    						$totalcomission = 3.00;
			    					}else
			    					{
			    						$totalcomission = $totalshare * $dadosconta['value_comission'];
			    					}
			    					
			    				}else 
			    				{
			    					$totalcomission = $key * 6.95;
			    				}	
			    				//var_dump($totalcomission);
			    				$dateOperation = str_replace("/","-",$value['dateTrade']);
			    				$dateOperationSimple = substr($value['dateTrade'], 0, 10);
			    				$keyconclusion = $key;
			    				$confirm = $sql->select("CALL save_trades(:idconta, :posicao, :valor, :qtdshares, :datatrade, :stock, :numlote, :idticketinicial, :pl, :comission, :dateOperationSimple)", 
										    array(
										    	":idconta"=>$idconta,
										    	":posicao"=>"Short",
										    	":valor"=>$initprice,
										    	":qtdshares"=>$totalshare,
										    	":datatrade"=>$dateOperation,
										    	":stock"=>$value['stock_Trade'],
										    	":numlote"=>$lote,
										    	":idticketinicial"=>$value['ticket_Trade'],
										    	":pl"=>$preco,
										    	":comission"=>$totalcomission,
										    	":dateOperationSimple"=>$dateOperationSimple
										    ));

			    				if($confirm != null)
			    				{			    					
			    					$idtrade = $confirm[0]["LAST_INSERT_ID()"];
			    					foreach ($ticketstrade as $key => $value) 
			    					{
			    						//var_dump($idconta,$value,$idtrade);
			    						//exit;
			    						$sql->select("CALL save_id_trade_ticket(:idconta, :idtiket, :idtrade)", 
										    array(
										    	":idconta"=>$idconta,
										    	":idtiket"=>$value,
										    	":idtrade"=>$idtrade
										    ));
			    					}
			    				}
			    				//var_dump($confirm);

			    				$sumshare = 0;
			    				$initprice = 0;
			    				$totalshare = 0;
			    				$dif = 0;
			    				$preco = 0;
			    				
    						}
		    				
		    			break;

		    			/*
		    			if(($sumshare == 0))
		    			{
		    				var_dump('Trade Concluída '.$value['stock_Trade']);
		    				$sumshare = 0;
		    				/*
		    				$sql->query("INSERT INTO st_trades (id_conta, posicao, valor, qtd_shares, data_trade, stock, numlote, id_ticketInicial, PLtrade, comission) VALUES (:idconta, :posicao, :valor, :qtdshares, :datatrade, :stock, :numlote, idticketinicial, :pl, :comission)", 
		    					array(

		    					));	
		    				//var_dump('Trade Concluída '.$value['stock_Trade']);
		    			}	*/

	    			
	    			}


	    			 		
						
	    				    	
	    		}
				

		    				
				
	    	}

	    	//var_dump($datatrade);
	    						
	    	//var_dump($sumshare, $preço);
	    }    	
		//exit;
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

	public function getTrade($idconta,$data = null)
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM st_trades WHERE id_conta = :idconta ORDER BY data_trade",
			array(
				":idconta"=>$idconta
			));



	}


	public function getTradeDate($idconta,$data = null)
	{
		$sql = new Sql();

		return $sql->select("SELECT dateOperationSimple FROM st_trades WHERE id_conta = :idconta ORDER BY data_trade",
			array(
				":idconta"=>$idconta
			));



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

	public function totalPlTradesDay($idconta, $date)
	{

		$sql = new Sql();

		$result = $sql->select("SELECT PLtrade FROM st_trades WHERE id_conta = :idconta AND ORDER BY data_trade DESC",
						array(
							":idconta"=>$idconta
						));
		
		/*
		$datastrades = array_column($result,'data_trade');
		$dates = array();
		*/
		$pl = 0;
		foreach ($datastrades as $key => $value)
		{
				
			$pl += $value;		
		}
		/*
		$date = array_unique($dates);
		$date = array_values($date);
		$totalpl = array();
		$pl = 0;
		foreach ($date as $key1 => $datas)
		{
			$pl =0;
			foreach ($result as $key => $value) 
			{
				
				$datatrade = substr($value['data_trade'], 0, 10);

				if($datatrade === $datas)
				{
					//var_dump($value['PLtrade']);exit;
					$pl += $value['PLtrade'];
					
				}
				
				$pl;

			}

		}
		*/
		return $pl;
	}






}


?>