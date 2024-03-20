<?php
session_start();

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

if (!isset($_SESSION['user_id'])) {
    header('Location: loginpage.php');
    exit();
}

// Corrected 'iif' to 'if'
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $recipeName = $_POST["recipeName"];
    $description = $_POST["description"];
    $preparationInstructions = $_POST["preparationInstructions"];
    $recipeID = $_GET['recipeID']; // Fetching recipeID from URL

    // Update the recipe details
    $updateRecipeQuery = "UPDATE recipes SET RecipeName = ?, Description = ?, PreparationInstructions = ? WHERE RecipeID = ?";
    if ($updateRecipeStmt = $mysqli->prepare($updateRecipeQuery)) {
        $updateRecipeStmt->bind_param("sssi", $recipeName, $description, $preparationInstructions, $recipeID);
        if ($updateRecipeStmt->execute()) {
            echo "Recipe updated successfully.";
            header("Location: recipes.php"); // Redirect after successful insertion
            exit;
        } else {
            echo "Error updating recipe details: " . $mysqli->error;
        }
        $updateRecipeStmt->close();
    } else {
        echo "Error preparing statement for updating recipe: " . $mysqli->error;
    }

    $mysqli->close();
}
?>