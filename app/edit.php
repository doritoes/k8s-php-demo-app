<?php
$configs = include('conf/config.php');
session_start();
$connection = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['dbname']);
if ($connection === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Retrieve and escape form data
$fn = mysqli_real_escape_string($connection, $_POST['fname'] ?? ''); // Use ?? for default values
$ln = mysqli_real_escape_string($connection, $_POST['lname'] ?? '');
$em = mysqli_real_escape_string($connection, $_POST['email'] ?? '');
$ad = mysqli_real_escape_string($connection, $_POST['address'] ?? '');
$dob = ''; // Initialize dob

// Handle date conversion and escaping (assuming proper user input validation for date format)
if (!empty($_POST['dob'])) {
    $date1 = strtr($_POST['dob'], '/', '-');
    $dob = date('Y-m-d', strtotime($date1));
}
$dob = mysqli_real_escape_string($connection, $dob);

$con = mysqli_real_escape_string($connection, $_POST['contact'] ?? '');

// Update session variables (using null coalescing for default values)
$_SESSION['fname'] = $fn ?? $_SESSION['fname'];
$_SESSION['lname'] = $ln ?? $_SESSION['lname'];
$_SESSION['email'] = $em ?? $_SESSION['email'];
$_SESSION['address'] = $ad ?? $_SESSION['address'];
$_SESSION['dob'] = $dob ?? $_SESSION['dob'];
$_SESSION['contact'] = $con ?? $_SESSION['contact'];

// Define SQL query template with named placeholders
$sql = "UPDATE app_user SET fname = ?, lname = ?, email = ?, address = ?, dob = ?, contact = ? WHERE email = ?";

// Prepare the statement (ensure you handle errors appropriately)
$stmt = mysqli_prepare($connection, $sql);
if (!$stmt) {
  header("HTTP/1.1 500 Internal Server Error");
  echo "Failed to create prepared statement";
  exit;
}

// Bind parameters using the escaped and potentially updated values
mysqli_stmt_bind_param($stmt, "sssssss", $fn, $ln, $em, $ad, $dob, $con, $_SESSION['email']);

// Execute the prepared statement (handle errors)
if (!mysqli_stmt_execute($stmt)) {
    header("HTTP/1.1 500 Internal Server Error");
    echo "Failue executing prepared statement";
    exit;
}

// Update sesstion variables
$_SESSION['email'] = $em;
$_SESSION['address'] = $ad;
$_SESSION['lname'] = $ln;
$_SESSION['fname'] = $fn;
$_SESSION['dob'] = $dob;
$_SESSION['contact'] = $con;

if ($_SESSION['status'] != "Active") {
  session_destroy();
  header("Location: index.php");
}

header("Location: success.php");
mysqli_close($connection); 
?>
