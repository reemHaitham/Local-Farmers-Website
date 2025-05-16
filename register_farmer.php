<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['fullName']);
    $email = htmlspecialchars($_POST['userEmail']);
    $phone = htmlspecialchars($_POST['phoneNumber'] ?? '');
    $location = htmlspecialchars($_POST['location']);
    $farmType = htmlspecialchars($_POST['farmType']);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Registration Confirmation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-success text-white text-center">
                            <h1 class="h3 mb-0">Farmer Registration Successful 🌾</h1>
                        </div>
                        <div class="card-body">
                            <p class="lead mb-4 text-center">Here's a summary of your registration:</p>
                            <table class="table table-bordered table-striped">
                                <tr><th>Full Name</th><td><?= $name ?></td></tr>
                                <tr><th>Email</th><td><?= $email ?></td></tr>
                                <tr><th>Phone</th><td><?= $phone ?: 'Not provided' ?></td></tr>
                                <tr><th>Farm Location</th><td><?= $location ?></td></tr>
                                <tr><th>Type of Farm</th><td><?= $farmType ?></td></tr>
                            </table>
                            <div class="text-center mt-4">
                                <a href="registration.html" class="btn btn-success px-4">Back to Registration Page</a>
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
    header("Location: registration.html");
    exit();
}
?>
