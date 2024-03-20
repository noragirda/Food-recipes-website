<?php
// Include your database connection script
$host="localhost";
$username="your own username";
$user_pass="here you need to enter the password";
$database_in_use="the name of your database";

// Creating a database instance
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
}

// Query to retrieve recipes and their details from the database
$query = "SELECT * FROM recipes";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $recipeID = $row["RecipeID"];
        $recipeName = $row["RecipeName"];
        $description = $row["Description"];
        $instructions = $row["PreparationInstructions"];

        // Query to retrieve ingredients for the current recipe using a prepared statement
        $ingredientQuery = "SELECT f.FoodName, ri.QuantityInGrams
                            FROM RecipeIngredients ri
                            JOIN Foods f ON ri.FoodID = f.FoodID
                            WHERE ri.RecipeID = ?";
        if ($ingredientStmt = $mysqli->prepare($ingredientQuery)) {
            $ingredientStmt->bind_param("i", $recipeID);
            $ingredientStmt->execute();
            $ingredientResult = $ingredientStmt->get_result();

            // Build the HTML structure for each recipe
            echo '<div class="recipe-actions">';
            echo '<a href="editRecipePage.php?id=' . $row["RecipeID"] . '" class="btn btn-primary">Edit</a>';
            echo '<a href="deleteRecipe.php?id=' . $row["RecipeID"] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this recipe?\');">Delete</a>';
            echo '</div>';
            echo '<div class="container">';
            echo '<img src="' . htmlspecialchars($row["Photo"]) . '" alt="' . htmlspecialchars($row["RecipeName"]) . '" style="width: 100px; height: auto;">';
            echo '<div class="recipe-details">';
            echo '<h2>' . htmlspecialchars($recipeName) . '</h2>';
            echo '<div class="des">' . htmlspecialchars($description) . '</div>';
            echo '<h3>Instructions:</h3>';
            echo '<p>' . htmlspecialchars($instructions) . '</p>';

            if ($ingredientResult->num_rows > 0) {
                echo '<h3>Ingredients:</h3>';
                echo '<ul>';
                while ($ingredientRow = $ingredientResult->fetch_assoc()) {
                    echo '<li>' . htmlspecialchars($ingredientRow["FoodName"]) . ' - ' . htmlspecialchars($ingredientRow["QuantityInGrams"]) . ' grams</li>';
                }
                echo '</ul>';

            } else {
                echo '<p>No ingredients found for this recipe.</p>';
            }

            echo '</div>'; // Close recipe-details
            echo '</div>'; // Close container


            $ingredientStmt->close();
        } else {
            echo 'Failed to prepare ingredient query: ' . $mysqli->error;
        }
    }
    $result->free();
} else {
    echo "No recipes found.";
}

$mysqli->close();
?>