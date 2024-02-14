<?php
$configs = include('conf/config.php');
header("Content-Type: text/plain"); // Simple content type 

try {
  $connection = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['dbname']);
  if (!$connection) {
    throw new Exception('Database connection failed: ' . mysqli_connect_error());
  }
  echo "OK\n"; // Simple output signaling liveness
  exit(0); // Success exit code
} catch (Exception $e) {
    // Connection failed
    http_response_code(500); // Indicate server error
    echo "ERROR: " . $e->getMessage() . "\n";
    exit(1); // Non-zero exit code signals failure 
}
?>
