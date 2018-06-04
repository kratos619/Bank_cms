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
 function error_404($value='')
{
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found ");
exit();
}

 function error_500($value='')
{
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found ");
  exit();}
?>
