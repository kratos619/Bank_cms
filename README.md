# Bank_cms

connection giude 
======================================

This guide demonstrates the five fundamental steps of database interaction using PHP.

 Credentials
$dbhost = 'localhost';
$dbuser = 'user';
$dbpass = 'password';
$dbname = 'dbname';

1. Create a database connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

Test if connection succeeded
if(mysqli_connect_errno()) {
    $msg = "Database connection failed: ";
    $msg .= mysqli_connect_error();
    $msg .= " (" . mysqli_connect_errno() . ")";
    exit($msg);
}

2. Perform database query
$query = "SELECT * FROM <table_name>";
$result_set = mysqli_query($connection, $query);

Test if query succeeded
if (!$result_set) {
    exit("Database query failed.");
}

3. Use returned data (if any)
while($data= mysqli_fetch_assoc($result_set)) {
    echo $data["table_data"] . "<br />";
}

4. Release returned data
mysqli_free_result($result_set);

5. Close database connection
mysqli_close($connection);

