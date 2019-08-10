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

	function atualiza_movimentacao_entrada() {
		var id_contrato = $('#tbContrato').attr("data-idContrato");

		$.ajax({
			type:'get',	 
			dataType: 'json', 
			url: 'dadosJson.php?acao=tempContrato&id_contrato='+id_contrato, 
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
					$(line).find('.retornados').text(value.count); //Atualiza a quantidade de itens retornados por produto

					var quant = parseInt( $(line).find('.quantidade').text() );
					var botao = $(line).find('.status img');
					if(quant === value.count){
						$(botao).attr('src', 'images/BolaVerde.png');
					}else{
						$(botao).attr('src', 'images/BolaVermelha.png');
					}
				});

			}
		});
	}

	function atualiza_movimentacao_saida() {
		var id_contrato = $('#tbContrato').attr("data-idContrato");
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

				//Logica saida de produtos
				$.each(Produtos, function( index, value ) {
					var line = $('.rowProd-' + value.idProduto);
					if( $(line).length > 0 ){
						$(line).find(".count").text(value.count);
					}else{
						var html = '<tr class="rowProd-' + value.idProduto +'"><td>' + value.idProduto +'</td>'+
						'<td>' + value.nomeProd +'</td>'+
						'<td class="count">' + value.count +'</td>'+
						'<td><a data-id="' + value.idProduto + '" class="remover" href="#">Remover Todos<a></td></tr>';
						$('#tabela').append(html);
					}
				});
			}
		});
	}


	function atualiza_etiquetagem() { 
		var id_produto = $('#idProduto').attr("data-idProduto");

		$('#tabetiquetas').empty();  
		$.ajax({
			type:'get',	 
			dataType: 'json', 
			url: 'dadosJson.php?acao=tempetiquetas', 
			success: function(dados){
				
				dados = JSON.parse(JSON.stringify(dados));
				
				for(var i in dados) {
					$('#tabetiquetas').append('<tr><td>'+dados[i].etiqueta+'</td><td><a href="?idProduto='+id_produto+'&excluir='+ dados[i].etiqueta +'">Remover</a> </td></tr>');
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
				$('#itensRetornados strong').text(itensRetornados); //Atualiza o <strong> com a quantidade total de itens retornados

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

	var path = window.location.pathname;
	var location = path.split('/').pop();

	if(location === 'movimentacao_iniciar_saida.php'){
		var tame = setInterval(atualiza_movimentacao_saida, 2000);
	}else if(location === 'movimentacao_iniciar_entrada.php'){
		var tams = setInterval(atualiza_movimentacao_entrada, 2000);
		var tvi = setInterval(verificarItens, 2000);s
		var tre = setInterval(atualiza_retornados, 2000);
	}else if(location === 'produto_etiquetar.php'){
		var tet = setInterval(atualiza_etiquetagem, 2000);
	}
});
