<?php
// Review class
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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['reviewerName'] ?? '';
    $text = $_POST['reviewText'] ?? '';
    $rating = $_POST['rating'] ?? '';
    
    // Create new review
    $newReview = new Review($name, $text, $rating);
    
    // Sample data (in a real app, this would come from a database)
    $reviews = [
        new Review("Zainab Salim", "Amazing produce, always fresh and delivered on time!", "Excellent"),
        new Review("Ali Abdullah", "The eggs from Sunny Acres are the best I've ever had!", "Good"),
        new Review("Kothar Ahmed", "Great experience! Will definitely buy again.", "Excellent"),
        $newReview
    ];
    
    // Display results
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
        echo '<td>'.htmlspecialchars($review->name).'</td>';
        echo '<td>'.htmlspecialchars($review->text).'</td>';
        echo '<td>'.htmlspecialchars($review->rating).'</td>';
        echo '<td>'.htmlspecialchars($review->date).'</td>';
        echo '</tr>';
    }
    
    echo '</tbody></table>
            <a href="farmerProfile.html" class="btn btn-primary">Back to Farmer Profiles</a>
        </div>
    </body>
    </html>';
} else {
    header("Location: farmerProfile.html");
    exit();
}
?>