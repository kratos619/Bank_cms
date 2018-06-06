<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 06-06-2018
 * Time: 15:40
 */
?>
<?php
require_once('../../../private/initialize.php');
$page_title = "Delete Subject";
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
        $selected_id = $_GET['id'];
        $subject = find_all_subjects_by_id($selected_id);
if (request_is_post()){
$sql = "delete from subjetcs";
$sql .= " where id= '".$selected_id . "'";
$sql .= "limit 1";
$result = mysqli_query($db,$sql);
if($result){
    redirect_to(url_for('/staff/subjects/index.php'));
}else{

    echo mysqli_errno($db);
    db_disconnect($db);
    exit;
}
}

        ?>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Are You Sure You want To delete this Subjects</h3>
            <h4 class=""><span>ID: </span><?php echo h($subject['id']);  ?></h4>
            <h4><span>Menu Name: </span><?php echo h($subject['menu_name']) ;  ?></h4>
            <h4><span>Position: </span><?php echo h($subject['position']);  ?></h4>
            <h4><span>Visible: </span><?php echo h($subject['visible']);  ?></h4>
            <form action="<?php echo url_for('/staff/subjects/delete.php?id='.h($subject['id']))?>" method="post">
                <input type="submit" value="Delete Subjects" class="btn btn-group-lg btn-danger">
            </form>
        </div>
        <div class="col-md-4">

        </div>

    </div>
</div>

<?php
include(SHARED_PATH .'/staff-footer.php');
?>
