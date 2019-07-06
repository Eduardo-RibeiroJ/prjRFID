$(document).ready(function(){

	function atualiza_movimentacao() { 
		
		$('#tabela').empty();  
		
		$.ajax({
			type:'get',	 
			dataType: 'json', 
			url: 'dadosJson.php?acao=temp', 
			success: function(dados){
				
				dados = JSON.parse(JSON.stringify(dados));
				
				console.log('atualiza_movimentacao > dados', dados);
				
				for(var i in dados){
					$('#tabela').append('<tr><td>'+dados[i].rfid+'</td><td>'+dados[i].nomeProd+'</td><td><a href="?excluir='+dados[i].rfid+'">REMOVER</a> </td></tr>');
				}
			}
		});
	}

	function atualiza_etiquetagem() { 
		
		$('#tabetiquetas').empty();  
		
		$.ajax({
			type:'get',	 
			dataType: 'json', 
			url: 'dadosJson.php?acao=tempetiquetas', 
			success: function(dados){
				
				dados = JSON.parse(JSON.stringify(dados));
				
				console.log('atualiza_etiquetagem > dados', dados);
				
				for(var i in dados){
					$('#tabetiquetas').append('<tr><td>'+dados[i].etiqueta+'</td></tr>');
					// $('#tabetiquetas').append('<tr><td>'+dados[i].etiqueta+'</td><td><a href="?excluir='+dados[i].etiqueta+'">Remover</a> </td></tr>');
				}
			}
		});
	}

	
	function verificarItens() { 
		
		$('#itens').empty();  
		
		$.ajax({
			type:'get',	 
			dataType: 'json', 
			url: 'dadosJson.php?acao=verificar', 
			success: function(dados){

				$('#itens').append('<strong>'+dados+'</strong>');
				
			}
		});
	}

	var tet = setInterval(atualiza_etiquetagem, 2000);
	var tid = setInterval(atualiza_movimentacao, 2000);
	var tvi = setInterval(verificarItens, 2000);

});
