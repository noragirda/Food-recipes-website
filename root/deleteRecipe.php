<?php
session_start(); // Start the session

// Include your database connection script
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

// Check if the recipe ID is set in the URL
if (isset($_GET['id']) && isset($_SESSION['user_id'])) {
    $recipeID = $_GET['id'];
    $loggedInUserID = $_SESSION['user_id'];

    // Check if the logged-in user is the creator of the recipe
    $checkUserQuery = "SELECT UserID FROM recipes WHERE RecipeID = ?";
    if ($userStmt = $mysqli->prepare($checkUserQuery)) {
        $userStmt->bind_param("i", $recipeID);
        $userStmt->execute();
        $result = $userStmt->get_result();
        $userRow = $result->fetch_assoc();
        $userStmt->close();

        if ($userRow && $userRow['UserID'] == $loggedInUserID) {
            // User verification successful

            // Prepare a statement for deleting the recipe ingredients
            $deleteIngredientsQuery = "DELETE FROM RecipeIngredients WHERE RecipeID = ?";
            if ($ingredientStmt = $mysqli->prepare($deleteIngredientsQuery)) {
                $ingredientStmt->bind_param("i", $recipeID);
                $ingredientStmt->execute();
                $ingredientStmt->close();
            } else {
                echo "Error preparing statement for deleting ingredients: " . $mysqli->error
                ;
                $mysqli->close();
                exit();
            }        // Prepare a statement for deleting the recipe
            $deleteRecipeQuery = "DELETE FROM recipes WHERE RecipeID = ?";
            if ($recipeStmt = $mysqli->prepare($deleteRecipeQuery)) {
                $recipeStmt->bind_param("i", $recipeID);

                // Execute the statement
                if ($recipeStmt->execute()) {
                    echo "Recipe and its ingredients deleted successfully.";
                    header("Location: recipes.php"); // Redirect after successful insertion
                    exit;
                } else {
                    echo "Error deleting recipe: " . $mysqli->error;
                }

                // Close the statement
                $recipeStmt->close();
            } else {
                echo "Error preparing statement for deleting recipe: " . $mysqli->error;
            }
        } else {
            echo "You do not have permission to delete this recipe.";
        }
    } else {
        echo "Error preparing user check statement: " . $mysqli->error;
    }
} else {
    echo "No recipe ID provided or user not logged in.";
}

// Close the database connection
$mysqli->close();
?>