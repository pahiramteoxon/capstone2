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

</div>
</body>
</html>