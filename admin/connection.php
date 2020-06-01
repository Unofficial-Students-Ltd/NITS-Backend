<?php 
$servername = "localhost";
$username = "root";
$password ="";
$dbname ="nitadmin";
try {
$connection = mysqli_connect($servername,$username,$password,$dbname);
} catch (Exception $e) {
	echo "Error connection:".$e."";
}
	
 ?>