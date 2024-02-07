<?php
$configs = include('config.php');
session_start();
$connection= mysqli_connect($configs[host], $configs[username], $configs[password], $configs[dbname]);
if ($connection === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
$a = $_SESSION['email'];
$pwd = mysqli_real_escape_string($connection, $_POST['password']);
$npwd = mysqli_real_escape_string($connection, $_POST['password1']);
$sql = "SELECT password from app_user where email='$a'";
$query = mysqli_query($connection,$sql);
$p = mysqli_fetch_row($query);
if ($pwd==$p[0]) {
  mysqli_query($connection,"UPDATE app_user set password='$npwd'");
  header("Location: index.php");
  session_destroy();
} else {
  header("Location: ecpd.php");
}
mysqli_close($connection);
?>
