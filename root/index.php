

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
                <a href="index.php" class="navbar-brand">
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

    <a href="index.php" class="navbar-brand d-block d-lg-none">
        <div class="logo-container">
            <img src="img/logonume.jpg" alt="Your Logo" class="logo-img">
        </div>
    </a>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto mx-lg-auto py-0">
            <a href="index.php" class="nav-item nav-link active">About</a>
            <a href="foods.php" class="nav-item nav-link">Foods</a>
            <a href="recipes.php" class="nav-item nav-link">Recipes</a>
        </div>
    </div>
</nav>
<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text-primary font-secondary">Find what you are looking for!</h2>
            <h1 class="display-4 text-uppercase">Your go-to website for recipes</h1>
        </div>
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="img/recipescollage.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 pb-5">
                <div class="poem">
                    <div class="stanza">
                        On the table spread the cloth,
                        <br>
                        Let the knives be sharp and clean:
                        <br>
                        Pickles get and salad both,
                        <br>
                        Let them each be fresh and green:
                    </div>
                    <div class="stanza">
                        With small beer, good ale, and wine,
                        <br>
                        O ye gods! how I shall dine.
                        <br>
                        Recipes for all here you'll find
                        <br>
                        That go along with ale and wine
                    </div>
                </div>
                <div class="moto">
                    <h4>Search for a recipe, and if you can't find it, add it for others to also enjoy it!</h4>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-sm-6">
                <div class="d-flex align-items-center justify-content-center bg-primary border-inner mb-4" style="width: 90px; height: 90px;">
                    <i class="fa fa-heartbeat fa-2x text-white"></i>
                </div>
                <h4 class="text-uppercase">100% Healthy</h4>
                <p class="mb-0">Each recipe is different and you can adapt it to your own desire</p>
            </div>
            <div class="col-sm-6">
                <div class="d-flex align-items-center justify-content-center bg-primary border-inner mb-4" style="width: 90px; height: 90px;">
                    <i class="fa fa-award fa-2x text-white"></i>
                </div>
                <h4 class="text-uppercase">Worth the cooking hassle!</h4>
                <p class="mb-0">If you are just learning to cook, this is where you will have a good starting chance!</p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-offer my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title position-relative text-center mx-auto mb-4 pb-3" style="max-width: 600px;">
                    <h2 class="text-primary font-secondary">Make it easy!</h2>
                    <h1 class="display-4 text-uppercase text-white">Recipes from all around the world!</h1>
                </div>
                <p class="text-white mb-4">Easy to find!<br> Easy to make!<br>Enjoy the full experience!<br> </p>
                <a href="recipes.php" class="btn btn-dark border-inner py-3 px-5">Find what you'll cook next!</a>
            </div>
        </div>
    </div>
</div>

</body>

</html>

	
			
		