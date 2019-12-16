<?php
//All we need is the ID of the registration,and we delete it if there is such a row.
ob_start();
if (isset($_POST['delete-submit'])) {

	require 'db.php';
	$id = $_POST['editID'];

	$query="delete from Students where ID='$id'";
	$result=mysqli_query($conn,$query);
	if ($result === TRUE && mysqli_num_rows($result)!=0) { // also check if ID exists 
		header("Location: ../DeleteStudent.php?SucessfullyDeleted");
		ob_end_flush();
	exit();
	} else {
	   header("Location: ../DeleteStudent.php?error=DeleteFailedConnectionErrorOrIDNotExists");
	   ob_end_flush();
	   exit();
	}

	$conn->close();
	 
}
?>