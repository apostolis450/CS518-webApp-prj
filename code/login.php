<?php
ob_start();
//This script is used to verify the user and allow him to enter the App.
//We collect the input entered in the login form, and check if they correspond to a user in our DB.
//If the input is correct,we set the session variables and return with success.
// Here we check whether the user got to this page by clicking the login button.
if (isset($_POST['login-submit'])) {
  
  require 'db.php';
  $table="Teachers";
  //grab the data from the sign-in form.
  $uid = $_POST['uid'];
  $password = $_POST['pwd'];

  //check if the user entered values to both required fields.
  if (empty($uid) || empty($password)) {
    header("Location: ../index.php?error=emptyfields");
    ob_end_flush();
    exit();
  }
  else {
    $query='select * from '.$table.' where USERNAME = "'.$uid.'" and PASSWORD = "'.$password.'"';
    $result=mysqli_query($conn,$query);
    if (mysqli_num_rows($result)==0){
        header("Location: ../index.php?error=noUserWithSuchUsernameAndPassword");
        ob_end_flush();
        exit();
    }
    while ($row = mysqli_fetch_assoc($result)) {
        //We set the session variables with user's data so we can give him/her access to more pages
        //where unauthorized users cannot access.
          session_start();
          $_SESSION['id'] = $row['ID'];
          $_SESSION['uid'] = $row['USERNAME'];
          $_SESSION['name'] = $row['NAME'].' '.$row['SURNAME'];
          header("Location: ../index.php?login=success");
          ob_end_flush();
          exit();
        
      }
    }
  }
  $conn->close();

?>