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
    <header class="body">
      <span class="welcome">Welcome &nbsp<?php echo $fname; echo " " ; echo $lname ; ?></span>
      <p><span class="welcome">Last logged in at : <?php echo $login; ?></span></p>
      <nav>
        <a href="logout.php">Log Out</a>
      </nav>
    </header>
    <main class="main">
      <form action="edit.php" method="post">
        <filedset>
          <legend>Edit Account</legend>
          <p>
            <label for="fname">First Name:</label>
            <input type="text" name="fname" placeholder="First Name" pattern="^[a-zA-Z]+$" title="Please enter letters only" required>
          </p>
          <p>
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" placeholder="Last Name" pattern="^[a-zA-Z]+$" title="Please enter letters only" required>
          </p>
        <p>
          <label for="email">Email:</label>
          <input type="email" name="email" placeholder="Email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter valid email address">
        </p>
        <p>
          <label for="contact">Contact number:</label>
        <input type="text" name="contact" placeholder="Contact number" maxlength="10" pattern="[1-9][0-9]{9}" title="Please enter valid 10 digit contact number">
        </p>
        <p>
          <label for="address">Address:</label>
          <input type="text" name="address" placeholder="address">  
        </p>
        <p>
          <label for "dob">Date of birth</label>
          <input type="date" name="dob" placeholder="Date of birth"/>(date of birth)  
        </p>
        <p>
          <input type="submit" value="UPDATE">  
        </p>
      </filedset>
    </form>		
  </main>
  <?php if($_SESSION['status']!="Active"){
      session_destroy();
      header("Location: index.php");
    } ?>
  </body>
</html>
