<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Webapp</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300">
  <style>
    .login-page {
      width: 500px;
      padding: 1% 0 0;
      margin: auto;
    }
    .form {
      position: relative;
      background: #FFFFFF;
      max-width: 360px;
      margin: 0 auto 0px;
      padding: 5px;
      text-align: center;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    .form input {
      font-family: "Roboto", sans-serif;
      outline: 0;
      background: #f2f2f2;
      border: 0;
      margin: 0 0 15px;
      padding: 10px;
      box-sizing: border-box;
      font-size: 14px;
    }
    .form input[type=submit] {
      font-family: "Roboto", sans-serif;
      text-transform: uppercase;
      outline: 0;
      background: #26ade4;
      border: 0;
      padding: 15px;
      color: #FFFFFF;
      font-size: 14px;
      -webkit-transition: all 0.3 ease;
      transition: all 0.3 ease;
      cursor: pointer;
    }
    .form input[type=submit]:hover,.form input[type=submit]:active,.form input[type=submit]:focus {
      background: #017daf;
    }
    .form .message {
      margin: 15px 0 0;
      color: #b3b3b3;
      font-size: 12px;
    }
    .form .message a {
      color: #017daf;
      text-decoration: none;
    }
    .form .register-form {
      display: none;
    }
    .container {
      position: relative;
      z-index: 1;
      max-width: 300px;
      margin: 0 auto;
    }
    .container:before, .container:after {
      content: "";
    clear: both;
    }
    .container .info {
      margin: 50px auto;
      text-align: center;
    }
    .container .info h1 {
      margin: 0 0 15px;
      padding: 0;
      font-size: 36px;
      font-weight: 300;
      color: #1a1a1a;
    }
    .container .info span {
      color: #4d4d4d;
      font-size: 12px;
    }
    .container .info span a {
      color: #000000;
      text-decoration: none;
    }
    .container .info span .fa {
      color: #EF3B3A;
    }
    body {
      background: #ffffff; /* fallback for old browsers */
      font-family: "Roboto", sans-serif;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;      
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
  }
  else {
    $("#message").html("<font color=\"red\"><b>Check Passwords</b></font>");
    $("input[type=submit]").prop("disabled", true); 
  }}
</script>
</head>
<body>
  <div class="login-page" id="check">
    <div class="form">
      New User ?
      <form action="signup.php" method="post">
        <input type="text" name="fname" placeholder="first name"pattern="^[a-zA-Z]+$" title="Please enter letters only"required>
        <p><input type="text" name="lname" placeholder="last name" pattern="^[a-zA-Z]+$" title="Please enter letters only" required></p>
        <p>Gender :<input type="radio" name="gender" value="male" checked> Male <input type="radio" name="gender" value="female"> Female</p>
        <p><input type="email" name="email" placeholder="email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter valid email address" required>
        <p><input type="tel" name="contact" placeholder="contact no" maxlength="10" pattern="[789][0-9]{9}" title="Please enter valid 10 digit contact no" required>
        <p><input type="password" name="password1" id ="password1" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <p><input type="password" name="password2" id ="password2"placeholder="re enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title ="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <p><span id="message"></span>
        <p><input type="submit" value="CREATE" id="submit"disabled="disabled">
        <p class="message">Already registered? <a href="index.php">Sign in here</a></p>
     </form>
    </div>
  </div>
</body>
</html>
