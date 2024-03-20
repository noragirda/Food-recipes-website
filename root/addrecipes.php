<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page
    header('Location: loginpage.php');
    exit(); // Make sure to stop the script execution after redirection
}

// Assuming database_connection.php contains your database connection
$host="localhost";
$username="your own username";
$user_pass="here you need to enter the password";
$database_in_use="the name of your database";

//creating a database instance
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
if($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Handle not logged in - redirect or show an error message
    echo "Please log in to add a recipe.";
    exit; // Stop further execution of the script
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $recipeName = $_POST["recipeName"];
    $description = $_POST["description"];
    $preparationInstructions = $_POST["preparationInstructions"];
    $ingredients = [];
    $ingredientQuantities = [];

    if(isset($_POST['ingredients']) && isset($_POST['ingredientQuantities'])) {
        $ingredients = $_POST["ingredients"];
        $ingredientQuantities = $_POST["ingredientQuantities"];
    }

    // Handle recipe image upload
    $uploadDir = "recipesimg/"; // Change this to your actual upload directory
    $uploadFile = $uploadDir . basename($_FILES["recipeImage"]["name"]);
    if (move_uploaded_file($_FILES["recipeImage"]["tmp_name"], $uploadFile)) {
        // Image uploaded successfully
    } else {
        // Handle error - image not uploaded
    }

    // Get the user ID from the session
    $userID = $_SESSION['user_id'];

    // Insert recipe into Recipes table
    $query = "INSERT INTO Recipes (UserID, RecipeName, Description, PreparationInstructions, Photo) VALUES (?, ?, ?, ?, ?)";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("issss", $userID, $recipeName, $description, $preparationInstructions, $uploadFile);
        if ($stmt->execute()) {
            $recipeId = $mysqli->insert_id;

            // Check if ingredients are set and not empty
            if(isset($_POST['ingredients']) && !empty($_POST['ingredients']) && isset($_POST['ingredientQuantities']) && !empty($_POST['ingredientQuantities'])) {
                $ingredients = $_POST["ingredients"];
                $ingredientQuantities = $_POST["ingredientQuantities"];

                // Loop through the ingredients
                for ($i = 0; $i < count($ingredients); $i++)
                {
                    $ingredientName = $ingredients[$i];
                    $quantity = $ingredientQuantities[$i];

                    // Fetch FoodID based on FoodName
                    $foodQuery = "SELECT FoodID FROM Foods WHERE FoodName = ?";
                    if ($foodStmt = $mysqli->prepare($foodQuery)) {
                        $foodStmt->bind_param("s", $ingredientName);
                        $foodStmt->execute();
                        $foodResult = $foodStmt->get_result();
                        if ($foodRow = $foodResult->fetch_assoc()) {
                            $foodId = $foodRow['FoodID'];

                            // Insert into RecipeIngredients
                            $recipeIngredientQuery = "INSERT INTO RecipeIngredients (RecipeID, FoodID, QuantityInGrams) VALUES (?, ?, ?)";
                            if ($recipeIngredientStmt = $mysqli->prepare($recipeIngredientQuery))
                            {
                                $recipeIngredientStmt->bind_param("iid", $recipeId, $foodId, $quantity);
                                $recipeIngredientStmt->execute();
                                // Check for errors in ingredient insertion
                                if ($recipeIngredientStmt->error) {
                                    // Handle error - log or display it
                                }
                            }
                        } else {
                            // Ingredient not found in database
                            // Handle this situation - perhaps inform the user or log error
                        }
                        $foodStmt->close();
                    }
                }
            }
            echo "Recipe added successfully!";
            header("Location: recipes.php"); // Redirect after successful insertion
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $mysqli->error;
    }
    $mysqli->close();
} else {
    // Not a POST request
    // Handle the error or redirect
}

?>