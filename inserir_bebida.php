 <?php
	include("conexao.php");
	include("bebidas.php");
	$nome_bebida = $_POST["nome_bebida"];
	$preco_bebida = $_POST["preco_bebida"];
	$ingrediente_bebida = $_POST["ingrediente_bebida"];

	$insert = "INSERT INTO bebidas(nome_bebida,preco_bebida ,ingrediente_bebida) VALUES ('$nome_bebida','$preco_bebida,$ingrediente_bebida')";

	mysqli_query($link,$insert) or die("error");

	$id_inserir = mysqli_insert_id($link);
	echo $id_inserir;
?>	