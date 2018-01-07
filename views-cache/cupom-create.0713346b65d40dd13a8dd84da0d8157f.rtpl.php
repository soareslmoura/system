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
        <form class="form-group" role="form" action="/master/cupom/create" method="post">
          <label>Escolha o tipo de Cupom</label>
            <div class="radiotipo form-group">              
              <label>
                <input type="radio" name="tipocupom" id="geral" value="geral">
                Geral
              </label>
              &nbsp &nbsp
              <label>
                <input type="radio" name="tipocupom" id="individual" value="individual">
                Individual
              </label>
            </div>
          <!-- ################################################################################################################### -->
              <div id="divgeral">
                  <h3>Múltiplos Cupons</h3>       
               
                  <div class="box-body">
                    <div class="form-group">
                      <label for="qtdecupons">Quatidade de Cupons</label>
                        <div class='input-group date'>
                          <input type="number" class="form-control" id="qtdecupons" name="qtdecuponsgeral" max="100" required placeholder="Máximo 100" min="0" />                          
                       </div>
                    </div>                    
                    <div class="form-group">
                      <label for="validadegeral">Validade</label>
                        <div class='input-group date'>
                          <input type='text' class="form-control" id="validadegeral" name="validadegeral" required />
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                       </div>
                    </div>
                    <div class="form-group">
                      <label for="user_name">Tipo</label>
                      <div class="radiotipo">              
                        <label>
                          <input type="radio" name="categoriacupomgeral" id="D" value="D">
                          Desconto
                        </label>
                        &nbsp &nbsp
                        <label>
                          <input type="radio" name="categoriacupomgeral" id="G" value="G">
                          Gratuito
                        </label>
                      </div>
                    </div> 
                    <div id="divG">                               
                      <div class="form-group" id="demo">
                        <label for="diasdemogeral">Duração do período de DEMO</label>
                          <select class="form-control" id="diasdemogeral" name="diasdemogeral">
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
                    <div id="divD">
                      <div class="form-group" id="descontogeral">
                        <label for="descontogeral">Percentural de Desconto</label>
                          <select class="form-control" id="descontogeral" name="descontogeral">                                
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
                      <div class="form-group" id="duracaodescontogeral">
                        <label for="duracaodescontogeral">Meses de Desconto</label>
                          <select class="form-control" id="duracaodescontogeral" name="duracaodescontogeral">                                
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
              </div>
            <!-- ################################################################################################################### -->
              <div id="divindividual">
                <h3>Único Cupom</h3>
                <div class="box-body">
                  <div class="form-group">
                    <label for="validadeindividual">Validade</label>
                      <div class='input-group date'>
                        <input type='text' class="form-control" id="validadeindividual" name="validadeindividual" required />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                     </div>
                  </div>
                  <div class="form-group">
                      <label for="email">E-mail do Beneficiado</label>
                        <div class='input-group'>
                          <input type="email" class="form-control" id="email" name="emailindividual"  required placeholder="e-mail"/>                        
                       </div>
                    </div>
                    <div class="form-group">
                      <label for="categoriacupomindividual">Tipo</label>
                      <div class="radiotipo">              
                        <label>
                          <input type="radio" name="categoriacupomindividual" id="Dindividual" value="D">
                          Desconto
                        </label>
                        &nbsp &nbsp
                        <label>
                          <input type="radio" name="categoriacupomindividual" id="Gindividual" value="G">
                          Gratuito
                        </label>
                      </div>
                    </div> 
                    <div id="divGindividual">                               
                      <div class="form-group" id="diasdemoindividual">
                        <label for="diasdemoindividual">Duração do período de DEMO</label>
                          <select class="form-control" id="diasdemoindividual" name="diasdemoindividual">                                
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
                          <select class="form-control" id="descontoindividual" name="descontoindividual">                                
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
                          <select class="form-control" id="duracaodescontoindividual" name="duracaodescontoindividual">                                
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
              </div>
              <div class="form-group">
                      <label for="user_justify_individual">Justificativa</label>
                      <textarea  maxlength="280" style="resize: none" class="form-control" rows="3" id="user_justify" name="user_justify" placeholder="Explique brevemente o motivo da criação do Cupom."></textarea>
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