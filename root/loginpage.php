

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
    <link href="css/login.css" rel="stylesheet">

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
                <a href="loginpage.php" class="navbar-brand">
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

    <a href="loginpage.php" class="navbar-brand d-block d-lg-none">
        <div class="logo-container">
            <img src="img/logonume1.jpg" alt="Your Logo" class="logo-img">
            <!--<h1 class="m-0 text-uppercase text-red text-calligraphic">oxar</h1>-->
        </div>
    </a>
</nav>

        <div class="container-fluid pt-5">
            <div class="container">
                <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                    <h2 class="text-primary font-secondary">Log into your account,<br> or if you don't have one, sign up and then log in!</h2>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Login Form -->
                        <form method="POST" action="login.php" class="login-form">
                            <h3 class="form-title">Log In</h3>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="submit-btn">Log In</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <!-- Sign-Up Form -->
                        <form method="POST" action="register.php" class="signup-form">
                            <h3 class="form-title">Sign Up</h3>
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="submit-btn">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



<script src="login.js"></script>
</body>

</html>





