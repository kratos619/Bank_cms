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

function display_errors($errors = array()){
    $output = '';
    if(!empty($errors)){
        $output .= `<div class="alert-danger" >`;
        $output .= `plese fix the following errors`;
        $output .= `<ul>`;
        foreach ($errors as $error){
            $output .= '<li>' . h($error). '</li>';

        }
        $output .= '</ul>';
        $output .= '</div>';
    }
    return $output;
}
?>
