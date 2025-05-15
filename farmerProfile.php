<?php
// Sample farmer data
$farmers = [
    (object)[
        'name' => 'John Doe',
        'farmName' => 'Green Valley',
        'location' => 'Salalah',
        'products' => 'Organic Vegetables',
        'method' => 'Eco-friendly'
    ],
    (object)[
        'name' => 'Alice Smith',
        'farmName' => 'Sunny Acres',
        'location' => 'Sur',
        'products' => 'Free-range Eggs',
        'method' => 'Pasture-raised'
    ]
];

// Sample review data
$reviews = [
    (object)[
        'name' => 'Zainab Salim',
        'text' => 'Amazing produce, always fresh and delivered on time!',
        'rating' => 'Excellent'
    ],
    (object)[
        'name' => 'Ali Abdullah',
        'text' => "The eggs from Sunny Acres are the best I've ever had!",
        'rating' => 'Good'
    ]
];
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
                    <li class="nav-item"><a class="nav-link active fs-6 px-3" href="farmerProfile.php">Farmer Profiles</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="blog.html">Blog</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="dashboard.html">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="questionnaire.html">Questionnaire</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="calculate.html">Calculate</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="funpage.html">Funpage</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="contact.html">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link fs-6 px-3" href="insert.php">Insert</a></li>

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
    <h1 class="text-success mb-4">Farmer Profile Management</h1>

    <!-- Add Farmer Form -->
    <div class="bg-light p-4 rounded mb-5">
        <h2>Add Farmer Profile</h2>
        <form method="post" action="farmer_process.php">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="name" class="form-label">Farmer Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="farmName" class="form-label">Farm Name:</label>
                    <input type="text" name="farmName" id="farmName" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="location" class="form-label">Location:</label>
                    <input type="text" name="location" id="location" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="products" class="form-label">Products:</label>
                    <input type="text" name="products" id="products" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="method" class="form-label">Farming Method:</label>
                    <input type="text" name="method" id="method" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Add Farmer</button>
        </form>
    </div>

    <!-- Search Farmer Form -->
    <div class="bg-light p-4 rounded mb-5">
        <h2>Search Farmer</h2>
        <form method="get" action="farmer_search.php">
            <div class="mb-3">
                <label for="searchName" class="form-label">Farmer Name:</label>
                <input type="text" name="name" id="searchName" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <!-- Add Review Form -->
    <div class="bg-light p-4 rounded mb-5">
        <h2>Customer Review</h2>
        <form method="post" action="process_review.php">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="reviewName" class="form-label">Customer Name:</label>
                    <input type="text" name="name" id="reviewName" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="rating" class="form-label">Rating:</label>
                    <select name="rating" id="rating" class="form-select" required>
                        <option value="">-- Select --</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Average">Average</option>
                        <option value="Poor">Poor</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="review" class="form-label">Review:</label>
                    <textarea name="review" id="review" class="form-control" rows="3" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Submit Review</button>
        </form>
    </div>

    <!-- Display Farmer Profiles -->
    <h2 class="text-success mb-3">Farmer Profiles</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
        <?php foreach ($farmers as $farmer): ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="farmer.jpg" alt="<?= htmlspecialchars($farmer->name) ?>" class="card-img-top img-fluid" style="height:250px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title text-success"><?= htmlspecialchars($farmer->name) ?></h5>
                        <p class="card-text"><strong>Farm:</strong> <?= htmlspecialchars($farmer->farmName) ?></p>
                        <p class="card-text"><strong>Location:</strong> <?= htmlspecialchars($farmer->location) ?></p>
                        <p class="card-text"><strong>Products:</strong> <?= htmlspecialchars($farmer->products) ?></p>
                        <p class="card-text"><strong>Method:</strong> <?= htmlspecialchars($farmer->method) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Display Customer Reviews -->
    <h2 class="text-warning mb-3">Customer Reviews</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4 mb-5">
        <?php foreach ($reviews as $review): ?>
            <div class="col">
                <div class="card border-warning h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($review->name) ?></h5>
                        <p class="card-text">"<?= htmlspecialchars($review->text) ?>"</p>
                        <p class="card-text"><small class="text-muted">Rating: <?= htmlspecialchars($review->rating) ?></small></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
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