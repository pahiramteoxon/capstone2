<?php

include 'database/database_connect.php';
include 'classes/function.php';
include 'classes/sql.php';	
// include 'assets/fpdf/fpdf.php';

	session_start();
	$user = new DataOperation();

?>

<!-- style css -->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

<!-- bootstrap css -->
<link rel="stylesheet" href="assets/bootstrap/bootstrap/dist/css/bootstrap.min.css">

<!-- jquery -->
<!-- <script type="text/javascript" src="assets/js/jquery.min.js"></script> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- icons font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

<!-- fonts -->
<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<!-- datatables css -->
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

