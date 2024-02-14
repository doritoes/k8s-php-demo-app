<?php
$configs = include('conf/config.php');
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "Active") {
    // Session is not active or invalid
    header("Location: login-again.php"); // Redirect to an error page
    exit(); // Stop further execution of the current page
}
// Connect to the database
try {
  $connection = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['dbname']);
  if (!$connection) {
    throw new Exception('Database connection failed: ' . mysqli_connect_error());
  }
  $username = mysqli_real_escape_string($connection, $_SESSION['email'] ?? '');
  $pwd = mysqli_real_escape_string($connection, $_POST['password'] ?? '');
  $stmt = mysqli_prepare($connection, "SELECT password FROM app_user WHERE email = ?");
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $hashed_password);
  if (mysqli_stmt_fetch($stmt) && password_verify($pwd, $hashed_password)) {
    // delete user
    mysqli_stmt_close($stmt);
    $stmt = mysqli_prepare($connection, "DELETE FROM app_user WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    if (mysqli_stmt_execute($stmt)) {
      session_destroy();
      mysqli_stmt_close($stmt);
      mysqli_close($connection); 
      header("Location: index.php");
      exit;
    }
  }
} catch (Exception $e) {
  // Handle errors gracefully
  header('HTTP/1.1 503 Service Unavailable'); // Set appropriate HTTP status code
  echo "Error: Unable to connect to the database. Please try again later.";
  // Optionally log the error for debugging:
  error_log($e->getMessage());
  exit; // Stop further execution
} finally {
  mysqli_stmt_close($stmt);
  mysqli_close($connection); 
}
header("Location: unregister-error.php");
?>
