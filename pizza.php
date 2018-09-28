<?php
	session_start();
	include("conexao.php");
	$sql = "SELECT * FROM pizza ORDER BY nome_pizza";
	$resultado = mysqli_query($link,$sql) or die("erro");
	
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<title>PIZZA</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="estilizando.css"/>
	<script src="jquery-3.3.1.min.js"></script>

	<script>
			$(document).ready(function(){
					$("#cadastrar_pizza").click(function(){			    
						$.ajax({
						  url : "cadastro_pizza.php",
						  type : 'post',
						  data : {
							   nome_pizza : $("#nome_pizza").val(),
							   ingrediente_pizza : $("#ingrediente_pizza").val(),
							   preco_pizza : $("#preco_pizza").val()
						  },
						  beforeSend : function(){
							   $("#resultado").html("Cadastrando...");
						}	
						 })

						 .done(function(msg){
							  var nova_linha = 
							  "<tr>" +
								"<td>" + $("#nome_pizza").val() + "</td>	" +
								"<td>" + $("#ingrediente_pizza").val() + "</td>	" +
								"<td>" + $("#preco_pizza").val() + "</td>" +
								"<td>" +								 
									"<button value='" + msg + "' class='botao_excluir'>Remover</button>" +
								"</td>" +
							  "</tr>";
							  $("table").append(nova_linha);
							  $("#resultado").html("<b>Cadastrado!!!</b>");
						 })

						 .fail(function(jqXHR, textStatus, msg){
							  alert(msg);
						 }); 
						});
						
					<!-- Fim do Cadastro Pizza -->
					
					$(document).ready(function(){
						$(".excluir").click(function(){
							$(this).closest("tr").remove();
						});
					});
					$(document).ready(function(){
						$(".alterar").click(function(){
							alert($(this).children("input").val());
							$(this).closest("tr").update();
						});		
					});
					/////////////////////ALTERAR//////////////////////////////////////////////
					$(document).on('click', '.botao_alterar', function() {
						var id = $(this).val();				   
						var linha = $(this).closest("tr");

						$.ajax({
						  url : "alterar_pizza.php",
						  type : 'post',
						  data : {
							   id_pizza : id
						  },
						  beforeSend : function(){	
							   $("#resultado").html("Alterando...");
						  }
						 })

						 .done(function(msg){
							if(msg=="1"){					     	 
							  linha.alterar();			 
							  $("#resultado").html("<b>Alterando!!!</b>");
							}else{
								$("#resultado").html("<b>Não é possível alterar esta pizza.</b>");
							}
						 })

						 .fail(function(jqXHR, textStatus, msg){
							  alert(msg);
						 }); 
					});
						
						///////////////////////////ALTERANDO/////////////////////////////////////////////////
					$(document).on('click', '.botao_alterando', function() {
						var id_alterar = $(this);
						var colunaNome = $(this).closest('tr').children("td.alt_nome_pizza");			    	
						var colunaingrediente = $(this).closest('tr').children("td.alt_ingrediente_pizza");			    	
						var colunapreco = $(this).closest('tr').children("td.alt_preco_pizza");			    	
						var ingrediente_alterar = $(this).closest('tr').children("td.alt_ingrediente_pizza").children("input");
						var nome_pizza_alterar = $(this).closest('tr').children("td.alt_nome_pizza").children("input");
						alert(id_alterar);
						$.ajax({
						  url : "alterando_pizza.php",
						  type : 'post',
						  data : {
							   nome_pizza : nome_pizza_alterar.val(),
							   ingrediente : ingrediente_pizza_alterar.val(),
							   preco : preco_pizza_alterar.val(),
							   id: id_alterar.val()
						  },
						  beforeSend : function(){
							   $("#resultado").html("alterando...");
						  }
						})

						 .done(function(msg){
								colunaNome.html(nome_pizza_alterar.val());
								colunaingrediente.html(ingrediente_pizza_alterar.val());
								colunapreco.html(preco_pizza_alterar.val());
								$("#resultado").html("<b>ALTERADO!!!</b>");
						 })

						.fail(function(jqXHR, textStatus, msg){
							  alert(msg);
					
						});
					
					/////////////////////////////////FIM ALTERANDO//////////////////////////////////////
					
				});
			});
			  
	</script>
</head>

<body>

			<form action="cadastro_pizza.php" name="cadastro" method="POST">
			
			<div id="resultado">
			Aguardando sinal....
		      </div>
				<label>Nome da Pizza</label>
				<input type="text" id="altera_pizza" name="nome_pizza" />
				<br />
				<br>
				<label>Preço</label>
				<input type="number" id="altera_preco"  name="preco_pizza"/>
				<br><br>
				<div id="ingredientes">
					<label>Ingredientes</label><br/>
					<input type="checkbox" name="ingrediente_pizza" value="Mussarela">Mussarela<br>
					<input type="checkbox" name="ingrediente_pizza" value="Presunto">Presunto<br>
					<input type="checkbox" name="ingrediente_pizza" value="Tomate">Tomate<br>
					<input type="checkbox" name="ingrediente_pizza" value="Orégano ">Orégano <br><br>
					<input type="submit" id="cadastrar_pizza" value="Cadastrar" />
				</div>
				<br /><br />
				
				<label>.....Ou</label>
				<input type="text" placeholder="Adicionar novo Ingrediente" name="novo_ingrediente"/>
				<input type="button" value="ok" id="nova_pizza"/> 
			    
				
			</form>			
			
			  <table border=1>
			<tr>
				<th>Pizza</th>
				<th>Preço</th>
				<th>Ação</th>
			</tr>
				<?php
				$select= "SELECT * FROM pizza";
				 include ("conexao.php");
				 
				while($linha=mysqli_fetch_array($resultado)){
					echo "<tr>
							<td class='alt_nome_pizza'  value='$linha[id_pizza]'>$linha[nome_pizza]</td>	
							<td class='alt_preco_pizza'  value='$linha[id_pizza]'>$linha[preco_pizza]</td>
							<td>							
								<div class='excluir'><input type='hidden' value='2'/> X </div>
								<div class='alterar'><input type='hidden' value='3' /> @ </div>
							</td>
						  </tr>";
				}
			?>
			
			
			
		</table>
		</div>
		<script src="jquery-3.3.1.min.js"></script>
</body>
</html>