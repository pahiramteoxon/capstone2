<?php 

	include_once 'core/init.php';
	date_default_timezone_set('Asia/Manila');

	$uid = $_SESSION['id'];
	$pass = $_SESSION['password'];

	if(!$user->get_session()) {
		header("location:index.php");
	}

?>

<div class="row">

<div class="col-md-3">
	<?php 
		include 'includes/admin_menu.php';
	?>
</div>

<div class="col-md-8 offset-md-3 mt-3">


<div class="row">
<div class="col-md-12">


<a href="sales.php" class="btn btn-info" >
  <i class="far fa-money-bill-alt"></i> Daily Sales
</a>

<a href="sales_monthly.php" class="btn btn-info" >
  <i class="far fa-money-bill-alt"></i> Monthly Sales
</a>

<a href="sales_yearly.php" class="btn btn-info" >
  <i class="far fa-money-bill-alt"></i> Annual Sales
</a>

<a href="sales_yearly_report.php" class="btn btn-info" name="view" title="View" target="_blank">
    <span class="fa fa-print"></span> PRINT
</a>

</div>
</div>

<br>


<div class="col-md-12">
<form method="POST" class="form-group">

<div class="row">

	<label class="col-md-1 ml-2" id="search_month"> SEARCH </label>  
	
     <?php 

        $startyear = date('Y');
        $endyear = $startyear - 10;

        $yearArray = range($startyear,$endyear);
    ?>

       <select class="col-md-8 form-control ml-2" name = "year" id="year">
       <option value=""> SELECT YEAR </option>

        <?php 
            foreach ($yearArray as $year) {
              $selected = ($year == $startyear) ? 'selected' : '';
              echo '<option '.$selected. 'value ="'.$year.'">'.$year.'</option>';
            }
        ?>
       </select>

</div> 

</form>
</div>


<div id="all_months">
<table class="table-bordered display ml-3" id="myTable">
<form action="" method="POST">	

		<thead class="allmonths">    	
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
	    <tbody class="allmonths">

	    	<?php 	
	    		$year = date('Y');		
		    	$myrow = $obj->fetch_data("product_sales WHERE DATE_FORMAT(date_ordered, '%Y')= '".$year."'");

				foreach($myrow as $row): 
				$pid = $row['id'];
				$dates = $row['date_ordered'];
				$date_create = date_create($dates);
				$date =  date_format($date_create,"F j, Y");	
				$time =  date_format($date_create,"h:i a");	
	
			?>	
	    	<tr class="text-center allmonths">
	
	    		<td><?php echo $row["transaction_number"]; ?></td>	
	    		<td><?php echo $row["product_number"]; ?></td>	
	    		<td><?php echo $row["product_name"]; ?></td>	
	    		<td><?php echo $row["product_qty"]; ?></td>	
	    		<td><?php echo $row["product_price"]; ?></td>	
 
	    		<td><?php echo $row["product_total_amount"]; ?></td>	
	    		<td><?php echo $date."<br>".$time  ?></td>	

	    	</tr>

	    	<?php 
	    		endforeach;
	    	?>

	    </tbody>
</form>
</table>
</div> <!-- all months -->	

<div id="selected_month">
			
</div> <!-- selected month -->



</div> <!-- //col-md-8 offset-md-3 -->


<div class="col-md-3">
	<?php 
		include 'includes/footer.php';
	?>
</div>

</div>

<script type="text/javascript">

$(document).ready( function () {

	
var table =  $('#myTable').DataTable({'sDom':'tipr'});

	// $('#keyword').keyup(function(){
	//   table

	//   .columns($("#hidden").val())
	//   .search (this.value)
	//   .draw();
	// });	

	$(document).on('change','#year',function(){

    var ct = $('#year').find(':selected').text();
    var rep = ct.replace(/\s/g, '');

            $.ajax({
            url : "show_yearly_sales.php",
            method  : "POST",
            data  : {year:rep},
            // "dataSrc": "tableData",
            success : function(data){
              $('#all_months').css('display','none');
              $('#selected_month').html(data);
              $('#myTable1').DataTable({'sDom':'tipr'}); //use for reinitialize datatable
                               
            }
          }); 
 	}); 

	
}); // document ready

</script>
