<?php
require_once 'db_connect.php';
?>
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
                    <li class="nav-item"><a class="nav-link fs-6 active px-3" href="insert.php">Insert</a></li>

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

        <div class="card card-default col-md-6 offset-md-3">
            <div class="card-body bg-white p-4">
                <form method="post" action="">
                    <div class="form-group mb-3">
                        <label for="product_type" class="control-label">Product Type:</label>
                        <input type="text" class="form-control" name="product_type" id="product_type" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="product_name" class="control-label">Product Name:</label>
                        <input type="text" class="form-control" name="product_name" id="product_name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="product_describe" class="control-label">Description:</label>
                        <input type="text" class="form-control" name="product_describe" id="product_describe" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="product_price" class="control-label">Price:</label>
                        <input type="number" step="0.01" class="form-control" name="product_price" id="product_price" required>
                    </div>
                    <button type="submit" class="btn btn-warning btn-block w-100">Insert</button>
                </form>
            </div>
        </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $type = htmlspecialchars($_POST['product_type']);
    $name = htmlspecialchars($_POST['product_name']);
    $describe = htmlspecialchars($_POST['product_describe']);
    $price = htmlspecialchars($_POST['product_price']);

    try {
        // Check if product already exists
        $stmt = $pdo->prepare("SELECT * FROM products WHERE product_name = ?");
        $stmt->execute([$name]);
        if ($stmt->rowCount() > 0) {
            echo "<div class='alert alert-danger text-center'>This product already exists!</div>";
        } else {
            // Insert new product
            $stmt = $pdo->prepare("INSERT INTO products (product_type, product_name, product_describe, product_price) VALUES (?, ?, ?, ?)");
            $stmt->execute([$type, $name, $describe, $price]);
            echo "<div class='alert alert-success text-center'>Record inserted successfully!</div>";
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger text-center'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
}
    
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
