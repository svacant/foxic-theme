function addToCart(el){
	
	
	$.post('/plugins/cart/ajax/add.php', {'data' : $(el).data('product'), 'qty': $('.qty-input').val() }, function(data){
		
	},'json');
}

