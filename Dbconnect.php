<?php 

include_once('interface1.php');
include_once('config.php');

class Dbconnect implements interface1{

	function connect(){
		$con = mysqli_connect(LOCALHOST,USERNAME,PASSWORD);
		$conn = mysqli_select_db($con,DATABASE);
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		return $con;
	}
}