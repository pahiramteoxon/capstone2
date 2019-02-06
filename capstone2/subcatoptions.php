<?php
	include_once 'core/init.php';
?>


<select class="form-control" name="product_sub" id="subcat-options" required>
	<option value="" readonly>Select Category</option>
		<?php   
			$catname = $_POST['catname'];  
			$myrow = $obj->fetch_data("product_category WHERE category_name = '".$catname."'");	
			foreach ($myrow as $rows): ?>
			<option value="<?php echo $rows['id'] ?>">
			    <?php echo $rows['subcategory_name'] ?>        			
			</option>
		<?php 
			endforeach; ?>
</select>