
	$(document).ready(function(){

		var tid = setInterval(movimentacao, 2000);

		function movimentacao() { 

			$('#tabela').empty();  
			$.ajax({
				type:'get',	 
				dataType: 'json', 
				url: 'dadosJson.php?acao=temp', 
				success: function(dados){


					dados = JSON.parse(JSON.stringify(dados));

					console.log(dados);

							for(var i=0;dados.length>i;i++){	 			 
							 	$('#tabela').append('<tr><td>'+dados[i].rfid+'</td><td>'+dados[i].nomeProd+'</td><td><a href="?excluir='+dados[i].rfid+'">REMOVER</a> </td></tr>');
							}
						}
					});
			}

				});