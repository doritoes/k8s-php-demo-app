<?php
$configs = include('conf/config.php');
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "Active") {
  // Session is not active or invalid
  header("Location: login.php"); // Redirect to an error page
  exit(); // Stop further execution of the current page
}
$fname = htmlspecialchars($_SESSION['fname']);
$lname = htmlspecialchars($_SESSION['lname']);
$email = htmlspecialchars($_SESSION['email']);
$address = htmlspecialchars($_SESSION['address']);
$dob = htmlspecialchars($_SESSION['dob']);
$login = htmlspecialchars($_SESSION['login']);
$gender = htmlspecialchars($_SESSION['gender']);
$contact = htmlspecialchars($_SESSION['contact']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $configs['appname']; ?></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header>
      <span class="welcome"><strong>Welcome</strong> &nbsp<?php echo $fname; echo " " ; echo $lname;?></span>
      <p><span class="welcome">Last logged in at: <?php echo $login; ?></span></p>
      <nav>
        <a href="index.php">Home</a>
      </nav>
      <nav>
        <a href="logout.php">Log Out</a>
      </nav>
    </header>
    <main>
      <p>First Name: <?php echo $fname;?></p>
      <p>Last Name: <?php echo $lname;?></p>
      <p>Email: <?php echo $email;?></p>
      <p>Contact Number: <?php echo $contact;?></p>
      <p>Address: <?php echo $address;?></p>
      <p>Date of Birth: <?php $newDate = date("m/d/Y", strtotime($dob)); echo $newDate;?></p>
      <p>You are: <?php echo $gender;?></p>
      <div class="button-container">
        <button onclick="location.href='update.php'">UPDATE DETAILS</button>
        <button onclick="location.href='password.php'">CHANGE PASSWORD</button>
        <button onclick="location.href='unregister.php'">REMOVE ACCOUNT</button>
      </div>
    </main>
  </body>
</html>
