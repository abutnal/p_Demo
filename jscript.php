// SELECT ALL CATEGORY
$(document).ready(function(){
	$.ajax({
		url: 'controller.php',
		method: 'post',
		data: {selectCategoryName:1},
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
			data:{selectProductName:1, category_id:id},
			success:function(response){
				$('#product').html(response);
				// console.log(response);
			} 
		});
	});
}); 


// Save Orders
$(document).ready(function(){
	$(document).on('submit', '#saveProduct', function(event){
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
		data: {selectAllProduct:1},
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
		var id = $anchor.attr('product-id');
		$.ajax({
			url: 'controller.php',
			method: 'post',
			dataType: 'json',
			data:{selectOneProduct:1, product_id:id},
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
				$('.product').val('Update Product');
				$('.panel-heading').html('Update Product');
				$("form#saveProduct").prop('id','updateProduct');
				$("input#saveProduct").prop('name','updateProduct');
				$("input#saveProduct").prop('id','updateProduct');
			} 
		});
	});

	$(document).on('click','#cancel', function(event){
		// event.preventDefault();
		$('#saveProduct')[0].reset();

		$('#cancel').hide();
	});
}); 

// UPDATE RECORDS
$(document).ready(function(){
	$(document).on('submit', '#updateProduct', function(event){
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
		var id = $anchor.attr('product-id');
		 $.ajax({
		 	url: 'controller.php',
			method: 'post',
			data: {productDelete:1, product_id:id},
			success:function(response){
				$('#message').html(response);
				show();
			}
		 });
		}
	});
});


$(document).ready(function(){
	$(document).on('submit', '#loginForm', function(event){
	event.preventDefault();
	 var username = $('#username').val();
	 var password = $('#password').val();
	 if (username==null || username=='') {
	 	alert('Username is required');
	 }
	 else if(password==null || password==''){
	 	alert('Password is required');
	 }
	 else{
	   $.ajax({
	   		url: 'controller.php',
	   		method: 'post',
	   		data: {login:1,username:username,password:password},
	   		success:function(response){
	   			if (response == 'fdlsgfmnlffsofiosdfn09iwrweoriw93') {
	   				window.location.href ='dashboard.php';
	   			}
	   			else{
	   				$('#message').html('<div class="alert alert-dismissible alert-warning">  <button type="button" class="close" data-dismiss="alert">&times;</button><strong> Username or password wrong</strong> </div>');
	   			}
	   		}
	   });
	}
	});
});

// DISPLAY ADMIN NAME
$(document).ready(function(){
	$.ajax({
		url: 'controller.php',
		method: 'post',
		dataType:'json',
		data: {admin_name:1},
		success:function(response){
			$('#admin_name').html(response);
		}
	});
});