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
<?php
$con = mysqli_connect("localhost","root","","wda_crud");
// Checando conexão.
if (mysqli_connect_errno()){
    
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  
  
}

$sql = "SELECT * FROM 'customers' INNER JOIN 'customers_denuncias' on 'customers.id' = 'customers_denuncias.id_customers'"
        . "INNER JOIN 'denuncias'"
        . "ON 'denuncias.id' = 'customers_denuncias.id_denuncias'";

$result = mysqli_query($con, $sql);

$row = msqli_fetch_assoc($result);
            $id = $row['id_customers'];
            $nome = $row['name'];
            $cpf_cnpj = $row['cpf_cnpj'];
            $Fone = $row['phone'];
            $denun = $row['denuncia'];
            $codigo = $row['codigo'];
            $descricao = $row['descricao'];
            
            
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$nome</td>";
            echo "<td>$cpf_cnpj</td>";
            echo "<td>$fone</td>";
            echo "<td>$denun</td>";
            echo "<td>$codigo</td>";
            echo "<td>$descricao</td>";
            echo "</tr>";    
            
mysqli_close($con);?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
