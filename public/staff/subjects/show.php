<?php
require_once('../../../private/initialize.php');
$page_title = "Show Subject";
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
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo url_for('/staff/subjects/index.php'); ?>">Back To List</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
  </ol>
</nav>

    <?php
    $selected_id = $_GET['id'] ?? '1';
$subject = find_all_subjects_by_id($selected_id);

     ?>
  </div>
</div>

<div class="container">
    <div class="row">
<div class="col-md-8">
    <h4 class=""><span>ID: </span><?php echo $subject['id'];  ?></h4>
    <h4><span>Menu Name: </span><?php echo $subject['menu_name'];  ?></h4>
    <h4><span>Position: </span><?php echo $subject['position'];  ?></h4>
    <h4><span>Visible: </span><?php echo $subject['visible'];  ?></h4>
</div>
        <div class="col-md-4">

        </div>

    </div>
</div>

<?php
include(SHARED_PATH .'/staff-footer.php');
?>
