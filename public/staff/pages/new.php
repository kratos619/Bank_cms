<?php
require_once('../../../private/initialize.php');
?>
 <?php
 require_once('../../../private/initialize.php');
 $page_title = "Create Page";
 require(SHARED_PATH .'/staff-header.php');
 ?>

<?php
if(request_is_post()){
    $page = [];
    $subject_id['subject_id'] = $_POST['subject_id'];
    $menu_name['menu_name'] = $_POST['menu_name'] ;
    $position['position']= $_POST['position'];
    $visible['visible'] = $_POST['visible'] ;
    $content['content'] = $_POST['content'] ;

    $sql = "insert into pages ";
    $sql .= "(subject_id,menu_name,position ,visible, content) ";
    $sql .= "values (";
    $sql .= "'".h($subject_id['subject_id'])."',";
    $sql .= "'".h($menu_name['menu_name'])."',";
    $sql .= "'".h($position['position'] )."',";
    $sql .= "'".h($visible['visible'])."',";
    $sql .= "'".h($content['content'])."'";
    $sql .= ")";
    echo $sql;
    $result = mysqli_query($db , $sql);
    if($result){

        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('/staff/pages/show.php?id='.$new_id));
    }else{
        echo mysqli_errno($db);
        db_disconnect($db);
        exit;
    }
}else{

    $page = [];
    $page ['menu_name']= '';
    $page ['subject_id']= '';
    $page ['position']= '';
    $page ['visible']= '';
    $page ['content']= '';

    $page_set = find_all_pages();
    $page_count = mysqli_num_rows($page_set) + 1;
mysqli_free_result($page_set);
}
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
    <form action="create.php" method="post">
      <div class="form-group">
        <label for="">Menu Name</label>
        <input type="text" name="menu_name" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Enter Menu Name">
      </div>
      <div class="form-group">
    <label>Select Position</label>
    <select name="position" class="form-control" id="exampleFormControlSelect1">
        <?php
        for ($i=1;$i<=$page_count;$i++){
            echo "<option value=\"{$i}\"";
            if($page['position'] == $i){
                echo "selected";
            }else{
                echo ">{$i}</option>";
            }
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
