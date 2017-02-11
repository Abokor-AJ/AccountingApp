<?php
include ('include/init.php');

if ($_SESSION['userid'] == '') {
  header('Location: index.php');
  exit();
}
?>

<!-- start of the content wrapper -->
  <div class="content-wrapper">
      <h1 style="text-align:left">This is the Welcome page.</h1>
  </div>

  <div><a href="include/logout.php">Log out</a></div>
<!-- .content-wrapper -->
