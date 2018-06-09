<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 05-06-2018
 * Time: 11:32
 */
function find_all_subjects(){
   global $db;
    $sql = "select * from subjetcs ";
    $sql .= "order by position asc";
  //  echo $sql;
    $result  = mysqli_query($db , $sql);
    confirm_result_set($result);
return $result;
}

function find_all_subjects_by_id($id){
    global $db;
    $sql = "SELECT * FROM subjetcs ";
    $sql .= "where id= '". $id . "' ";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}

function insert_subjects($menu_name,$visible,$position){

    global $db;

    $error = validate_subject($menu_name,$visible,$position);

    if (!empty($error)){
        return $error;
    }

    $sql = "insert into subjetcs ";
    $sql .= "(menu_name,position ,visible) ";
    $sql .= "values (";
    $sql .= "'".$menu_name."',";
    $sql .= "'".$visible."',";
    $sql .= "'".$position."'";
    $sql .= ")";

    $result = mysqli_query($db , $sql);
    if($result){
        //$new_id = mysqli_insert_id($db);
       // redirect_to(url_for('/staff/subjects/show.php?id='.$new_id));
       return true;
    }else{
        echo mysqli_errno($db);
        db_disconnect($db);
        exit;
    }
}

function update_subjects($subject)
{
    global $db;


    $sql = "update subjetcs set ";
    $sql .= "menu_name='" . $subject['menu_name'] . "', ";
    $sql .= "position='" . $subject['position'] . "', ";
    $sql .= "visible='" . $subject['visible'] . "' ";
    $sql .= "where id='" . $subject['id']  . "' ";
    $sql .= "limit 1";
    // echo  $sql;
    $result = mysqli_query($db, $sql);
    if ($result) {
        //   redirect_to(url_for('/staff/subjects/index.php'));
        return true;
    } else {
        //if update fail
        echo mysqli_errno($db);
        db_disconnect($db);
        exit;
    }
}

//function update_subjects($selected_id){
//
//    $sql = "update subjetcs set ";
//    $sql .= "menu_name='" . $subject['menu_name'] . "', ";
//    $sql .= "position='" . $subject['position'] . "', ";
//    $sql .= "visible='" . $subject['visible'] . "' ";
//    $sql .= "where id='" . $selected_id . "' ";
//    $sql .= "limit 1";
//    // echo  $sql;
//    $result = mysqli_query($db,$sql);
//    if($result){
//        redirect_to(url_for('/staff/subjects/index.php'));
//    }else{
//        //if update fail
//        echo mysqli_errno($db);
//        db_disconnect($db);
//        exit;
//    }
//}

function find_all_pages(){
    global $db;
    $sql = "select * from pages ";
    $sql .= "order by position asc";
   // echo  $sql;
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;

}


function find_pages_by_id($id){
    global $db;
    $sql = "SELECT * FROM pages ";
    $sql .= "where id= '". $id . "' ";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    $pages = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $pages;
}

function delete_pages($selected_id){
    global $db;
    $sql = "delete from pages ";
    $sql.= "where id= '". $selected_id . "'";
    $sql.= "limit 1";

    $result = mysqli_query($db,$sql);

    if($result){
        return true;

    }else{
        echo mysqli_errno($db);
        db_disconnect($db);
        exit;
    }
}

?>