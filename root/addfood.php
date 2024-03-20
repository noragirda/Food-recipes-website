<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $foodName = $_POST["foodName"];

    // Check if the file is uploaded
    if (!isset($_FILES['foodImage']) || $_FILES['foodImage']['error'] != UPLOAD_ERR_OK) {
        echo "Error in file upload: " . $_FILES['foodImage']['error'];
        exit;
    }

    // Ensure the upload directory exists
    $uploadDir = "foodsimg/";
    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true)) {
        echo "Failed to create upload directory.";
        exit;
    }

    // Handle image upload with a unique file name
    $uploadFile = $uploadDir . uniqid() . '-' . basename($_FILES["foodImage"]["name"]);
    if (move_uploaded_file($_FILES["foodImage"]["tmp_name"], $uploadFile)) {
        $host="localhost";
        $username="your own username";
        $user_pass="here you need to enter the password";
        $database_in_use="the name of your database";

        // Create a database instance
        $mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
        if ($mysqli->connect_errno) {
            echo "Failed to connect to mySQL:(" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
        }

        // Prepare an insert statement for the Foods table
        $sql = "INSERT INTO Foods (Photo, FoodName) VALUES (?, ?)";
        $stmt = $mysqli->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('ss', $foodImage, $foodName);
            $foodImage = $uploadFile;
            $foodName = filter_var($foodName, FILTER_SANITIZE_STRING);

            if ($stmt->execute()) {
                // Get the inserted FoodID
                $foodID = $stmt->insert_id;

                // Prepare an insert statement for the NutritionalValuesPer100Grams table
                $sqlNutritional = "INSERT INTO NutritionalValuesPer100Grams (FoodID, Calories, Protein, Carbs, Fat, Fiber, Sugar) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmtNutritional = $mysqli->prepare($sqlNutritional);

                // Define the nutritional values per 100 grams
                $calories =(float)$_POST["calories"];
                $protein =(float)$_POST["protein"];
                $carbs =(float) $_POST["carbs"];
                $fat =(float) $_POST["fat"];
                $fiber = (float)$_POST["fiber"];
                $sugar =(float) $_POST["sugar"];

                if ($stmtNutritional) {
                    $stmtNutritional->bind_param('idddddd', $foodID, $calories, $protein, $carbs, $fat, $fiber, $sugar);

                    if ($stmtNutritional->execute()) {
                        echo "Food item and nutritional values added successfully!";
                        header("Location: foods.php"); // Redirect after successful insertion
                        exit;
                    } else {
                        echo "Error inserting nutritional values: " . $stmtNutritional->error;
                    }

                    $stmtNutritional->close();
                } else {
                    echo "Error preparing nutritional statement: " . $mysqli->error;
                }
            } else {
                echo "Error inserting food item: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement: " . $mysqli->error;
        }
    } else {
        echo "Failed to upload image.";
        exit;
    }

    $mysqli->close();
}
?>
