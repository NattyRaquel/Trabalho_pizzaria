<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<title>Cadastro de Pizza</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilizando.css"/>
		<script src="jquery-3.3.1.min.js"></script>

	</head>
	<body>
		<?php
			include ("menu.inc");
			include ("conexao.php");
			include ("pizza.php");
			
			
			$nome_pizza = $_POST["nome_pizza"];	
			$preco_pizza = $_POST["preco_pizza"];
			$ingrediente_pizza = $_POST["ingrediente_pizza"];

			$insert ="INSERT INTO pizza (nome_pizza, preco_pizza)
				VALUES ('$nome_pizza','$preco_pizza')";
					
				mysqli_query($link,$insert) or die(mysqli_error($link));

		?>
	</body>
</html>