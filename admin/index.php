<?php

$sucesso = "";
$erro = "";

// Verificar se estão vindo informações por POST:
if(isset($_POST['email']) && isset($_POST['senha'])){
	require('../classes/Usuario.class.php');
	// Instanciar o usuário:
	$usuario = new Usuario();

	// Armazenar os valores vindos do POST:
	$usuario->email = $_POST['email'];
	$usuario->senha = $_POST['senha'];

	$resultado = $usuario->ValidarLogin();

	if(count($resultado) == 0){
		$erro = "E-mail ou senha incorretos";
	}else{
		// Criar sessão e redirecionar:
		session_start();
		$_SESSION['infos'] = $resultado[0];
		header('Location: painel/index.php');
		exit();
	}
} elseif(isset($_POST['nome_cad']) && isset($_POST['email_cad']) 
	&& isset($_POST['senha_cad'])){
		require('../classes/Usuario.class.php');
		$usuario = new Usuario();
		// Atribuir os valores nos atributos:
		$usuario->nome_completo = $_POST['nome_cad'];
		$usuario->email = $_POST['email_cad'];
		$usuario->senha = $_POST['senha_cad'];
		// Chamar o método Cadastrar() e verificar retorno:
		if($usuario->Cadastrar() == 1){
			$sucesso = "Usuário cadastrado com sucesso!";
		}else{
			$erro = "Este e-mail já está cadastrado!";
		}

	}
?>


<!doctype html>
<html lang="pt-br">

<head>
	<title>Sistema :: Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Sistema :: Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(images/bg-1.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">

									</p>
								</div>
							</div>
							<!-- Formulário de login -->
							<form action="index.php" method="POST" class="signin-form">
							<div class="w-100">
									<h3 class="mb-4">Acessar</h3>
								</div>
								<div class="form-group mt-3">
									<input name="email" type="text" class="form-control" required>
									<label class="form-control-placeholder" for="username">E-mail</label>
								</div>
								<div class="form-group">
									<input name="senha" id="password-field" type="password" class="form-control" required>
									<label class="form-control-placeholder" for="password">Senha</label>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Entrar</button>
								</div>
								<div class="form-group d-md-flex">
								</div>
								<p class="text-center">Não tem conta? <a data-toggle="tab" href="#signup" id="signup">Cadastre-se!</a></p>
							</form>
							
							<!-- Formulário de cadastro -->
							<form action="index.php" method="POST" class="signup">
							<div class="w-100">
									<h3 class="mb-4">Cadastro</h3>
								</div>
								<div class="form-group mt-3">
									<input name="nome_cad" type="text" class="form-control" required>
									<label class="form-control-placeholder" for="nome_cad">Nome Completo</label>
								</div>	
							<div class="form-group mt-3">
									<input name="email_cad" type="text" class="form-control" required>
									<label class="form-control-placeholder" for="email_cad">E-mail</label>
								</div>
								<div class="form-group">
									<input name="senha_cad" id="password-field" type="password" class="form-control" required>
									<label class="form-control-placeholder" for="senha_cad">Senha</label>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Cadastrar</button>
								</div>
								<div class="form-group d-md-flex">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
		$('#signup').click(function(){
			$('.signin-form').hide();
			$('.signup').show();
		});

		<?php
		// Alert em caso de sucesso: 
		if($sucesso != ""){
		?>
		swal("Sucesso!", "<?=$sucesso; ?>", "success");
		<?php } ?>

		<?php
		// Alert em caso de erro: 
		if($erro != ""){
		?>
		swal("Erro!", "<?=$erro; ?>", "error");
		<?php } ?>


	</script>

</body>

</html>