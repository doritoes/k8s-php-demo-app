<?php
$configs = include('conf/config.php');
session_start();
$connection = mysqli_connect($configs[host], $configs[username], $configs[password], $configs[dbname]);
if ($connection === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
$a = mysqli_real_escape_string($connection, $_SESSION['email'] ?? '');
$pwd = mysqli_real_escape_string($connection, $_POST['password'] ?? '');

$stmt = mysqli_prepare($connection, "SELECT password FROM app_user WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $credential);

if (mysql_stmt_fetch($stmt) && password_verify($pwd, $credential)) {
  // delete user
  $stmt = mysqli_prepare($connection, "DELETE FROM app_user WHERE email = ?");
  mysqli_stmt_bind_param($stmt, "s", $email);
  if (mysqli_stmt_execute($stmt)) {
    session_destroy();
    header("Location: index.php");
  }
}
header("Location: erem.php");
mysql_stmt_close($stmt);
mysqli_close($connection); 
?>
