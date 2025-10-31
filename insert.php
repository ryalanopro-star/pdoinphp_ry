<?php
include 'dbconfig.php';

try {
    // Prepare SQL INSERT statement
    $stmt = $conn->prepare("INSERT INTO GroceryItems (item_name, category, supplier, unit_price, quantity_in_stock, expiry_date, discount_rate, last_restock_date)
                            VALUES (:name, :category, :supplier, :price, :quantity, :expiry, :discount, :restock)");


$stmt->execute([
    ':name' => 'Eggplant',
    ':category' => 'Vegetables',
    ':supplier' => 'Pure Garden',
    ':price' => 22.00,
    ':quantity' => 15,
    ':expiry' => date('2025-11-20'),
    ':discount' => 0,
    ':restock' => date('2025-10-31')
]);
    $message = "✅ New grocery item added successfully!";
} catch (PDOException $e) {
    $message = "❌ Error inserting record: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Grocery Item</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 40px;
            text-align: center;
        }
        h1 {
            text-transform: uppercase;
            color: #4CAF50;
        }
        hr {
            border: 0;
            height: 2px;
            background-color: #636363ff;
            width: 100%;
            margin: 0 auto 20px auto;
        }
        p.message {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: bold;
            color: #222;
            background-color: #fff176;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <h1>🛒 Insert Grocery Item</h1>
    <hr>
    <p class="message"><?= $message ?></p>
</body>
</html>
