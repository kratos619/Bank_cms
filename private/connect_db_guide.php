<?php

// This guide demonstrates the five fundamental steps
// of database interaction using PHP.

// Credentials
$dbhost = '';
$dbuser = '';
$dbpass = '';
$dbname = '';

// 1. Create a database connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// 2. Perform database query
$query = "select * from subjetcs";
$result = mysqli_query($connection, $query);
// 3. Use returned data (if any)
while ($subjects = mysqli_fetch_assoc($result)){
    echo $subjects['menu_name'];
}

// 4. Release returned data

// 5. Close database connection
mysqli_close($connection);

?>
