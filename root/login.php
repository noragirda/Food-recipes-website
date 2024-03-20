<?php
session_start();

$host="localhost";
$username="your own username";
$user_pass="here you need to enter the password";
$database_in_use="the name of your database";

// Creating a database instance
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve the user's hashed password from the database
    $sql = "SELECT UserID, Password FROM Users WHERE Email = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt === false) {
        die("Error in prepared statement: " . $mysqli->error);
    }

    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row["Password"];

            // Verify the entered password against the stored hash
            if (password_verify($password, $hashedPassword)) {
                // Password is correct; set a session/cookie to mark the user as logged in
                $_SESSION["user_id"] = $row["UserID"];
                echo "Login successful!";
                header("Location: recipes.php"); // Redirect after successful insertion
                exit;

            } else {
                // Password is incorrect
                echo "Incorrect password!";
            }
        } else {
            // User not found
            echo "User not found!";
        }
    } else {
        // Error executing the query
        echo "Error executing query: " . $stmt->error;
    }

    $stmt->close();
}
?>
