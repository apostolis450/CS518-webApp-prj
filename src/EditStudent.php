<?php
//Edit option main page. User can choose from the right side a registration from the DB and fill out the forms
// with changes wherever he likes,or even without changes.
  ob_start();
  include "header.php";
  include "editscript.php";
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
	<div class="edit-explain"><p>Enter the ID of the registration you want to update and provide the new info</p></div>
	<div class="edit-container">
		<div class="edit-form ">
			<form action="editscript.php" method="post">
			<input type="text" name="editID"    required placeholder="ID">
            <input type="text" name="editName"   required placeholder="Name">
            <input type="text" name="editSName"  required placeholder="Surname">
            <input type="text" name="editFName"  required placeholder="Fathername">
            <input type="text" name="editGrade"  required placeholder="Grade">
            <input type="text" name="editNumber" required placeholder="Mobile Number">
            <input type="date" name="editBirth"  required placeholder="Birthday" max="2018-12-31" min="1920-01-01">
            <button id="editsubmit" type="submit"  name="edit-submit">Update</button>
          </form>	
		</div>
		<div class="edit-results">
			<table>
				<p style="font-weight: bold;">STUDENT REGISTRY</p>
				<tr>
					<th>ID</th>
					<th>NAME</th>
					<th>SURNAME</th>
					<th>FATHERNAME</th>
					<th>GRADE</th>
					<th>MOBILE NUMBER</th>
					<th>BIRTHDAY</th>
				</tr>
				<?php
				$query='select * from Students';
				$result=$conn->query($query);
				if($result->num_rows >0){
					while($row= mysqli_fetch_assoc($result)){
						echo "<tr><td>". $row["ID"] ."</td><td>"  .$row["NAME"]  ."</td><td>"  .$row["SURNAME"]  ."</td><td>"  .$row["FATHERNAME"]  ."</td><td>"  .$row["GRADE"]  ."</td><td>"  .$row["MOBILENUMBER"]  ."</td><td>"  .$row["BIRTHDAY"]  ."</td></tr>";
					}
					echo "</table>";
				}
				else{
					echo "0 result";
				}
				$conn->close();
				?>
			</table>
		</div>
	</div>


</main>

<?php
  include "footer.php";
?>