<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cadastrar novo Usuário
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/users">Usuários</a></li>
    <li class="active"><a href="/admin/users/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Usuário</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/master/users/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="user_name">Nome</label>
              <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Digite o nome" required>
            </div>
            <div class="form-group">
              <label for="user_email">Email</label>
              <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Digite o email" required>
            </div>
            <div class="form-group">
              <label for="user_cel">Celular</label>
              <input type="tel" class="form-control" id="user_cel" name="user_cel" placeholder="Digite o celular" required>
            </div>
            <div class="form-group">
              <label for="user_end">Endereço</label>
              <input type="text" class="form-control" id="user_end" name="user_end" placeholder="Digite o endereço" >
            </div>
            <div class="form-group">
              <label for="user_number">Número</label>
              <input type="text" class="form-control" id="user_number" name="user_number" placeholder="Digite o numero">
            </div>
            <div class="form-group">
              <label for="user_city">Cidade</label>
              <input type="text" class="form-control" id="user_city" name="user_city" placeholder="Digite a cidade">
            </div>
            <div class="form-group">
              <label for="user_neig">Bairro</label>
              <input type="text" class="form-control" id="user_neig" name="user_neig" placeholder="Digite o bairro">
            </div>
            <div class="form-group">
              <label for="user_uf">Estado</label>
              <select class="form-control" id="user_uf" name="user_uf">
              
                <?php $counter1=-1;  if( isset($ufs) && ( is_array($ufs) || $ufs instanceof Traversable ) && sizeof($ufs) ) foreach( $ufs as $key1 => $value1 ){ $counter1++; ?>
                  <option value="<?php echo htmlspecialchars( $value1["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome_uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>  
              </select>             
            </div>
            <div class="form-group">
              <label for="user_cep">CEP</label>
              <input type="text" class="form-control" id="user_cep" name="user_cep" placeholder="Digite o CEP">
            </div>          
            <div class="form-group">
              <label for="user_tipoconta">Tipo da Conta</label>
                <select class="form-control" id="user_tipoconta" name="user_tipoconta">
                
                  <?php $counter1=-1;  if( isset($tipoconta) && ( is_array($tipoconta) || $tipoconta instanceof Traversable ) && sizeof($tipoconta) ) foreach( $tipoconta as $key1 => $value1 ){ $counter1++; ?>
                    <option value="<?php echo htmlspecialchars( $value1["nivel_conta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["tipo_conta"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>  
                </select>             
            </div>
            <div class="form-group">
              <label for="user_tipoconta">Duração do período de DEMO</label>
                <select class="form-control" id="duracaoConta" name="duracaoConta">                                
                  <option value='14'>14 dias</option>
                  <option value='30'>1 mês</option>
                  <option value='61'>2 mêses</option>
                  <option value='91'>3 meses</option>
                  <option value='182'>6 meses</option>
                  <option value='365'>1 ano</option>     
                </select>            
            </div>
             <div class="form-group">
              <label for="user_justify">Justificativa</label>
              <textarea  maxlength="280" style="resize: none" class="form-control" rows="3" id="user_justify" name="user_justify" placeholder="Explique brevemente o motivo da criação da conta."></textarea>
            </div>
          </div>
          
          <input for="idadm" name="idadm" type="hidden" id="idadm" value="<?php echo htmlspecialchars( $adm["id_User"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">          
          <input for="hash" name="hash" type="hidden" id="hash" value="<?php echo htmlspecialchars( $hash, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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