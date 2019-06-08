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

	var tid = setInterval(atualiza_movimentacao, 2000);
});
