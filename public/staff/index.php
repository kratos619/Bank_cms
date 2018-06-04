<?php
require_once('../../private/initialize.php');
$page_title = "Staff Menu";
require(SHARED_PATH .'/staff-header.php');
?>

<!-- Main Code  -->
<div class="container">
<div id="main-menu">
  <h2>Main Menu</h2>
  <ul>
    <li><a href="<?php echo url_for('/staff/subjects/index.php'); ?> ">Subjects</a>
  <li><a href="<?php echo url_for('/staff/pages/index.php'); ?> ">Pages</a>
</li>
  </ul>

</div>
</div>

<?php
include(SHARED_PATH .'/staff-footer.php');
?>
