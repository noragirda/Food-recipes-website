
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
                <a href="foods.php" class="navbar-brand">
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

    <a href="foods.php" class="navbar-brand d-block d-lg-none">
        <div class="logo-container">
            <img src="img/logonume1.jpg" alt="Your Logo" class="logo-img">
            <!--<h1 class="m-0 text-uppercase text-red text-calligraphic">oxar</h1>-->
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
<div class="container-fluid bg-dark bg-img p-5 mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-uppercase text-white">Foods</h1>
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

<div class="search-container">
    <input type="text" id="searchInput" placeholder="Search for a food item...">
    <ul id="searchResults" style="display: none;"></ul>
</div>

<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#searchInput').on('input', function () {
            var searchText = $(this).val();

            if (searchText.length > 0) {
                $.ajax({
                    url: 'searchfood.php',
                    type: 'POST',
                    data: { search: searchText },
                    success: function (data) {
                        $('#searchResults').html(data);
                        $('#searchResults').show();
                    }
                });
            } else {
                $('#searchResults').hide();
            }
        });

        $(document).on('click', function (e) {
            if (!$(e.target).closest('#searchInput').length) {
                $('#searchResults').hide();
            }
        });

        $('#searchResults').on('click', 'li', function () {
            var selectedText = $(this).text();
            $('#searchInput').val(selectedText);
            $('#searchResults').hide();
        });
    });
</script>

<div id="foodsContainer">
    <?php
    include "display_all_fruits.php";
    ?>
</div>

<!--<script>
    fetch('get_all_foods_from_database.php')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('foodsContainer');
            data.forEach(food => {
                const div = document.createElement('div');
                div.innerHTML = `<h2>${food.FoodName}</h2>
                                     <img src="${food.Photo}" alt="${food.FoodName}" />`;
                container.appendChild(div);
            });
        })
        .catch(error => console.error('Error:', error));
</script>
<script>
    // Fetch data from the PHP script
    fetch('get_all_foods_from_database.php')
        .then(response => response.json()) // Parse the JSON response
        .then(data => {
            const container = document.getElementById('foodsContainer');
            // Loop through each food item and create HTML elements
            data.forEach(food => {
                const foodDiv = document.createElement('div');
                foodDiv.className = 'food-item'; // Optional: for CSS styling
                foodDiv.innerHTML = `
                    <h3>${food.FoodName}</h3>
                    <img src="${food.Photo}" alt="${food.FoodName}" style="width: 100px; height: auto;">`;
                container.appendChild(foodDiv);
            });
        })
        .catch(error => console.error('Error:', error));
</script>-->
<div class="container-fluid bg-offer my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title position-relative text-center mx-auto mb-4 pb-3" style="max-width: 600px;">
                    <h2 class="text-primary font-secondary">If the food item you were lokking for is not here </h2>
                    <h1 class="display-4 text-uppercase text-white">you can now add it yourself!</h1>
                </div>
                <p class="text-white mb-4">Easy to add with just one click!<br> <br><br> </p>
                <a href="addfruitpage.php" class="btn btn-dark border-inner py-3 px-5">Add food item here!</a>
            </div>
        </div>
    </div>
</div>

</body>

</html>




