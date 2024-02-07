<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$login = $_SESSION['login'];
?>
<head>
  <title>Webapp</title>
  <style type="text/css">
    body {
      margin:0;
      padding:0;
      font-family: Sans-Serif;
      line-height: 1.5em;
    }			
    header {
      background: #26ade4;
      height: 100px;
      text-align:right;
      font-size: 12px;
      color:#FFFFFF
    }			
    header we {
      margin: 10px;
      padding-top: 15px;
      font-size:14px;
    }
    header strong {
      margin: 0;
      padding-top: 15px;
      font-size:15px;
    }
    header a {
      margin: 10px;
      color:#FFFFFF;
      font-size:14px;
    }
    main {
      width: 90%;
    }
    main button {
      font-family: sans-serif;
      text-transform: uppercase;
      background: #26ade4;
      border: 0;
      padding: 15px;
      color: #FFFFFF;
      font-size: 12px;
      text-align:center;
    }
    main form {
      position: relative;
      background: #FFFFFF;
      margin: 0 0 10px;
      padding: 45px;
    }
    main form input {
      font-family: "Roboto", sans-serif;
      outline: 0;
      background: #f2f2f2;
      border: 0;
      margin: 0 0 10px;
      padding: 15px;
      font-size: 14px;
    }
    main er {
      color: #e11312;
      font-size: 14px;
    }
    main form input[type=submit] {
      font-family: "Roboto", sans-serif;
      text-transform: uppercase;
      outline: 0;
      background: #26ade4;
      border: 0;
      margin:0 0 10px;
      padding: 15px;
      color: #FFFFFF;
      font-size: 14px;
      cursor: pointer;
    }
  </style>
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
<header>
  <div class="body">
    <we><strong>Welcome</strong> &nbsp<?php echo $fname; echo " " ; echo $lname ;?></we>
    <p><we> Last logged in at : <?php echo $login; ?></we>
    <p> <a href="logout.php">Log Out</a>
</div>
</header>
<main>
  <er>Please give correct password</er>
  <form action="cup.php" method="post">
    <p>Current Password : <input type="password" name="password" placeholder="current password" required/>
    <p>Enter New Password :<input type="password" name="password1" id ="password1" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    <p>Re-enter New Password :<input type="password" name="password2" id ="password2"placeholder="re enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title ="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    <span id="message"></span>
  <p><input type="submit" value="CHANGE PASSWORD" id="submit"disabled="disabled">
  </form>		
</main>
<?php if($_SESSION['status']!="Active"){session_destroy();header("Location: index.php");
}?>
</body>
</html>
