<?php

class Database {
	public $con;
	
	public function __construct(){
		$this->con = mysqli_connect("localhost","admin","root","capstone2");

		if(mysqli_connect_error()){
			echo "Error: Could not connect to database";
			exit;
		}
	}
}

$obj = new Database;




?>	