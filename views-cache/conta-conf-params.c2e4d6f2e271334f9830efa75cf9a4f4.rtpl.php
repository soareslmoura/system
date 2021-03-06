<?php if(!class_exists('Rain\Tpl')){exit;}?> <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Parâmetros da Conta</h1>
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
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#deposit">
                                Fazer Depósito
                            </button>
                            <button type="button" class="btn btn-warning btn" data-toggle="modal" data-target="#retire">
                                Fazer Retirada
                            </button>
                        </div>                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form>
                                        <div class="form-group">                                        
                                            <label>Saldo em Conta (USD) </label>
                                            <input type="text" class="form-control money" id="moneytax" name="saldo" disabled="" value="<?php echo htmlspecialchars( $saldo["valor_saldo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        </div>
                                        <div class="form-group">                                        
                                            <label>Crescimento Diário (%) </label>
                                            <input type="text" class="form-control" id="moneytax" name="grown" value="<?php echo htmlspecialchars( $params["grown_contaparam"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-success">Confirmar</button>
                                        </div>
                                    </form>

    <!-- ###################################################  MODAL DEPOSITO ################################################ -->
                                    <form method="post" action="/system/conta-conf-params/deposit">
                                        <div class="modal fade" id="deposit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Novo Depósito</h4>
                                              </div>
                                              <div class="modal-body">
                                                <div class="form-group">                                        
                                                    <label>Valor do Depósito (USD)</label>
                                                    <input type="text" class="form-control money" id="moneytax" name="valor">
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-success">Confirmar</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </form>    
    <!-- ###################################################  MODAL RETIRADA ################################################ -->
                                    <form method="post" action="/system/conta-conf-params/withdraw">
                                        <div class="modal fade" id="retire" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Retirada de Valores</h4>
                                              </div>
                                              <div class="modal-body">
                                                <div class="form-group">                                        
                                                    <label>Valor do Saque (USD)</label>
                                                    <input type="text" class="form-control money" id="moneytax" name="valor">
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-success">Confirmar</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
