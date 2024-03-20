
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page
    header('Location: loginpage.php');
    exit(); // Make sure to stop the script execution after redirection
}
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Recipes For All</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/addfood.css" rel="stylesheet">
    <!-- Link pentru font logo -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    <!--<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">-->


</head>

<body>
<!-- Topbar Start -->
<div class="container-fluid px-0 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-4 text-center bg-secondary py-3">

        </div>
        <div class="col-lg-4 text-center bg-primary border-inner py-3">
            <div class="d-inline-flex align-items-center justify-content-center">
                <a href="addfruitpage.php" class="navbar-brand">
                    <div class="logo-container">
                        <img src="img/logonume.jpg" alt="Your Logo" class="logo-img">
                        <!--<h1 class="m-0 text-uppercase text-red text-calligraphic">oxar</h1>-->
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 text-center bg-secondary py-3">

        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">

    <a href="addfruitpage.php" class="navbar-brand d-block d-lg-none">
        <div class="logo-container">
            <img src="img/logonume1.jpg" alt="Your Logo" class="logo-img">
            <!--<h1 class="m-0 text-uppercase text-red text-calligraphic">oxar</h1>-->
        </div>
    </a>

</nav>
<div class="container-fluid bg-dark bg-img p-5 mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-uppercase text-white">Add a new recipe!</h1>
        </div>
    </div>
</div>
<div class="container d-flex justify-content-center align-items-center">
    <form action="addrecipes.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="recipeName">Recipe Name:</label>
            <input type="text" id="recipeName" name="recipeName" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="preparationInstructions">Preparation Instructions:</label>
            <textarea id="preparationInstructions" name="preparationInstructions" required></textarea>
        </div>
        <div class="form-group">
            <label for="recipeImage">Upload Recipe Image:</label>
            <input type="file" id="recipeImage" name="recipeImage" accept="image/*" required>
        </div>
            <!-- (Your existing HTML content) -->
        <div id="ingredientsContainer">
            <!--<div class="form-group">
                <label for="ingredients">Ingredients:</label>
            </div>
            <div class="form-group">
                <label>Quantities for each ingredient (in grams):</label>
                <input type="number" name="ingredientQuantities[]" placeholder="Quantity">
            </div>-->

        </div>
        <button type="button" id="addIngredientButton">Add Ingredient</button>
        <button type="button" id="removeIngredientButton">Remove Ingredient</button>

        <input type="submit" value="Add Recipe">
    </form>
</div>
<!--
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('addIngredientButton').addEventListener('click', addIngredientField);
        document.getElementById('removeIngredientButton').addEventListener('click', removeIngredientField);

        function addIngredientField() {
            var container = document.getElementById('ingredientsContainer');

            var ingredientDiv = document.createElement('div');
            ingredientDiv.className = 'ingredient-field';

            var ingredientInput = document.createElement('input');
            ingredientInput.type = 'text';
            ingredientInput.name = 'ingredients[]';
            ingredientDiv.appendChild(ingredientInput);

            var quantityInput = document.createElement('input');
            quantityInput.type = 'number';
            quantityInput.name = 'ingredientQuantities[]';
            ingredientDiv.appendChild(quantityInput);

            container.appendChild(ingredientDiv);
        }

        function removeIngredientField() {
            var container = document.getElementById('ingredientsContainer');
            if(container.children.length > 0) {
                container.removeChild(container.lastChild);
            }
        }
    });
</script>-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('addIngredientButton').addEventListener('click', addIngredientField);
        document.getElementById('removeIngredientButton').addEventListener('click', removeIngredientField);

        function addIngredientField() {
            var container = document.getElementById('ingredientsContainer');

            var ingredientDiv = document.createElement('div');
            ingredientDiv.className = 'ingredient-field';

            // Create a new dropdown for selecting food items
            var ingredientSelect = document.createElement('select');
            ingredientSelect.name = 'ingredients[]';

            // Fetch food items from the database
            <?php
            $ingredientQuery = "SELECT FoodName FROM Foods";
            $ingredientResult = $mysqli->query($ingredientQuery);

            if ($ingredientResult) {
                while ($row = $ingredientResult->fetch_assoc()) {
                    echo 'var option = document.createElement("option");';
                    echo 'option.value = "' . $row['FoodName'] . '";';
                    echo 'option.text = "' . $row['FoodName'] . '";';
                    echo 'ingredientSelect.appendChild(option);';
                }
                $ingredientResult->free();
            }
            ?>

            ingredientDiv.appendChild(ingredientSelect);

            // Create an input field for quantity
            var quantityInput = document.createElement('input');
            quantityInput.type = 'number';
            quantityInput.name = 'ingredientQuantities[]';
            quantityInput.placeholder = 'Quantity';

            ingredientDiv.appendChild(quantityInput);

            container.appendChild(ingredientDiv);
        }

        function removeIngredientField() {
            var container = document.getElementById('ingredientsContainer');
            if (container.children.length > 0) {
                container.removeChild(container.lastChild);
            }
        }
    });
</script>

</body>

</html>




