<?php
  //Add option appearance.User can give info for a new registry and by clicking ADD,the script called
  //takes over the actions needed.
  ob_start();
  include "header.php";
  session_start();
  if (!isset($_SESSION['id'])) { //User must not be allowed to access this page without 
    // being logged in
    header("Location: ../index.php");
    ob_end_flush();
    exit();
  }
?>
<main class="add-student-main">
	<div class="main-add-container">
		<div class="register-form">
			<form action="addscript.php" method="post">
            <input type="text" name="newName" required placeholder="Name">
            <input type="text" name="newSName" required placeholder="Surname">
            <input type="text" name="newFName" required placeholder="Fathername">
            <input type="text" name="newGrade" required placeholder="Grade">
            <input type="text" name="NewNumber" required placeholder="Mobile Number">
            <input type="date" name="NewBirth" required placeholder="Birthday" max="2018-12-31" min="1920-01-01">
            <button id="addsubmit" type="submit"  name="add-submit">Add</button>
          </form>	
		</div>
	</div>


</main>

<?php
  include "footer.php";
?>