<?php
function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}
function h($value)
{
  return htmlspecialchars($value);
}
 function error_404()
{
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found ");
exit();
}

 function error_500()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found ");
  exit();}
function redirect_to($location){
header("Location: ". $location);
exit;
}

function request_is_post(){
return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function request_is_get(){
return $_SERVER['REQUEST_METHOD'] == 'GET';
}
?>
