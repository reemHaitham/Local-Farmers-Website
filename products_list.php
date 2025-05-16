<?php
// products_list.php

// Define a Product class
class Product {
    public $id;
    public $name;
    public $category;
    public $price;
    public $description;
    public $imageUrl;
    
    public function __construct($id, $name, $category, $price, $description, $imageUrl) {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
    }
    
    public function getFormattedPrice() {
        return number_format($this->price, 2) . ' Rials';
    }
}

// Create an array of Product objects
$products = [
    new Product(1, 'Organic Tomatoes', 'Fruits', 1.50, 
        'Plump, sun-ripened tomatoes bursting with flavor', 
        'https://yaraurl.com/j0r1'),
    new Product(2, 'Organic Carrots', 'Vegetables', 1.09, 
        'Naturally sweet and packed with nutrients', 
        'https://ucarecdn.com/459eb7be-115a-4d85-b1d8-deaabc94c643/'),
    new Product(3, 'Farm Fresh Eggs', 'Eggs & Dairy', 2.03, 
        'Free-range eggs from our happy hens', 
        'https://cdn.sanity.io/images/7mpmplf0/production/8e750dc706219712a1bf0ed86f5eeb366cdb5523-1280x800.jpg'),
    new Product(4, 'Strawberry Jam', 'Handmade', 4.50, 
        'Made with our organic strawberries', 
        'https://daenskitchen.com/wp-content/uploads/2025/03/Strawberry-Jam-Featured-1200-500x500.jpg')
];

// Function to display products in a table
function displayProductsTable($products) {
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="table-dark"><tr>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Description</th>
          </tr></thead>';
    echo '<tbody>';
    
    foreach ($products as $product) {
        echo '<tr>';
        echo '<td><img src="' . $product->imageUrl . '" width="100" height="100" alt="' . $product->name . '"></td>';
        echo '<td>' . $product->name . '</td>';
        echo '<td>' . $product->category . '</td>';
        echo '<td>' . $product->getFormattedPrice() . '</td>';
        echo '<td>' . $product->description . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody></table>';
}

// Output the HTML page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Our Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center text-success mb-5">Our Farm Products</h1>
        
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h2 class="card-title">Product Catalog</h2>
            </div>
            <div class="card-body">
                <?php displayProductsTable($products); ?>
            </div>
        </div>
        
        <div class="mt-4 text-center">
            <a href="products.html" class="btn btn-success">Back to Products Page</a>
        </div>
    </div>
</body>
</html>