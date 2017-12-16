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
  add();
  
  
$base_dados  = 'wda_crud';
$usuario_bd  = 'root';
$senha_bd    = '';
$host_db     = 'localhost';
$charset_db  = 'UTF8';
$conexao_pdo = null;

// Concatenação das variáveis para detalhes da classe PDO
$detalhes_pdo  = 'mysql:host=' . $host_db . ';';
$detalhes_pdo .= 'dbname='. $base_dados . ';';
$detalhes_pdo .= 'charset=' . $charset_db . ';';

// Tenta conectar
try {
    // Cria a conexão PDO com a base de dados
    $conexao_pdo = new PDO($detalhes_pdo, $usuario_bd, $senha_bd);
} catch (PDOException $e) {
    // Se der algo errado, mostra o erro PDO
    print "Erro: " . $e->getMessage() . "<br/>";
   
    // Mata o script
    die();
}
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conexao_pdo->prepare("select * from customers");
    $stmt->execute();
    $result = $stmt->FetchAll(PDO::FETCH_OBJ);
    
    
?>

<?php include(HEADER_TEMPLATE); ?>

Olá <b><?php echo $_SESSION['nome_usuario']?></b>, <a href="../login/sair.php">clique aqui</a> para sair.

<h2>Nova Denúncia</h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="denuncia">Denúncia</label>
      <input type="text" class="form-control" name="denuncia['denuncia']">
    </div>
       
      <div class="form-group col-md-3">
           <label for="denuncia">Usuario</label>
        <select class="form-control" name="denuncia['usuario_id']">
        <?php
        foreach($result as $res){
         ?> 
            <option value="<?php echo $res->id; ?>"><?php echo $res->name; ?></option>
      <?php
        }
      ?>
       </select>
    </div> 
    <div class="form-group col-md-2">
      <label for="campo3">Data de Cadastro</label>
      <input type="text" class="form-control" name="denuncia['created']" disabled>
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Descrição</label>
       <textarea class="form-control" rows="5" name="denuncia['descricao']"></textarea>
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
