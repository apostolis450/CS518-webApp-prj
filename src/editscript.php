<?php
//Here,we grab through post method the data user entered and we update the requested row from the database.
ob_start();
if (isset($_POST['edit-submit'])) {

	require 'db.php';
	$id = $_POST['editID'];
	$name=$_POST['editName'];
	$surname=$_POST['editSName'];
	$fname=$_POST['editFName'];
	$grade=$_POST['editGrade'];
	$number=$_POST['editNumber'];
	$birthday=$_POST['editBirth'];

	$query="update Students set NAME='$name',SURNAME='$surname',FATHERNAME='$fname',GRADE='$grade',MOBILENUMBER='$number',BIRTHDAY='$birthday' where ID='$id'";
	$result=mysqli_query($conn,$query);
	if ($result === TRUE && mysqli_num_rows($result)!=0) { // also check if ID exists 
		header("Location: ../EditStudent.php?SucessfullyEdited");
		ob_end_flush();
		exit();
	} else {
	   header("Location: ../EditStudent.php?error=EditFailedConnectionErrorOrIDNotExists");
	   ob_end_flush();
	   exit();
	}

	$conn->close();
	 
}
?>