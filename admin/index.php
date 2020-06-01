<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nitAdmin";
$con = mysqli_connect($servername,$username,$password,$dbname);
if (isset($_POST['login'])) {
	# code...
	$Username = $_POST['username'];
	$Password = $_POST['password'];
	$_SESSION['username'] = $Username;
	$sql = "SELECT * FROM admin WHERE Username = '$Username'";
	$result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    if($Password==$row['password']){
        echo "<script>window.location.href = 'admin.php';</script>";
    }else{
        echo "<script>alert('Incorrect Username');</script>";
    }

} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
</head>
<body>

<h1  style="text-align: center;">National Institute Of Technology Silchar</h1>

<h3 style="text-align: center;"> Welcome To admin Portal</h3>
<form  style="text-align: center;" action=""  method="POST">

    	<h1>
			LOGIN
		</h1><hr>
		<p>
			<label>Username :</label>
			<input type="text" name="username">
		</p>
		<p>
			<label>Password :</label>
			<input type="password" name="password">
		</p>

        <p>
			<input type="submit" name="login">
		</p>
</form>    
</body>
</html>