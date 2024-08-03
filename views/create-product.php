<!doctype html>
<html lang="en" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Product Add</title>

    <style type="text/css">
    	.product-type-details {
			top: 0;
			display:none;
		}

		footer {
			bottom: 0;
			position: absolute;
			left: 0;
		}
    </style>
  </head>
  <body class="h-100">
  	<div class="container h-100 position-relative">
		<div class="pt-5 mb-2">
			<div class="row">
				<h2>Product Add</h2>
				<div class="ml-auto">
					<button type="button" class="btn btn-primary" onclick="saveProduct()">Save</button>
					<a class="btn btn-secondary" href="/">Cancel</a>
				</div>
			</div>
	  	</div>

	  	<hr>

	  	<div class="my-5">
	  		<?php if (isset($errors)) { ?>
			  		<div class="alert alert-danger">
			  			<?php 
			  				foreach ($errors as $error) {
			  					echo $error . '<br>';
			  				}
			  			?>
			  		</div>
	  		<?php } ?>
		  	<form id="product_form" action="/add-product" method="POST">
		  		<div class="row">
			  		<div class="col-md-6">
				  		<div class="form-group row mb-4">
				  			<label class="col-4 mb-0 align-self-center" for="sku">SKU</label>
			    			<input type="text" class="form-control col-8" id="sku" name="SKU" required>
				  		</div>
				  		<div class="form-group row mb-4">
				  			<label class="col-4 mb-0 align-self-center" for="name">Name</label>
			    			<input type="text" class="form-control col-8" id="name" name="name" required>
				  		</div>
				  		<div class="form-group row mb-4">
				  			<label class="col-4 mb-0 align-self-center" for="price">Price ($)</label>
			    			<input type="number" class="form-control col-8" id="price" name="price" min="1" step="any" required>
				  		</div>
				  		<div class="form-group row mb-4">
				  			<label class="col-4 mb-0 align-self-center" for="productType">Type Switcher</label>
			    			<select class="form-control col-8" id="productType" name="type" required>
			    				<option value="">Type Switcher</option>
			    				<option id="DVD" value="DVD">DVD</option>
			    				<option id="Furniture" value="furniture">Furniture</option>
			    				<option id="Book" value="book">Book</option>
			    			</select>
				  		</div>
				  	</div>

				  	<div class="col-md-1"></div>

			  		<div class="col-md-5">
			  			<div class="position-relative">
					  		<div class="product-type-details position-absolute w-100" data-select-type="DVD">
						  		<div class="form-group row">
						  			<label class="col-4 mb-0 align-self-center" for="size">Size (MB)</label>
					    			<input type="number" class="form-control col-8" id="size" name="size" step="any">
						  		</div>
				    			<span class="form-text text-muted">Please provide size in MB.</span>
					  		</div>

					  		<div class="product-type-details position-absolute w-100" data-select-type="furniture">
						  		<div class="form-group row mb-4">
						  			<label class="col-4 mb-0 align-self-center" for="height">Height (CM)</label>
					    			<input type="number" class="form-control col-8" id="height" name="height" step="any">
						  		</div>
						  		<div class="form-group row mb-4">
						  			<label class="col-4 mb-0 align-self-center" for="width">Width (CM)</label>
					    			<input type="number" class="form-control col-8" id="width" name="width" step="any">
						  		</div>
						  		<div class="form-group row">
						  			<label class="col-4 mb-0 align-self-center" for="length">Length (CM)</label>
					    			<input type="number" class="form-control col-8" id="length" name="length" step="any">
						  		</div>
					    		<span class="form-text text-muted">Please provide dimentions in HxWxL format.</span>
					  		</div>
					  		
					  		<div class="product-type-details position-absolute w-100" data-select-type="book">
						  		<div class="form-group row">
						  			<label class="col-4 mb-0 align-self-center" for="weight">Weight (KG)</label>
					    			<input type="number" class="form-control col-8" id="weight" name="weight" step="any">
						  		</div>
				    			<span class="form-text text-muted">Please provide weight in KG.</span>
					  		</div>
					  	</div>
				  	</div>
				</div>
				<button class="d-none" id="submit-btn">Save</button>
		  	</form>
		</div>


		<footer class="pb-4 text-center w-100">
			<hr>
		 	<center>Scandiweb Test Assignment</center>
		</footer>
	 </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
    	$(document).ready(function() {
    		$('#productType').val('');

	    	$('#productType').change(function() {
	    		$('.product-type-details').fadeOut(100);
	    		typeFieldsDiv = $("[data-select-type='"+productType.value+"']");
	    		typeFieldsDiv.fadeIn(1000);
	    		typeFieldsDiv.find('input').each(function(index, input) {
	    			input.setAttribute('required', '');
	    		});
	    	});
    	});

    	function saveProduct() {
    		$('#submit-btn').click();
    	}
    </script>
  </body>
</html>