<?php
	
	if(!empty($_POST) AND (EMPTY($_POST['usuario']) OR empty($_POST['senha']))){
		header("Location: login.html"); exit;
	}
 
	$link = new PDO ("mysql:localhost;dbname=db_pesquisa_preco","root", "");
	
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	$query = $link->prepare('SELECT * FROM db_pesquisa_preco.tb_usuario
							 WHERE usuNome=:user and usuSenha=:senha ');

	$query->bindValue(":user", $usuario);
	$query->bindValue(":senha", $senha);

	$query->execute();

	if($query->rowCount()==1)
	{
		echo "<script> alert('Usuário logado com sucesso!');
						top.location.href='/sistemaWeb/menu.html';
			</script>";
	}
	else
	{
		echo "<script> alert('Usuário ou Senha incorreto!');
						top.location.href='/sistemaWeb/login.html';
			</script>";
	}
?>
