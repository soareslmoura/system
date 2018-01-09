<?php if(!class_exists('Rain\Tpl')){exit;}?> <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Configurações da Conta - Corretora</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
               <!-- CODIGO -->
                
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">                    
                    <div class="panel panel-default">                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                  <form role="form" action="/master/users/create" method="post">
                                   
                                      <div class="form-group">                                        
                                        <label>Corretora</label>
                                          <select class="form-control">
                                            <option>Colmex</option>
                                            <option>Lightspeed</option>
                                            <option>Cobra</option>
                                            <option>SpeedTrader</option>
                                            <option>Ninja Trader</option>
                                          </select>
                                      </div>
                                      <div>  
                                        <label>Tipo de Comissão</label>                                    
                                        <div class="radio" class="form-control">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="porshare" value="option1" >
                                            Por Share
                                          </label>
                                        </div>
                                        <div class="radio" class="form-control">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="porticket" value="option2">
                                            Por Ticket
                                          </label>
                                        </div>
                                      </div>

                                      <div id="share">
                                        <div class="form-group">                                        
                                          <label>Valor de comissão /Share (USD)</label>
                                            <input type="text" class="form-control money" id="moneycomission" name="">
                                        </div>
                                        <div class="form-group">                                        
                                          <label>Valor de Taxas (USD)</label>
                                            <input type="text" class="form-control money" id="moneytax" name="">
                                        </div>
                                        <div class="box-footer">
                                         <button type="submit" class="btn btn-success">Confirmar</button>
                                        </div>
                                      </div>                                
                                    

                                      <div id="ticket">
                                        <div class="form-group">                                        
                                          <label>Valor de comissão por Ticket (USD)</label>
                                            <input type="text" class="form-control money" name="" data-toggle="tooltip" data-placement="top" title="É cobrado por operação. Uma entrada é um ticket e uma saída outro ticket">
                                        </div>
                                        <div class="form-group">                                        
                                          <label>Valor de Taxas (USD)</label>
                                            <input type="text" class="form-control money" name="">
                                        </div>
                                        <div class="box-footer">
                                         <button type="submit" class="btn btn-success">Confirmar</button>
                                        </div>
                                      </div>

                                      
                                  </form>  



                                
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
