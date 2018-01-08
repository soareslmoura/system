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
        <form class="form-group" role="form" action="/master/cupom/create-multi" method="post">
          
          
                  <h3>Detalhes do Cupom</h3>       
               
                  <div class="box-body">
                    <div class="form-group">
                      <?php if( $cupom["used_Cupom"] == false ){ ?> 
                      <div class="panel panel-success">
                        <?php }else{ ?>
                      <div class="panel panel-warning">
                        <?php } ?>
                        <div class="panel-heading">TIPO DE CUPOM: <?php if( $cupom["tipo_Cupom"] == 'multiplo' ){ ?>
                        Múltiplo <?php }else{ ?> Individual <?php } ?> &nbsp;&nbsp;&nbsp;&nbsp; NRº: <?php echo htmlspecialchars( $cupom["cod_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </div>
                        <div class="panel-body">
                            <table class="table table-bordered" style="width: 500px">
                              <tbody>
                                <tr>
                                  <th>Categoria:</th>
                                  <th><?php if( $cupom["categoria_Cupom"] == 'D' ){ ?>Desconto <?php }else{ ?> Gratuidade em Demo <?php } ?></th> 
                                </tr>                                                           
                                <tr>                 
                                  <th>Validade do Cupom:</td>
                                  <th><?php echo htmlspecialchars( $cupom["validade_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php if( $date < $cupom["validade_Cupom"]  ){ ?> <?php }else{ ?> <span class="label label-danger">VENCIDO</span> <?php } ?></td>                                  
                                </tr>                              
                                <tr>
                                  <th>E-mail do Beneficiado:</th>
                                  <th><?php echo htmlspecialchars( $cupom["email_cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th> 
                                </tr>                                                          
                                <tr>                 
                                  <td>Celular do Beneficiado:</td>
                                  <td><?php echo htmlspecialchars( $cupom["cel_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>                                  
                                </tr> 
                                <tr>
                                  <th>Quatidade de Cupons Disponíveis</th>
                                  <th><?php echo htmlspecialchars( $cupom["qtde_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th> 
                                </tr>                                                          
                                <tr>                 
                                  <td>Tempo do Benefício (dias):</td>
                                  <td><?php echo htmlspecialchars( $cupom["dias_desc_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>                                  
                                </tr>
                           
                                <tr>
                                  <th>% de Desconto:</th>
                                  <th><?php echo htmlspecialchars( $cupom["desconto_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th> 
                                </tr>                                                          
                                <tr>                 
                                  <td>Justificativa:</td>
                                  <td><?php echo htmlspecialchars( $cupom["justify_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>                                  
                                </tr>  
                                <tr>                 
                                  <td>Criado por:</td>
                                  <td><?php echo htmlspecialchars( $adm["nome_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>                                  
                                </tr>
                                <tr>                 
                                  <td>Já Utilizado?</td>
                                  <td><?php if( $cupom["used_Cupom"] == 0 ){ ?> <span class="label label-danger">Ainda não utilizado</span> <?php }else{ ?> <span class="label label-success">Utilizado</span> <?php } ?></td>                                  
                                </tr>  
                                                         
                              </tbody>
                            </table>

                    </div>                     
                  </div>                
                  <!-- /.box-body --> 
              
            <div class="box-footer">
              <button type="button" class="btn btn-danger">Excluir Cupom</button>
            </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->