<!DOCTYPE HTML>
<html lang="en">
<?php
session_start();
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$login = $_SESSION['login'];
?>
  <head>
    <title>Webapp</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
  $("#password2").keyup(validate);
});
function validate() {
  var password1 = $("#password1").val();
  var password2 = $("#password2").val();
  if (password1 == password2 && password1!=null && password2!=null) {
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
    <div class="body">
      <span class="welcome">Welcome &nbsp<?php echo $fname; echo " " ; echo $lname ;?></span>
      <p><span class="welcome">Last logged in at : <?php echo $login; ?></span></p>
      <p> <a href="logout.php">Log Out</a>
    </div>
    <div class="main">
      <form action="cup.php" method="post">
        <p>Current Password : <input type="password" name="password" placeholder="current password" required/>
        <p>Enter New Password :<input type="password" name="password1" id ="password1" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <p>Re-enter New Password :<input type="password" name="password2" id ="password2"placeholder="re enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title ="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <span id="message"></span>
        <p><input type="submit" value="CHANGE PASSWORD" id="submit"disabled="disabled">
      </form>		
      <?php if ($_SESSION['status']!="Active") {session_destroy();header("Location: index.php"); } ?>
    </div>
  </body>
</html>
