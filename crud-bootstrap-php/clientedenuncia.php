<?php
// Inclui o arquivo de configuração
include('login/config.php');

// Inclui o arquivo de verificação de login
include('login/verifica_login.php');

// Se não for permitido acesso nenhum ao arquivo
// Inclua o trecho abaixo, ele redireciona o usuário para 
// o formulário de login
include('login/redirect.php');
?>

<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<?php 
$sql = "SELECT 'customers.name' , 'customers.cpf_cnpj' , 'denuncias.descricao' , 'denuncias.codigo' , 'denuncias.descricao' FROM 'customers' INNER JOIN 'denuncias' ON 'customers.id' = 'denuncias.id_customers'";
$dados = $sql;
?>


Olá <b><?php echo $_SESSION['nome_usuario']?></b>, <a href="login/sair.php">clique aqui</a> para sair.

<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th width="30%">Nome</th>
		<th>CPF/CNPJ</th>
                <th>Telefone</th>
		<th width="30%">Denúcia</th>
		<th>Código</th>
		<th>Descrição</th>
	</tr>
</thead>
<tbody>
    <?php if (($dados['denuncias.id_customers']) != null) : ?>
	<tr>
		<td><?php echo $dados['denuncias.id_customers']; ?></td>
		<td><?php echo $dados['customers.name']; ?></td>
		<td><?php echo $dados['customers.cpf_cnpj']; ?></td>
		<td><?php echo $dados['customers.phone']; ?></td>
		<td><?php echo $dados['denuncias.denuncia']; ?></td>
		<td><?php echo $dados['denuncias.codigo']; ?></td>
		<td><?php echo $dados['denuncias.descricao']; ?></td>
	</tr>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>