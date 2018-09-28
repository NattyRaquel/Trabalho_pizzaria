<?php
	include("conexao.php");
	$nome_pizza = $_POST["nome_pizza"];
	$ingrediente_pizza = $_POST["ingrediente_pizza"];
	$preco_pizza = $_POST["preco_pizza"];

	$insert = "INSERT INTO pizza(nome_pizza, ingrediente_pizza, preco_pizza) VALUES ('$nome_pizza','$ingrediente_pizza,$preco_pizza')";

	mysqli_query($link,$insert) or die("error");

	$id_inserir = mysqli_insert_id($link);
	echo $id_inserir;
?>	