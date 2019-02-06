 <?php

include_once 'core/init.php';

?>
   	<div class="edit_supplier" id="prod" style="">

			<div class="container py-5 ml-2" id="addprod_container">
			<div class="row">
			<div class="col-md-12">	

			<form method="POST">	
	    	<?php 			

		    	$sid = $_POST['supp_id'];
		    	$myrow = $obj->fetch_data("product_supplier WHERE id ="."'$sid'");	
				foreach($myrow as $rows): 

			?>	

			   <input type="hidden" name="supid" value="<?php echo $sid; ?>">
			   <div class="form-group">
			   <div class="row">

			        <label class="col-md-2 control-label">
			        	Supplier Company
			        </label> 
			        <div class="col-md-4">
			            <input type="text" class="form-control p-0" name="supplier_company" 
			            value="<?php echo $rows["supplier_comp_name"];?>">
			        </div>

			        <label class="col-md-2 control-label">
			        	Supplier Contact Name
			        </label> 
			        <div class="col-md-4">
			            <input type="text" class="form-control p-0" name="supplier_name" 
			            value="<?php echo $rows["supplier_name"];?>">
			        </div>

			    </div>
			    </div> 


			   <div class="form-group">
			   <div class="row">

			        <label class="col-md-2 control-label" id="label_qty">
			       		Supplier Address
			    	</label> 
			        <div class="col-md-6">
			            <input type="text" class="form-control p-0" name="supplier_address" 
			            value="<?php echo $rows["supplier_address"];?>" id="supplier_address"> 
			        </div>

			    </div>
			    </div> 

			    <div class="form-group">
			    <div class="row">

			        <label class="col-md-2 control-label">
			        	Supplier Contact Number
			        </label> 
			        <div class="col-md-4">
		            	<input type="tel" class="form-control p-0" id="supplier_phone" name="supplier_phone" 
		            	value="<?php echo $rows["supplier_phone"];?>">
			        </div>
			        <div class="col-md-4">
		            	<input type="tel"  class="form-control p-0" name="supplier_tel" id="supplier_tel" value="<?php echo $rows["supplier_tel"];?>"> 
			        </div>

			    </div>
			    </div> 


			    <div class="form-group">
			    <div class="row m-2">

			    	<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
            			<i class="fa fa-times-circle"></i> Cancel
            		</button>
					<button type="submit" class="btn btn-success" name="edit_supplier">EDIT SUPPLIER</button>       

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

	