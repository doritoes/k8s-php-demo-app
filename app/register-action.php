<?php
$configs = include('conf/config.php');
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

// Sanitize inputs
$fname = mysqli_real_escape_string($connection, $_POST['fname'] ?? '');
$lname = mysqli_real_escape_string($connection, $_POST['lname'] ?? '');
$email = mysqli_real_escape_string($connection, $_POST['email'] ?? '');
$pwd1 = mysqli_real_escape_string($connection, $_POST['password1'] ?? '');
$pwd2 = mysqli_real_escape_string($connection, $_POST['password2'] ?? '');
$con = mysqli_real_escape_string($connection, $_POST['contact'] ?? '');

// Sanity checks
if (!$email || !$pwd1 || !$pwd2 || $pwd1 !== $pwd2) {
    header("Location: register.php");
    exit; // Not submitted correctly
}

// Check for existing user
$stmt = mysqli_prepare($connection, "SELECT email FROM app_user WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
if (mysqli_stmt_fetch($stmt)) {
    header("Location: login.php");
    exit; // user exists, prevent further execution
}

// Create new user
$stmt = mysqli_prepare($connection, "INSERT INTO app_user (fname, lname, email, password, contact) VALUES (?, ?, ?, ?, ?)");
$password_hash = password_hash($pwd1, PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $password_hash, $con);
mysqli_stmt_execute($stmt);

// Handle unexpected results
if (!mysqli_stmt_affected_rows($stmt)) {
    // Handle errors gracefully
    header('HTTP/1.1 500 Internla Server Error'); // Set appropriate HTTP status code
    echo "Error: An error occurred. Please try again later.";
    exit; // Stop further execution
}
// Successful registration
header("Location: login-register.php");
mysqli_close($connection); 
?>
