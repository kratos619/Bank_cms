<?php
require_once('../../../private/initialize.php');
$test = $_GET['test'] ?? '';
if($test == '404'){
error_404();
}elseif ($test == '500') {
  error_500();
}elseif ($test == 'redirect') {
  redirect_to(url_for('/staff/subjects/index.php'));
}

 ?>
 <?php
 require_once('../../../private/initialize.php');
 $page_title = "Create Page";
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
     <li class="breadcrumb-item"><a href="<?php echo url_for('/staff/pages/index.php'); ?>">Back To List</a></li>
     <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
   </ol>
 </nav>
   </div>
 </div>
<div class="container">
  <div class="row">
<div class="col-md-6 ">
  <div style="" class="card form-shadow ">
  <div style="margin:10px;" class="card-body">
    <div class="card-header">
       <?php echo $page_title; ?>
     </div>
    <form>
      <div class="form-group">
        <label for="">Menu Name</label>
        <input type="text" name="menu_name" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Enter Menu Name">
      </div>
      <div class="form-group">
    <label for="exampleFormControlSelect1">Select Position</label>
    <select name="position" class="form-control" id="exampleFormControlSelect1">
      <option value="1">1</option>
    </select>
  </div>
        <div style="margin-left:20px;" class="form-check">
          <input type="hidden" name="visible" value="0" class="form-check-input">
      <input type="checkbox" name="visible" value="1" class="form-check-input" >
          <label class="form-check-label" for="exampleCheck1">Visible</label>
        </div>
      <input type="submit" value="Create Page" class="btn btn-primary" />
    </form>
  </div>
  </div>

</div>

  </div>
</div>

 <?php
 include(SHARED_PATH .'/staff-footer.php');
 ?>
