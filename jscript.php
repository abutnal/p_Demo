// SELECT ALL CATEGORY
$(document).ready(function(){
	$.ajax({
		url: 'controller.php',
		method: 'post',
		data: {selectCategory:1},
		success:function(response){
			$('#category').html(response);
			// console.log(response);
		}
	});
});
	
// SELECT PRODUCTS according to CATEGORY
$(document).ready(function(){
	$(document).on('change', '#category', function(){
		var id = $('#category').val();
		$.ajax({
			url: 'controller.php',
			method: 'post',
			data:{selectProduct:1, category_id:id},
			success:function(response){
				$('#product').html(response);
				// console.log(response);
			} 
		});
	});
}); 


// Save Orders
$(document).ready(function(){
	$(document).on('submit', '#saveOrder', function(event){
		event.preventDefault();
		var cat = $('#category').val();
		var product = $('#product').val();
		var price = $('#price').val();
		var photo = $('#photo').val();
		if (cat == null || cat=="Select Category") {
			alert('Please select category');
		}
		else if(product == null || product=="Select Product"){
			alert('Please select product');
		}
		else if(price == null || price==""){
			alert('Please enter price');
		}
		else if(photo == null || photo==""){
			alert('Please select photo');
		}
		else{
		$form = $(this);
		$.ajax({
			url: $form.attr('action'),
			method: $form.attr('method'),
			data: new FormData(this),
			contentType: false,
			processData: false,
			cache:false,
			success:function(response){
			 $('#message').html(response);
			 show();
			}
		});
		}
	});
});


// SELECT ALL ORDERS
$(document).ready(function(){
	$('#cancel').hide();
	show();
});
function show(){
	$.ajax({
		url: 'controller.php',
		method: 'post',
		data: {selectOrder:1},
		dataType:'json',
		success:function(response){
			$('#table').html(response);
			// console.log(response);
		}
	});
}

// SELECT PRODUCTS according to CATEGORY
$(document).ready(function(){
	$(document).on('click', '#edit', function(event){
		event.preventDefault();
		$anchor = $(event.target);
		var id = $anchor.attr('order-id');
		$.ajax({
			url: 'controller.php',
			method: 'post',
			dataType: 'json',
			data:{OrderSelectOne:1, order_id:id},
			success:function(response){
				// console.log(response);
				$.each(response, function(key, value){
					$("."+key).val(value);
					$('#'+ key +' option:selected').text(value);
					if(key == 'photo'){
					$('#image').html('<img width="100px" src="assets/image/'+ value +'">');
					}
				});
				$('#cancel').show();
				$('.order').val('Update');
				$('.panel-heading').html('Update Order');
				$("form#saveOrder").prop('id','updateOrder');
				$("input#saveOrder").prop('name','updateOrder');
				$("input#saveOrder").prop('id','updateOrder');
			} 
		});
	});

	$(document).on('click','#cancel', function(event){
		// event.preventDefault();
		$('#saveOrder')[0].reset();

		$('#cancel').hide();
	});
}); 

// UPDATE RECORDS
$(document).ready(function(){
	$(document).on('submit', '#updateOrder', function(event){
		event.preventDefault();
		var cat = $('#category').val();
		var product = $('#product').val();
		var price = $('#price').val();
		var photo = $('#photo').val();
		if (cat == null || cat=="Select Category") {
			alert('Please select category');
		}
		else if(product == null || product=="Select Product"){
			alert('Please select product');
		}
		else if(price == null || price==""){
			alert('Please enter price');
		}
		else{
		$form = $(this);
		$.ajax({
			url: $form.attr('action'),
			method: $form.attr('method'),
			data: new FormData(this),
			contentType:false,
			processData:false,
			cache: false,
			success:function(response){
				$('#message').html(response);
				show();
			}
		});
	}
	});
});

// Delete Records
$(document).ready(function(){
	$(document).on('click', '#delete', function(event){
		event.preventDefault();
		if (!confirm("Do you want to delete")){
      	return false;
    	}
    	else{
		$anchor = $(event.target);
		var id = $anchor.attr('order-id');
		 $.ajax({
		 	url: 'controller.php',
			method: 'post',
			data: {orderDelete:1, order_id:id},
			success:function(response){
				$('#message').html(response);
				show();
			}
		 });
		}
	});
});