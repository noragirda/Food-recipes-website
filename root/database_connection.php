<!-- Connecting to the database -->
<?php
$host="localhost";
$username="your own username";
$user_pass="here you need to enter the password";
$database_in_use="the name of your database";
//creating a database instance
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
if($mysqli->connect_errno)
{
    echo "Failed to connect to mySQL:(".$mysqli->connect_errno . ")".$mysqli->connect_errno;
}

//echo $mysqli->host_info . "\n";
?>
