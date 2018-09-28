<table border="1" class="table" width="950px" align="center">
	<tr>
		<th>Pizza</th>
		<th>Ingrediente</th>
		<th>Preço</th>
		<th>Açao</th>
	</tr>	
	

</table>
<?php
	<?php

	include("conexao.php");
	$nome_pizza  = $_POST["nome_pizza"];
	$ingrediente_pizza = $_POST["ingrediente_pizza"];
	$preco_pizza = $_POST["preco_pizza"];
	$id = $_POST["id"];

	$update = "UPDATE pizza SET nome_pizza='$nome_pizza', ingrediente_pizza='$ingrediente_pizza', preco_Pizza='$preco_Pizza' WHERE id_pizza='$id'";
	mysqli_query($link,$update) or die("erro");

	echo "1";
?>

	include("conexao.php");
	
	$nome_pizza = $_POST["nome_pizza"];
	$preco_pizza = $_POST["preco_pizza"];
	$ingrediente_pizza = $_POST["ingrediente_pizza"];
	
	$alter = "UPDATE pizza SET nome_pizza = $nome_pizza , preco_pizza='$preco_Pizza', ingrediente_pizza='$ingredientes_pizza' WHERE id_pizza = $id_pizza";

	mysqli_query($link,$insert) or die(mysqli_error($link));
	
	$select = "SELECT * FROM pizza";
	
	$resultado = mysqli_query($link,$select) or die(mysqli_error($link));
	
	while($linha = mysqli_fetch_array($resultado)){
		echo "<tr>
				<td> " . $linha["nome_pizza"] . "</td>
				<td> " . $linha["ingrediente_pizza"] . "</td>
				<td> " . $linha["preco_pizza"] . "</td>
				<td><a href = 'javascript:excluirConteudoNaDivOla(" . $linha["id_pizza"] .")'> Remover </a>
				|
				<a href = 'alterar_pizza.php?id_pizza=" . $linha["id_pizza"] ."'> Alterar </a></td></tr>";
	}
?>	