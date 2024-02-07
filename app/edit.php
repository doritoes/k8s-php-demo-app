<?php
$configs = include('config.php');
session_start();
$connection= mysqli_connect($configs[host], $configs[username], $configs[password], $configs[dbname]);
if ($connection === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
$fn = mysqli_real_escape_string($connection, $_POST['fname']);
$ln = mysqli_real_escape_string($connection, $_POST['lname']);
$em = mysqli_real_escape_string($connection, $_POST['email']);
$ad = mysqli_real_escape_string($connection, $_POST['address']);
$do = mysqli_real_escape_string($connection, $_POST['dob']);
$date1 = strtr($do, '/', '-');
$dob = date('Y-m-d', strtotime($date1));
$con = mysqli_real_escape_string($connection, $_POST['contact']);
if($fn=="") {
  $fn=$_SESSION['fname'];
}
if($ln=="") {
  $ln=$_SESSION['lname'];
}
if($em=="") {
  $em=$_SESSION['email'];
}
if($ad=="") {
  $ad=$_SESSION['address'];
}
if($do=="") {
  $dob=$_SESSION['dob'];
}
if($con=="") {
  $con=$_SESSION['contact'];
}
$a=$_SESSION['email'];
$query=mysqli_query($connection,"UPDATE app_user SET fname='$fn',lname='$ln',email='$em',address='$ad',dob='$dob',contact='$con' where email='$a'");
$_SESSION['email']=$em;
$_SESSION['address']=$ad;
$_SESSION['lname']=$ln;
$_SESSION['fname']=$fn;
$_SESSION['dob']=$dob;
$_SESSION['contact']=$con;
if ($_SESSION['status'] != "Active") {
  session_destroy();
  header("Location: index.php");
}
header("Location: success.php");
mysqli_close($connection); 
?>
