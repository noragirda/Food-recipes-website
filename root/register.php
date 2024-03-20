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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate and sanitize user input (e.g., check for empty fields, validate email format)

    // Hash the user's password for security (use password_hash)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user data into your database
    $sql = "INSERT INTO Users (Username, Email, Password) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful!";
        header("Location: loginpage.php"); // Redirect after successful insertion
        exit;
    } else {
        // Registration failed
        echo "Registration failed: " . $stmt->error;
    }

    $stmt->close();
}
?>
