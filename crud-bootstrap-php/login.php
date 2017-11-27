<?php
// Inicia a sessão
session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		
		<title>Login</title>
	</head>
	<body>
            <h1>Acessar Conta</h1>
		<form action="index.php" method="post">
			<table>
                        <label>Usuário: </label>
                        <input type="text" name="usuario" required><br><br>
                                        
                        <label>Senha: </label>
                        <input type="password" name="senha" required><br><br>
                                         
                        <img src="captcha.php" alt="código captcha" /><br><br>
                         
                        <label>Digite o Código: </label>
                        
                        <input type="text" name="captcha" id="captcha" required><br><br>
                        
                        <label><a href="cria-usuarios/">Criar usuário</a></label><br><br>	
				<?php if ( ! empty( $_SESSION['login_erro'] ) ) :?>
					<tr>
						<td style="color: red;"><?php echo $_SESSION['login_erro'];?></td>
						<?php $_SESSION['login_erro'] = ''; ?>
					</tr>
				<?php endif; ?>        
				<tr>
					<td><input type="submit" value="Entrar"></td>
				</tr>
			</table>
		</form>
	</body>
</html>

