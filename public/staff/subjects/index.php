<?php
require_once('../../../private/initialize.php');
$page_title = "Subjects";
require(SHARED_PATH .'/staff-header.php');
?>

<?php
  $subjects = [
    ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'About Globe Bank'],
    ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Consumer'],
    ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
    ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial'],
  ];
?>

<!-- Main Code  -->
<div class="container">
<div class="row">
</div>
<div class="subjects listing">
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4"><?php echo $page_title; ?></h1>
      <p class="lead"></p>
    </div>
  </div>

    <div class="">
      <a class="btn btn-primary btn-lg m-3" href="<?php echo url_for('/staff/subjects/new.php'); ?>">Create New Subject</a>
    </div>

  	<table class="table table-striped">
      <thead>
      <tr class="bg-primary">
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>&nbsp;</th>
  	    <th>Action</th>
        <th>&nbsp;</th>
  	  </tr>

      </thead>

      <?php foreach($subjects as $subject) { ?>
        <tr>
          <td><?php echo h($subject['id']); ?></td>
          <td><?php echo h($subject['position']) ; ?></td>
          <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
    	    <td><?php echo h($subject['menu_name']); ?></td>
          <td><a class="action" href="<?php echo url_for('staff/subjects/show.php?id='. htmlspecialchars($subject['id']) ); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('staff/subjects/edit.php?id='. htmlspecialchars($subject['id']) ); ?>">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

  </div>
</div>

<?php
include(SHARED_PATH .'/staff-footer.php');
?>
