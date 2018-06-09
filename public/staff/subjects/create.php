<?php
require_once ('../../../private/initialize.php');
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 06-06-2018
 * Time: 08:30
 */
if(request_is_post()){
    $subject = [];
    $menu_name = $_POST['menu_name'];
    $visible = $_POST['visible'];
    $position= $_POST['position'];

    $result = insert_subjects($menu_name,$visible,$position);
//    $result = mysqli_query($db , $sql);
    if($result){
        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('/staff/subjects/show.php?id='.$new_id));
    }else{
        echo mysqli_errno($db);
        db_disconnect($db);
        exit;
    }
}
?>