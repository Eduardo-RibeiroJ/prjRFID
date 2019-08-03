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
						$(status).attr('src', 'images/BolaVerde.png');
					}else{
						$(status).attr('src', 'images/BolaVermelha.png');
					}
				});
				
			}
		});
	}

	function atualiza_movimentacao() {
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

				//Logica entrada de produtos
				$.each(Produtos, function( index, value ) {
					var line = $('.item-' + value.idProduto);
					$(line).find('.retornados').text(value.count);

					var quant = parseInt( $(line).find('.quantidade').text() );
					var botao = $(line).find('.status img');
					if(quant === value.count){
						$(botao).attr('src', 'images/BolaVerde.png');
					}else{
						$(botao).attr('src', 'images/BolaVermelha.png');
					}
				});

				//Logica saida de produtos
				$.each(Produtos, function( index, value ) {
					var line = $('.rowProd-' + value.idProduto);
					if( $(line).length > 0 ){
						$(line).find(".count").text(value.count);
					}else{
						var html = '<tr class="rowProd-' + value.idProduto +'"><td>' + value.idProduto +'</td>'+
						'<td>' + value.nomeProd +'</td>'+
						'<td class="count">' + value.count +'</td>'+
						'<td><a data-id="' + value.idProduto + '" class="remover" href="#">REMOVER TODOS<a></td></tr>';
						$('#tabela').append(html);
					}
				});

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
					$('#tabetiquetas').append('<tr><td>'+dados[i].etiqueta+'</td><td><a href="?excluir='+dados[i].etiqueta+'">Remover</a> </td></tr>');
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
			success: function(itensRetornados){
				$('#itensRetornados strong').text(itensRetornados);

				var quant = $('#quant').text();
				if( quant == itensRetornados ){
					$('#status img').attr('src', 'images/BolaVerde.png');
				}else{
					$('#status img').attr('src', 'images/BolaVermelha.png');
				}
			}
		});
	}
	
	$('body').on('click', '#tabela .remover', function(e) {
		e.preventDefault();
		var id = $(this).data('id');

		$.ajax({
			type:'get',	 
			dataType: 'json',
			url: 'dadosJson.php?acao=apagarprod&rfid='+id, 
			success: function(ret){
				if(ret > 0){
					$('.rowProd-' + id).remove();
					alert('Removido com sucesso');
				}else{
					alert('Erro ao remover produto');
				}
			}
		});
	});
	
	atualiza_movimentacao();
	var tet = setInterval(atualiza_etiquetagem, 2000);
	var tid = setInterval(atualiza_movimentacao, 2000);
	var tvi = setInterval(verificarItens, 2000);
	var tre = setInterval(atualiza_retornados, 2000);

});
