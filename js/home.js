

	var context = $.get("https://www.shoppiapp.com/api/website/products/json?limit=8&filter=best",function(data){

	// Retrieve the template data from the HTML (jQuery is used here).
	var template = $('#list-products').html();

		$.each(data.products, function(i) {
			
			// Compile the template data into a function
			var templateScript = Handlebars.compile(template);
			// html = 'My name is Ritesh Kumar. I am a developer.'
			var html = templateScript(data.products[i]);

			// Insert the HTML code into the page
			$('#products-best-sellers').append(html);	
		});
	},'json');
	


	var context = $.get("https://www.shoppiapp.com/api/website/products/json?limit=8&filter=new",function(data){

	// Retrieve the template data from the HTML (jQuery is used here).
	var template = $('#list-new-products').html();

		$.each(data.products, function(i) {
			
			// Compile the template data into a function
			var templateScript = Handlebars.compile(template);
			// html = 'My name is Ritesh Kumar. I am a developer.'
			var html = templateScript(data.products[i]);

			// Insert the HTML code into the page
			$('#products-new-arrivals').append(html);	
		});
	},'json');


