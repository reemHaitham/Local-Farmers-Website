<?php
// Sample data (in a real app, this would come from a database)
$farmers = [
    (object)['name' => 'John Doe', 'farmName' => 'Green Valley', 'location' => 'Salalah', 
             'products' => 'Organic Vegetables', 'method' => 'Eco-friendly'],
    (object)['name' => 'Alice Smith', 'farmName' => 'Sunny Acres', 'location' => 'Sur', 
             'products' => 'Free-range Eggs', 'method' => 'Pasture-raised']
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchTerm = strtolower($_POST['searchTerm'] ?? '');
    
    $results = array_filter($farmers, function($farmer) use ($searchTerm) {
        return (strpos(strtolower($farmer->name), $searchTerm) !== false) ||
               (strpos(strtolower($farmer->farmName), $searchTerm) !== false) ||
               (strpos(strtolower($farmer->location), $searchTerm) !== false) ||
               (strpos(strtolower($farmer->products), $searchTerm) !== false) ||
               (strpos(strtolower($farmer->method), $searchTerm) !== false);
    });
    
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Search Results</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <h2>Search Results for: '.htmlspecialchars($searchTerm).'</h2>';
    
    if (empty($results)) {
        echo '<div class="alert alert-warning">No results found.</div>';
    } else {
        echo '<table class="table table-striped table-bordered">
                <thead class="table-success">
                    <tr><th>Name</th><th>Farm Name</th><th>Location</th><th>Products</th><th>Method</th></tr>
                </thead>
                <tbody>';
        
        foreach ($results as $farmer) {
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
    
    echo '<a href="farmerProfile.html" class="btn btn-primary">Back to Farmer Profiles</a>
        </div>
    </body>
    </html>';
} else {
    header("Location: farmerProfile.html");
    exit();
}
?>