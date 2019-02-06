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
</head>
<body>


<div class="row">

<div class="col-md-3">
	<?php 
		include 'includes/admin_menu.php';
	?>
</div>

<div class="col-md-4 mt-5 mx-5">

	<div class="p-0 m-0" id="category_title">
		<p class="pl-3 mb-0">CATEGORY</p>
	</div>

<form method="POST">
	
	<table id="addNewCat">
	<tr>
	<td class="">

	        <input type="text" maxlength="40" style="width: 395px;" class="form-control" name="categorie_name" placeholder="Category Name">
	
	</td>
	</tr>
	</table>

	<div class="pl-2 pt-2">
		<button type="submit" class="btn btn-success" name="add_category"> Add Category</button>
		<button type="button"  name="add" id="add" class="btn btn-success">
			Add Sub-Category
	    </button>
	</div>
</form>


</div>


<div class="col-md-4 mt-5">

<form method="POST">
	
	<table>
		<thead>
			<th></th>
			<th>Category Name</th>
		</thead>
		<tbody>
			<?php 
				$myrow = $obj->fetch_data("product_category");
				foreach($myrow as $row): 
			?>
			<tr>
				<td><?php echo count_id();?></td>
				<td><?php echo $row['category_name'];?></td>
			</tr>

		<?php endforeach; ?>  
		</tbody>
	</table>

</form>


</div>



</div>

</body>
</html>

<script>

 $(document).on('click' , '#add', function(){
    $('#addNewCat').append('<tr><td><input type="text" name="subcat_name[]" value="" placeholder="Sub Category Name" maxlength="40" style="width:395px; padding-right:0px;margin-right:8px;" class="form-control name_list"/></td><td><button type="button" name="remove" id="" class="btn btn-danger fa fa-trash btn_remove"></button></td></tr>');
 });

 $(document).on('click' , '.btn_remove', function(){
    $(this).closest('tr').remove();
 });

</script>