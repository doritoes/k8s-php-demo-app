<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$address = $_SESSION['address'];
$dob = $_SESSION['dob'];
$login = $_SESSION['login'];
$gender= $_SESSION['gender'];
$contact= $_SESSION['contact'];
?>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Webapp</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="body">
      <span class="welcome">Welcome &nbsp<?php echo $fname; echo " " ; echo $lname;?></span>
      <p><span class="welcome">Last logged in at : <?php echo $login; ?></span></p>
      <p><a href="logout.php">Log Out</a></p>
    </div>
  <div class="main">
    <p>First Name : <?php echo $fname;?></p>
    <p>Last Name : <?php echo $lname;?></p>
    <p>Email : <?php echo $email;?></p>
    <p>Contact No :<?php echo $contact;?></p>
    <p>Address :<?php echo $address;?></p>
    <p>Date of Birth :<?php $newDate = date("d/m/Y", strtotime($dob));echo $newDate;?></p>
    <p>You are &nbsp <?php echo $gender;?></p>
    <div class="button-container">
      <button onclick="location.href='update.php'">UPDATE DETAILS</button>
      <button onclick="location.href='cpd.php'">CHANGE PASSWORD</button>
      <button onclick="location.href='remove.php'">REMOVE ACCOUNT</button>
    </div>
  </div>
<?php if($_SESSION['status']!="Active"){session_destroy();header("Location: index.php"); } ?>
</body>
</html>
