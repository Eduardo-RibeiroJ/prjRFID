$(document).ready(function(){

	function atualiza_retornados(){

		var id_contrato = $('#tbContrato').attr("data-idContrato");

		$.ajax({
			type:'get',	 
			dataType: 'json', 
			url: 'dadosJson.php?acao=retornados&id_contrato=' + id_contrato,
			success: function(dados){
				
				data = JSON.parse(JSON.stringify(dados));
				
				$(data).each(function() {
					var td = $('.item-' + this.idProduto ).find('.retornados');
					$(td).text(this.retornados);

					var status = $('.item-' + this.idProduto ).find('.status img');
					if( this.enviados == this.retornados ){
						$(status).attr('src', 'images/BolaVerde.png')
					}else{
						$(status).attr('src', 'images/BolaVermelha.png')
					}

				});
				
			}
		});
	}

	function atualiza_movimentacao() { 
		
		$('#tabela').empty();  
		
		$.ajax({
			type:'get',	 
			dataType: 'json', 
			url: 'dadosJson.php?acao=temp', 
			success: function(dados){
				
				dados = JSON.parse(JSON.stringify(dados));
				
				for(var i in dados){
					$('#tabela').append('<tr><td>'+dados[i].rfid+'</td><td>'+dados[i].nomeProd+'</td><td><a href="?apagar='+dados[i].rfid+'">REMOVER</a> </td></tr>');
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
				
				for(var i in dados){
					$('#tabetiquetas').append('<tr><td>'+dados[i].etiqueta+'</td></tr>');
					// $('#tabetiquetas').append('<tr><td>'+dados[i].etiqueta+'</td><td><a href="?excluir='+dados[i].etiqueta+'">Remover</a> </td></tr>');
				}
			}
		});
	}

	
	function verificarItens() { 
		var id_contrato = $('#tbContrato').attr("data-idContrato");
		
		$.ajax({
			type:'get',	 
			dataType: 'json', 
			url: 'dadosJson.php?acao=verificar&id_contrato='+id_contrato, 
			success: function(dados){
				$('#itens strong').text(dados);

				var quant = $('#quant').text();

				if( quant == dados ){
					$('#status img').attr('src', 'images/BolaVerde.png');
				}else{
					$('#status img').attr('src', 'images/BolaVermelha.png');
				}
			}
		});
	}

	var tet = setInterval(atualiza_etiquetagem, 2000);
	var tid = setInterval(atualiza_movimentacao, 2000);
	var tvi = setInterval(verificarItens, 2000);
	var tre = setInterval(atualiza_retornados, 2000);

});
