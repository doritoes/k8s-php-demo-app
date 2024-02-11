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
// Retrieve and escape form data
$a = mysqli_real_escape_string($connection, $_SESSION['email'] ?? ''); // Use ?? for default values
$pwd = mysqli_real_escape_string($connection, $_POST['password'] ?? '');
$npwd = mysqli_real_escape_string($connection, $_POST['password1'] ?? '');

// Insecure password handling - convert to using password hashes
$stmt = mysqli_prepare($connection, "SELECT password FROM app_user WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $a);
if (mysqli_stmt_execute($stmt)) {
  mysqli_stmt_bind_result($stmt, $credential);
  if (mysqli_stmt_fetch($stmt)) {
    if ($pwd === $credential) {
      // Prepared statement for password update
      mysqli_stmt_close($stmt);
      $stmt = mysqli_prepare($connection, "UPDATE app_user SET password = ? WHERE email = ?");
      mysqli_stmt_bind_param($stmt, "ss", $npwd, $a);
      mysqli_stmt_execute($stmt);
      header("Location: index.php");
      session_destroy();
      mysqli_stmt_close($stmt);
      mysqli_close($connection);
      exit;
    }
  }
}
mysqli_close($connection);
header("Location: password-error.php");
?>
