<?php
$host="localhost";
$username="your own username";
$user_pass="here you need to enter the password";
$database_in_use="the name of your database";

// Creating a database instance
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

$sql = "SELECT FoodID, FoodName, Photo FROM Foods";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="food-item">';
        echo '<h3>' . htmlspecialchars($row["FoodName"]) . '</h3>';
        echo '<img src="' . htmlspecialchars($row["Photo"]) . '" alt="' . htmlspecialchars($row["FoodName"]) . '" style="width: 100px; height: auto;">';
        echo '</div>';
    }
} else {
    echo "0 results";
}

$mysqli->close();
?>
