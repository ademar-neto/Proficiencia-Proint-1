<?php
// Inclui o arquivo de configuração.
include('login/config.php');
// Inclui o arquivo de verificação de login.
include('login/verifica_login.php');
// Se não for permitido acesso nenhum ao arquivo Inclua o trecho abaixo, ele redireciona o usuário para o formulário de login.
include('login/redirect.php');
?>

<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE);     
    $stmt = $conexao_pdo->prepare("select denuncias.id,name,cpf_cnpj,phone,denuncia,descricao from customers inner join denuncias on customers.id = usuario_id");
    $stmt->execute();
    $result = $stmt->FetchAll(PDO::FETCH_OBJ);
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
		<th>Descrição</th>
	</tr>
</thead>
<tbody>
    <?php
    foreach($result as $res){
   ?>
        <tr>
            <td><?php echo $res->id;?></td>
            <td><?php echo $res->name;?></td>
            <td><?php echo $res->cpf_cnpj;?></td>
            <td><?php echo $res->phone;?></td>
            <td><?php echo $res->denuncia;?></td>
            <td><?php echo $res->descricao;?></td>
        </tr>
   <?php
    }
   ?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>