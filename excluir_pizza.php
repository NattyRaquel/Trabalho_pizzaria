<?php
	include("conexao.php");
	include("pizza.php");
	include("cadastro_pizza.php");

	$delete = "DELETE FROM pizza, ingrendientes_pizza WHERE id_pizza = " . $_POST["id_pizza"] . " id_ing_pizza = " . $_POST["ingrendiente_pizza"];

	mysqli_query($link,$delete) or die("erro");

	echo "1";

?>