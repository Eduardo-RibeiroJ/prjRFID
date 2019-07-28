$(document).ready(function(){

	function atualiza_retornados(){

		var id_contrato = $('#tbContrato').attr("data-idContrato");

		$.ajax({
			type:'get',	 
			dataType: 'json', 
			url: 'dadosJson.php?acao=retornados&id_contrato=' + id_contrato,
			success: function(dados){
				
				data = JSON.parse(JSON.stringify(dados));
				
				$(data).each(function(dadosProduto) {
					var td = $('.item-' + dadosProduto.idProduto ).find('.retornados');
					$(td).text(dadosProduto.retornados);

					var status = $('.item-' + dadosProduto.idProduto ).find('.status img');
					if( dadosProduto.enviados == dadosProduto.retornados ){
						$(status).attr('src', 'images/BolaVerde.png')
					}else{
						$(status).attr('src', 'images/BolaVermelha.png')
					}

				});
				
			}
		});
	}

	function atualiza_movimentacao() { 
		
		//$('#tabela').empty();  
		
		$.ajax({
			type:'get',	 
			dataType: 'json', 
			url: 'dadosJson.php?acao=temp', 
			success: function(dados){
				
				dados = JSON.parse(JSON.stringify(dados));

				var Produtos = {};
				$(dados).each(function(key, dadosProd) {
					if( Produtos[dadosProd.idProduto] === undefined ){
						Produtos[dadosProd.idProduto] = {'idProduto': dadosProd.idProduto, 'nomeProd': dadosProd.nomeProd, 'count': 1 }
					}else{
						Produtos[dadosProd.idProduto].count += 1; 
					}
				});

				for(var i in Produtos){
					if( $('.rowProd-' + Produtos[i].idProduto).length > 0 ){
						$('.rowProd-' + Produtos[i].idProduto).find("count").text(Produtos[i].count);
						console.log( $('.rowProd-' + Produtos[i].idProduto).find(".count") );
					}else{
						var html = '<tr class="rowProd-' + Produtos[i].idProduto +'"><td>' + Produtos[i].idProduto +'</td>'+
						'<td>' + Produtos[i].nomeProd +'</td>'+
						'<td class="count">' + Produtos[i].count +'</td>'+
						'<td>REMOVER</td></tr>';
						$('#tabela').append(html);
					}
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
	atualiza_movimentacao();
	var tid = setInterval(atualiza_movimentacao, 1000);
	var tvi = setInterval(verificarItens, 2000);
	var tre = setInterval(atualiza_retornados, 2000);

});
