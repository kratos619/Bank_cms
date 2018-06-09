<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 06-06-2018
 * Time: 16:42
 */
?>
<?php
require_once ('../../../private/initialize.php');
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
    $sql .= "'".db_escape($db,$subject_id['subject_id'])."',";
    $sql .= "'".db_escape($db,$menu_name['menu_name'])."',";
    $sql .= "'".db_escape($db,$position['position'] )."',";
    $sql .= "'".db_escape($db,$visible['visible'])."',";
    $sql .= "'".db_escape($db,$content['content'])."'";
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
}

?>
