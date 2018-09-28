<table border="1" class="table" width="950px" align="center">
	<tr>
		<th>Bebidas</th>
		<th>Ingrediente</th>
		<th>Preço</th>
		<th>Açao</th>
	</tr>	
	

</table>
<?php
	include("conexao.php");
	include("bebidas.php");
	
	$nome_bebida = $_POST["nome_bebida"];
	$preco_bebida = $_POST["preco_bebida"];
	$ingrediente_bebida = $_POST["ingrediente_bebida"];
	
	$alter = "UPDATE bebidas SET nome_bebida = $nome_bebida , preco_bebida='$preco_bebida', ingrediente_bebida='$ingredientes_bebida' WHERE id_bebida = $id_bebida";

	mysqli_query($link,$insert) or die(mysqli_error($link));
	
	$select = "SELECT * FROM bebidas";
	
	$resultado = mysqli_query($link,$select) or die(mysqli_error($link));
	
	while($linha = mysqli_fetch_array($resultado)){
		echo "<tr>
				<td> " . $linha["nome_bebida"] . "</td>
				<td> " . $linha["ingrediente_bebida"] . "</td>
				<td> " . $linha["preco_bebida"] . "</td>
				<td><a href = 'javascript:excluirConteudoNaDivOla(" . $linha["id_bebida"] .")'> Remover </a>
				|
				<a href = 'alterar_bebida.php?id_bebida=" . $linha["id_bebida"] ."'> Alterar </a></td></tr>";
	}
?>	