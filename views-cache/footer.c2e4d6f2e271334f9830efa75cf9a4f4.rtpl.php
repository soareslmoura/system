<?php if(!class_exists('Rain\Tpl')){exit;}?>                <div class="col-lg-4"> <!-- PAINEIS LATERAIS DE CHAT E NOTIFICAÇÃO -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Calculadora de Shares
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <div class="form-group">
                                <label for="stop" class="col-sm-2 control-label">Entrada</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control money" id="entrada" placeholder="Entrada">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="stop" class="col-sm-2 control-label">Stop</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control money" id="stoplimit" placeholder="Stop">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Risco</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control money" id="maxrisco" placeholder="Risco">
                                </div>
                              </div>                          
                            </form>
                            <div id="objetivo"></div>
                            <div id="qtdshares"></div>
                            <div id="parcial1"></div>
                            <div id="parcial2"></div>
                            <div id="parcial3"></div>
                            <!-- /.list-group -->                          
                            
                            <button href="#" class="btn btn-success btn-block" id="calcshares">Calcular Shares </button>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i> Chat
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-refresh fa-fw"></i> Atualizar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-check-circle fa-fw"></i> Disponível
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-times fa-fw"></i> Ocupado
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-clock-o fa-fw"></i> Ausente
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-sign-out fa-fw"></i> Sair
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> há 1 min
                                            </small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> há 1 min</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> há 2     min</small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> há 3 min</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Escreva sua mensagem..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-success btn-sm" id="btn-chat">
                                        Enviar
                                    </button>
                                </span>
                            </div>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/vendor/raphael/raphael.min.js"></script>
   

    <!-- Custom Theme JavaScript -->
    <script src="/js/scripts.js"></script>
    <script src="/dist/js/sb-admin-2.js"></script>

        <!-- inputMask 4 -->
    <script src="/vendor/inputmask-4.x/js/inputmask.js"></script>
    <script src="/vendor/maskmoney/dist/jquery.maskMoney.min.js"></script>



    <script>

        $(function(){
            $(".money").maskMoney({
                     decimal: ".",
                     thousands: ","
                    });

        });


        $(function(){

            $("#objetivo").hide();
            $("#qtdshares").hide();
            $("#parcial1").hide();
            $("#parcial2").hide();
            $("#parcial3").hide();

            $("#calcshares").click(function(){
                var dif = 0;
                var risco = parseFloat($("#maxrisco").val());
                var stop = parseFloat($("#stoplimit").val()); 
                var entrada = parseFloat($("#entrada").val());
                var shares = 0;
                var parcial1 = 0;
                var parcial2 = 0;
                var parcial3 = 0; 
               
                if(entrada > stop)
                {
                    dif = parseFloat(entrada) - parseFloat(stop);
                    target = entrada + dif;
                } else
                {
                    dif = parseFloat(stop) - parseFloat(entrada);
                    target = entrada - dif;
                }            
                
                shares = Math.ceil(risco/dif);
                parcial1 = Math.ceil(shares*0.7);
                parcial2 = Math.ceil(parcial1*0.7);
               parcial3 = Math.ceil(parcial2*0.7);

                if(shares != 0)
                {
                  $("#objetivo").show();  
                  $("#qtdshares").show();  
                  $("#parcial1").show();  
                  $("#parcial2").show();  
                  $("#parcial3").show(); 

                  $("#objetivo").html("Seu Objetivo é: "+target);
                  $("#qtdshares").html("Qtde de Shares é: "+shares);
                  $("#parcial1").html("Parcial 1: "+parcial1);
                  $("#parcial2").html("Parcial 2: "+parcial2);
                  $("#parcial3").html("Parcial 3: "+parcial3);
                }

            }); 
          
        });

         
  

        $(function(){

            $('#share').hide();
            $('#ticket').hide();
              
              $('#porshare').click(function(e) {
                $('#share').show();
                $('#ticket').hide();        
              });
              $('#porticket').click(function(e) {
                $('#share').hide();
                $('#ticket').show();        
              });
          });

        $(function($){  
           $("#user_cel").mask("(99) 99999-9999");
           $("#user_cep").mask("99.999-999");
      
        });



        
        var ctx = document.getElementById("Chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',    
            data: {
                labels: ["JAN", "FEV", "MAR", "ABR", "MAI", "JUN", "JUL", "AGO", "SET", "OUT", "NOV", "DEZ"],
                datasets: [{
                    label: 'Total P/L',
                    data: [125, 132, -78, 18, 26, 140, 125, 139, 98, 56, 79, 174],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.0)',          
                       
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)'
                        
                    ],
                    borderWidth: 2,
                    tension: 0.06
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true

                        }
                    }]
                }

            }
    
        });
</script>

</body>
