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

<div class="col-md-8 offset-md-3 mt-3">

		<div class="col-xs-12 p-0 ml-3">

			<div class="row">
			<div class="list-group d-flex flex-row row-hl col-md-8 px-2" id="th_disc" role="tablist">

			    <a class="list-group-item list-group-item-action active btn-outline-secondary btn text-center p-0 tabs" data-toggle="list" href="#supp" role="tab" id="manage_supplier">
			        <h6 class="pop-title pt-1">Manage Suppliers</h6>
			    </a>

			    <a class="list-group-item list-group-item-action btn-outline-secondary btn text-center p-0 tabs" data-toggle="list"  href="#addsupp" role="tab" id="add_supplier">
			        <h6 class="pop-title pt-1">Add Supplier</h6>
			    </a>  

			    <a class="list-group-item list-group-item-action btn-outline-secondary btn text-center p-0 tabs" data-toggle="list" href="#archivesupp" role="tab" id="archive_supplier">
			       	<h6 class="pop-title pt-1">Archive Suppliers</h6>
			    </a>

			</div>
			</div>

		</div>

		<div id="myTabContent" class="col-md-12 p-0 tab-content">

<!-- manage supplier -->		

<div class="tab-pane active in prods" id="supp">	
    	
    	<div id="" class="mt-3">
    	<form method="POST">
	    <table class="table-bordered display ml-3" id="myTable">

	    <div class="row mb-3 ml-1">	
		<div class="col-md-3">
		    <select class="form-control" id="down">
		       <option value="" readonly>Select Field</option>
		       <option value="0">Supplier Company</option>
		       <option value="1">Supplier Contact Name</option>
		       <option value="2">Address</option>
		       <option value="3">Phone Number</option>
		       <option value="4">Telephone Number</option>    
		    </select>
		</div>

		<input type="hidden" name="" id="hidden">

		<div class="col-md-3">
		  <input type="" name="" id="keyword" placeholder="Search" class="form-control">
		</div>
		</div>

	    <thead>    	
	    	<tr class="text-center">
	    		<th>Supplier Company</th>
	    		<th>Supplier Contact Name</th>	
	    		<th>Supplier Address</th>
	    		<th>Supplier Phone Number</th>
	    		<th>Supplier Telephone Number</th>
	    		<th>Action</th>     		
	    	</tr>
	    </thead>
	    <tbody>

	    	<?php 			
		    	$myrow = $obj->fetch_data("product_supplier  WHERE status = 'available' ");
				foreach($myrow as $row): 
				$pid = $row['id'];	
			?>	
	    	<tr class="text-center">
	
	    		<td><?php echo ucwords($row['supplier_comp_name']);?></td>
	    		<td><?php echo ucwords($row['supplier_name']);?></td>
	    		<td><?php echo ucwords($row['supplier_address']);?></td>
	    		<td><?php echo ucwords($row['supplier_phone']);?></td>
	    		<td><?php echo ucwords($row['supplier_tel']);?></td>

	    		<td>
	    		<div class="btn-group">	
	    			<button type="button" class="btn btn-warning edit" name="btn_edit" id="<?php echo $row['id'];?>">
	    				<i class="fa fa-edit"></i>EDIT
	    			</button>

	    			<button type="button" class="btn btn-danger archive" id="<?php echo $row['id'];?>" data-toggle="modal" data-target="#modal_archive_supplier">
	    				<i class="fa fa-trash"></i>ARCHIVE
	    			</button>
	    		</div>	
	    		</td>	    		
	    	</tr>

	    	<?php 
	    		endforeach;
	    	?>

	    </tbody>
	    </table>
	    </form>
    	</div>
    	

		<!-- edit supplier -->

		<div id="edit_supplier_div"></div>

</div>
<!-- ------------ -->

