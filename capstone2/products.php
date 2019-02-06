<?php 

	include_once 'core/init.php';
	date_default_timezone_set('Asia/Manila');

	$uid = $_SESSION['id'];
	$pass = $_SESSION['password'];

	if(!$user->get_session()) {
		header("location:index.php");
	}

?>

<!DOCTYPE html>
<html>
<head> 
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="row">

<div class="col-md-3">
	<?php 
		include 'includes/admin_menu.php';
	?>
</div>

<div class="col-md-9 mt-3">

		<div class="col-md-12 p-0 ml-1">

			<div class="row">
			<div class="list-group d-flex flex-row row-hl col-md-8 px-2" id="th_disc" role="tablist">

			    <a class="list-group-item list-group-item-action active btn-outline-secondary btn text-center p-0 tabs" data-toggle="list" href="#prod" role="tab" id="manage_product">
			        <h6 class="pop-title pt-1">Manage Product</h6>
			    </a>

			    <a class="list-group-item list-group-item-action btn-outline-secondary btn text-center p-0 tabs" data-toggle="list"  href="#addprod" role="tab" id="add_product">
			        <h6 class="pop-title pt-1">Add Product</h6>
			    </a>  

			    <a class="list-group-item list-group-item-action btn-outline-secondary btn text-center p-0 tabs" data-toggle="list" href="#archiveprod" role="tab" id="archive_product">
			       	<h6 class="pop-title pt-1">Archive Product</h6>
			    </a>

			</div>
			</div>

		</div>

		<div id="myTabContent" class="col-md-12 p-0 tab-content">

<!-- manage product -->		

<div class="tab-pane active in prods" id="prod">	
    	
    	<div id="product_div">
    	<form method="POST">
	   	<table class="table-bordered display table-responsive" id="myTable">

	    <div class="row mb-3 mt-3">	
		<div class="col-md-3">
		    <select class="form-control" id="down">
		       <option value="" readonly>Select Field</option>
		       <option value="0">Product Code</option>
		       <option value="1">Product Name</option>
		       <option value="2">Product Description</option>	
		       <option value="3">Product Category</option>
		       <option value="4">Sub-Category</option>
		       <option value="5">Quantity</option>
		       <option value="6">Product Cost</option> 
		       <option value="7">Product SRP</option>
		    </select>
		</div>

		<input type="hidden" name="" id="hidden">

		<div class="col-md-3">
		  <input type="" name="" id="keyword" placeholder="Search" class="form-control">
		</div>
		</div>

	    <thead>    	
	    	<tr class="text-center">
	    		<th>Product Code</th>
	    		<th>Product Name</th>	
	    		<th>Product Description</th>
	    		<th>Product Category</th>
	    		<th>Subcategory</th>
	    		<th>Quantity</th>
	    		<th>Product Cost</th>
	    		<th>Product SRP</th>
	    		<th>Action</th>     		
	    	</tr>
	    </thead>
	    <tbody>

	    	<?php 			
		    	// $myrows = $obj->fetch_prod("Available");
	    		$myrows = $obj->fetch_prod("available");
				foreach($myrows as $row): 
				$pid = $row['ids'];	
				$qty = $row['product_quantity'];

				$prodcode = "".str_pad($pid, 6, "0",STR_PAD_LEFT);
			?>		

	    	<tr class="text-center">
	    		<td><?php echo strtoupper($row['product_number']);?></td>
	    		<td><?php echo $row['product_name'];?></td>
	    		<td><?php echo $row['product_desc'];?></td>
	    		<td><?php echo $row['category_name'];?></td>
	    		<td><?php echo $row['subcategory_name'];?></td>
	    		<td><?php echo $row['product_quantity'];?></td>
	    		<td><?php echo $row['product_price'];?></td>
	    		<td><?php echo $row['product_srp'];?></td>

	    		<td id="btn-group">
	  <!--   		<div class="btn-group">	 -->
	    			<button type="button" class="btn btn-warning edit btn-block" name="btn_edit" id="<?php echo $row['id'];?>">
	    				<i class="fa fa-edit"></i> EDIT
	    			</button>
    			

	    		<?php	
	    		
	    			if($qty == 0) {

	    		?>
	    			<button class="btn btn-danger archive btn-block" id="<?php echo $row['id'];?>" data-toggle="modal" data-target="#modal_archive" name="archive" type="button">
	    				<i class="fa fa-trash"></i> ARCHIVE
	    			</button>

	    		<?php
	    		
	    		}

	    		?>	
	   <!--  		</div>	 -->
	    		</td>	    		
	    	</tr>

	    	<?php 
	    		endforeach;
	    	?>

	    </tbody>
	    </table>
	    </form>
    	</div>
    	

		<!-- edit product -->

		<div id="edit_product_div"></div>

