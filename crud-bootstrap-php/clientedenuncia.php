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
	
//Conectando ao banco.	
$con = mysqli_connect("localhost","root","","wda_crud");
	
// Checando conexão.
if (mysqli_connect_errno()){
    
  echo "Falha em se conectar ao Banco de Dados: " . mysqli_connect_error();
  
}
	
//Selecionando os bancos e unindo.
$sql = "SELECT * FROM 'customers'"
        . "INNER JOIN 'customers_denuncias'"
        . "ON 'customers.id' = 'customers_denuncias.id_customers'"
        . "INNER JOIN 'denuncias'"
        . "ON 'denuncias.id' = 'customers_denuncias.id_denuncias'";
	
//Resultados.
if ($result = mysqli_query($con, $sql)){
    //Fetch do array de associação.
    while ($row = msqli_fetch_assoc($result)){
        echo '<tr>';
        echo "<td>",$row['id_customers'],"</td>";
        echo "<td>",$row['name'],"</td>";
        echo "<td>",$row['cpf_cnpj'],"</td>";
        echo "<td>",$row['phone'],"</td>";
        echo "<td>",$row['denuncia'],"</td>";
        echo "<td>",$row['codigo'],"</td>";
        echo "<td>",$row['descricao'],"</td>";
        echo "</tr>";
    }
    //liberando resultado.
    mysqli_free_result($result);
}
//Fechando Conexão.
mysqli_close($con);?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
