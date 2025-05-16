<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['fullName'] ?? '';
    $email = $_POST['userEmail'] ?? '';
    $phone = $_POST['phoneNumber'] ?? '';
    $location = $_POST['location'] ?? '';
    $farmType = $_POST['farmType'] ?? '';

    

    echo "
    <html>
    <head>
    <title>Registration Done</title>
    </head>
    <body>
        <h2>Farmer Registered Successfully!</h2>
        <table border='1' cellpadding='5'>
            <tr><th>Name</th><td>$name</td></tr>
            <tr><th>Email</th><td>$email</td></tr>
            <tr><th>Phone</th><td>$phone</td></tr>
            <tr><th>Location</th><td>$location</td></tr>
            <tr><th>Farm Type</th><td>$farmType</td></tr>
        </table>
        <br>
        <a href='registration.html'>Back</a>
    </body>
    </html>";
}
?>
