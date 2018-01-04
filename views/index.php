<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sys Traders - Sua plataforma Trader</title>
		<link rel="icon" href="images/sysImages/favicon.png">

		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">		
		<link rel="stylesheet" type="text/css" href="css/estilos.css">	
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->

		<script >
		   // window.location.href = "pages/index.html"
            
            $(document).ready(function(){
                //verificar se os campos usuario e senha foram preenchidos
                $('#btn-entrar').click(function(){
                    
                    var campo_vazio = false;
                    
                    if($('#email').val()==''){
                        $('#email').css({'border':'3px solid red'});
                        campo_vazio = true;
                    }else{
                        $('#email').css({'border-color':'#ccc'});
                    }
                    if($('#password').val()==''){
                        $('#password').css({'border':'3px solid red'});
                        campo_vazio = true;
                    }else{
                        $('#email').css({'border-color':'#ccc'});
                    }
                    
                    if(campo_vazio){
                       return false;
                    }
                });
                
            });
            
            
		</script>

		
	</head>


	<body>
		<!-- INICIO NAV -->
		<nav class="navbar navbar-fixed-top navbar-default navbar-personalizada">
			<div class="container">
				<!-- Header -->
				<div class="navbar-header">

					<!-- /Botão Toggle -->
					<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#menu">
			            <span class="sr-only">Alternar Navegação</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
		        	</button>
					<a href="index2.php" class="navbar-brand">						
						<span class="img-logo">Sys Traders</span>
					</a>
				</div><!-- Header -->


				<!-- navbar -->
				<div class="collapse navbar-collapse" id="menu">
					<ul class="nav navbar-nav navbar-right">						
						<li><a href="#planos">Planos</a></li>
						<li><a href="#sobre">Sobre</a></li>
						<li><a href="#depoimentos">Depoimentos</a></li>
						<li class="divisor" role="separator"></li>
						<li><a href="#">Dúvidas?</a></li>
						<li class="dropdown <?php 
                                                if(($erro==1) || ($erro==2))
                                                {
                                                    echo 'open';        
                                                }
                                                
                                                 
                                   
                                   
                                                ?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Entrar <span class="caret"></span></a>
							<form class="dropdown-menu form-entrar" method="post" action="validateLogin.php">
								<h3 style="padding-left: 130px;">Login</h3>
								<div style="padding-bottom: 50px;">
									<input type="email" class="form-control col-sm-10" name="email" id="email" placeholder="e-mail" >
								</div>
								<div>
									<input type="password" class="form-control" name="password" id="password" placeholder="senha">
								</div>
								<div>
								    <div style="padding-top: 5px;">
								      <div class="checkbox">
								        <label>
								          <input type="checkbox"> lembrar
								        </label>
								      </div>
								    </div>
								</div>
								<div style="padding-top: 5px;">
									<button type="submit" class="btn btn-primary" id="btn-entrar">Entrar</button>
								</div>
								<br/>
								<?php 

								if($erro==1){
									echo "<span style='color:red; font-size:18px'>Login inválido!</span>";
								}else if($erro==2)
                                    {
                                        echo "<span style='color:red; font-size:18px'>Você não tem autorização para acessar essa página.</span>";   
                                    }

							 ?>
                                <input type="hidden" name="page" value="1">
							</form>

						</li>
					</ul>					
				</div><!-- /navbar -->
			</div><!-- /Container -->
		</nav><!-- /Nav -->
		<!-- FIM NAV -->

		<!-- SLIDE -->
		<section id="slide" >
		<div class="container"> 			 
  			<div id="myCarousel" class="carousel slide" data-ride="carousel">
   		 <!-- Indicators -->
			    <ol class="carousel-indicators">
			      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			      <li data-target="#myCarousel" data-slide-to="1"></li>			    
			    </ol>

			    <!-- Wrapper for slides -->
			    <div class="carousel-inner">
			      <div class="item active"><!-- 1 Item -->
			         <img src="images/sysImages/bull.jpg" alt="Bull" style="width:100%;" class="img-responsive">	
			         <div class="carousel-caption">
			         	<div class='slide-bull'>
					        <h2 class="font-slideshow">Sua plataforma de controle diário</h2>
					        <h5>Potencialize seus resultados tendo total controle de suas operações</h5>
					        <a href="#" class="btn btn-custom btn-conheca-plano btn-lg">Assine o Premium agora mesmo</a>					        
				  		</div>
     				 </div>	         
			      </div>  <!-- /1 Item -->   
			    
			      <div class="item"><!-- 2 Item -->
			        	<img src="images/sysImages/img1.jpg" alt="sys1" style="width:100%;" class="img-responsive">
			        	<div class="carousel-caption">
			        		
			        	</div>	   
			      </div><!-- /2 Item -->
			    </div>

			    <!-- Left and right controls -->
			    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			      <span class="glyphicon glyphicon-chevron-left"></span>
			      <span class="sr-only">Previous</span>
			    </a>
			    <a class="right carousel-control" href="#myCarousel" data-slide="next">
			      <span class="glyphicon glyphicon-chevron-right"></span>
			      <span class="sr-only">Next</span>
			    </a>
		  </div>
		</div><!-- /SLIDE -->
		</section>
        
		<!-- =========   CONTEUDO =================== -->
        
		<section id="planos">
			<div class="container" > <!-- PLANOS -->			
				<div class="row">
					<div class="col-md-12" style="padding-bottom: 30px; padding-top: 30px">
						<span style="padding: 0px 0% 0px 39%" class='nossos-planos' >Nossos Planos</span>
					</div>					
				</div>

				<div class="row">
					<div class="col-md-4">						
						<div class="panel panel-default" style="margin-left: 10px" >
							<div class="panel-heading font-demo-heading" id="panel-demo" style="padding: 10px 0% 5px 37%">
								Demo
							</div>
 							<div class="panel-body" style="height: 160px;">
							    <ul>
							    	<li>10 dias de acesso</li>
							    	
							    </ul>
							</div>
							<div class="panel-footer">
							    <a href="cadastro-demo.php" class="btn btn-lg btn-custom" id='botao-assinar-demo'>Testar</a>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="panel panel-default" >
							<div class="panel-heading font-demo-heading" id="panel-basic" style="padding: 0px 0% 0px 33%; color: white">
								Básico
							</div>
 							<div class="panel-body">
							    <ul>
							    	<li>teste</li>
							    	<li>teste</li>
							    	<li>teste</li>
							    	<li>teste</li>
							    	<li>teste</li>
							    	<li>teste</li>
							    </ul>
							</div>
							<div class="panel-footer">
							    <a href="#" class="btn btn-lg btn-custom" id='botao-assinar'>Assinar</a>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="panel panel-default" style="margin-right: 10px" >
							<div class="panel-heading font-demo-heading" id="panel-premium" style="padding: 0px 0% 0px 25%; color: white">
								Premium
							</div>
 							<div class="panel-body">
							      <ul>
							    	<li>teste</li>
							    	<li>teste</li>
							    	<li>teste</li>
							    	<li>teste</li>
							    	<li>teste</li>
							    	<li>teste</li>
							    </ul>
							</div>
							<div class="panel-footer">
							    <a href="#" class="btn btn-lg btn-custom" id='botao-assinar'>Assinar</a>
							</div>
						</div>						
					</div>		
				</div>				
			</div><!-- /PLANOS -->
		</section>	


		<div class="container" id="sobre">
			
				<div class="row">
					<div class="col-md-12">
						<span class="sobreSystraders">Sobre o Sys Traders</span>
					</div>
				</div>
				
				<p>Sabemos que operar no Mercado Financeiro não é uma tarefa simples. Milhões de investidores e Day Traders perdem fortunas todos os anos
				por inexperiência ou pura falta de informações</p>
				<p>Essa falta de informação muitas vezes se resume a ausência de uma ferramenta que lhe permita enxergar os seus melhores e piores momentos, em quais stocks
				ele se dá melhor, qual é o período do dia onde ele obtém os melhores resultados, quais os meses do ano ele teve seus melhores desempenhos, entre outras informações
				importântes para o profissional que atua ou deseja atuar no mercado financeiro.</p>
				<p>O Sys Trader é uma ferramenta indispensável para você, trader proffisional, que deseja operar na Market americana.
				Sim, estamos falando da NASDAQ, DOW JONES E S&amp;P500!!! </p>
				<p>Com ele você obterá a melhor performance com relatórios diversos, gráficos e o histórico das suas operações, tendo assim
				todos os parâmetros necessários para fazer uma avaliação precisa do seu desempenho e conseguirá ver exatamente onde precisa melhorar.</p>

				<p>O sistema dispõe de uma rede social, onde você poderá compartilhar seus resultados quando e se desejar, e ainda poderá ter o auxilio 
				de seu mentor ou do seu grupo de amigos, permitindo que compartilhem informações sobre Stocks ou movimentações do mercado.</p>

				<p>Venha fazer parte do seleto mercado americano com o maior número de informações possíveis.</p>
			
		</div>

		<!-- DEPOIMENTOS -->

		
			<div class="container">			
				<div class="row div_depoimentos">
					
					<div class="col-md-12" style="padding-left: 500px;">
						<h2>Depoimentos</h2>
					</div>
					
					<div class="col-md-3">
						<div class="panel panel-default" style="margin-left: 10px" >
							<div class="panel-heading" style="padding: 10px 0% 5px 37%">
								Depoimento 1
							</div>
 							<div class="panel-body" style="height: 160px;">
							    <ul>
							    	<li>Depoimento</li>
							    	
							    </ul>
							</div>							
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-default" style="margin-left: 10px" >
							<div class="panel-heading" style="padding: 10px 0% 5px 37%">
								Depoimento 2
							</div>
 							<div class="panel-body" style="height: 160px;">
							    <ul>
							    	<li>Depoimento</li>
							    	
							    </ul>
							</div>							
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-default" style="margin-left: 10px" >
							<div class="panel-heading" style="padding: 10px 0% 5px 37%">
								Depoimento 3
							</div>
 							<div class="panel-body" style="height: 160px;">
							    <ul>
							    	<li>Depoimento</li>
							    	
							    </ul>
							</div>							
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-default" style="margin-left: 10px" >
							<div class="panel-heading" style="padding: 10px 0% 5px 37%">
								Depoimento 4
							</div>
 							<div class="panel-body" style="height: 160px;">
							    <ul>
							    	<li>Depoimento</li>
							    	
							    </ul>
							</div>							
						</div>
					</div>					
				</div>				
			</div>


		
		
		<footer id="rodape" >
			<div class="container" id="" >
				<h4 style="color: white">RODAPÉ</h2>	

			</div>
			
		</footer>
		


		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
