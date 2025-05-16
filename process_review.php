<?php
require_once 'db_connect.php';

class Review {
    public $name;
    public $text;
    public $rating;
    public $date;
    
    public function __construct($name, $text, $rating) {
        $this->name = $name;
        $this->text = $text;
        $this->rating = $rating;
        $this->date = date('Y-m-d H:i:s');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['reviewer_name'] ?? '';
    $text = $_POST['reviewer_text'] ?? '';
    $rating = $_POST['reviewer_rate'] ?? '';
    
    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO reviews (reviewer_name, reviewer_text, reviewer_rate, DATE) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $text, $rating, date('Y-m-d')]);
    
    // Fetch all reviews including the new one
    $stmt = $pdo->query("SELECT * FROM reviews");
    $reviews = $stmt->fetchAll();
    
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Review Submitted</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="alert alert-success">
                <h2>Thank you for your review!</h2>
                <p>Your feedback is important to us.</p>
            </div>
            
            <h3>All Reviews</h3>
            <table class="table table-striped table-bordered">
                <thead class="table-warning">
                    <tr><th>Name</th><th>Review</th><th>Rating</th><th>Date</th></tr>
                </thead>
                <tbody>';
    
    foreach ($reviews as $review) {
        echo '<tr>';
        echo '<td>'.htmlspecialchars($review->reviewer_name).'</td>';
        echo '<td>'.htmlspecialchars($review->reviewer_text).'</td>';
        echo '<td>'.htmlspecialchars($review->reviewer_rate).'</td>';
        echo '<td>'.htmlspecialchars($review->DATE).'</td>';
        echo '</tr>';
    }
    
    echo '</tbody></table>
            <a href="farmerProfile.php" class="btn btn-success">Back to Farmer Profiles</a>
        </div>
    </body>
    </html>';
} else {
    header("Location: farmerProfile.php");
    exit();
}
?>
