<?php
require_once('../../../private/initialize.php');
if (!isset($_GET['id'])) {
  redirect_to(url_for('/staff/subjects/index.php'));
}
 ?>
 <?php
 require_once('../../../private/initialize.php');
 $page_title = "Edit Subject";
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
   </div>
 </div>
<div class="container">
    <div class="row">
<div class="col-md-6 form-shadow">
<div style="" class="card ">
<div style="margin:10px;" class="card-body">
  <div class="card-header">
     <?php echo $page_title; ?>
   </div>
    <?php
    $selected_id= $_GET['id'] ?? '';


if(request_is_post()){
    //handle value send my bew php
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $sql = "update subjetcs set ";
    $sql .= "menu_name='" . $subject['menu_name'] . "', ";
    $sql .= "position='" . $subject['position'] . "', ";
    $sql .= "visible='" . $subject['visible'] . "' ";
    $sql .= "where id='" . $selected_id . "' ";
    $sql .= "limit 1";
   // echo  $sql;
$result = mysqli_query($db,$sql);
if($result){
redirect_to(url_for('/staff/subjects/index.php'));

}else{
    //if update fail
echo mysqli_errno($db);
db_disconnect($db);
exit;
}
}else{
    $subject = find_all_subjects_by_id($selected_id);
    $subject_sets = find_all_subjects();
    $subject_count = mysqli_num_rows($subject_sets);
    mysqli_free_result($subject_sets);
}
?>
  <form action="<?php echo url_for('/staff/subjects/edit.php?id='. h($selected_id)); ?>" method="post">
    <div class="form-group">
      <label for="">Menu Name</label>
      <input type="text" name="menu_name" class="form-control" value="<?php echo h($subject['menu_name']);?>">
    </div>
    <div class="form-group">
  <label for="exampleFormControlSelect1">Select Position</label>
  <select name="position" class="form-control">
  <?php
  for ($i = 1 ; $i < $subject_count ; $i++){
      echo "<option value=\"{$i}\"";
      if($subject['position'] == $i){
          echo "selected";
      }echo ">{$i}<option/>";
  }
  ?>
  </select>
</div>

      <div style="margin-left:20px;" class="form-check">
        <input type="hidden" name="visible" value="0" class="form-check-input" />
    <input
            type="checkbox"
            name="visible"
            value="1" <?php
    if(h($subject['visible'])== 1 )
    { echo "checked";}
    ?>
            class="form-check-input" />
        <label class="form-check-label" for="exampleCheck1">Visible</label>
      </div>
    <input type="submit" value="Edit Subject" class="btn btn-primary" />
  </form>
</div>
</div>

</div>

  </div>
</div>

 <?php
 include(SHARED_PATH .'/staff-footer.php');
 ?>
