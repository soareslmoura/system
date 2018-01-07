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
              <a href="/master/users/create" class="btn btn-success">Cadastrar Usuário</a>
            </div>

            <div class="box-body no-padding">
              <table class="table table-striped ">
                <thead>
                  <tr>
                    <th width="170px">Nome</th>
                    <th width="100px">E-mail</th>
                    <th width="40px">Conta</th>
                    <th width="115px">celular</th>
                    <th width="110px">Data Cadastro</th>
                    <th width="110px">Validade Conta</th>
                    <th style="width: 250px; text-align: center;">Admin</th>
                    
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
                      <a href="/master/users/<?php echo htmlspecialchars( $value1["id_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="/master/users/<?php echo htmlspecialchars( $value1["id_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/del" onclick="return confirm('Deseja realmente excluir este usuário?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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