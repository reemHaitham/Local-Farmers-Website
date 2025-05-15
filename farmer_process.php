<?php
// Farmer class to represent a single record
class Farmer {
    public $name;
    public $farmName;
    public $location;
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

// Function to display farmers in a table
function displayFarmersTable($farmers) {
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="table-success"><tr><th>Name</th><th>Farm Name</th><th>Location</th><th>Products</th><th>Method</th></tr></thead>';
    echo '<tbody>';
    foreach ($farmers as $farmer) {
        echo '<tr>';
        echo '<td>'.htmlspecialchars($farmer->name).'</td>';
        echo '<td>'.htmlspecialchars($farmer->farmName).'</td>';
        echo '<td>'.htmlspecialchars($farmer->location).'</td>';
        echo '<td>'.htmlspecialchars($farmer->products).'</td>';
        echo '<td>'.htmlspecialchars($farmer->method).'</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['farmerName'] ?? '';
    $farmName = $_POST['farmName'] ?? '';
    $location = $_POST['location'] ?? '';
    $products = $_POST['products'] ?? '';
    $method = $_POST['method'] ?? '';
    
    // Create new farmer
    $newFarmer = new Farmer($name, $farmName, $location, $products, $method);
    
    // Sample data array (in a real app, this would come from a database)
    $farmers = [
        new Farmer("John Doe", "Green Valley", "Salalah", "Organic Vegetables", "Eco-friendly"),
        new Farmer("Alice Smith", "Sunny Acres", "Sur", "Free-range Eggs", "Pasture-raised"),
        $newFarmer // Add the newly submitted farmer
    ];
    
    // Display the results
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
    
    echo '<a href="farmerProfile.html" class="btn btn-primary mt-3">Back to Farmer Profiles</a>
        </div>
    </body>
    </html>';
} else {
    // If someone tries to access directly without submitting the form
    header("Location: farmerProfile.html");
    exit();
}
?>