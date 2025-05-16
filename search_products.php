<?php
require_once 'db_connect.php';
// Display success/error messages
$success = $_GET['success'] ?? '';
$error = $_GET['error'] ?? '';

if ($success === 'deleted') {
    echo '<div class="alert alert-success">Product deleted successfully.</div>';
}

if ($error === 'notfound') {
    echo '<div class="alert alert-danger">Product not found.</div>';
} elseif ($error === 'dberror') {
    echo '<div class="alert alert-danger">Database error occurred.</div>';
} elseif ($error === 'noid') {
    echo '<div class="alert alert-danger">No product ID specified.</div>';
}
// search_products.php
// db_connect.php
$host = 'localhost';
$user = 'root'; // default XAMPP username
$pass = '';     // default XAMPP password
$dbname = 'localfarmer';

try {
    // First try to connect directly to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If database doesn't exist, try to create it
    try {
        $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Create database if it doesn't exist
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");
        
        // Now connect to the newly created database
        $pdo->exec("USE `$dbname`");
        
        // Create products table if it doesn't exist
        $pdo->exec("CREATE TABLE IF NOT EXISTS `products` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `name` VARCHAR(255) NOT NULL,
            `category` VARCHAR(100) NOT NULL,
            `price` DECIMAL(10,2) NOT NULL,
            `description` TEXT,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
        
    } catch (PDOException $e) {
        die("Could not connect to database: " . $e->getMessage());
    }
}
    // Initialize variables
$searchTerm = '';
$category = '';
$minPrice = '';
$maxPrice = '';
$results = [];
$error = '';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
    try {
        // Get search parameters
        $searchTerm = htmlspecialchars($_GET['searchTerm'] ?? '');
        $category = htmlspecialchars($_GET['category'] ?? '');
        $minPrice = floatval($_GET['minPrice'] ?? '');
        $maxPrice = floatval($_GET['maxPrice'] ?? '');

        // Build SQL query
        $sql = "SELECT * FROM products WHERE 1=1";
        $params = [];

        if (!empty($searchTerm)) {
            $sql .= " AND name LIKE :searchTerm";
            $params[':searchTerm'] = "%$searchTerm%";
        }

        if (!empty($category)) {
            $sql .= " AND category = :category";
            $params[':category'] = $category;
        }

        if (!empty($minPrice)) {
            $sql .= " AND price >= :minPrice";
            $params[':minPrice'] = $minPrice;
        }

        if (!empty($maxPrice)) {
            $sql .= " AND price <= :maxPrice";
            $params[':maxPrice'] = $maxPrice;
        }

        // Prepare and execute query
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}

try {
    // Get distinct categories for dropdown
    $categoryStmt = $pdo->query("SELECT DISTINCT category FROM products");
    $categories = $categoryStmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    $error = "Could not load categories: " . $e->getMessage();
    $categories = [];
}

    // Check if form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
        // Get search parameters
        $searchTerm = htmlspecialchars($_GET['searchTerm'] ?? '');
        $category = htmlspecialchars($_GET['category'] ?? '');
        $minPrice = floatval($_GET['minPrice'] ?? '');
        $maxPrice = floatval($_GET['maxPrice'] ?? '');

        // Build SQL query
        $sql = "SELECT * FROM products WHERE 1=1";
        $params = [];

        if (!empty($searchTerm)) {
            $sql .= " AND name LIKE :searchTerm";
            $params[':searchTerm'] = "%$searchTerm%";
        }

        if (!empty($category)) {
            $sql .= " AND category = :category";
            $params[':category'] = $category;
        }

        if (!empty($minPrice)) {
            $sql .= " AND price >= :minPrice";
            $params[':minPrice'] = $minPrice;
        }

        if (!empty($maxPrice)) {
            $sql .= " AND price <= :maxPrice";
            $params[':maxPrice'] = $maxPrice;
        }

        // Prepare and execute query
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get distinct categories for dropdown
    $categoryStmt = $pdo->query("SELECT DISTINCT category FROM products");
    $categories = $categoryStmt->fetchAll(PDO::FETCH_COLUMN);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h1 class="card-title text-center mb-0">Search Products</h1>
                    </div>
                    <div class="card-body">
                        <!-- Search Form -->
                        <form method="GET" class="mb-4">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="searchTerm" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="searchTerm" name="searchTerm" 
                                           value="<?= $searchTerm ?>" placeholder="Search by name...">
                                </div>
                                <div class="col-md-6">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" id="category" name="category">
                                        <option value="">All Categories</option>
                                        <?php foreach ($categories as $cat): ?>
                                            <option value="<?= $cat ?>" <?= $category === $cat ? 'selected' : '' ?>>
                                                <?= $cat ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="minPrice" class="form-label">Minimum Price</label>
                                    <input type="number" class="form-control" id="minPrice" name="minPrice" 
                                           value="<?= $minPrice ?>" placeholder="0.00" step="0.01" min="0">
                                </div>
                                <div class="col-md-6">
                                    <label for="maxPrice" class="form-label">Maximum Price</label>
                                    <input type="number" class="form-control" id="maxPrice" name="maxPrice" 
                                           value="<?= $maxPrice ?>" placeholder="1000.00" step="0.01" min="0">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">Search</button>
                                    <a href="search_products.php" class="btn btn-outline-secondary">Reset</a>
                                </div>
                            </div>
                        </form>

                        <!-- Search Results -->
                        <?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)): ?>
                            <h3 class="mb-3">Search Results</h3>
                            
                            <?php if (empty($results)): ?>
                                <div class="alert alert-info">No products found matching your criteria.</div>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($results as $product): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($product['id']) ?></td>
                                                    <td><?= htmlspecialchars($product['name']) ?></td>
                                                    <td><?= htmlspecialchars($product['category']) ?></td>
                                                    <td><?= number_format($product['price'], 2) ?> Rials</td>
                                                    <td><?= htmlspecialchars($product['description']) ?></td>
                                                    <td>
                                                        <a href="delete_product.php?id=<?= $product['id'] ?>" 
                                                           class="btn btn-sm btn-danger" 
                                                           onclick="return confirm('Are you sure you want to delete this product?')">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer text-center">
                        <a href="products.html" class="btn btn-outline-success">Back to Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
