<?php
$configs = include('conf/config.php');
session_start();
try {
  $connection = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['dbname']);
  if (!$connection) {
    throw new Exception('Database connection failed: ' . mysqli_connect_error());
  }
  // Proceed with database operations
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
} catch (Exception $e) {
    // Handle errors gracefully
    header('HTTP/1.1 503 Service Unavailable'); // Set appropriate HTTP status code
    echo "Error: Unable to connect to the database. Please try again later.";
    // Optionally log the error for debugging:
    error_log($e->getMessage());
    exit; // Stop further execution
}

// Execute the query
$sql = "SELECT COUNT(*) FROM app_user";
$result = $connection->query($sql);

// Check for errors
if (!$result) {
  die("Error executing query: " . $connection->error);
}

// Get the number of rows
$row = $result->fetch_assoc();
$num_rows = $row["COUNT(*)"];

// Print the number of rows
echo "Number of rows in table alpha: " . $num_rows;
?>
