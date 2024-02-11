<?php
$configs = include('conf/config.php');
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "Active") {
    // Session is not active or invalid
    header("Location: login-again.php"); // Redirect to an error page
    exit(); // Stop further execution of the current page
}
$fname = htmlspecialchars($_SESSION['fname']);
$lname = htmlspecialchars($_SESSION['lname']);
$login = htmlspecialchars($_SESSION['login']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $configs['appname']; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
$("#password2").keyup(validate);
});
function validate() {
  var password1 = $("#password1").val();
  var password2 = $("#password2").val();
  if (password1 == password2 && password1 != null && password2 != null) {
    $("#message").html("<font color=\"green\"><b>Passwords Match</b></font>");
    $("input[type=submit]").prop("disabled", false);      
  } else {
    $("#message").html("<font color=\"red\"><b>Check Passwords</b></font>");
    $("input[type=submit]").prop("disabled", true); 
    }
  }
    </script>
  </head>
  <body>		
    <header>
      <span class="welcome"><strong>Welcome</strong> &nbsp<?php echo $fname; echo " " ; echo $lname ;?></span>
      <span class="welcome"> Last logged in at: <?php echo $login; ?></span>
      <nav>
        <a href="success.php">Home</a>
      </nav>
      <nav>
        <a href="logout.php">Log Out</a>
      </nav>
    </header>
    <main>
      <span class="error">Please provide the correct password</span>
      <div class="form">
        <form action="cup.php" method="post">
          <fieldset>
            <legend>Change Password</legend>
            <p>
              <label for="password">Current Password:</label>
              <input type="password" name="password" id="password" placeholder="current password" required>
            </p>
            <p>
              <label for="password1">New Password:</label>
              <input type="password" name="password1" id ="password1" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </p>
            <p>
              <label for="password2">Re-enter New Password:</label>
              <input type="password" name="password2" id ="password2" placeholder="re enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title ="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </p>
            <span id="message"></span>
            <p>
              <input type="submit" value="CHANGE PASSWORD" id="submit" disabled="disabled" aria-label="Change Password Button">
            </p>
          </fieldset>
        </form>
      </div>
    </main>
  </body>
</html>
