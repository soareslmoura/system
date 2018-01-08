<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cupons de Desconto ou Gratuidade
  </h1>  
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
            
            <div class="box-header">
              <a href="/master/cupom/create-personal" class="btn btn-success">Novo Cupom Individual</a>
              <a href="/master/cupom/create-multi" class="btn btn-success">Novo Cupom em Lote</a>
            </div>

            <div class="box-body no-padding">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="130px" style=" text-align: center;">Cupom</th>
                    <th width="100px" style=" text-align: center;">Tipo</th>
                    <th width="80px" style=" text-align: center;">Categoria</th>
                    <th width="40px"  style=" text-align: center;">Desconto</th>
                    <th width="115px" style=" text-align: center;">Tempo de Benefício</th>
                    <th width="150px" style=" text-align: center;">E-mail</th>
                    <th width="110px" style=" text-align: center;">Gerado por</th>
                    <th width="90px" style=" text-align: center;">Utilizado</th>
                    <th style="width: 120px; text-align: center;">Validade</th>
                    <th style="width: 200px; text-align: center;">Admin</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($cupons) && ( is_array($cupons) || $cupons instanceof Traversable ) && sizeof($cupons) ) foreach( $cupons as $key1 => $value1 ){ $counter1++; ?>
                  <tr>                 
                    <td><?php echo htmlspecialchars( $value1["cod_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["tipo_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["categoria_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php if( $value1["desconto_Cupom"] == '' ){ ?> --- <?php }else{ ?><?php echo htmlspecialchars( $value1["desconto_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?></td/>
                    <td><?php echo htmlspecialchars( $value1["dias_desc_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    <td><?php echo htmlspecialchars( $value1["email_cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    <td><?php echo htmlspecialchars( $adm["nome_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    <td><?php if( $value1["used_Cupom"] == 1 ){ ?>Sim<?php }else{ ?>Não<?php } ?></td/>
                    <td><?php echo htmlspecialchars( $value1["validade_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    
                    <td style=" text-align: center;">
                      <a href="/master/cupom/<?php echo htmlspecialchars( $value1["id_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success btn-xs"><i class="fa fa-search"></i> DETALHES</a>
                      <a href="/master/cupom/<?php echo htmlspecialchars( $value1["id_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> EXCLUIR</a>
                      <a href="/master/cupom/<?php echo htmlspecialchars( $value1["id_Cupom"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/del" onclick="return confirm('Deseja realmente excluir este cupom?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->