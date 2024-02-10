<!DOCTYPE HTML>
<html lang="en">
<?php
$configs = include('conf/config.php');
session_start();
?>
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
  if(password1 == password2 && password1!=null && password2!=null) {
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
    <div class="login-page" id="check">
      <div class="form">
        New User ?
        <form action="signup-action.php" method="post">
          <input type="text" name="fname" placeholder="first name"pattern="^[a-zA-Z]+$" title="Please enter letters only"required>
          <p><input type="text" name="lname" placeholder="last name" pattern="^[a-zA-Z]+$" title="Please enter letters only" required></p>
          <p>Gender :<input type="radio" name="gender" value="male" checked> Male <input type="radio" name="gender" value="female"> Female</p>
          <p><input type="email" name="email" placeholder="email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter valid email address" required>
          <p><input type="tel" name="contact" placeholder="contact no" maxlength="10" pattern="[1-9][0-9]{9}" title="Please enter valid 10 digit contact no" required>
          <p><input type="password" name="password1" id ="password1" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <p><input type="password" name="password2" id ="password2"placeholder="re enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title ="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <p><span id="message"></span>
          <p><input type="submit" value="CREATE" id="submit" disabled="disabled">
          <p class="message">Already registered? <a href="index.php">Sign in here</a></p>
       </form>
      </div>
    </div>
  </body>
</html>
