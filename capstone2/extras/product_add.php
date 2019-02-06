<?php 

	include_once 'core/init.php';
	date_default_timezone_set('Asia/Manila');

	$user = new DataOperation();
	$uid = $_SESSION['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<div class="row">


<div class="col-md-3">

	<?php include 'includes/admin_menu.php'?>

</div>


<div class="col-md-9">
<form action="" method="POST">

<!-- <div>
  <strong>
 	Add Product
  </strong>		
</div> -->

<div class="row m-0 p-0 mb-5">

	<div class="col-md-12 m-0 p-0" id="add_prod_upper">

	</div>

</div>

<div class="container">
<div class="row">
<div class="col-md-12">	

   <div class="form-group">
   <div class="row">

        <label class="col-md-2 control-label">Product Number</label> 
        <div class="col-md-4">
            <input type="text" class="form-control p-0" name="product-number" placeholder="Product Number" readonly>
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

</div> <!-- col-md-12 -->
</div> <!-- row -->
</div> <!-- container -->

</form>

</div> <!-- col md 9 -->


</div> <!-- row -->


</body>
</html>