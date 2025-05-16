<?php
// db_products.php

// Database configuration
$host = 'localhost';
$dbname = 'localfarmer';
$username = 'root';
$password = '';

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Query to get products
    $stmt = $pdo->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Display products
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Products from Database</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container py-5">
            <h1 class="text-center text-success mb-5">Products from Database</h1>
            
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h2 class="card-title">Product Catalog</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= htmlspecialchars($product['id']) ?></td>
                                <td><?= htmlspecialchars($product['name']) ?></td>
                                <td><?= htmlspecialchars($product['category']) ?></td>
                                <td><?= number_format($product['price'], 2) ?> Rials</td>
                                <td><?= htmlspecialchars($product['description']) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="mt-4 text-center">
                <a href="products.html" class="btn btn-success">Back to Products Page</a>
            </div>
        </div>
    </body>
    </html>
    <?php
    
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>