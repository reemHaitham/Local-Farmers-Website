<?php
// calculate.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $customerName = htmlspecialchars($_POST['customerName']);
    $customerAge = intval($_POST['customerAge']);
    $isFirstTime = isset($_POST['firstTimeCustomer']) ? true : false;
    
    // Product quantities
    $appleQty = floatval($_POST['appleQty']);
    $tomatoQty = floatval($_POST['tomatoQty']);
    $honeyQty = floatval($_POST['honeyQty']);
    $eggsQty = intval($_POST['eggsQty']);
    
    // Prices
    $applePrice = 2.50;
    $tomatoPrice = 3.00;
    $honeyPrice = 8.00;
    $eggsPrice = 4.50;
    
    // Calculate subtotals
    $appleSubtotal = $appleQty * $applePrice;
    $tomatoSubtotal = $tomatoQty * $tomatoPrice;
    $honeySubtotal = $honeyQty * $honeyPrice;
    $eggsSubtotal = $eggsQty * $eggsPrice;
    
    $subtotal = $appleSubtotal + $tomatoSubtotal + $honeySubtotal + $eggsSubtotal;
    
    // Apply discounts
    $discounts = [];
    $totalDiscount = 0;
    
    if ($customerAge >= 60) {
        $seniorDiscount = $subtotal * 0.10;
        $discounts[] = "Senior Discount (10%): OMR" . number_format($seniorDiscount, 2);
        $totalDiscount += $seniorDiscount;
    }
    
    if ($isFirstTime) {
        $firstTimeDiscount = $subtotal * 0.10;
        $discounts[] = "First-Time Customer (10%): OMR" . number_format($firstTimeDiscount, 2);
        $totalDiscount += $firstTimeDiscount;
    }
    
    $totalQuantity = $appleQty + $tomatoQty + $honeyQty;
    if ($totalQuantity > 10) {
        $bulkDiscount = $subtotal * 0.05;
        $discounts[] = "Bulk Purchase (5%): OMR" . number_format($bulkDiscount, 2);
        $totalDiscount += $bulkDiscount;
    }
    
    $total = $subtotal - $totalDiscount;
    
    // Output the results
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Bill Calculation Results</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h1 class="card-title text-center mb-0">Bill Calculation Results</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Customer:</strong> <?= $customerName ?></p>
                                    <p><strong>Subtotal:</strong> OMR<?= number_format($subtotal, 2) ?></p>
                                    <p><strong>Discounts Applied:</strong></p>
                                    <ul>
                                        <?php if (!empty($discounts)): ?>
                                            <?php foreach ($discounts as $discount): ?>
                                                <li><?= $discount ?></li>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <li>No discounts applied</li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h4 class="card-title">Total Amount Due</h4>
                                            <p class="display-5 text-success">OMR<?= number_format($total, 2) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="calculate.html" class="btn btn-success">Back to Calculator</a>
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
    header("Location: calculate.html");
    exit();
}
?>