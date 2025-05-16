<?php
require_once 'db_connect.php';

// delete_product.php

// Check if product ID is provided
if (!isset($_GET['id'])) {
    header("Location: search_products.php");
    exit();
}

$productId = intval($_GET['id']);


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