<!-- archive supplier -->
    	<div class="tab-pane fade" id="archivesupp">	

    	<div id="" class="mt-3">
    	<form method="POST">
	    <table class="table-bordered display ml-3" id="myTable1">

	    <div class="row mb-3 ml-1">	
		<div class="col-md-3">
		    <select class="form-control" id="arc_down">
		       <option value="" readonly>Select Field</option>
		       <option value="0">Supplier Company</option>
		       <option value="1">Supplier Contact Name</option>
		       <option value="2">Address</option>
		       <option value="3">Phone Number</option>
		       <option value="4">Telephone Number</option>    
		    </select>
		</div>

		<input type="hidden" name="" id="hidden_arc">

		<div class="col-md-3">
		  <input type="text" name="" id="keyword1" placeholder="Search" class="form-control">
		</div>
		</div>

	    <thead>    	
	    	<tr class="text-center">
	    		<th>Supplier Company</th>
	    		<th>Supplier Contact Name</th>	
	    		<th>Supplier Address</th>
	    		<th>Supplier Phone Number</th>
	    		<th>Supplier Telephone Number</th>
	    		<th>Action</th>     		
	    	</tr>
	    </thead>
	    <tbody>

	    	<?php 			
		    	$myrow = $obj->fetch_data("product_supplier  WHERE status = 'archive' ");
				foreach($myrow as $row): 
				$pid = $row['id'];	
			?>	
	    	<tr class="text-center">
	
	    		<td><?php echo ucwords($row['supplier_comp_name']);?></td>
	    		<td><?php echo ucwords($row['supplier_name']);?></td>
	    		<td><?php echo ucwords($row['supplier_address']);?></td>
	    		<td><?php echo ucwords($row['supplier_phone']);?></td>
	    		<td><?php echo ucwords($row['supplier_tel']);?></td>

	    		<td>
	    		<div class="btn-group">	

	    			<button type="button" class="btn btn-danger retrieve" id="<?php echo $row['id'];?>" data-toggle="modal" data-target="#modal_retrieve_supplier">
	    				<i class="fa fa-trash"></i> RETRIEVE
	    			</button>
	    		</div>	
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

<!-- add supplier -->
		<div class="tab-pane fade" id="addsupp">

			<div class="container py-5 ml-2" id="addprod_container">
			<div class="row">
			<div class="col-md-12">	

			<form action="" method="POST">	
			   <div class="form-group">
			   <div class="row">

			        <label class="col-md-2 control-label">
			        	Supplier Company
			        </label> 
			        <div class="col-md-4">
			            <input type="text" class="form-control p-0" name="supplier_company" placeholder="Supplier Company" required>
			        </div>

			        <label class="col-md-2 control-label">
			        	Supplier Contact Name
			        </label> 
			        <div class="col-md-4">
			            <input type="text" class="form-control p-0" name="supplier_name" placeholder="Supplier Name" required>
			        </div>

			    </div>
			    </div> 


			   <div class="form-group">
			   <div class="row">

			        <label class="col-md-2 control-label" id="label_qty">
			       		Supplier Address
			    	</label> 
			        <div class="col-md-6">
			            <input type="text" class="form-control p-0" name="supplier_address" placeholder="Supplier Address" id="supplier_address" required> 
			        </div>

			    </div>
			    </div> 

			    <div class="form-group">
			    <div class="row">

			        <label class="col-md-2 control-label">
			        	Supplier Contact Number
			        </label> 
			        <div class="col-md-5">
		            	<input type="tel"  class="form-control p-0" id="supplier_phone" name="supplier_phone" placeholder="Mobile Number e.g. +(63) 912-456-7890" required="">
			        </div>
			        <div class="col-md-5">
		            	<input type="tel"  class="form-control p-0" name="supplier_tel" placeholder="Telephone Number e.g. 123-4567 " id="supplier_tel" required> 
			        </div>

			    </div>
			    </div> 


			    <div class="form-group">
			    <div class="row m-2">

					<button type="submit" class="btn btn-success" name="add_supplier">ADD SUPPLIER</button>       

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

<div class="modal small fade" id="modal_archive_supplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <button class="btn btn-success" type="submit" name="btn_archive_supplier">
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
	$('#keyword').keyup(function(){
	  table

	  .columns($("#hidden").val())
	  .search (this.value)
	  .draw();
	});	

// archive 

	var archivetable = $('table#myTable1').DataTable({'sDom':'tipr'});
	$('#keyword1').keyup(function(){
	  archivetable

	  .columns($("#hidden_arc").val())
	  .search (this.value)
	  .draw();
	});	

});

 	$("#supplier_phone").mask("+(99) 999-999-9999");
  	$("#supplier_tel").mask("999-9999");   


	$(".archive").click(function(){
	  var id = this.id.replace(/[^0-9]/g, '');
	  $("#id").val(id);
	});


	$(".retrieve").click(function(){
	  var id = this.id.replace(/[^0-9]/g, '');
	  $("#ids").val(id);
	});


	$(".edit").click(function(){

		supp_id = $(this).attr("id");

		$.ajax({
			method:"POST",
			url: "edit_supplier.php" ,
			data:{supp_id:supp_id},
			success: function(data){
				$("#supplier_div").hide();	
				$("#edit_supplier_div").html(data);	
					
			}

		});
	});

	$("#manage_product").click(function(){
		$(".supplier_prod").hide();
		$("#supplier_div").show();
	});

// DATATABLES

	$(document).on('change','#down',function(){

	    var val = $(this).val();
	    $("#hidden").val(val);

	});

	$(document).on('change','#arc_down',function(){

	    var val = $(this).val();
	    $("#hidden_arc").val(val);

	});



</script>

</html>