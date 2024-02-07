<!DOCTYPE html>
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
    <title><?php echo $configs[appname]; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
  $("#password2").keyup(validate);
});
function validate() {
  var newPassword = $("#password1").val();
  var confirmedPassword = $("#password2").val();
  var passwordMismatch = newPassword !== confirmed Password;
  $("#message").html(passwordMismatch
    ? '<font color="red"><b>Passwords don\'t match</b></font>'
    : '<font color="green"><b>Passwords match</b></font>');
  $("input[type=submit]").prop("disabled", passwordMismatch);
}
    </script>
  </head>
  <body>		
    <header class="body">
      <span class="welcome"><strong>Welcome</strong> &nbsp<?php echo $fname; echo " " ; echo $lname ;?></span>
      <p><span class="welcome"> Last logged in at : <?php echo $login; ?></span></p>
      <p> <a href="logout.php">Log Out</a>
    </header>
    <main class="main">
      <span class="error">Please give correct password</span>
      <form action="cup.php" method="post">
        <p>Current Password : <input type="password" name="password" placeholder="current password" required/>
        <p>Enter New Password :<input type="password" name="password1" id ="password1" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <p>Re-enter New Password :<input type="password" name="password2" id ="password2"placeholder="re enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title ="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <span id="message"></span>
        <p><input type="submit" value="CHANGE PASSWORD" id="submit"disabled="disabled">
      </form>		
    </main>
    <?php if ($_SESSION['status'] != "Active") {
      session_destroy();
      header("Location: index.php");
    } ?>
  </body>
</html>
