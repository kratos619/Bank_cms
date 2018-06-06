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

?>