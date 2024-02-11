<!DOCTYPE html>
<html lang="en">
<?php
$configs = include('conf/config.php');
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "Active") {
  // Session is not active or invalid
  header("Location: loggedout.php"); // Redirect to an error page
  exit(); // Stop further execution of the current page
}
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
      <div class="body">
        <span class="welcome"><strong>Welcome</strong> &nbsp<?php echo $fname; echo " " ; echo $lname ;?></span>
        <p><span class="welcome">Last logged in at: <?php echo $login; ?></span></p>
        <nav>
          <a href="success.php">Home</a>
        </nav>
        <nav>
          <a href="logout.php">Log Out</a>
        </nav>
      </div>
    </header>
    <main>
      <div class="form">
        <form action="rem.php" method="post">
          <fieldset>
            <legend>Remove Account</legend>
            <p>
              <label for="password">Enter Password</label>
              <input type="password" name="password" required>
            </p>
            <p>
              <input type="submit" value="CONFIRM">
            </p>
          </fieldset>
        </form>
      </div>
    </main>
  </body>
</html>
