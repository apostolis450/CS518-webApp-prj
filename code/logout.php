<?php
//Clearing all session vars and redirect to initial page.
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");
?>