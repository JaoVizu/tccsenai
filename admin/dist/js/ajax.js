(function(){
	$(document).ready(function(){
		$('#products').click(function(e){
			e.preventDefault();
			$('.content-header').hide();
			
			var carrega_url = this.id;
			carrega_url = carrega_url+'.php';//formando a url*/

			$.ajax({
				url:carrega_url,

				success: function(data){
					$('.conteudo').html(data);
				}
			});
		});

		$('#users').click(function(e){
			e.preventDefault();
			var carrega_url = this.id;
			carrega_url = carrega_url+'.php';//formando a url*/

			$.ajax({
				url:carrega_url,

				success: function(data){
					$('.conteudo').html(data);
				}
			});
		});
	});
}());