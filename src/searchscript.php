<?php
	//Query for the search option happens here with the data user entered in SearchStudent.php
ob_start();
if (isset($_POST['search-submit'])) {

	require 'db.php';

	$name=$_POST['editName'];
	$surname=$_POST['editSName'];
	$fname=$_POST['editFName'];

	$query="select * from Students where NAME='$name' and SURNAME= '$surname' and FATHERNAME='$fname'";
	$result=mysqli_query($conn,$query);
	$conn->close();
	if ($result && mysqli_num_rows($result)!=0) { // also check if ID exists 
		$row= mysqli_fetch_assoc($result);
		header("Location: ../SearchStudent.php?result=Success&id=".$row["ID"]."&name=".$row["NAME"]."&surname=".$row["SURNAME"]."&fathername=".$row["FATHERNAME"]."&grade=".$row["GRADE"]."&mobnum=".$row["MOBILENUMBER"]."&bday=".$row["BIRTHDAY"]);
		ob_end_flush();
		exit();
	}
	 else {
	   header("Location: ../SearchStudent.php?error=FailedConnectionErrorOrStudentNotExists&res=0");
	   ob_end_flush();
	   exit();
	}

}	 
?>