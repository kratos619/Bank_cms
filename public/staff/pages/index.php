<?php
require_once('../../../private/initialize.php');
$page_title = "Pages";
require(SHARED_PATH .'/staff-header.php');
?>

<?php
$page_set = find_all_pages();
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
      <a class="btn btn-primary btn-lg m-3" href="<?php echo url_for('/staff/pages/new.php');?> ">Create New Page</a>
    </div>

  	<table class="table table-striped">
      <thead>
      <tr class="bg-primary">
        <th>ID</th>
        <th>Position</th>
        <th>Subject</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>&nbsp;</th>
  	    <th>Action</th>
        <th>&nbsp;</th>
  	  </tr>

      </thead>

      <?php while($page = mysqli_fetch_assoc($page_set)) { ?>
        <tr>
          <td><?php echo h($page['id']) ; ?></td>
          <td><?php echo h($page['position']); ?></td>
            <?php
            //$subject = '';
            $subject = find_all_subjects_by_id($page['subject_id']);
            ?>
          <td><?php echo h($subject['menu_name']); ?></td>
          <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
    	    <td><?php echo h($page['menu_name']); ?></td>
          <td><a class="action" href="<?php echo url_for('staff/pages/show.php?id='. h($page['id']) ); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('staff/pages/edit.php?id='. h($page['id']) ); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('staff/pages/show.php?id='. h($page['id']) ); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
<?php
mysqli_free_result($page_set);
?>
  </div>
</div>

<?php
include(SHARED_PATH .'/staff-footer.php');
?>