</div>
<!-- ------------ -->

<!-- archive prod -->
    	<div class="tab-pane fade" id="archiveprod">	

	   	<div id="product_div">
    	<form method="POST">
	   	<table class="table-bordered display ml-3" id="myTable1">

	    <div class="row mb-3 ml-1 mt-3">	
		<div class="col-md-3">
		    <select class="form-control" id="arc_down">
		       <option value="" readonly>Select Field</option>
		       <option value="0">Product Code</option>
		       <option value="1">Product Name</option>
		       <option value="2">Product Description</option>
		       <option value="3">Product Category</option>
	    	   <option value="4">Subcategory</option>
		       <option value="5">Quantity</option>
		       <option value="6">Product Price</option> 
		       <option value="7">Product SRP</option>    
		    </select>
		</div>

		<input type="hidden" name="" id="hidden_arc">

		<div class="col-md-3">
		  <input type="" name="" id="keyword_arc" placeholder="Search" class="form-control">
		</div>
		</div>
		
	    <thead>    	
	    	<tr>	    		
	    		<th>Product Code</th>
	    		<th>Product Name</th>	
	    		<th>Product Description</th>
	    		<th>Product Category</th>
	    		<th>Subcategory</th>
	    		<th>Quantity</th>
	    		<th>Product Price</th>
	    		<th>Product SRP</th>
	    		<th>Action</th>      	
	    	</tr>
	    </thead>
	    <tbody>

	    	<?php 			
		    	$myrow = $obj->fetch_prod("archive");
				foreach($myrow as $row): 
				$pid = $row['ids'];	
				$prodcode = "".str_pad($pid, 6, "0",STR_PAD_LEFT);
			?>	

	    	<tr>
	    		<td><?php echo $prodcode;?></td>
	    		<td><?php echo $row['product_name'];?></td>
	    		<td><?php echo $row['product_desc'];?></td>
	    		<td><?php echo $row['category_name'];?></td>
	    		<td><?php echo $row['subcategory_name'];?></td>
	    		<td><?php echo $row['product_quantity'];?></td>
	    		<td><?php echo $row['product_price'];?></td>
	    		<td><?php echo $row['product_srp'];?></td>

	    	<td id="btn-group">
<!-- 	    		<div class="btn-group">	 -->	
	    			<button type="button" class="btn btn-danger retrieve" id="<?php echo $row['id'];?>" data-toggle="modal" data-target="#modal_retrieve_supplier">
	    				<i class="fa fa-trash"></i> RETRIEVE
	    			</button>
<!-- 	    		</div>	 -->
	    	</td>
	    	</tr>

	    	<?php 
	    		endforeach;
	    	?>	

	    </tbody>
	    </table>
		</form>
		</div>

    	</div>

<!-- ----------- -->


