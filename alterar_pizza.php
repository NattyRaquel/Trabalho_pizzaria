
<?php

	include("conexao.php");
	$nome_pizza  = $_POST["nome_pizza"];
	$ingrediente_pizza = $_POST["ingrediente_pizza"];
	$preco_pizza = $_POST["preco_pizza"];

	$update = "UPDATE pizza SET nome_pizza='$nome_pizza', ingrediente_pizza='$ingrediente_pizza', preco_pizza='$preco_pizza' WHERE id_pizza='$id'";
	mysqli_query($link,$update) or die("erro");

	echo "1";
?>
				<label>Nome da Pizza</label>
				<input type="text" id="altera_pizza" name="nome_pizza" />
				<br />
				
				<label>Preço</label>
				<input type="number" id="altera_preco"  name="preco_pizza"/>
				
				<div id="ingredientes">
				<label>Ingredientes</label>
				<input type="checkbox" name="ingrediente" value="Mussarela">Mussarela<br>
				<input type="checkbox" name="ingrediente" value="Presunto">Presunto<br>
				<input type="checkbox" name="ingrediente" value="Tomate">Tomate<br>
				<input type="checkbox" name="ingrediente" value="Orégano ">Orégano <br>
				<input type="submit" id="cadastrar_pizza" value="cadastrar" />
				</div>
				<br />
				
				
				<label>.....Ou</label>
				<input type="text" placeholder="Adicionar novo Ingrediente" name="novo_ingrediente"/>
				<input type="button" value="ok" id="nova_pizza"/> 
			    
				
			</form>		