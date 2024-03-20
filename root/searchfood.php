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

if (isset($_POST['search']))
$searchText = $_POST['search'];

// Perform a database query to search for food items
    $sql = "SELECT FoodName FROM Foods WHERE FoodName LIKE CONCAT('%', ?, '%')";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $searchText);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        // Echo the search results as HTML list items
        echo '<li>' . htmlspecialchars($row['FoodName']) . '</li>';
    }

    $stmt->close();
    $mysqli->close();
?>
