<?php
	include("conexao.php");

	$delete = "DELETE FROM bebidas WHERE id_bebida = " . $_POST["id_bebida"];

	mysqli_query($link,$delete) or die("erro");

	echo "1";

?>