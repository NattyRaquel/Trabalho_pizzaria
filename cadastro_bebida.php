<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<title>Cadastro de Bebidas</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilizando.css"/>
		<script src="jquery-3.3.1.min.js"></script>
	</head>
	<body>
		<?php
			include ("conexao.php");
			include ("bebidas.php");
			
			$nome_bebida = $_POST["nome_bebida"];
			$ingrediente_bebida = $_POST["ingrediente_bebida"];
			$preco_bebida = $_POST["preco_bebida"];

			if(isset($_POST["ingrediente_bebida"])){
				$insert ="INSERT INTO bebidas (nome_bebida,'".$_POST["ingrediente_bebida"]."',preco_bebida)
					VALUES ('$nome_bebida','$preco_bebida','$ingrediente_bebida')";
			}
			
			$resultado = mysqli_query($link,$insert) or die(mysqli_error($link));
			}
		?>
	</body>
</html>