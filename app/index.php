<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Webapp</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="login-page">
      <div class="form">
        <form action="login.php" method="post">
          <input type="text" placeholder="username" name="uname" required />
          <input type="password" placeholder="password" name="password" required />
          <input type="submit" value="login" />
          <p class="message">Not registered? <a href="signup.php">Create an
              account</a></p>
        </form>
      </div>
    </div>
  </body>
</html>
