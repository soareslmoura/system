<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cadastrar novo Administrador do SySTrader
  </h1>  
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Administrador</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/master/admin/adm-create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="adm_name">Nome</label>
              <input type="text" class="form-control" id="adm_name" name="adm_name" placeholder="Digite o nome" required>
            </div>
            <div class="form-group">
              <label for="adm_email">Email</label>
              <input type="text" class="form-control" id="adm_email" name="adm_email" placeholder="Digite o email" required>
            </div>
            <div class="form-group">
              <label for="adm_cel">Celular</label>
              <input type="tel" class="form-control" id="user_cel" name="adm_cel" placeholder="Digite o celular" required>
            </div>
            <div class="form-group">
              <label for="adm_cel">senha</label>
              <input type="tel" class="form-control" id="user_cel" name="senha" placeholder="senha" required>
            </div>                
            <div class="form-group">
              <label for="adm_nivel">Nível de Controle</label>
                <select class="form-control" id="adm_nivel" name="adm_nivel">                
                  <?php $counter1=-1;  if( isset($levels) && ( is_array($levels) || $levels instanceof Traversable ) && sizeof($levels) ) foreach( $levels as $key1 => $value1 ){ $counter1++; ?>
                    <option value="<?php echo htmlspecialchars( $value1["level_admLevel"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desc_admLevel"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>  
                </select>             
            </div>            
          <input for="idadm" name="adm_idadm" type="hidden" id="adm_idadm" value="321">          
          <input for="hash" name="adm_hash" type="hidden" id="adm_hash" value="<?php echo htmlspecialchars( $hash, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
          <input for="adm_verified" name="adm_verified" type="hidden" id="adm_hash" value="0"> 
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->