<?php
  // First we start a session which allow for us to store information as SESSION variables.
  // This header is common to all pages. Shows the login form if no one is logged in,or the logout button if 
  //someone is.
  session_start();
  //require "db.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>CS518</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script type="text/javascript" src="http://livejs.com/live.js"></script>
  </head>
  <body>
    <header>
      <a class="header-logo" href="index.php">
        <img src="tuc.png">
      </a>
      <div class="header-login">
        <?php
        if (!isset($_SESSION['id'])) {
          echo '<form action="login.php" method="post">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button id="loginbtn" type="submit" onclick="pageRedirect()" name="login-submit">Login</button>
          </form>';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form action="logout.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
          </form>';
        }
        ?>
      </div>
    </header>
  