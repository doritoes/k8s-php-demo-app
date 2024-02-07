<!DOCTYPE HTML>
<html lang="en">
<?php
session_start();
$fname = htmlspecialchars($_SESSION['fname']);
$lname = htmlspecialchars($_SESSION['lname']);
$login = htmlspecialchars($_SESSION['login']);
?>
  <head>
    <meta charset="UTF-8">
    <title>Webapp</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header class="body">
      <span class="welcome">Welcome &nbsp<?php echo $fname; echo " " ; echo $lname ; ?></span>
      <p><span class="welcome">Last logged in at : <?php echo $login; ?></span></p>
      <p><a href="logout.php">Log Out</a></p>
    </header>
    <main class="main">
      <form action="edit.php" method="post">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" placeholder="First Name" pattern="^[a-zA-Z]+$" title="Please enter letters only" required>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" placeholder="Last Name" pattern="^[a-zA-Z]+$" title="Please enter letters only" required>
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter valid email address">
        <label for="contact">Contact number:</label>
        <input type="text" name="contact" placeholder="Contact number" maxlength="10" pattern="[789][0-9]{9}" title="Please enter valid 10 digit contact number">
        <label for="address">Address:</label>
        <input type="text" name="address" placeholder="address">
        <label for "dob">Date of birth</label>
        <input type="date" name="dob" placeholder="Date of birth"/>(date of birth)
        <input type="submit" value="UPDATE" />
      </form>		
    </main>
    <?php if($_SESSION['status']!="Active"){
      session_destroy();
      header("Location: index.php");
    } ?>
  </body>
</html>
