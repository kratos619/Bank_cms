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

    if(request_is_post()){
      $page = [];
//      $selected_id['id'] = $_POST['id'];
        $selected_menu['menu_name']= $_POST['menu_name'];
        $selected_subject_id['subject_id']= $_POST['subject_id'];
        $selected_position['position']= $_POST['position'];
        $selected_visibility['visible']= $_POST['visible'];
$selected_content ['content'] = $_POST['content'];

        $sql = "update pages set ";
        $sql .= "subject_id='" . $selected_subject_id['subject_id'] . "', ";
        $sql .= "menu_name='" . $selected_menu['menu_name'] . "', ";
        $sql .= "position='" .  $selected_position['position']. "', ";
        $sql .= "visible='" . $selected_visibility['visible'] . "' ,";
        $sql .= "content='" . $selected_content['content'] . "' ";
        $sql .= " where id='" . $selected_id . "' ";
        $sql .= "limit 1";

        $result = mysqli_query($db , $sql);
        if ($result){
            redirect_to(url_for('/staff/pages/index.php'));

        }else{
            //if update fail
            echo mysqli_errno($db);
            db_disconnect($db);
            exit;

        }


    }else{
        $page = find_pages_by_id($selected_id);
        $page_set = find_all_pages();
        $page_count= mysqli_num_rows($page_set);
        mysqli_free_result($page_set);

    }


    ?>
    <form action="<?php echo url_for('staff/pages/edit.php?id='. $selected_id); ?>" method="post">
        <div class="form-group">
            <label for="">Menu Name</label>
            <input type="text" name="menu_name" class="form-control" value="<?php echo h($page['menu_name']); ?>"/>
        </div>
        <div class="form-group">
            <label>Select Position</label>
            <select name="position" class="form-control" >
                <?php
                for ($i = 1 ; $i <= $page_count ; $i++){
                    echo "<option value=\"{$i}\"";
                    if($page['position'] == $i){
                        echo " selected ";
                    }echo ">{$i}</option>";
                }
                ?>

            </select>

        </div>
        <div class="form-group">
            <?php

            //$subject = '';
            $subject = find_all_subjects_by_id($selected_id);
            ?>

            <label>Select Subject Id</label>
            <select name="subject_id" class="form-control" >
                <?php
                $subject_set = find_all_subjects();
//                $page_set = find_all_pages();
                while ($subject = mysqli_fetch_assoc($subject_set)){
                    $page['subject_id'] = $subject['id'];
                ?>
                    <option value="<?php echo h($page['subject_id']); ?>"><?php echo h($subject['menu_name']); ?></option>
                <?php
                }
                mysqli_free_result($subject_set);
                ?>

            </select>
        </div>
        <div class="form-group">
            <label>Add Content</label>
            <textarea  name="content" class="form-control" id="exampleFormControlTextarea1" rows="6"><?php echo h($page['content']);?></textarea>
        </div>
        <div style="margin-left:20px;" class="form-check">
            <input type="hidden" name="visible" value="0" class="form-check-input">
            <input type="checkbox" <?php if($page['visible'] == '1' ){ echo "checked" ; } ?>  name="visible" value="1" class="form-check-input" >
            <label class="form-check-label"  >Visible</label>
        </div>
        <input type="submit" value="Update Page" class="btn btn-primary" />
    </form>
</div>
</div>

</div>

  </div>
</div>

 <?php
 include(SHARED_PATH .'/staff-footer.php');
 ?>
