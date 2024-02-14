<?php
$configs = include('conf/config.php');
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "Active") {
    // Session is not active or invalid
    header("Location: login-again.php"); // Redirect to an error page
    exit(); // Stop further execution of the current page
}
$fname = htmlspecialchars($_SESSION['fname'] ?? '');
$lname = htmlspecialchars($_SESSION['lname'] ?? '');
$email = htmlspecialchars($_SESSION['email'] ?? '');
$login = htmlspecialchars($_SESSION['login']);
$contact = htmlspecialchars($_SESSION['contact'] ?? '');
$address = htmlspecialchars($_SESSION['address'] ?? '');
$dob = htmlspecialchars($_SESSION['dob'] ?? '');
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $configs['appname']; ?></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header>
      <span class="welcome"><strong>Welcome</strong> &nbsp<?php echo $fname; echo " " ; echo $lname ; ?></span>
      <p><span class="welcome">Last logged in at: <?php echo $login; ?></span></p>
      <nav>
        <a href="index.php">Home</a>
      </nav>
      <nav>
        <a href="logout.php">Log Out</a>
      </nav>
    </header>
    <main>
      <div class="form">
        <form action="update-action.php" method="post">
          <fieldset>
            <legend>Edit Account</legend>
            <p>
              <label for="fname">First Name:</label>
              <input type="text" name="fname" placeholder="First Name" pattern="^[a-zA-Z]+$" title="Please enter letters only" value="<?php echo $fname; ?>" required>
            </p>
            <p>
              <label for="lname">Last Name:</label>
              <input type="text" name="lname" placeholder="Last Name" pattern="^[a-zA-Z]+$" title="Please enter letters only" value="<?php echo $lname; ?>" required>
            </p>
            <p>
              <label for="email">Email:</label>
              <input type="email" name="email" placeholder="Email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter valid email address" value="<?php echo $email; ?>" disabled>
            </p>
            <p>
              <label for="contact">Contact number:</label>
              <input type="text" name="contact" placeholder="Contact number" maxlength="10" pattern="[1-9][0-9]{9}" title="Please enter valid 10 digit contact number" value="<?php echo $contact; ?>">
            </p>
            <p>
              <label for="address">Address:</label>
              <input type="text" name="address" placeholder="address" value="<?php echo $address; ?>">  
            </p>
            <p>
              <label for "dob">Date of birth</label>
              <input type="date" name="dob" placeholder="Date of birth" value="<?php echo $dob; ?>">
            </p>
            <p>
              <input type="submit" value="UPDATE">  
            </p>
          </fieldset>
        </form>
      </div>
    </main>
  </body>
</html>
