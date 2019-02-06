 <?php 

include_once 'core/init.php';

$month = $_POST['month'];
$year = date("Y");

?>

<table class="table-bordered display ml-3" id="myTable1">
<form action="" method="POST">	

		<thead>    	
	    	<tr class="text-center">
	    		<th>Transaction Number</th>
	    		<th>Product Number</th>	
	    		<th>Product Name</th>
	    		<th>Quantity</th>
	    		<th>Product SRP</th>
	    		<th>Total Amount</th>
	    		<th>Date Ordered</th>         		
	    	</tr>
	    </thead>
	    
	    <tbody> 

<?php	    				
		$myrow = $obj->fetch_data("product_sales WHERE DATE_FORMAT(date_ordered, '%Y-%M' ) = '".$year."-".$month."'");
		
		foreach ($myrow as $row):
		$pid = $row['id'];
		$dates = $row['date_ordered'];
		$date_create = date_create($dates);
		$date =  date_format($date_create,"F j, Y");	
		$time =  date_format($date_create,"h:i a");	
	
?>

	    <tr class="text-center">
	
	    	<td><?php echo $row["transaction_number"]; ?></td>	
	    	<td><?php echo $row["product_number"]; ?></td>	
	    	<td><?php echo $row["product_name"]; ?></td>	
	    	<td><?php echo $row["product_qty"]; ?></td>	
	    	<td><?php echo $row["product_price"]; ?></td>	
	    	<td><?php echo $row["product_total_amount"]; ?></td>	
	    	<td><?php echo $date."<br>".$time  ?></td>	

	    </tr>
	    	
<?php endforeach;  ?>
	   		
		</tbody>

</form>
</table>

<?php 
	include 'includes/footer.php';
?>