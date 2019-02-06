<?php
       
    $dbhost = 'localhost';
    $dbname = 'capstone2';  
    $dbuser = 'admin';                  
    $dbpass = 'root'; 
    
    
    try{
        
        $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOException $ex){
        
        die($ex->getMessage());
    }
    
    $datetoday = date("M");
    $stmt = $dbcon->prepare("SELECT DATE_FORMAT(s.date_ordered, '%M') as dates,
           SUM(s.product_total_amount) as sumtol, s.product_price FROM product_supplier s
           GROUP BY DATE_FORMAT(s.date_ordered, '%M') 
           ORDER BY s.date_ordered ASC");



    $stmt->execute();

    $json= [];


    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
     $json[]= array('date' => $dates, 'total'=> (int)$sumtol);
}


    
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
     <link rel="stylesheet" href="assets/morrisjs/morris.css">
</head>
<body>
<h4>Sales per month</h4>
<div id="myfirstchart" style="height: 400px;"></div>

<h4>Comparison of sales</h4>
<div id="chart" style="height: 400px;"></div>

<script src="assets/js/jquery2.min.js"></script>
<script src="assets/raphael/raphael.min.js"></script>
<script src="assets/morrisjs/morris.min.js"></script>


<script type="text/javascript">

new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'chart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: <?php echo json_encode($json); ?>,
  barColors: ['red'],
  // The name of the data record attribute that contains x-values.
  xkey: ['date'],
  // A list of names of data record attributes that contain y-values.
  ykeys: ['total'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.

dateFormat: 
  function(date) {
          d = new Date(date);
          // d.getMonth();
          var monthNames = ["January", "February", "March", "April", "May", "June",
                     "July", "August", "September", "October", "November", "December"
          ];
          return monthNames[d.getMonth()];
}, 

  labels: ['Amounts'],

});



</script>

</body>
</html>