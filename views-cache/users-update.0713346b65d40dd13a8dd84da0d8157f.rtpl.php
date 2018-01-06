<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Alterar dados do Usuário
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Usuário</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/master/users/<?php echo htmlspecialchars( $user["id_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="user_name">Nome</label>
              <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $user["nome_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="user_email">Email</label>
              <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Digite o email" value="<?php echo htmlspecialchars( $user["email_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="user_cel">Celular</label>
              <input type="tel" class="form-control" id="user_cel" name="user_cel" placeholder="Digite o celular" value="<?php echo htmlspecialchars( $user["cel_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="user_end">Endereço</label>
              <input type="text" class="form-control" id="user_end" name="user_end" placeholder="Digite o endereço" value="<?php echo htmlspecialchars( $user["address_logradouro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="user_number">Número</label>
              <input type="text" class="form-control" id="user_number" name="user_number" placeholder="Digite o numero" value="<?php echo htmlspecialchars( $user["address_numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="user_city">Cidade</label>
              <input type="text" class="form-control" id="user_city" name="user_city" placeholder="Digite a cidade" value="<?php echo htmlspecialchars( $user["address_cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="user_neig">Bairro</label>
              <input type="text" class="form-control" id="user_neig" name="user_neig" placeholder="Digite o bairro" value="<?php echo htmlspecialchars( $user["address_bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="user_uf">Estado</label>
              <select class="form-control" id="user_uf" name="user_uf">
                  <option value="<?php echo htmlspecialchars( $user["address_estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $user["address_estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php $counter1=-1;  if( isset($ufs) && ( is_array($ufs) || $ufs instanceof Traversable ) && sizeof($ufs) ) foreach( $ufs as $key1 => $value1 ){ $counter1++; ?>
                  <option value="<?php echo htmlspecialchars( $value1["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome_uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>  
              </select>             
            </div>
            <div class="form-group">
              <label for="user_cep">CEP</label>
              <input type="text" class="form-control" id="user_cep" name="user_cep" placeholder="Digite o CEP" value="<?php echo htmlspecialchars( $user["address_cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>          
                  
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->