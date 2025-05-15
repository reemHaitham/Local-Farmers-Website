<?php
// FarmerProfile.php
class FarmerProfile {
    private $farmerName;
    private $farmName;
    private $location;
    private $products;
    private $method;
    
    public function __construct($farmerName, $farmName, $location, $products, $method) {
        $this->farmerName = $farmerName;
        $this->farmName = $farmName;
        $this->location = $location;
        $this->products = $products;
        $this->method = $method;
    }
    
    // Getters
    public function getFarmerName() { return $this->farmerName; }
    public function getFarmName() { return $this->farmName; }
    public function getLocation() { return $this->location; }
    public function getProducts() { return $this->products; }
    public function getMethod() { return $this->method; }
    
    // Display as table row
    public function displayAsRow() {
        return "<tr>
            <td>{$this->farmerName}</td>
            <td>{$this->farmName}</td>
            <td>{$this->location}</td>
            <td>{$this->products}</td>
            <td>{$this->method}</td>
        </tr>";
    }
    
    // Display as card
    public function displayAsCard() {
        return "<div class='col'>
            <div class='card h-100'>
                <img src='farmer.jpg' alt='{$this->farmerName}' class='card-img-top' style='height: 300px; object-fit: cover;'>
                <div class='card-body p-2'>
                    <h3 class='card-title text-success fs-4 mb-1'>{$this->farmerName}</h3>
                    <table class='table table-sm mb-0'>
                        <tr><th class='ps-1 pe-2 py-1'>Farm:</th><td class='ps-1 py-1'>{$this->farmName}</td></tr>
                        <tr><th class='ps-1 pe-2 py-1'>Location:</th><td class='ps-1 py-1'>{$this->location}</td></tr>
                        <tr><th class='ps-1 pe-2 py-1'>Products:</th><td class='ps-1 py-1'>{$this->products}</td></tr>
                        <tr><th class='ps-1 pe-2 py-1'>Method:</th><td class='ps-1 py-1'>{$this->method}</td></tr>
                    </table>
                </div>
            </div>
        </div>";
    }
}
?>