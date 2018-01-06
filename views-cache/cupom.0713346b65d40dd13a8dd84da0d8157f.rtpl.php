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
              <a href="/master/users/create" class="btn btn-success">Cadastrar Novo Cupom</a>
            </div>

            <div class="box-body no-padding">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="150px" style=" text-align: center;">Cupom</th>
                    <th width="100px" style=" text-align: center;">Tipo</th>
                    <th width="40px"  style=" text-align: center;">Desconto</th>
                    <th width="115px" style=" text-align: center;">Período</th>
                    <th width="200px" style=" text-align: center;">E-mail</th>
                    <th width="110px" style=" text-align: center;">Usuário</th>
                    <th width="110px" style=" text-align: center;">Utilizado</th>
                    <th style="width: 150px; text-align: center;">Admin</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                  <tr>                 
                    <td><?php echo htmlspecialchars( $value1["nome_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["email_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["tipo_conta"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    <td><?php echo htmlspecialchars( $value1["cel_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    <td><?php echo htmlspecialchars( $value1["data_Inicio_Conta"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    <td><?php echo htmlspecialchars( $value1["validade_Conta"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    
                    <td style=" text-align: center;">
                      <a href="/master/users/<?php echo htmlspecialchars( $value1["id_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success btn-xs"><i class="fa fa-search"></i> DETALHES</a>
                      <a href="/master/users/<?php echo htmlspecialchars( $value1["id_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> EXCLUIR</a>
                      <a href="/master/users/<?php echo htmlspecialchars( $value1["id_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/del" onclick="return confirm('Deseja realmente excluir este cupom?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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