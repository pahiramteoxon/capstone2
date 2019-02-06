<?php 
	
	include_once 'core/init.php';
	date_default_timezone_set('Asia/Manila');

	$user = new DataOperation();
	// $uid = $_SESSION['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php include 'includes/login.php'?>


</body>
<?php include 'includes/footer.php'?>
</html>