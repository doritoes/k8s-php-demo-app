<!DOCTYPE HTML>
<html lang="en">
<?php
$configs = include('config.php');
?>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $configs[appname]; ?></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="login-page">
      <div class="form">
        <p class="errormessage">Invalid User Name or Password</p>
        <form action="login.php" method="post">
          <input type="text" placeholder="username"name="uname" required/>
          <input type="password" placeholder="password" name="password" required/>
          <input type="submit" value="login"/>
          <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
        </form>
      </div>
    </div>
  </body>
</html>
