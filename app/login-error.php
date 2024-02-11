<?php
$configs = include('conf/config.php');
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $configs['appname']; ?></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="login-page">
      <div class="form">
        <p class="error">Invalid User Name or Password</p>
        <form action="login.php" method="post">
          <fieldset>
            <legend>Log In</legend>
            <p>
              <label for="uname">Username:</label>
              <input type="text" placeholder="username" name="uname" required>
            </p>
            <p>
              <label for="password">Password:</label>
              <input type="password" placeholder="password" name="password" required>
            </p>
            <p>
              <input type="submit" value="login">
            </p>
          </fieldset>
          <p class="message">Not registered? <a href="register.php">Create an account</a></p>
        </form>
      </div>
    </div>
  </body>
</html>
