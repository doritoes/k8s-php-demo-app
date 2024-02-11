<?php
session_start();
session_destroy();
header("Location: login-again.php");
?>
