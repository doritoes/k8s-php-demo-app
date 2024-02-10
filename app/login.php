<?php
$configs = include('conf/config.php');
session_start();
// Connect to the database
try {
  $connection = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['dbname']);
  if (!$connection) {
    throw new Exception('Database connection failed: ' . mysqli_connect_error());
  }
  $name = mysqli_real_escape_string($connection, $_POST['uname'] ?? '');
  $password = mysqli_real_escape_string($connection, $_POST['password'] ?? '');
  $stmt = mysqli_prepare($connection, "SELECT email, password, fname, lname, dob, gender, contact, address, login FROM app_user WHERE email = ?");
  mysqli_stmt_bind_param($stmt, "s", $name);
  if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_bind_result($stmt, $email, $credential, $fname, $lname, $dob, $gender, $contact, $address, $login);
    if (mysqli_stmt_fetch($stmt)) {
      if ($password === $credential) {
        $_SESSION['status'] = "Active";
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['email'] = $email;
        $_SESSION['login'] = $login;
        $_SESSION['address'] = $address;
        $_SESSION['dob'] = $dob;
        $_SESSION['gender'] = $gender;
        $_SESSION['contact'] = $contact;
        $now = date('Y-m-d H:i:s'); // Get current datetime in YYYY-MM-DD HH:MM:SS format
        $_SESSION['login'] = $login;
        $stmt = mysqli_prepare($connection, "UPDATE app_user SET login = ? WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "ss", $now, $email)
        mysqli_stmt_execute($stmt);
        header("Location: success.php");
        exit;
      }
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
    mysqli_close($connection); 
}
session_destroy();
header("Location: error.php");
?>
