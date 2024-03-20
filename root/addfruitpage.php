
</body>
</html>
<?php
include "database_connection.php";
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

        </div>
    </a>

</nav>
<div class="container-fluid bg-dark bg-img p-5 mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-uppercase text-white">Add Food Item</h1>
        </div>
    </div>
</div>
<div class="container d-flex justify-content-center align-items-center">
    <form action="addfood.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="foodName">Food Name:</label>
            <input type="text" id="foodName" name="foodName" required>
        </div>
        <div class="form-group">
            <label for="foodImage">Upload Food Image:</label>
            <input type="file" id="foodImage" name="foodImage" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="calories">Calories (per 100g):</label>
            <input type="number" id="calories" name="calories" step="0.1" required>
        </div>
        <div class="form-group">
            <label for="protein">Protein (per 100g):</label>
            <input type="number" id="protein" name="protein" step="0.1" required>
        </div>
        <div class="form-group">
            <label for="carbs">Carbs (per 100g):</label>
            <input type="number" id="carbs" name="carbs" step="0.1" required>
        </div>
        <div class="form-group">
            <label for="fat">Fat (per 100g):</label>
            <input type="number" id="fat" name="fat" step="0.1" required>
        </div>
        <div class="form-group">
            <label for="fiber">Fiber (per 100g):</label>
            <input type="number" id="fiber" name="fiber" step="0.1" required>
        </div>
        <div class="form-group">
            <label for="sugar">Sugar (per 100g):</label>
            <input type="number" id="sugar" name="sugar" step="0.1" required>
        </div>
        <input type="submit" value="Add Food">
    </form>
</div>

</body>

</html>




