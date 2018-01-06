<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="overflow: hidden;">
<!-- Content Header (Page header) -->


<!-- Main content -->
<section class="content">

  <section id="cadastro-demo" >
      <div class="container" style="padding: 100px; width: 80%; color: white" >       
          <div class="col-md-6">
            <h2>Porque o Sys Traders?</h2>

            <h3>Perfomance</h3>
                  <p>Tenha total controle de suas operações. Isso vai permitir alcançar resultados cada vez melhores.</p>

                  <h3>Controle</h3>
                  <p>Relatórios detalhados de suas trades, de acordo com as suas necessidades.</p>

                  <h3>Custo x Benefício</h3>
                  <p>Tenha o melhor por menos. O Sys Traders é a mais completa e barata ferramenta do genero disponível.</p>
            
          </div>
          <div class="col-md-6">



            <form id="formDemo" method="post">
              <h3>Inicie seu teste agora mesmo!</h3>
              <div class="form-group">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="required">
              </div>

              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required="required">          
              </div> 
              <div class="form-group">
                <input type="text" class="form-control" id="cel" name="cel" placeholder="Celular" required="required">          
              </div>          
              <div class="form-group">
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="required">
              </div>
              <div>
                <strong>Possui Cupom?</strong>
                <input type="text" class="form-control" id="cupom" name="cupom" placeholder="Codigo">
               </div>
               <br/>
              <input type="hidden" name="level" value="1">
              <button type="submit" class="btn btn-primary form-control" style="margin-bottom: 10px">Iniciar período de teste</button>
                            
            </form> 
                        <div id="mensagem" class="panel panel-default" style="display:none">
                             
                        </div>
          </div>  

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div style="margin-bottom: 78px"></div>