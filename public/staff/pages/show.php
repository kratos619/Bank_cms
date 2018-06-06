<?php
require_once('../../../private/initialize.php');
$page_title = "Show Pages";
require(SHARED_PATH .'/staff-header.php');
?>

<div class="container">
  <div class="row">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4"><?php echo $page_title; ?></h1>
        <p class="lead"></p>
      </div>
    </div>
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo url_for('/staff/pages/index.php'); ?>">Back To List</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
  </ol>
</nav>

    <?php
    $selected_id = $_GET['id'] ;
    echo htmlspecialchars($selected_id) ;
     ?>

  </div>
</div>


<?php
include(SHARED_PATH .'/staff-footer.php');
?>
