<?php if(!class_exists('Rain\Tpl')){exit;}?> <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Trades</h1>
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
                                  <!--  CORPO DA PAGINA  -->
                                    

                                        <div class="box box-primary">
            
                                          <div class="box-header">
                                            <button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#tradeexternal">
                                                Nova Trade Arquivo Externo
                                            </button>
                                            <button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#trademanual">
                                                Nova Trade Manual
                                            </button>
                                          </div>

                                          <div class="box-body no-padding">
                                            <table class="table table-striped ">
                                              <thead>
                                                <tr>
                                                  <th width="170px">Data</th>
                                                  <th width="100px">Stock</th>
                                                  <th width="40px">Shares</th>
                                                  <th width="115px">Posição</th>
                                                  <th width="110px">Entrada</th>
                                                  <th width="110px">Saída</th>
                                                  <th width="110px">P/L</th>
                                                  <th style="width: 250px; text-align: center;">Admin</th>
                                                  
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php $totalpl = 0; ?>
                                                <?php $counter1=-1;  if( isset($trades) && ( is_array($trades) || $trades instanceof Traversable ) && sizeof($trades) ) foreach( $trades as $key1 => $value1 ){ $counter1++; ?>
                                                
                                                <tr>                 
                                                  <td><?php echo htmlspecialchars( $value1["data_trade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                  <td><?php echo htmlspecialchars( $value1["stock"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                  <td><?php echo htmlspecialchars( $value1["qtd_shares"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                                                  <td><?php echo htmlspecialchars( $value1["posicao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                                                  <td><?php echo htmlspecialchars( $value1["valor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                                                  <td>X</td/>
                                                  <td><?php echo htmlspecialchars( $value1["PLtrade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                                                  <?php $totalpl = $totalpl + $value1["PLtrade"]; ?>                                                  
                                                  <td style=" text-align: center;">
                                                    <a href="/master/users/#" class="btn btn-success btn-xs"><i class="fa fa-search"></i> DETALHES</a>
                                                    <a href="/master/users/#" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                                                    <a href="/master/users/#/del" onclick="return confirm('Deseja realmente excluir este usuário?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                                                  </td>
                                                </tr>
                                                {function="getTradeDate($value.id_conta,$value.dateOperationSimple)" }
                                                
                                                  <tr>                 
                                                  <td>TOTAL</td>
                                                  <td></td>
                                                  <td></td/>
                                                  <td></td/>
                                                  <td></td/>
                                                  <td></td/>
                                                  <td></td/>
                                                  <td></td/>
                                                </tr> 
                                                <?php $totalpl = 0; ?> 
                                               
                                                <?php } ?>                                           
                                              </tbody>
                                            </table>
                                          </div>
                                          <!-- /.box-body -->
                                        </div>

                                          <!--  MODAL NOVA TRADE ARQUIVO EXTERNO  -->
                                    <form method="post" action="/system/trade" enctype="multipart/form-data">
                                      <input type="hidden" name="iduser" value="<?php echo htmlspecialchars( $iduser, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        <div class="modal fade" id="tradeexternal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Novo Trade Externa</h4>
                                              </div>
                                              <div class="modal-body">
                                                <div class="form-group">
                                                  <label for="exampleInputFile">Arquivo .CSV</label>
                                                  <input type="file" id="exampleInputFile" name="arquivo">                                                 
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-success">Confirmar</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </form>  
                                          <!--  MODAL NOVA TRADE MANUAL  -->
                                        <form method="post" action="/system/trade">
                                        <div class="modal fade" id="trademanual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Novo Trade Lançamento Manual</h4>
                                              </div>
                                              <div class="modal-body">
                                                <div class="form-group">
                                                  <label for="exampleInputFile">Arquivo .CSV</label>
                                                  <input type="file" id="exampleInputFile" name="arquivo">                                                 
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-success">Confirmar</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </form>    






                                <!--  FIM CORPO DA PAGINA  -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

