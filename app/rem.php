<?php
$configs = include('conf/config.php');
session_start();
// Connect to the database
try {
    $connection = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['dbname']);
    if (!$connection) {
        throw new Exception('Database connection failed: ' . mysqli_connect_error());
    }
    // Proceed with database operations
} catch (Exception $e) {
    // Handle errors gracefully
    header('HTTP/1.1 503 Service Unavailable'); // Set appropriate HTTP status code
    echo "Error: Unable to connect to the database. Please try again later.";
    // Optionally log the error for debugging:
    error_log($e->getMessage());
    exit; // Stop further execution
}
$a = mysqli_real_escape_string($connection, $_SESSION['email'] ?? '');
$pwd = mysqli_real_escape_string($connection, $_POST['password'] ?? '');

$stmt = mysqli_prepare($connection, "SELECT password FROM app_user WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $credential);

if (mysqli_stmt_fetch($stmt) && password_verify($pwd, $credential)) {
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
