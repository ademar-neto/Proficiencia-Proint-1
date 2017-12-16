<?php
// Inclui o arquivo de configuração
include('../login/config.php');

// Inclui o arquivo de verificação de login
include('../login/verifica_login.php');

// Se não for permitido acesso nenhum ao arquivo
// Inclua o trecho abaixo, ele redireciona o usuário para 
// o formulário de login
include('../login/redirect.php');
?>

<?php 
  require_once('functions.php'); 
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

Olá <b><?php echo $_SESSION['nome_usuario']?></b>, <a href="../login/sair.php">clique aqui</a> para sair.

<h2>Atualizar Denúncia</h2>

<form action="edit.php?id=<?php echo $denuncia['id']; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Denúncia</label>
      <input type="text" class="form-control" name="denuncia['denuncia']" value="<?php echo $denuncia['denuncia']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Código</label>
      <input type="text" class="form-control" name="denuncia['codigo']" value="<?php echo $denuncia['codigo']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Data de Cadastro</label>
      <input type="text" class="form-control" name="denuncia['created']" disabled value="<?php echo $denuncia['created']; ?>">
    </div>
  </div>
  
    <div class="form-group col-md-2">
      <label for="campo2">Descrição</label>
      <input type="text" class="form-control" name="customer['descricao']" value="<?php echo $denuncia['descricao']; ?>">
    </div>

  </div>
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>