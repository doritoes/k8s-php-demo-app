<!DOCTYPE HTML>
<html lang="en">
<?php
session_start();
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$login = $_SESSION['login'];
?>
  <head>
    <meta charset="UTF-8">
    <title>Webapp</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>		
    <div class="body">
      <span class="welcome">Welcome &nbsp<?php echo $fname; echo " " ; echo $lname ;?></span>
      <p><span class="Welcome"> Last logged in at : <?php echo $login; ?></span></p>
      <p><a href="logout.php">Log Out</a></p>
    </div>
    <div class="main">
      <span class="error">Please give correct password</span>
      <form action="rem.php" method="post">
        <p>Password : <input type="password" name="password"/></p>
        <p><input type="submit" value="CONFIRM"/></p>
      </form>		
    </div>
    <?php if($_SESSION['status']!="Active"){session_destroy();header("Location: index.php");} ?>
  </body>
</html>
