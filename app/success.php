<!DOCTYPE html>
<html lang="en">
<?php
$configs = include('conf/config.php');
session_start();
$fname = htmlspecialchars($_SESSION['fname']);
$lname = htmlspecialchars($_SESSION['lname']);
$email = htmlspecialchars($_SESSION['email']);
$address = htmlspecialchars($_SESSION['address']);
$dob = htmlspecialchars($_SESSION['dob']);
$login = htmlspecialchars($_SESSION['login']);
$gender= htmlspecialchars($_SESSION['gender']);
$contact= htmlspecialchars($_SESSION['contact']);
?>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $configs['appname']; ?></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header class="body">
      <span class="welcome">Welcome &nbsp<?php echo $fname; echo " " ; echo $lname;?></span>
      <p><span class="welcome">Last logged in at : <?php echo $login; ?></span></p>
      <p><a href="logout.php">Log Out</a></p>
    </body>
    <main class="main">
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
  </main>
<?php
  if($_SESSION['status']!="Active") {
    session_destroy();
    header("Location: index.php");
} ?>
  </body>
</html>
