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
    index();
    
//    $stmt = $conexao_pdo->prepare("select name,cpf_cnpj,denuncia,descricao from customers");
//    $stmt->execute();
//    $result = $stmt->FetchAll(PDO::FETCH_OBJ);
?>

<?php include(HEADER_TEMPLATE); ?>

Olá <b><?php echo $_SESSION['nome_usuario']?></b>, <a href="../login/sair.php">clique aqui</a> para sair.

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Denúncias</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Nova Denúncia</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i>Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th width="30%">Denúcia</th>
		<th>Usuario</th>
		<th>Descrição</th>
		<th>Atualizado em</th>
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($denuncias) : ?>
<?php foreach ($denuncias as $denuncia) : ?>
	<tr>
		<td><?php echo $denuncia['id']; ?></td>
		<td><?php echo $denuncia['denuncia']; ?></td>
		<td><?php echo $denuncia['usuario_id']; ?></td>
		<td><?php echo $denuncia['descricao']; ?></td>
		<td><?php echo $denuncia['modified']; ?></td>
		<td class="actions text-right">
			<a href="view.php?id=<?php echo $denuncia['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $denuncia['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $denuncia['id']; ?>">
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include('modal.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>