<?php if(!class_exists('Rain\Tpl')){exit;}?> <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Configurações da Conta</h1>
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
                                  <div class="panel panel-primary">
                                    <div class="panel-heading"><?php echo htmlspecialchars( $nome, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
                                    <div class="panel-body">
                                      <table class="table">
                                        <tr >
                                          <td>Corretora</td>
                                          <td><?php echo htmlspecialchars( $data["nome_corretora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                        </tr>
                                        <tr >
                                          <td>Tipo de Comissão</td>
                                          <td><?php if( $data["type_comission"] == 'S' ){ ?> Por Share <?php }else{ ?> Por Ticket <?php } ?></td>
                                        </tr>
                                        <tr >
                                          <td>Valor da Comissão</td>
                                          <td><?php echo htmlspecialchars( $data["value_comission"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                        </tr>
                                      </table>
                                  </div>
                                  <div class="panel-footer">
                                    <div class="btn-group " role="group" aria-label="...">
                                      <a href="/system/conta-conf-broker" class="btn btn-primary">Configurar Corretora</a>
                                      <a href="#" class="btn btn-primary">Configurar Cobrança</a>
                                      <a href="#" class="btn btn-primary">Ver Extrato</a>                         
                                    </div>
                                  </div>
                                  </div> 



                                
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
