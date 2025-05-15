<?php
// submit_review.php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['reviewerName'];
    $text = $_POST['reviewText'];
    $rating = $_POST['rating'];
    $date = date('Y-m-d H:i:s');
    
    try {
        $stmt = $pdo->prepare("INSERT INTO reviews (name, text, rating, date) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $text, $rating, $date]);
        
        header("Location: farmerProfile.php?review_success=1");
        exit;
    } catch (PDOException $e) {
        die("Error submitting review: " . $e->getMessage());
    }
} else {
    header("Location: farmerProfile.php");
    exit;
}
?>