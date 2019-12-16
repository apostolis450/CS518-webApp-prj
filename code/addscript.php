<?php
//Grabbing info from forms wih _POST method and create the new registry in the DB.
ob_start();
if (isset($_POST['add-submit'])) {
	
	
	require 'db.php';
	$new_name=$_POST['newName'];
	$new_surname=$_POST['newSName'];
	$new_fname=$_POST['newFName'];
	$new_grade=$_POST['newGrade'];
	$new_number=$_POST['NewNumber'];
	$new_birthday=$_POST['NewBirth'];

	if (empty($new_name) || empty($new_surname) || empty($new_fname) || empty($new_grade) ||empty($new_number) || empty($new_birthday)) {
		//error cause of empty required fields
    	header("Location: ../AddStudent.php?error=emptyFields");
    	ob_end_flush();
  	}
  	else {

  		$query="insert into Students(NAME,SURNAME,FATHERNAME,GRADE,MOBILENUMBER,BIRTHDAY) values('$new_name','$new_surname','$new_fname','$new_grade','$new_number','$new_birthday')";
  		if ($conn->query($query) === TRUE) {
    		header("Location: ../AddStudent.php?SucessfullyAdded");
    		ob_end_flush();
        	exit();
		} else {
		   header("Location: ../AddStudent.php?error=RegistryFailed ". mysqli_connect_error());
    	   ob_end_flush();
    	   exit();
		}

		$conn->close();
  	}
}

?>