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

?>