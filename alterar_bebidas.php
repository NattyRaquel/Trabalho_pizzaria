<?php	
	include("conexao.php");

	$sql = "select * from bebidas WHERE id_bebida = ".$_POST["id"];
	
	$resultado = mysqli_query($link,$sql) or die(mysqli_error($link));
	
	$linha = mysqli_fetch_array($resultado);
		
?>
    <label>Nome da Bebida</label>
		<input type="text" name="nome_bebida"/>
		<br />
		
		<label>Preço</label>
		<input type="number" name="preco_bebida"/>
		<br />
		
		<label>Industrializado</label>
		 <input type="radio" name="bebida" value="0" onclick="div(false)"/> Sim
		 <input type="radio" name="bebida" value="1" onclick="div(true)"/> Não
	  
		<input type="button" value="Cadastrar Nova Bebida" id="cadastrar_bebida"></input>	
	
		<div id="visivel" style="display:none;">
		<div class="industrializado">
  
		<input type="checkbox" name="bebida" id="opcaonao" value="Laranja">Laranja<br/>
		<input type="checkbox" name="bebida" id="opcaonao" value="Limão">Limão<br/>
		<input type="checkbox" name="bebida" id="opcaonao" value="Açucar">Açucar<br/>
		<input type="checkbox" name="bebida" id="opcaonao" value="Gelo">Gelo<br/>	
		<input type="checkbox" name="bebida" id="opcaonao" value="Abacaxi">Abacaxi<br/>	
		
	</div>
	</div>
		
	<label>.....Ou</label>
		<input type="text" placeholder="Adicionar novo Ingrediente" name="novo_ingrediente_bebida"/>
		<input type="button" value="ok" id="bebida_nova"/> 
		
	</form>