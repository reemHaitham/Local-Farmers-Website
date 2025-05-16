<?php
require_once 'db_connect.php';

// delete_product.php

// Check if product ID is provided
if (!isset($_GET['id'])) {
    header("Location: search_products.php?error=noid");
    exit();
}

$productId = intval($_GET['id']);

try {
    // Check if product exists
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        header("Location: search_products.php?error=notfound");
        exit();
    }

    // Delete the product
    $deleteStmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $deleteStmt->execute([$productId]);

    // Redirect back to search with success message
    header("Location: search_products.php?success=deleted");
    exit();

} catch (PDOException $e) {
    // Log the error (in a real application, you'd log to a file)
    error_log("Database error: " . $e->getMessage());
    
    // Redirect with error message
    header("Location: search_products.php?error=dberror");
    exit();
}
