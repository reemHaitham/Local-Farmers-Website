<?php
require_once 'db_connect.php';

class Farmer {
    public $name;
    public $farmName;
    public $Location;
    public $products;
    public $method;
    
    public function __construct($name, $farmName, $location, $products, $method) {
        $this->name = $name;
        $this->farmName = $farmName;
        $this->location = $location;
        $this->products = $products;
        $this->method = $method;
    }
}

function displayFarmersTable($farmers) {
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="table-success"><tr><th>Name</th><th>Farm Name</th><th>Location</th><th>Products</th><th>Method</th></tr></thead>';
    echo '<tbody>';
    foreach ($farmers as $farmer) {
        echo '<tr>';
        echo '<td>'.htmlspecialchars($farmer->farmerName).'</td>';
        echo '<td>'.htmlspecialchars($farmer->farmName).'</td>';
        echo '<td>'.htmlspecialchars($farmer->Location).'</td>';
        echo '<td>'.htmlspecialchars($farmer->Products).'</td>';
        echo '<td>'.htmlspecialchars($farmer->Method).'</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['farmerName'] ?? '';
    $farmName = $_POST['farmName'] ?? '';
    $location = $_POST['Location'] ?? '';
    $products = $_POST['Products'] ?? '';
    $method = $_POST['Method'] ?? '';
    
    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO profiles (farmerName, farmName, Location, Products, Method) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $farmName, $location, $products, $method]);
    
    // Fetch all farmers including the new one
    $stmt = $pdo->query("SELECT * FROM profiles");
    $farmers = $stmt->fetchAll();
    
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Farmer Profile Submitted</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="alert alert-success">
                <h2>Farmer Profile Submitted Successfully!</h2>
                <p>Thank you for submitting the farmer profile.</p>
            </div>
            
            <h3 class="mt-4">All Farmers</h3>';
    
    displayFarmersTable($farmers);
    
    echo '<a href="farmerProfile.php" class="btn btn-warning mt-3">Back to Farmer Profiles</a>
        </div>
    </body>
    </html>';
} else {
    header("Location: farmerProfile.php");
    exit();
}
?>
