<?php
	session_start();
	include("conexao.php");
	$sql = "SELECT * FROM bebidas ORDER BY nome_bebida";
	$resultado = mysqli_query($link,$sql) or die("erro");
	
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<title>Bebidas</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="estilizando.css"/>
	<script src="jquery-3.3.1.min.js"></script>
	
	<script>
		// function div(valor) {
		//  if (valor) {
		//	document.getElementById("visivel").style.display = "block";
		//  } else {
		//	document.getElementById("visivel").style.display = "none";
		//  }
		 
		// }alert();
		$(document).ready(function(){
			    $("#cadastrar_bebida").click(function(){
					
					var ingrediente_bebida = [];
					
					$(".ingrediente_bebida").each(function){
						if($(this).is(":checked")){
							
							ingrediente_bebida.push($(this).val());
						}
					});
					
					ingrediente_bebida = ingrediente_bebida.ToString();
					
			    	$.ajax({
						url : "cadastro_bebida.php",
						type : 'post',
						data : {
							nome_bebida: $("#nome_bebida").val(),
							ingrediente_bebida : $("#ingrediente_bebida").val(),
							preco_bebida: $("#preco_bebida").val()
						},
						
						beforeSend : function(){
							$("#resultado").html("Cadastrando...");
						}	
						success:function(data){
							$("resultado").html(data)
						}					
				    })

				     .done(function(msg){
				     	  var nova_linha = 
				     	  "<tr>" +
							"<td>" + $("#nome_bebida").val() + "</td>	" +
							"<td>" + $("#ingrediente_bebida").val() + "</td>	" +
							"<td>" + $("#preco_bebida").val() + "</td>" +
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
					$(document).on('click', '.botao_excluir', function() {
    				
				    var id = $(this).val();				   
			    	var linha = $(this).closest("tr");

			    	$.ajax({
			          url : "excluir_bebida.php",
			          type : 'post',
			          data : {
			               id_bebida : id
			          },
			          beforeSend : function(){
			               $("#resultado").html("Removendo...");
			          }
				     })

				     .done(function(msg){
				     	if(msg=="1"){					     	 
				     	  linha.remove();			 
				          $("#resultado").html("<b>REMOVIDO!!!</b>");
				      	}else{
				      		$("#resultado").html("<b>Não é possível remover esta pizza.</b>");
				      	}
				     })

				     .fail(function(jqXHR, textStatus, msg){
				          alert(msg);
					 }); 
			    });
				<!-- FIM Excluir -->
				
				$(document).on('click', '.botao_alterar', function() {
    				bebida = $(this).closest('tr').children("td.alt_nome_bebida");
			    	nome_bebida = bebida.html();
					
			    	ingrediente_bebida = $(this).closest('tr').children("td.alt_ingrediente_bebida");
			    	ingrediente_bebida= ingrediente_bebida.html();
					
					preco_bebida = $(this).closest('tr').children("td.alt_preco_pizza");
			    	preco_bebida= preco_bebida.html();
					
			    	nome_bebida.html("<input type='text' id='alterar_nome_bebida' value='"+ nome_bebida +"' />");
			    	ingrediente_bebida.html("<input type='text' id='alterar_ingrediente_bebida' value='"+ ingrediente_bebida +"' />");
			    	preco_bebida.html("<input type='text' id='alterar_preco_bebida' value='"+ preco_bebida +"' />");
			    	$(this).html("Finalizar alteração");
			    	$(this).addClass('botao_alterando');
     				$(this).removeClass('botao_alterar');
			    });
				  $(document).on('click', '.botao_alterando', function() {
    				var id_alterar = $(this);
    				var nome_bebida = $(this).closest('tr').children("td.alt_nome_bebida");			    	
			    	var ingrediente = $(this).closest('tr').children("td.alt_ingrediente_bebida");			    	
			    	var preco = $(this).closest('tr').children("td.alt_preco_bebida");			    	
    				var ingrediente_bebida_alterar = $(this).closest('tr').children("td.alt_ingrediente_bebida").children("input");
    				var nome_bebida_alterar = $(this).closest('tr').children("td.alt_nome_bebida").children("input");
    				var preco_bebida_alterar = $(this).closest('tr').children("td.alt_preco_bebida").children("input");
    				alert(id_alterar);
				    $.ajax({
			          url : "alterar_bebida.php",
			          type : 'post',
			          data : {
			               nome_bebida : nome_bebida_alterar.val(),
			               ingrediente_bebida: ingrediente_bebida_alterar.val(),
			               preco_bebida : preco_bebida_alterar.val(),
			               id: id_alterar.val()
			          },
			          beforeSend : function(){
			               $("#resultado").html("alterando...");
			          }
				     })

				     .done(function(msg){
				     	  	nome_bebida.html(nome_bebida_alterar.val());
				     	  	ingrediente_bebida.html(ingrediente_bebida_alterar.val());
				     	  	preco_bebida.html(preco_bebida_alterar.val());
				     	  	$("#resultado").html("<b>ALTERADO!!!</b>");
				     })

				     .fail(function(jqXHR, textStatus, msg){
				        alert(msg);
					 }); 
			    });				
			});
	</script>
</head>

<body>
	<form action="cadastro_bebida.php" name="cadastro_bebida" method="POST">
		<?php
			include "menu.inc";
			include "conexao.php";
		?>
		
		<label>Nome da Bebida</label>
		<input type="text" name="nome_bebida"/>
		<br />
		
		<label>Preço</label>
		<input type="number" name="preco_bebida"/>
		<br />
		
	<label>Industrializado</label>
		<input type="radio" name="bebida" id="bebida" value="0" onclick="div(false)"/> Sim
		<input type="radio" name="bebida" id="bebida" value="1" onclick="div(true)"/> Não
	  
	<input type="button" value="Cadastrar Nova Bebida" id="cadastrar_bebida"></input>	
	
	<div id="visivel" style="display:none;">
		<div class="industrializado">
			<input type="checkbox" name="ingrediente_bebida" class="ingrediente_bebida" value="Laranja">Laranja<br/>
			<input type="checkbox" name="ingrediente_bebida" class="ingrediente_bebida" value="Limão">Limão<br/>
			<input type="checkbox" name="ingrediente_bebida" class="ingrediente_bebida" value="Açucar">Açucar<br/>
			<input type="checkbox" name="ingrediente_bebida" class="ingrediente_bebida" value="Gelo">Gelo<br/>	
			<input type="checkbox" name="ingrediente_bebida" class="ingrediente_bebida" value="Abacaxi">Abacaxi<br/>	
			
		</div>
	</div>
		
	<label>.....Ou</label>
		<input type="text" placeholder="Adicionar novo Ingrediente" name="novo_ingrediente_bebida"/>
		<input type="button" value="Ok" id="bebida_nova"/> 
		
	</form>

	<div id="resultado">
		Aguardando ação....
	</div>
	
	<table border=1>
			<tr>
				<th>Bebida</th>	
				<th>Ingrediente</th>
				<th>Preço</th>
				<th>Ação</th>
			</tr>
			<?php
			   include ("conexao.php");
			   $select = "SELECT * FROM bebidas";
			   
			   $resultado = mysqli_query($link,$select) or die(mysqli_error($link));
			   
				while($linha=mysqli_fetch_array($resultado)){
									
				echo "<tr>
					<td> " . $linha["nome_bebida"] . "</td>
					<td> " . $linha["ingrediente_bebida"] . "</td>
					<td> " . $linha["preco_bebida"] . "</td>
					<td><a href = 'javascript:excluirConteudoNaDivOla(" . $linha["id_bebida"] .")'><input type = 'hidden' value = '1'/><img src = 'x.png' width= '16' height='16' /></a>
					<a href = 'javascript:alterarConteudoNaDivform(" . $linha["id_bebida"] .")'><input type = 'hidden' value = '2'/><img src = 'e.png' width= '16' height='16' /></a></td>
				</tr>";
				}
			?>
		</table>
 </body>
</html>