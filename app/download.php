<?php
$configs = include('conf/config.php');
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "Active") {
  // Session is not active or invalid
  header("Location: login-again.php"); // Redirect to an error page
  exit(); // Stop further execution of the current page
}

if (!isset($_GET['file']) or !$_GET['file']) {
  // Improper call to download.php
  header("Location: index.php"); // Redirect to an error page
  exit(); // Stop further execution of the current page
}

// Specify the path to the data directory
$data_dir = '/var/www/data/';

// Sanitize the requested file name
$requested_file = filter_input(INPUT_GET, 'file', FILTER_SANITIZE_STRING);

// Validate the file path
$file_path = $data_dir . $requested_file;

// Check if the file exists and is within the data directory
if (!file_exists($file_path) || strpos($file_path, $data_dir) !== 0) {
  die('Invalid file request.');
}

// Check if the requested file starts with a dot
if (strpos($requested_file, '.') === 0) {
  die('Downloading hidden files is not allowed.');
}

// Send download headers
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
header('Content-Length: ' . filesize($file_path));

// Read and deliver the file contents
readfile($file_path);
exit;
?>