<!-- add prod -->

		<div class="tab-pane fade" id="addprod">

			<div class="container py-5 ml-2" id="addprod_container">
			<div class="row">
			<div class="col-md-12">	

			<form action="" method="POST">	
				<?php   
		       	$myrow = $obj->fetch_code("products");
				foreach($myrow as $row): 
					$pid = $row['item_code'];	
					$prodcode = "".str_pad($pid, 6, "0",STR_PAD_LEFT);
				endforeach;
		       ?>	
			   <div class="form-group">
			   <div class="row">

			        <label class="col-md-2 control-label">Product Code</label> 
			        <div class="col-md-2 pr-0">
			            <input type="text" class="form-control p-0 m-0" name="cat_code" 
			            id="cat_code" style="text-transform: uppercase;" readonly>
			        </div>
			        <div class="col-md-2 pr-0">
			            <input type="text" class="form-control p-0 m-0" name="sub_code" 
			            id="sub_code" style="text-transform: uppercase;" readonly>
			        </div>
			        <div class="col-md-2 pr-0">
			            <input type="text" class="form-control p-0 m-0" name="prod_name"
			            id="prod_name" value="<?php echo $prodcode;?>" readonly>
			        </div>

			    </div>
			    </div> 


			   <div class="form-group">
			   <div class="row">

			        <label class="col-md-2 control-label">Product Name</label> 
			        <div class="col-md-4">
			            <input type="text" class="form-control p-0" name="product-title" placeholder="Product Name" required>
			        </div>

			        <label class="col-md-2 control-label" id="label_qty">Quantity</label> 
			        <div class="col-md-4">
			            <input type="number" class="form-control p-0" name="product-quantity" placeholder="Product Quantity" id="product-quantity" required> 
			        </div>

			    </div>
			    </div> 

			    <div class="form-group">
			    <div class="row">

			   	<?php 			
			    	$myrow = $obj->fetch_data("product_category GROUP BY category_name");				 
				?>	

			        <label class="col-md-2 control-label">Product Category</label> 
			        <div class="col-md-4">
			        <select class="form-control" name="product_category" id="category_options" required>
			            <option value="" readonly>Select Category</option>
			              <?php      
			                foreach ($myrow as $row): ?>
			           			<option value="<?php echo $row['category_name'] ?>">
			              			<?php echo $row['category_name'] ?>        			
			              		</option>
			    		  <?php  endforeach; ?>
		          	</select>
		          	<input type="hidden" name="cat_name" id="cat_name">
		          	</div>

			        <label class="col-md-2 control-label" id="sublabel" style="display: none;">Product Sub-Category</label> 
			        <div class="col-md-4" id="sub-options-div">

			        </div>

			    </div>
			    </div> 

			    <div class="form-group">
			    <div class="row">

			   	<?php 			
			    	$myrow = $obj->fetch_data("product_supplier");				 
				?>	

			        <label class="col-md-2 control-label">Supplier Company</label> 
			        <div class="col-md-4">
			        <select class="form-control" name="product_supplier" id="supplier_options" required>
			            <option value="" readonly>Select Supplier</option>
			              <?php      
			                foreach ($myrow as $row): ?>
			           		<option value="<?php echo $row['id'] ?>">
			              		<?php echo ucwords($row['supplier_comp_name']);?>
			              	</option>
			    		  <?php  endforeach; ?>
		          	</select>
			        </div>

			    </div>
			    </div> 


			    <div class="form-group">
			    <div class="row">

			        <label class="col-md-2 control-label">Product Description</label> 
			        <div class="col-md-10">
			            <textarea type="text" class="form-control p-0" name="product-description" placeholder="Product Description" required></textarea>
			        </div>

			    </div>
			    </div> 


			    <div class="form-group">
			    <div class="row">

			        <label class="col-md-2 control-label">Product Price</label> 
			        <div class="col-md-4">
			            <input type="number" class="form-control p-0" name="product-price" placeholder="Product Price" id="product-price" required> 
			        </div>

			        <label class="col-md-2 control-label">Product SRP</label> 
			        <div class="col-md-4">
			            <input type="number" class="form-control p-0" name="product-srp" placeholder="Product SRP" id="product-srp" required> 
			        </div>        

			    </div>
			    </div> 

			    <div class="form-group">
			    <div class="row m-2">

				<button type="submit" class="btn btn-success" name="add_products">SUBMIT</button>       

			    </div>
			    </div> 

			</form>    
			</div> <!-- col-md-12 -->
			</div> <!-- row -->
			</div> <!-- container -->						

		</div>

<!-- ----------- -->

    	</div> <!-- my tab content -->

</div>
</div>


<!-- archieve modal -->

