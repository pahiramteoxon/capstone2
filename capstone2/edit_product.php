<?php
	include_once 'core/init.php';
?>
   	<div class="edit_prod" id="prod" style="">

			<div class="container py-5 ml-2" id="addprod_container">
			<div class="row">
			<div class="col-md-12">	

			<form method="POST">	
	    	<?php 			

		    	$productid = $_POST['productid'];
		    	$myrow = $obj->fetch_data("products  WHERE id ="."'$productid'");	
				foreach($myrow as $rows): 

			?>	

			   <input type="hidden" name="prodid" value="<?php echo $productid; ?>">
			   <div class="form-group">
			   <div class="row">

			        <label class="col-md-2 control-label">Product Number</label> 
			        <div class="col-md-4">
			            <input type="text" class="form-control p-0" name="product-number" value="<?php echo $rows['product_number'];?>"readonly>
			        </div>

			    </div>
			    </div> 


			   <div class="form-group">
			   <div class="row">

			        <label class="col-md-2 control-label">Product Name</label> 
			        <div class="col-md-4">
			            <input type="text" class="form-control p-0" name="product-title" value="<?php echo $rows['product_name'];?>">
			        </div>

			        <label class="col-md-2 control-label" id="label_qty">Quantity</label> 
			        <div class="col-md-4">
			            <input type="number" class="form-control p-0" name="product-quantity" id="product-quantity" value="<?php echo $rows['product_number']; ?>" readonly> 
			        </div>

			    </div>
			    </div> 

			    <div class="form-group">
			    <div class="row">

			        <label class="col-md-2 control-label">Product Description</label> 
			        <div class="col-md-10">
			            <input type="text" class="form-control p-0" name="product-description" value="<?php echo $rows['product_desc'];?>">
			        </div>

			    </div>
			    </div> 


			    <div class="form-group">
			    <div class="row">

			        <label class="col-md-2 control-label">Product Price</label> 
			        <div class="col-md-4">
			            <input type="number" class="form-control p-0" name="product-price" placeholder="Product Price" id="product-price" value="<?php echo $rows['product_price']; ?>"> 
			        </div>

			        <label class="col-md-2 control-label">Product SRP</label> 
			        <div class="col-md-4">
			            <input type="number" class="form-control p-0" name="product-srp" id="product-srp" value="<?php echo $rows['product_srp']; ?>"> 
			        </div>        

			    </div>
			    </div> 

			    <div class="form-group">
			    <div class="row m-2">

  			    	<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
            			<i class="fa fa-times-circle"></i> Cancel
            		</button>
					<button type="submit" class="btn btn-success" name="edit_products">EDIT</button>       
			    </div>
			    </div> 

			    <?php 
					endforeach; 
				?>
			  </form>  

			</div> 
			</div> 
			</div> 
    	</div>