<?php
// newsletter.php - Simple email display (no database)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    
    // Basic validation
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Newsletter Received</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container py-5">
            <div class="card shadow text-center mx-auto" style="max-width: 500px;">
                <div class="card-header bg-success text-white">
                    <h2>Thank You!</h2>
                </div>
                <div class="card-body py-4">
                    <p class="lead">We received your email:</p>
                    <div class="alert alert-info">
                        <?= htmlspecialchars($email) ?>
                    </div>
                    <p>You will receive the newest event at your email.</p>
                    <a href="products.html" class="btn btn-success">Back to Products</a>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
} else {
    // Redirect if accessed directly
    header("Location: products.html");
    exit();
}
?>