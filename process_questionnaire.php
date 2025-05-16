<?php
class Feedback {
    private $name, $email, $location, $rating, $products, $delivery, $suggestion, $recommend;

    public function __construct($name, $email, $location, $rating, $products, $delivery, $suggestion, $recommend) {
        $this->name = $name;
        $this->email = $email;
        $this->location = $location;
        $this->rating = $rating;
        $this->products = $products;
        $this->delivery = $delivery;
        $this->suggestion = $suggestion;
        $this->recommend = $recommend;
    }

    public function displayAsRow() {
        $productsList = htmlspecialchars(implode(", ", $this->products));
        return "<tr>
            <td>{$this->name}</td>
            <td>{$this->email}</td>
            <td>{$this->location}</td>
            <td>{$this->rating}</td>
            <td>{$productsList}</td>
            <td>{$this->delivery}</td>
            <td>{$this->suggestion}</td>
            <td>{$this->recommend}</td>
        </tr>";
    }
}

$feedbacks = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['fullName'] ?? '';
    $email = $_POST['userEmail'] ?? '';
    $location = $_POST['location'] ?? '';
    $rating = $_POST['rating'] ?? '';
    $delivery = $_POST['delivery'] ?? '';
    $suggestion = $_POST['suggestions'] ?? '';
    $recommend = $_POST['recommend'] ?? '';

    $products = [];
    if (isset($_POST['veg'])) $products[] = $_POST['veg'];
    if (isset($_POST['fruits'])) $products[] = $_POST['fruits'];
    if (isset($_POST['dairy'])) $products[] = $_POST['dairy'];
    if (isset($_POST['seeds'])) $products[] = $_POST['seeds'];

    if (empty($name) || empty($email) || empty($location) || empty($rating) || empty($delivery) || empty($recommend)) {
        die("<h1>Missing required fields. Please go back and complete the form.</h1>");
    }

    $entry = new Feedback($name, $email, $location, $rating, $products, $delivery, $suggestion, $recommend);
    $feedbacks[] = $entry;

    echo "<!DOCTYPE html>
    <html xmlns='http://www.w3.org/1999/xhtml'>
    <head>
    <meta charset='UTF-8' />
    <title>Questionnaire Summary</title>
    </head>
    <body>
    <h1>Questionnaire Summary</h1>
    <table border='1'>
        <thead>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Location</th>
            <th>Rating</th>
            <th>Products</th>
            <th>Delivery</th>
            <th>Suggestion</th>
            <th>Recommend</th>
            </tr>
        </thead>
        <tbody>";

    foreach ($feedbacks as $f) echo $f->displayAsRow();

    echo "</tbody></table>
    <p><a href='questionnaire.html'>Back to Questionnaire page</a></p>
    </body></html>";

} 
?>
