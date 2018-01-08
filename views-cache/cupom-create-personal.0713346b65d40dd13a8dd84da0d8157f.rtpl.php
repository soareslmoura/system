<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Criar novo Cupom
  </h1>
  
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Cupom</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="/master/cupom/create-personal" method="post">
        <input type="hidden" name="tipocupom" value="individual"> 
                <div class="box-body">
                  <div class="form-group">
                    <label for="validadeindividual">Validade</label>
                      <div class='input-group date'>
                        <input type='text' class="form-control" id="validadeindividual" name="validade" required />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                     </div>
                  </div>
                  <div class="form-group">
                      <label for="email">E-mail do Beneficiado</label>
                        <div class='input-group'>
                          <input type="email" class="form-control" id="email" name="email"  required placeholder="e-mail"/>                        
                       </div>
                  </div>
                  <div class="form-group">
                      <label for="email">Celular do Beneficiado</label>
                        <div class='input-group'>
                          <input type="text" class="form-control" id="user_cel" name="cel"  required placeholder="Celular"/>                       
                       </div>
                  </div>
                  <div class="form-group">
                    <label for="categoriacupomindividual">Tipo</label>
                    <div class="radiotipo">              
                      <label>
                        <input type="radio" name="categoriacupom" id="Dindividual" value="D">
                        Desconto
                      </label>
                      &nbsp &nbsp
                      <label>
                        <input type="radio" name="categoriacupom" id="Gindividual" value="G">
                        Gratuito
                      </label>
                    </div>
                  </div> 
                    <div id="divGindividual">                               
                      <div class="form-group" id="diasdemoindividual">
                        <label for="diasdemoindividual">Duração do período de DEMO</label>
                          <select class="form-control" id="diasdemoindividual" name="diasdemo">                                
                            <option value=''></option>
                            <option value='14'>14 dias</option>
                            <option value='30'>1 mês</option>
                            <option value='61'>2 mêses</option>
                            <option value='91'>3 meses</option>
                            <option value='182'>6 meses</option>
                            <option value='365'>1 ano</option>     
                          </select>            
                      </div>
                    </div>
                    <div id="divDindividual">
                      <div class="form-group" id="descontoindividual">
                        <label for="descontoindividual">Percentural de Desconto</label>
                          <select class="form-control" id="descontoindividual" name="desconto">                                
                            <option value=''></option>
                            <option value='5'>5%</option>
                            <option value='10'>10%</option>
                            <option value='15'>15%</option>
                            <option value='20'>20%</option>
                            <option value='25'>25%</option>
                            <option value='30'>30%</option>     
                            <option value='35'>35%</option>     
                            <option value='40'>40%</option>     
                            <option value='50'>50%</option>     
                            <option value='60'>60%</option>     
                            <option value='70'>70%</option>     
                          </select>            
                      </div>

                      <div class="form-group" id="demo">
                        <label for="user_tipoconta">Meses de Desconto</label>
                          <select class="form-control" id="duracaodescontoindividual" name="duracaodesconto">                                
                            <option value=''></option>
                            <option value='30'>1 Mês</option>
                            <option value='60'>2 Meses</option>
                            <option value='90'>3 Meses</option>
                            <option value='120'>4 Meses</option>
                            <option value='150'>5 Meses</option>
                            <option value='180'>6 Meses</option>     
                            <option value='365'>1 Ano</option>
                          </select>            
                      </div>
                  </div>                    
                </div>
                <!-- /.box-body --> 
        
              <div class="form-group">
                      <label for="user_justify_individual">Justificativa</label>
                      <textarea  maxlength="280" style="resize: none" class="form-control" rows="3" id="user_justify_individual" name="user_justify" placeholder="Explique brevemente o motivo da criação do Cupom." required=""></textarea>
                    </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-success">Gerar Cupom</button>
            </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->