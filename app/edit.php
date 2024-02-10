<?php
$configs = include('conf/config.php');
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "Active") {
    // Session is not active or invalid
    header("Location: loggedout.php"); // Redirect to an error page
    exit(); // Stop further execution of the current page
}
// Connect to the database
try {
    $connection = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['dbname']);
    if (!$connection) {
        throw new Exception('Database connection failed: ' . mysqli_connect_error());
    }
} catch (Exception $e) {
    // Handle errors gracefully
    header('HTTP/1.1 503 Service Unavailable'); // Set appropriate HTTP status code
    echo "Error: Unable to connect to the database. Please try again later.";
    // Optionally log the error for debugging:
    error_log($e->getMessage());
    exit; // Stop further execution
}
// Retrieve and escape form data
$fn = mysqli_real_escape_string($connection, $_POST['fname'] ?? ''); // Use ?? for default values
$ln = mysqli_real_escape_string($connection, $_POST['lname'] ?? '');
$ad = mysqli_real_escape_string($connection, $_POST['address'] ?? '');
$dob = mysqli_real_escape_string($connection, $_POST['dob'] ?? '');
$con = mysqli_real_escape_string($connection, $_POST['contact'] ?? '');

// Update session variables (using null coalescing for default values)
$_SESSION['fname'] = $fn ?? $_SESSION['fname'];
$_SESSION['lname'] = $ln ?? $_SESSION['lname'];
$_SESSION['address'] = $ad ?? $_SESSION['address'];
$_SESSION['dob'] = $dob ?? $_SESSION['dob'];
$_SESSION['contact'] = $con ?? $_SESSION['contact'];

// Convert dob to MySQL date format (YYYY-MM-DD)
$dob_mysql = date('Y-m-d', strtotime($dob)); // Use strtotime to handle various input formats

// Define SQL query template with named placeholders
$sql = "UPDATE app_user SET fname = ?, lname = ?, address = ?, dob = ?, contact = ? WHERE email = ?";

// Prepare the statement (ensure you handle errors appropriately)
$stmt = mysqli_prepare($connection, $sql);
if (!$stmt) {
  header("HTTP/1.1 500 Internal Server Error");
  echo "Failed to create prepared statement";
  exit;
}

// Bind parameters using the escaped and potentially updated values
mysqli_stmt_bind_param($stmt, "ssssss", $fn, $ln, $ad, $dob_mysql, $con, $_SESSION['email']);

// Execute the prepared statement (handle errors)
if (!mysqli_stmt_execute($stmt)) {
    header("HTTP/1.1 500 Internal Server Error");
    echo "Failue executing prepared statement";
    exit;
}

// Update session variables
$_SESSION['fname'] = $fn;
$_SESSION['lname'] = $ln;
$_SESSION['address'] = $ad;
$_SESSION['dob'] = $dob;
$_SESSION['contact'] = $con;

if ($_SESSION['status'] != "Active") {
  session_destroy();
  header("Location: index.php");
  exit;
}

header("Location: success.php");
mysqli_close($connection); 
?>
