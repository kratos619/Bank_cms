
<?php
if(!isset($page_title)){
    $page_title = "Staff Menu";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/font-awesome.min.css') ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Community Financial Group <?php echo $page_title; ?></title>
</head>
<body>
    <header class="bg-info text-center p-3">
    <h1 class="display-2">Community Financial Group</h1>
    </header>

    <navigatio>
    <ul>
    <li>
    <a href="<?php echo url_for('staff/index.php'); ?>">Menu</a>
    </li>
    </ul>
    </navigatio>
