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
    main button{
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
    main form input[type=submit]{
      font-family: "Roboto", sans-serif;
      text-transform: uppercase;
      outline: 0;
      position : relative;
      background: #26ade4;
      border: 0;
      padding: 15px;
      color: #FFFFFF;
      font-size: 14px;
     cursor: pointer;
   }
  </style>
</head>
<body>		
<header>
  <div class="body">
    <we><strong>Welcome</strong> &nbsp<?php echo $fname; echo " " ; echo $lname ; ?></we>
    <p><we> Last logged in at : <?php echo $login; ?></we>
    <p> <a href="logou.php">Log Out</a>
  </div>
</header>
<main>
<form action="edit.php" method="post">
  <input type="text" name="fname" placeholder="first name"pattern="^[a-zA-Z]+$" title="Please enter letters only">
  <p><input type="text" name="lname" placeholder="last name" pattern="^[a-zA-Z]+$" title="Please enter letters only"></p>
  <p><input type="email" name="email" placeholder="email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter valid email address">
  <p><input type="text" name="contact" placeholder="contact no" maxlength="10" pattern="[789][0-9]{9}" title="Please enter valid 10 digit contact no">
  <p><input type="text" name="address" placeholder="address"/>
  <p><input type="date" name="dob" placeholder="Date of birth"/>(date of birth)</p>
  <p><input type="submit" value="UPDATE"/>
</form>		
</main>
<?php if($_SESSION['status']!="Active"){session_destroy();header("location:index.php");
}?>
</body>
</html>
