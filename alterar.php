<?php

	include("conexao.php");
	$nome_pizza  = $_POST["nome_pizza"];
	$ingrediente_pizza = $_POST["ingrediente_pizza"];
	$preco_pizza = $_POST["preco_pizza"];

	$update = "UPDATE pizza SET nome_pizza='$nome_pizza', ingrediente_pizza='$ingrediente_pizza', preco_pizza='$preco_pizza' WHERE id_pizza='$id'";
	mysqli_query($link,$update) or die("erro");

	echo "1";
?>