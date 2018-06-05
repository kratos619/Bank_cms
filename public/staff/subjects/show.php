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

            <h4><?php echo $subject['id']  ?></h4>
            <h4><?php echo $subject['menu_name']  ?></h4>
    </div>
</div>

<?php
include(SHARED_PATH .'/staff-footer.php');
?>
