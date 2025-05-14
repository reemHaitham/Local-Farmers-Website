<!DOCTYPE html>
<html lang="en">
<head>
    <title>Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body class="bg-light pb-5">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-secondary py-3">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <img src="logo.png" alt="Logo" class="me-3 img-fluid" width="50">
                <span class="navbar-brand mb-0 h1 fs-4">Local Farmer</span>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="aboutUs.html">About Us</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="registration.html">Registration</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="products.html">Products</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="farmerProfile.html">Farmer Profiles</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="blog.html">Blog</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="dashboard.html">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="questionnaire.html">Questionnaire</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="calculate.html">Calculate</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="funpage.html">Funpage</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="contact.html">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 active px-3" href="insert.html">Insert</a></li>

                </ul>
            </div>
        </div>
    </nav>
  
    <section class="d-flex align-items-center" style="background: url('BGall.png') center/cover no-repeat; height: 400px;">
        <div class="container">
            <h2 class="display-3 text-center text-success fw-bold ">Insert</h2>
        </div>
    </section>
    
    <br/>
    <br/>

    <div class="container">
        <h2 class="text-center text-dark mt-4 mb-4">Suggest product to add to the farms!</h2>

        <div class="card card-default col-md-6 col-md-offset-3">
            <div class="card-body bg-white p-4">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="brand" class="control-label">Brand:</label>
                        <input type="text" class="form-control" name="brand" required>
                    </div>
                    <div class="form-group">
                        <label for="type" class="control-label">Type:</label>
                        <input type="text" class="form-control" name="type" required placeholder="Monocrystalline/ Polycrystalline/ Thin-film">
                    </div>
                    <div class="form-group">
                        <label for="wattage" class="control-label">Wattage:</label>
                        <input type="text" class="form-control" name="wattage" required>
                    </div>
                    <button type="submit" class="btn btn-warning btn-block">Insert</button>
                </form>
            </div>
        </div>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_type'], $_POST['product_name'], $_POST['product_describe'],  $_POST['product_price'])) {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "localFarmers";

        // Retrieve form data
        $type = htmlspecialchars($_POST['product_type']);
        $name = htmlspecialchars($_POST['product_name']);
        $describe = htmlspecialchars($_POST['product_describe']);
        $price = htmlspecialchars($_POST['product_price']);

        // Enable error reporting
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die('<div class="alert alert-danger">Connection failed . htmlspecialchars($conn->connect_error) . "</div>');
        }

        try {
            // Check if record already exists
            $stmt = $conn->prepare("SELECT * FROM products WHERE product_name = ?");
            $stmt->bind_param("s", $name);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<p style='color:red;'>This product already exists!</p>";
            } else {
                // Insert new record
                $stmt = $conn->prepare("INSERT INTO products (product_type, product_name, product_describe, product_price) VALUES (?, ?, ?)");
                $stmt->bind_param("sssd", $type, $name, $describe, $price);
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success text-center'>Record inserted successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger text-center'>Error: " . htmlspecialchars($stmt->error) . "</div>";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            echo "<div class='alert alert-danger text-center'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
        }

        $conn->close();
    }
    ?>

<br><br>
<br/><br/><br/>
<br/><br/><br/>        
        ?>
    
      </div>

    <br/>
    <br/>
    <br/>

        <!--footer-->
    <footer class="fixed-bottom bg-secondary py-2">
    <div class="text-center">
        <a href="https://github.com/reemHaitham/Local-Farmers-Website.git" >
        <img src="gitIcon.png" alt="github icon" class="me-2"  width="40" height="40">
        </a>
        <a href="mailto:localfarmerweb@gmail.com" >
        <img src="emailIcon.png" alt="github icon" class="me-2" width="40" height="40">
        </a>
    </div>
    </footer>
</body>
</html>