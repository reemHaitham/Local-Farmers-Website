<?php
require_once 'db_connect.php';

// Fetch farmers from database
$stmt = $pdo->query("SELECT * FROM profiles");
$farmers = $stmt->fetchAll();

// Fetch reviews from database
$stmt = $pdo->query("SELECT * FROM reviews");
$reviews = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Farmer Profiles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
                    <li class="nav-item"><a class="nav-link fs-6  px-3" href="insert.php">Insert</a></li>
                    <li class="nav-item"><a class="nav-link fs-6  px-3" href="delete_product.php">Delete</a></li>
                    <li class="nav-item"><a class="nav-link fs-6  px-3" href="search_products.php">Search</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 active px-3" href="farmerProfile.php">Farmer Profiles</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="blog.html">Blog</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="dashboard.html">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="questionnaire.html">Questionnaire</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="calculate.php">Calculate</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="funpage.html">Funpage</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="contact.php">Contact Us</a></li>

                </ul>
            </div>
        </div>
    </nav>
  
    <section class="d-flex align-items-center" style="background: url('BGall.png') center/cover no-repeat; height: 400px;">
        <div class="container">
            <h2 class="display-3 text-center text-success fw-bold ">Farmer Profiles</h2>
        </div>
    </section>
    
    <br/>
    <br/>
   
    <br/>
    <br/>
    <h1 class="text-center mb-3 text-warning fs-4">Farmer Profile Information System</h1>

   <!-- Add Farmer Form -->
<div class="container mt-3">
    <div class="bg-white p-3 rounded shadow-sm mb-3">
        <h2 class="mb-3 fs-5">Manage Farmers Profile</h2>
        <div class="card">
            <div class="card-body p-2">
                <h4 class="card-title text-success fs-5 mb-2">Add New Profile</h4>
                <form method="post" action="farmer_process.php">
                    <div class="mb-2">
                        <label for="name" class="form-label mb-0 fs-6">Farmer Name:</label>
                        <input type="text" name="farmerName" id="name" class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-2">
                        <label for="farmName" class="form-label mb-0 fs-6">Farm Name:</label>
                        <input type="text" name="farmName" id="farmName" class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-2">
                        <label for="location" class="form-label mb-0 fs-6">Location:</label>
                        <input type="text" name="Location" id="location" class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-2">
                        <label for="products" class="form-label mb-0 fs-6">Products:</label>
                        <input type="text" name="Products" id="products" class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-2">
                        <label for="method" class="form-label mb-0 fs-6">Farming Method:</label>
                        <input type="text" name="Method" id="method" class="form-control form-control-sm" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm mt-1">Add Profile</button>
                    <a href="farmerProfile.php" class="btn btn-secondary btn-sm mt-1">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Display Farmer Profiles -->
<div class="container mt-3">
    <div class="bg-white p-3 rounded shadow-sm mb-3">
        <h2 class="mb-3 fs-5">Farmers Profiles</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2">
            <?php foreach ($farmers as $farmer): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="farmer.jpg" alt="<?= htmlspecialchars($farmer->name) ?>" class="card-img-top img-fluid" style="height:200px; object-fit:cover;">
                        <div class="card-body p-2">
                            <h5 class="card-title text-success fs-6 mb-1"><?= htmlspecialchars($farmer->farmerName) ?></h5>
                            
                            <p class="card-text mb-1"><small class="text-muted">Farm:</small> <?= htmlspecialchars($farmer->farmName) ?></p>
                            <p class="card-text mb-1"><small class="text-muted">Location:</small> <?= htmlspecialchars($farmer->Location) ?></p>
                            <p class="card-text mb-1"><small class="text-muted">Products:</small> <?= htmlspecialchars($farmer->Products) ?></p>
                            <p class="card-text mb-1"><small class="text-muted">Method:</small> <?= htmlspecialchars($farmer->Method) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Farms Table Display -->
<div class="container mt-3">
    <div class="bg-white p-3 rounded shadow-sm mb-3">
        <h2 class="mb-3 fs-5">Farms Information</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-success">
                    <tr>
                        <th>Farm Name</th>
                        <th>Location</th>
                        <th>Products</th>
                        <th>Method</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($farmers as $farmer): ?>
                        <tr>
                            <td><?= htmlspecialchars($farmer->farmName) ?></td>
                            <td><?= htmlspecialchars($farmer->Location) ?></td>
                            <td><?= htmlspecialchars($farmer->Products) ?></td>
                            <td><?= htmlspecialchars($farmer->Method) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Review Form -->
<div class="container mt-3">
    <div class="bg-white p-3 rounded shadow-sm mb-3">
        <div class="card">
            <div class="card-body p-2">
                <h4 class="card-title text-success fs-5 mb-2">Customer Review</h4>
                <form method="post" action="process_review.php">
                    <div class="mb-2">
                        <label for="reviewName" class="form-label mb-0 fs-6">Customer Name:</label>
                        <input type="text" name="reviewer_name" id="reviewName" class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label mb-0 fs-6">Rate your experience:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reviewer_rate" id="excellent" value="Excellent" checked>
                            <label class="form-check-label" for="excellent">Excellent</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reviewer_rate" id="good" value="Good">
                            <label class="form-check-label" for="good">Good</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reviewer_rate" id="average" value="Average">
                            <label class="form-check-label" for="average">Average</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reviewer_rate" id="poor" value="Poor">
                            <label class="form-check-label" for="poor">Poor</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="review" class="form-label mb-0 fs-6">Review:</label>
                        <textarea name="reviewer_text" id="review" class="form-control form-control-sm" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm mt-1">Submit Review</button>
                    <a href="farmerProfile.php" class="btn btn-secondary btn-sm mt-1">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

   <!-- Display Customer Reviews -->
<div class="container mt-3 bg-secondary bg-opacity-25 p-3 rounded mb-5">
    <h2 class="text-center mb-3 fs-5">Customer Reviews</h2>
    <div class="row justify-content-center g-2">
        <?php foreach ($reviews as $review): ?>
            <div class="col-md-6">
                <div class="card border-warning h-100">
                    <div class="card-body p-2">
                        <h5 class="card-title fs-6 mb-1"><?= htmlspecialchars($review->reviewer_name) ?></h5>
                        <p class="card-text mb-1">"<?= htmlspecialchars($review->reviewer_text) ?>"</p>
                        <p class="card-text mb-0">
                            <small class="text-muted">
                                Rating: 
                                <?php 
                                $rating = htmlspecialchars($review->reviewer_rate);
                                $icon = '';
                                if ($rating === 'Excellent') $icon = 'bi bi-star-fill text-warning';
                                elseif ($rating === 'Good') $icon = 'bi bi-star-half text-warning';
                                elseif ($rating === 'Average') $icon = 'bi bi-star text-warning';
                                else $icon = 'bi bi-star text-secondary';
                                ?>
                                <i class="<?= $icon ?>"></i> <?= $rating ?>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
    <!--footer-->
        <footer class="fixed-bottom bg-secondary py-2">
            <div class="text-center">
                <a href="https://github.com/reemHaitham/Local-Farmers-Website.git">
                    <img src="gitIcon.png" alt="github icon" class="me-2" width="40" height="40">
                </a>
                <a href="mailto:localfarmerweb@gmail.com">
                    <img src="emailIcon.png" alt="github icon" class="me-2" width="40" height="40">
                </a>
            </div>
        </footer>
</body>
</html>
