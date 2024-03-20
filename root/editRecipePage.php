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

if (isset($_GET['id'])) {
    $recipeID = $_GET['id'];

    $recipeQuery = "SELECT RecipeName, Description, PreparationInstructions FROM recipes WHERE RecipeID = ?";
    if ($stmt = $mysqli->prepare($recipeQuery)) {
        $stmt->bind_param("i", $recipeID);
        $stmt->execute();
        $stmt->bind_result($recipeName, $description, $preparationInstructions);
        if (!$stmt->fetch()) {
            echo "No recipe found with ID: " . $recipeID;
        }
        $stmt->close();
    } else {
        echo "Error: " . $mysqli
                ->error;
    }
} else {
    echo "No Recipe ID provided.";
    exit; // Exit if no Recipe ID is provided
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
                <a href="editRecipePage.php" class="navbar-brand">
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

    <a href="editRecipePage.php" class="navbar-brand d-block d-lg-none">
        <div class="logo-container">
            <img src="img/logonume1.jpg" alt="Your Logo" class="logo-img">
            <!--<h1 class="m-0 text-uppercase text-red text-calligraphic">oxar</h1>-->
        </div>
    </a>

</nav>
<div class="container-fluid bg-dark bg-img p-5 mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-uppercase text-white">Here you can easily edit your recipe!</h1>
        </div>
    </div>
</div>

<div class="container d-flex justify-content-center align-items-center">
    <form action="editRecipe.php?recipeID=<?php echo $recipeID; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="recipeName">Recipe Name:</label>
            <input type="text" id="recipeName" name="recipeName" required value="<?php echo htmlspecialchars($recipeName, ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <div class="form-group">
            <label for="preparationInstructions">Preparation Instructions:</label>
            <textarea id="preparationInstructions" name="preparationInstructions" required><?php echo htmlspecialchars($preparationInstructions, ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <input type="submit" value="Edit Recipe">
    </form>
</div>

</body>

</html>