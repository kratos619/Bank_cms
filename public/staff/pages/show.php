<?php
require_once('../../../private/initialize.php');
$page_title = "Show Pages";
require(SHARED_PATH .'/staff-header.php');

if (!isset($_GET['id'])){
    redirect_to(url_for('/staff/pages/index.php'));
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
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo url_for('/staff/pages/index.php'); ?>">Back To List</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
  </ol>
</nav>

    <?php
    $selected_id = $_GET['id'] ;
    $show_page_content =  find_pages_by_id($selected_id);
 if(request_is_post()){
     $result = delete_pages($selected_id);
     if ($result){
        redirect_to(url_for('/staff/pages/index.php'));
     }else{
         $show_page_content =  find_pages_by_id($selected_id);
     }
}

  ?>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php
            $subject = find_all_subjects_by_id($selected_id)
            ?>
            <p>Page Id: <?php echo h($show_page_content['id'] ); ?></p>
            <p>Subject Name: <?php echo h($subject['menu_name'] );?></p>
            <p>Page Menu Name : <?php echo h($show_page_content['menu_name'] );?></p>
            <p>Page Position : <?php echo h($show_page_content['position'] );?></p>
            <p>Page Visibility :<?php echo  h($show_page_content['visible'] );?></p>
            <p>Page Content: <?php echo h($show_page_content['content']); ?></p>
        </div>
        <div class="col-md-6">
            <form action="<?php echo url_for('/staff/pages/show.php?id=' . h($show_page_content['id']))?>" method="post">
                <div class="align-items-center" >
                    <input type="submit" name="delete" class="btn-danger btn btn-group-lg" value="Delete" />
                </div>
            </form>

        </div>
    </div>
</div>


<?php
include(SHARED_PATH .'/staff-footer.php');
?>
