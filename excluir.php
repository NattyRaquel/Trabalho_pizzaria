<?php
	include("conexao.php");

	$delete = "DELETE FROM pizza WHERE id_pizza = " . $_POST["id_pizza"];

	mysqli_query($link,$delete) or die("erro");

	echo "1";

?>