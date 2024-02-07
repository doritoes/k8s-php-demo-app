<?php
$configs = include('config.php');
$connection = mysqli_connect($configs[host], $configs[username], $configs[password], $configs[dbname]);
if($connection === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
$fname = mysqli_real_escape_string($connection, $_POST['fname']);
$lname = mysqli_real_escape_string($connection, $_POST['lname']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$pwd1 = mysqli_real_escape_string($connection, $_POST['password1']);
$pwd2 = mysqli_real_escape_string($connection, $_POST['password2']);
$gen = mysqli_real_escape_string($connection, $_POST['gender']);
$con = mysqli_real_escape_string($connection, $_POST['contact']);

$querych = mysqli_query($connection,"SELECT email from app_user where email='$email'");
$flag = mysqli_num_rows($querych);
if($flag >=1 )
{
	echo "User Exists";
	header("Location: index.php");
}
else{
		$sql="INSERT INTO app_user (fname,lname,email,password,gender,contact) values		    ('$fname','$lname','$email','$pwd1','$gen','$con')";
		$result=mysqli_query($connection,$sql);
		if(empty($result))
		{
			$create="CREATE TABLE app_user(
			fname varchar(255),
			lname varchar(255),
			email varchar(255) Primary Key,
			password varchar(50),
			address varchar(255),
			gender varchar(5),
			contact varchar(15),
			dob date,
			login timestamp
			)";
			mysqli_query($connection,$create);
			mysqli_query($connection,$sql);
		}
		header("Location: successful.php");
}
mysqli_close($connection); 
?>
