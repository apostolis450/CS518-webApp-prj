<?php
ob_start();
include "header.php";
?>
    <!-- This is the front page at the beggining. If the user entered correct data,the login.php has set session -->
    <!-- variables,and we allow user to enter Teacher.php page,or it means there's noone logged in -->
    <?php
    if (!isset($_SESSION['id'])) {
      echo '<p class="login-status">You are logged out!</p>';
    }
    else if (isset($_SESSION['id'])) {
      header('Location: ../Teacher.php');
      ob_end_flush();
    }
    ?>
<?php
require "footer.php";
?>
