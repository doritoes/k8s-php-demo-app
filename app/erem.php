<!DOCTYPE HTML>
<html lang="en">
<?php
$configs = include('conf/config.php');
session_start();
$fname = htmlspecialchars($_SESSION['fname']);
$lname = htmlspecialchars($_SESSION['lname']);
$login = htmlspecialchars($_SESSION['login']);
?>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $configs['appname']; ?></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>		
    <header>
      <span class="welcome">Welcome &nbsp<?php echo $fname; echo " " ; echo $lname ;?></span>
      <p><span class="Welcome"> Last logged in at: <?php echo $login; ?></span></p>
      <p><a href="logout.php">Log Out</a></p>
    <//header>
    <main>
      <span class="error">Please give correct password</span>
      <form action="rem.php" method="post">
        <fieldset>
          <legend>Confirm Password</legend>
          <label for="password">Password:</label>
          <p><input type="password" name="password"/></p>
          <p><input type="submit" value="CONFIRM"/></p>
      </form>		
    </main>
    <?php if($_SESSION['status']!="Active") {
      session_destroy();
      header("Location: index.php");
    } ?>
  </body>
</html>
