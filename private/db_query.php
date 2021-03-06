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
    $sql .= "where id= '". db_escape($db,$id). "' ";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}

function validate_subject($subject) {

        $errors = [];

        // menu_name
        if(is_blank($subject['menu_name'])) {
            $errors[] = "Name cannot be blank.";
        }
        if(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
            $errors[] = "Name must be between 2 and 255 characters.";
        }

        // position
        // Make sure we are working with an integer
        $postion_int = (int) $subject['position'];
        if($postion_int <= 0) {
            $errors[] = "Position must be greater than zero.";
        }
        if($postion_int > 999) {
            $errors[] = "Position must be less than 999.";
        }

        // visible
        // Make sure we are working with a string
        $visible_str = (string) $subject['visible'];
        if(!has_inclusion_of($visible_str, ["0","1"])) {
            $errors[] = "Visible must be true or false.";
        }

        return $errors;
    }

function insert_subjects($subject){

    global $db;

    $errors = validate_subject($subject);

    if (!empty($errors)){
        return $errors;
    }
    $sql = "insert into subjetcs ";
    $sql .= "(menu_name,position ,visible) ";
    $sql .= "values (";
    $sql .= "'". db_escape($db,$subject['menu_name']) ."',";
    $sql .= "'". db_escape($db,$subject['position']) ."',";
    $sql .= "'". db_escape($db,$subject['visible']) ."'";
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

    $error = validate_subject($subject);

    if (!empty($error)){
        return $error;
    }

    $sql = "update subjetcs set ";
    $sql .= "menu_name='" . db_escape($db,$subject['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db,$subject['position']) . "', ";
    $sql .= "visible='" . db_escape($db,$subject['visible']) . "' ";
    $sql .= "where id='" . db_escape($db,$subject['id'])  . "' ";
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
    $sql .= "where id= '". db_escape($db,$id) . "' ";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    $pages = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $pages;
}

function delete_pages($selected_id){
    global $db;
    $sql = "delete from pages ";
    $sql.= "where id= '". db_escape($db,$selected_id) . "'";
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