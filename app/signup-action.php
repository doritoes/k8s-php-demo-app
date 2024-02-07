<?php
$configs = include('conf/config.php');
$connection = mysqli_connect($configs[host], $configs[username], $configs[password], $configs[dbname]);
if ($connection === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Sanitize inputs
$fname = mysqli_real_escape_string($connection, $_POST['fname'] ?? '');
$lname = mysqli_real_escape_string($connection, $_POST['lname'] ?? '');
$email = mysqli_real_escape_string($connection, $_POST['email'] ?? '');
$pwd1 = mysqli_real_escape_string($connection, $_POST['password1'] ?? '');
$pwd2 = mysqli_real_escape_string($connection, $_POST['password2'] ?? '');
$gen = mysqli_real_escape_string($connection, $_POST['gender'] ?? '');
$con = mysqli_real_escape_string($connection, $_POST['contact'] ?? '');

$stmt = mysqli_prepare($connection, "SELECT email FROM app_user WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
if (mysqli_stmt_fetch($stmt)) {
    header("Location: index.php");
    exit; // user exists, prevent further execution
}

if (mysqli_error($connection)) {
  // Handle missing table
  $create = "CREATE TABLE IF NOT EXISTS app_user (
             fname varchar(255),
             lname varchar(255),
             email varchar(255) Primary Key,
             password varchar(50),
             address varchar(255),
             gender varchar(5),
             contact varchar(15),
             dob date,
             login timestamp)";
  mysqli_query($connection, $create);
}

$stmt = mysqpli_prepare($connection, "INSERT INTO app_user (fname, lname, email, password, gender, contact) VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $password, $gen, $con);
mysqli_stmt_execute($stmt);

if (!mysqli_stmt_affected_rows($stmt)) {
  exit("An error occurred. Please try again later.");
}
header("Location: successful.php");
mysqli_close($connection); 
?>
