<?php
  //Main menu of options a verified user can access.Four simple buttons,each one redirects to a new page,
  //made for the corresponding functionality.
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
  <main class="main-control-page">
    
    <div class="user-connected">
      <p style="margin-right: 10px; margin-top: 5px;"> <b>Connected as: <?php echo $_SESSION['name'] ?><b> </p>
    </div>
      <div class="control-options">
        <div class="button_cont" align="center">
          <a class="add-btn" href="AddStudent.php" target="_blank" rel="nofollow noopener">Add </a>
          <a class="edit-btn" href="EditStudent.php" target="_blank" rel="nofollow noopener">Edit </a>
          <a class="search-btn" href="SearchStudent.php" target="_blank" rel="nofollow noopener">Search </a>
          <a class="delete-btn" href="DeleteStudent.php" target="_blank" rel="nofollow noopener">Delete </a>
          </div>
      </div>
  </main>
<?php
  include "footer.php";
?>
