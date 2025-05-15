<?php
// farmerProfile.php
require_once 'db_connect.php';
require_once 'FarmerProfile.php';

// Function to fetch all farmer profiles
function getAllFarmerProfiles($pdo) {
    $stmt = $pdo->query("SELECT * FROM profiles");
    $profiles = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $profiles[] = new FarmerProfile(
            $row['farmerName'],
            $row['farmName'],
            $row['Location'],
            $row['Products'],
            $row['Method']
        );
    }
    return $profiles;
}

// Function to search farmer profiles
function searchFarmerProfiles($pdo, $term) {
    $stmt = $pdo->prepare("SELECT * FROM profiles 
                          WHERE farmerName LIKE :term 
                          OR farmName LIKE :term 
                          OR Location LIKE :term 
                          OR Products LIKE :term 
                          OR Method LIKE :term");
    $stmt->execute([':term' => "%$term%"]);
    $profiles = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $profiles[] = new FarmerProfile(
            $row['farmerName'],
            $row['farmName'],
            $row['Location'],
            $row['Products'],
            $row['Method']
        );
    }
    return $profiles;
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'add') {
            // Add new farmer profile
            $stmt = $pdo->prepare("INSERT INTO profiles (farmerName, farmName, Location, Products, Method) 
                                 VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([
                $_POST['farmerName'],
                $_POST['farmName'],
                $_POST['location'],
                $_POST['products'],
                $_POST['method']
            ]);
            header("Location: farmerProfile.php?success=1");
            exit;
        } elseif ($_POST['action'] === 'search') {
            $searchTerm = $_POST['searchTerm'];
            $profiles = searchFarmerProfiles($pdo, $searchTerm);
        }
    }
} else {
    // Get all profiles by default
    $profiles = getAllFarmerProfiles($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Farmer Profiles</title>
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
            <h2 class="display-3 text-center text-success fw-bold">Farmer Profiles</h2>
        </div>
    </section>
    
    <br/>
    <br/>
   
    <h1 class="text-center mb-3 text-warning fs-4">Farmer Profile Information System</h1>

    <div class="container mt-3">
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">Farmer profile added successfully!</div>
        <?php endif; ?>
        
        <!-- Form Section -->
        <div class="bg-white p-3 rounded shadow-sm mb-3">
            <h2 class="mb-3 fs-5">Manage Farmers Profile</h2>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body p-2">
                            <h4 class="card-title text-success fs-5 mb-2">Add New Profile</h4>
                            <form method="post" action="farmerProfile.php">
                                <input type="hidden" name="action" value="add">
                                <div class="mb-2">
                                    <label for="farmerName" class="form-label mb-0 fs-6">Name</label>
                                    <input type="text" class="form-control form-control-sm" id="farmerName" name="farmerName" required>
                                </div>
                                <div class="mb-2">
                                    <label for="farmName" class="form-label mb-0 fs-6">Farm Name</label>
                                    <input type="text" class="form-control form-control-sm" id="farmName" name="farmName" required>
                                </div>
                                <div class="mb-2">
                                    <label for="location" class="form-label mb-0 fs-6">Location</label>
                                    <input type="text" class="form-control form-control-sm" id="location" name="location" required>
                                </div>
                                <div class="mb-2">
                                    <label for="products" class="form-label mb-0 fs-6">Products</label>
                                    <input type="text" class="form-control form-control-sm" id="products" name="products" required>
                                </div>
                                <div class="mb-2">
                                    <label for="method" class="form-label mb-0 fs-6">Method</label>
                                    <input type="text" class="form-control form-control-sm" id="method" name="method" required>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm mt-1">Add Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body p-2">
                            <h4 class="card-title text-success fs-5 mb-2">Search Farmers Profiles</h4>
                            <form method="post" action="farmerProfile.php">
                                <input type="hidden" name="action" value="search">
                                <div class="mb-2">
                                    <label for="searchTerm" class="form-label mb-0 fs-6">Search Term</label>
                                    <input type="text" class="form-control form-control-sm" id="searchTerm" name="searchTerm" placeholder="Name, Farm, Location, etc.">
                                </div>
                                <button type="submit" class="btn btn-warning btn-sm text-white">Search</button>
                                <a href="farmerProfile.php" class="btn btn-secondary btn-sm">Reset</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Farmers Cards Display -->
        <h2 class="mt-4 mb-2 fs-5">Farmers Profiles</h2>
        <div id="farmersContainer" class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-2">
            <?php foreach ($profiles as $profile): ?>
                <?php echo $profile->displayAsCard(); ?>
            <?php endforeach; ?>
        </div>
        
        <!-- Farms Table Display -->
        <h2 class="mt-4 mb-2 fs-5">Farms Information</h2>
        <div class="table-responsive">
            <table id="farmsTable" class="table table-striped table-bordered">
                <thead class="table-success">
                    <tr>
                        <th>Farm Name</th>
                        <th>Location</th>
                        <th>Products</th>
                        <th>Method</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($profiles as $profile): ?>
                        <tr>
                            <td><?php echo $profile->getFarmName(); ?></td>
                            <td><?php echo $profile->getLocation(); ?></td>
                            <td><?php echo $profile->getProducts(); ?></td>
                            <td><?php echo $profile->getMethod(); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Customer Reviews Section -->
    <div class="container mt-5 bg-secondary bg-opacity-25">
        <h2 class="text-center mb-4 text-success">Customer Reviews</h2>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="submit_review.php" class="mb-4">
                    <div class="mb-3">
                        <textarea class="form-control" id="reviewText" name="reviewText" rows="3" placeholder="Leave a review..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="reviewerName" name="reviewerName" placeholder="Your name" required>
                    </div>
                    <div class="mb-3">
                        <label>Rate your experience:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="excellent" value="Excellent" checked>
                            <label class="form-check-label" for="excellent">Excellent</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="good" value="Good">
                            <label class="form-check-label" for="good">Good</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="average" value="Average">
                            <label class="form-check-label" for="average">Average</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="poor" value="Poor">
                            <label class="form-check-label" for="poor">Poor</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit review</button>
                </form>

                <?php
                // Display reviews from database
                $stmt = $pdo->query("SELECT * FROM reviews ORDER BY date DESC");
                $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                
                <div class="mb-4">
                    <h4 class="text-success">All Reviews</h4>
                    <table id="reviewsTable" class="table table-striped table-bordered">
                        <thead class="table-warning">
                            <tr>
                                <th>Name</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reviews as $review): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($review['name']); ?></td>
                                    <td><?php echo htmlspecialchars($review['text']); ?></td>
                                    <td><?php echo htmlspecialchars($review['rating']); ?></td>
                                    <td><?php echo htmlspecialchars($review['date']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mb-4">
                    <h4 class="text-success">Search Reviews</h4>
                    <form method="get" action="farmerProfile.php#searchResults">
                        <div class="input-group mb-3">
                            <input type="text" id="searchInput" name="searchReview" class="form-control" placeholder="Search reviews...">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                    </form>
                    
                    <?php if (isset($_GET['searchReview'])): ?>
                        <div id="searchResults">
                            <?php
                            $searchTerm = '%' . $_GET['searchReview'] . '%';
                            $stmt = $pdo->prepare("SELECT * FROM reviews 
                                                  WHERE name LIKE :term 
                                                  OR text LIKE :term 
                                                  OR rating LIKE :term
                                                  ORDER BY date DESC");
                            $stmt->execute([':term' => $searchTerm]);
                            $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            
                            <table id="searchResultsTable" class="table table-striped table-bordered">
                                <thead class="table-warning">
                                    <tr>
                                        <th>Name</th>
                                        <th>Review</th>
                                        <th>Rating</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($searchResults as $result): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($result['name']); ?></td>
                                            <td><?php echo htmlspecialchars($result['text']); ?></td>
                                            <td><?php echo htmlspecialchars($result['rating']); ?></td>
                                            <td><?php echo htmlspecialchars($result['date']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <br/>

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