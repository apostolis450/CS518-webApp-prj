<?php
	//Here the user see's the whole DB and is able to choose a row to delete.Only ID is essential.
	//Clicking on DELETE button calls the scripts.
  ob_start();
  include "header.php";
  include "deletescript.php";
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
	<div class="edit-explain"><p>Enter the ID of the registration you want to delete</p></div>
	<div class="edit-container">
		<div class="edit-form ">
			<form action="deletescript.php" method="post">
			<input type="text" name="editID"    required placeholder="ID">
            <button id="editsubmit" type="submit"  name="delete-submit">Delete</button>
          </form>	
		</div>
		<div class="edit-results">
			<table>
				<p style="font-weight: bold;">STUDENT REGISTRY</p>
				<tr>
					<td>ID</td>
					<td>NAME</td>
					<td>SURNAME</td>
					<td>FATHERNAME</td>
					<td>GRADE</td>
					<td>MOBILE NUMBER</td>
					<td>BIRTHDAY</td>
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