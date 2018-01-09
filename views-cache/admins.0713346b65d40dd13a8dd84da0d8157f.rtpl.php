<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Usuários
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/users">Usuários</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/master/admin/adm-create" class="btn btn-success">Criar Administrador</a>
            </div>
            <div id="alert"></div>
            <div class="box-body no-padding">
              <table class="table table-striped ">
                <thead>
                  <tr>
                    <th width="170px">Nome</th>
                    <th width="100px">E-mail</th>
                    <th width="40px">Level</th>
                    <th width="115px">celular</th>
                    <th width="110px">Data Cadastro</th>
                    <th width="110px">Status</th>
                    <th style="width: 250px; text-align: center;">Admin</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($admins) && ( is_array($admins) || $admins instanceof Traversable ) && sizeof($admins) ) foreach( $admins as $key1 => $value1 ){ $counter1++; ?>
                  <tr>                 
                    <td><?php echo htmlspecialchars( $value1["nome_useradm"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["email_useradm"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desc_admLevel"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    <td><?php echo htmlspecialchars( $value1["celular_useradm"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    <td><?php echo htmlspecialchars( $value1["datacreate_useradm"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    <td><?php echo htmlspecialchars( $value1["status_useradm"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    
                    <td style=" text-align: center;">
                      <a href="/master/admin/admins/<?php echo htmlspecialchars( $value1["id_useradm"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="/master/admin/admins/<?php echo htmlspecialchars( $value1["id_useradm"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/del/act" onclick="return confirm('Deseja realmente excluir este usuário?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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