<div class="modal small fade" id="modal_archive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-dialog">
<div class="modal-content">

    <div class="modal-header">
 
        <h4 class="modal-title float-left">
            <i class="fa fa-trash"></i> Move to Archive
        </h4>   

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>


    </div>

	<form method="post" id="archive" action="">              
    <div class="modal-body">

        <div class="form-group">
            <p>Do you really want to move it to Archive ?</p>
            <label for="psw"><span> Confirm Password</span></label>
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="userid" id="userid" value="<?php echo $uid; ?>">
            <input type="password" class="form-control input-md" id="psw" name="pass" placeholder="Enter password">    
        </div>

    </div>


        <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
            	<i class="fa fa-times-circle"></i> Cancel
            </button>
            <button class="btn btn-success" type="submit" name="btn_archive_product">
            	<i class="fa fa-trash"></i> Archive
        	</button>
        </div>
       
		</form>

</div>
</div>
</div>

<!-- end -->


<!-- retrieve modal -->

<div class="modal small fade" id="modal_retrieve_supplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

    <div class="modal-header">
 
        <h4 class="modal-title float-left">
            <i class="fa fa-trash"></i> Retrieve Product
        </h4>   

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>


    </div>

	<form method="post" id="archive" action="">              
    <div class="modal-body">

        <div class="form-group">
            <p>Do you really want to retrieve the product ?</p>
            <label for="psw"><span> Confirm Password</span></label>
            <input type="hidden" name="ids" id="ids">	
            <input type="hidden" name="userid" id="userid" value="<?php echo $uid; ?>">
            <input type="password" class="form-control input-md" id="psw" name="pass" placeholder="Enter password">    
        </div>

    </div>


        <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
            	<i class="fa fa-times-circle"></i> Cancel
            </button>
            <button class="btn btn-success" type="submit" name="btn_retrieve_supplier">
            	<i class="fa fa-trash"></i> Retrieve
        	</button>
        </div>
       
		</form>

</div>
</div>
</div>
<!-- end -->


</body>

<?php include 'includes/footer.php'?>

<script type="text/javascript">

$(document).ready( function () {

	var table =  $('table#myTable').DataTable({'sDom':'tipr'});
	var arc_table =  $('table#myTable1').DataTable({'sDom':'tipr'});

	$('#keyword').keyup(function(){
	  table

	  .columns($("#hidden").val())
	  .search (this.value)
	  .draw();
	});	

	$('#keyword_arc').keyup(function(){
	  arc_table

	  .columns($("#hidden_arc").val())
	  .search (this.value)
	  .draw();
	});	

});

	$(".archive").click(function(){
	  var id = this.id.replace(/[^0-9]/g, '');
	  $("#id").val(id);
	});


	$(".retrieve").click(function(){
	  var id = this.id.replace(/[^0-9]/g, '');
	  $("#ids").val(id);
	});


	$(".edit").click(function(){

		prod_id = $(this).attr("id");

		$.ajax({
			method:"POST",
			url: "edit_product.php" ,
			data:{productid:prod_id},
			success: function(data){
				$("#product_div").hide();	
				$("#edit_product_div").html(data);	
					
			}

		});
	});

	$("#manage_product").click(function(){
		$(".edit_prod").hide();
		$("#product_div").show();
	})

//DATATABLES

	$(document).on('change','#down',function(){

	    var val = $(this).val();
	    $("#hidden").val(val);

	});

	$(document).on('change','#arc_down',function(){

	    var val = $(this).val();
	    $("#hidden_arc").val(val);

	});


	$(document).on('change','#category_options',function(){

	    var catname = $(this).val();
	    $("#cat_name").val(catname);

        var rep = catname.replace(/\s/g, '');
        var cut = rep.substring(0,3);
	    document.getElementById('cat_code').setAttribute('value',cut); 

	    $.ajax({
			method:"POST",
			url: "subcatoptions.php" ,
			data:{catname:catname},
			success: function(data){
				$("#sublabel").css('display','inline');	
				$("#sub-options-div").html(data);	
					
			}

		});

	});


	$(document).on('change','#subcat-options',function(){

	    var subname = $(this).val();
	    // $("#sub_name").val(subname);
	    var val =  $('#subcat-options').find(':selected').text();  

        var rep = val.replace(/\s/g, '');
        var cut = rep.substring(0,3);
	    document.getElementById('sub_code').setAttribute('value',cut); 

	});

</script>

</html>