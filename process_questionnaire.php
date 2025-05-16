<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input values
    $name = htmlspecialchars($_POST['fullName']);
    $email = htmlspecialchars($_POST['userEmail']);
    $location = htmlspecialchars($_POST['location']);
    $rating = htmlspecialchars($_POST['rating']);
    $delivery = htmlspecialchars($_POST['delivery']);
    $suggestion = htmlspecialchars($_POST['suggestions']);
    $recommend = htmlspecialchars($_POST['recommend']);

    // Handle checkboxes
    $products = [];
    if (isset($_POST['veg'])) $products[] = "Vegetables";
    if (isset($_POST['fruits'])) $products[] = "Fruits";
    if (isset($_POST['dairy'])) $products[] = "Dairy";
    if (isset($_POST['seeds'])) $products[] = "Seeds";
    $productsList = empty($products) ? 'None selected' : implode(", ", $products);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Questionnaire Submitted</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-success text-white text-center">
                            <h1 class="h3 mb-0">Thank You for Your Feedback 🌱</h1>
                        </div>
                        <div class="card-body">
                            <p class="lead mb-4 text-center">Here's a summary of your responses:</p>
                            <table class="table table-bordered table-striped">
                                <tr><th>Full Name</th><td><?= $name ?></td></tr>
                                <tr><th>Email</th><td><?= $email ?></td></tr>
                                <tr><th>Location</th><td><?= $location ?></td></tr>
                                <tr><th>Rating</th><td><?= $rating ?></td></tr>
                                <tr><th>Products Purchased</th><td><?= $productsList ?></td></tr>
                                <tr><th>Delivery Experience</th><td><?= $delivery ?></td></tr>
                                <tr><th>Suggestions</th><td><?= nl2br($suggestion) ?></td></tr>
                                <tr><th>Would Recommend Us?</th><td><?= $recommend ?></td></tr>
                            </table>
                            <div class="text-center mt-4">
                                <a href="questionnaire.html" class="btn btn-success px-4">Back to Questionnaire</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
} else {
    header("Location: questionnaire.html");
    exit();
}
?>
