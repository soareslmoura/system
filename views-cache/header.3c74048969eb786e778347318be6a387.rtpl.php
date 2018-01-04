<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sys Traders - Sua plataforma Trader</title>
		<link rel="icon" href="/res/images/sysImages/favicon.png">

		<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.css">		
		<link rel="stylesheet" type="text/css" href="/dist/css/estilos.css">	
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->

	    <style type="text/css">
	    	
	    	#sobre
	    	{
				background: url('/res/images/sysImages/candles.jpg') no-repeat;
				padding-top: 5px;
				padding-bottom: 20px;
				color: white;
				font-weight: 500;				
			}

			body
			{		
				background: url('/res/images/sysImages/fundo.jpg');
				background-attachment: fixed;
				font-family: Helvetica,Arial,sans-serif;
				
			}

	    </style>

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
						<li class="dropdown &lt;?php 
                                                if(($erro==1) || ($erro==2))
                                                {
                                                    echo 'open';        
                                                }
                                                
                                                 
                                   
                                   
                                                ?&gt;">
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
									<button type="submit" class="btn btn-primary btn-block" id="btn-entrar">Entrar</button>
								</div>
								<br/>
								
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
			         <img src="/res/images/sysImages/bull.jpg" alt="Bull" style="width:100%;" class="img-responsive">	
			         <div class="carousel-caption">
			         	<div class='slide-bull'>
					        <h2 class="font-slideshow">Sua plataforma de controle diário</h2>
					        <h5>Potencialize seus resultados tendo total controle de suas operações</h5>
					        <a href="#" class="btn btn-custom btn-conheca-plano btn-lg">Assine o Premium agora mesmo</a>					        
				  		</div>
     				 </div>	         
			      </div>  <!-- /1 Item -->   
			    
			      <div class="item"><!-- 2 Item -->
			        	<img src="/res/images/sysImages/img1.jpg" alt="sys1" style="width:100%;" class="img-responsive">
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