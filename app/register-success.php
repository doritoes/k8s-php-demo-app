<!DOCTYPE HTML>
<html lang="en">
<?php
$configs = include('conf/config.php');
?>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $configs['appname']; ?></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header>
      <strong>SUCCESS</strong>
    </header>
    <main>
      <p>Successfully Registered</p>
      <p><button onclick="location.href='index.php'">CLICK HERE TO LOGIN</button></p>
    </main>
  </body>
</html>