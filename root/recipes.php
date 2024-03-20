

</body>
</html>
<?php
include "database_connection.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page
    header('Location: loginpage.php');
    exit(); // Make sure to stop the script execution after redirection
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
    <link href="css/recipesDisplay.css" rel="stylesheet">
    <!--<link href="css/addfood.css" rel="stylesheet">-->
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
                <a href="recipes.php" class="navbar-brand">
                    <div class="logo-container">
                        <img src="img/logonume.jpg" alt="Your Logo" class="logo-img">
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

    <a href="recipes.php" class="navbar-brand d-block d-lg-none">
        <div class="logo-container">
            <img src="img/logonume1.jpg" alt="Your Logo" class="logo-img">
        </div>
    </a>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto mx-lg-auto py-0">
            <a href="index.php" class="nav-item nav-link active">About</a>
            <a href="foods.php" class="nav-item nav-link">Foods</a>
            <a href="recipes.php" class="nav-item nav-link">Recipes</a>
            <a href="loginpage.php" class="nav-item nav-link">Login</a>
            <a href="logout.php" class="nav-item nav-link">Logout</a>
        </div>
    </div>
</nav>
<div class="container-fluid bg-dark bg-img p-5 mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-uppercase text-white">Recipes</h1>
        </div>
    </div>
</div>
<div class="container-fluid about py-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text-primary font-secondary">A list with all the food items you can use in your recipes!</h2>
            <h1 class="display-4 text-uppercase">If you can't find something, you can add it!</h1>
        </div>
    </div>
</div>
<div class="recipe-container">
    <?php
    include "displayingRecipes.php";
    ?>
</div>
<div class="container-fluid bg-offer my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title position-relative text-center mx-auto mb-4 pb-3" style="max-width: 600px;">
                    <h2 class="text-primary font-secondary">If you have a recipe you want to share </h2>
                    <h1 class="display-4 text-uppercase text-white">you can add it easily!</h1>
                </div>
                <p class="text-white mb-4">Even though there are similar recipes but you consider yours to have something extra, feel free!<br> <br><br> </p>
                <a href="addingrecipespage.php" class="btn btn-dark border-inner py-3 px-5">Add your recipe here!</a>
            </div>
        </div>
    </div>
</div>


</body>

</html>




