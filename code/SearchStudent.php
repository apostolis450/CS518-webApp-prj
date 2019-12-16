<?php
	//User has to enter minimun info about a registry,button calls the script,which searches about the registry
	//with these data and we show the result by grabbing the script's return using _GET method,from url.
  ob_start();
  include "header.php";
  include "searchscript.php";
  require 'db.php';
  session_start();
  if (!isset($_SESSION['id'])) { //User must not be allowed to access this page without 
    // being logged in
    header("Location: ../index.php");
    ob_end_flush();
    exit();
  }
?>

<main class="edit-student-main">
	<div class="edit-explain"><p>Fill out the fields below to search for a student</p></div>
	<div class="edit-container">
		<div class="edit-form ">
			<form action="searchscript.php"  method="post">
            <input type="text" name="editName"   required placeholder="Name">
            <input type="text" name="editSName"  required placeholder="Surname">
            <input type="text" name="editFName"  required placeholder="Fathername">
			<button id="editsubmit" type="submit"  name="search-submit">Search</button>
          </form>	
		</div>
		<div class="edit-results">
			<table >
				<p style="font-weight: bold;">STUDENT REGISTRY</p>
		<?php
			if($_GET['result'] == 'Success'){
					echo "<tr>
					<th>ID</th>
					<th>NAME</th>
					<th>SURNAME</th>
					<th>FATHERNAME</th>
					<th>GRADE</th>
					<th>MOBILE NUMBER</th>
					<th>BIRTHDAY</th>
				</tr>";
				echo "<tr><td>".$_GET['id']."</td><td> ".$_GET['name']."</td><td> ".$_GET['surname']."</td><td> ".$_GET['fathername']."</td><td> ".$_GET['grade']."</td><td> ".$_GET['mobnum']."</td><td> ".$_GET['bday']."</td></tr>";
			}
			else if($_GET['res']==0){
				echo "<tr>No results found!</tr>";
			}

			else{
				echo "<tr>Nothing to show!</tr>";
			}
				?>
			</table>
		</div>
	</div>


</main>

<?php
  include "footer.php";
?>