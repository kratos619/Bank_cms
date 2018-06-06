<?php
require_once('../../../private/initialize.php');
if (!isset($_GET['id'])) {
  redirect_to(url_for('/staff/pages/index.php'));
}
 ?>
 <?php
 require_once('../../../private/initialize.php');
 $page_title = "Edit Pages";
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
<div class="col-md-6 form-shadow">
<div style="" class="card ">
<div style="margin:10px;" class="card-body">
  <div class="card-header">
     <?php echo $page_title; ?>

   </div>
    <?php
    $selected_id = $_GET['id'];
    $selected_page = find_pages_by_id($selected_id);
    $page_set = find_all_pages();
    $page_count= mysqli_num_rows($page_set);
    mysqli_free_result($page_set);

    ?>
    <form action="<?php echo url_for('staff/pages/edit.php?id='. $selected_id); ?>" method="post">
        <div class="form-group">
            <label for="">Menu Name</label>
            <input type="text" name="menu_name" class="form-control" value="<?php echo $selected_page['menu_name']; ?>"/>
        </div>
        <div class="form-group">
            <label>Select Position</label>
            <select name="position" class="form-control" >
                <?php
                for ($i = 1 ; $i < $page_count ; $i++){
                    echo "<option value=\"{$i}\"";
                    if($selected_page['position'] == $i){
                        echo " selected";
                    }echo ">{$i}<option/>";
                }
                ?>

            </select>

        </div>
        <div class="form-group">
            <label>Select Subject Id</label>
            <select name="subject_id" class="form-control" id="exampleFormControlSelect1">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Add Content</label>
            <textarea  name="content" class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
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
