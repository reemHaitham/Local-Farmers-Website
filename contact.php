<?php
// contact.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Contact Form Submission</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h1 class="card-title text-center mb-0">Thank You for Contacting Us</h1>
                        </div>
                        <div class="card-body">
                            <h3 class="mb-3">Your Message Details</h3>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name:</th>
                                    <td><?= $name ?></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><?= $email ?></td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td><?= $phone ?: 'Not provided' ?></td>
                                </tr>
                                <tr>
                                    <th>Subject:</th>
                                    <td><?= ucfirst($subject) ?></td>
                                </tr>
                                <tr>
                                    <th>Message:</th>
                                    <td><?= $message ?></td>
                                </tr>
                            </table>
                            <div class="mt-4">
                                <a href="contact.html" class="btn btn-success">Back to Contact Page</a>
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
    // Redirect if accessed directly
    header("Location: contact.html");
    exit();
}
?>