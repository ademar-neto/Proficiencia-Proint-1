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
$con=mysqli_connect("localhost","root","","wda_crud");
// Checando conexão.
if (mysqli_connect_errno()){
    
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  
  
}
  
$sql = "SELECT 'customer.name', 'customer.cpf_cnpj', 'customer.phone', 'denuncia.denuncia', 'denuncia.codigo', 'denuncia.descricao' FROM 'customers' as 'customer' INNER JOIN 'denuncias' as 'denuncia' on 'customer.id' = 'denuncia.id'";  
$row = mysqli_query($con, $sql);
while ($uniao = mysqli_fetch_array($row)){
    echo "<tr>",
        "<td>", $uniao['id'], "</td>",
	"<td>", $uniao['name'], "</td>",
	"<td>", $uniao['cpf_cnpj'], "</td>",
	"<td>", $uniao['phone'], "</td>",
	"<td>", $uniao['denuncia'], "</td>",
	"<td>", $uniao['codigo'], "</td>",
	"<td>", $uniao['descricao'], "</td>",
    "</tr>";
    }
mysqli_close($con);
?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
