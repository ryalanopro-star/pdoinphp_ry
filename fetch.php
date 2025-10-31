<?php
include 'dbconfig.php';

try {
    // Change item_id to test other items
    $stmt = $conn->prepare("SELECT * FROM GroceryItems WHERE item_id = 0");
    $stmt->execute();
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("❌ Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>GROCERY ITEM</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 40px;
        }
        h1 {
            text-align: center;
            color: #333;
            text-transform: uppercase;
        }
        hr {
            border: 0;
            height: 2px;
            background-color: #636363ff;
            width: 100%;
            margin: 0 auto 20px auto;
        }
        table {
            border-collapse: collapse;
            width: 95%;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            min-height: calc(100% - 120px);
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
        }
        tr:hover {
            background-color: #f1f9f1;
        }
        caption {
            caption-side: top;
            font-size: 1.5em;
            margin-bottom: 15px;
            font-weight: bold;
            color: #4CAF50;
            text-transform: uppercase;
        }
        td.price {
            color: #FF5722;
            font-weight: bold;
        }
        td.discount {
            color: #2196F3;
            font-weight: bold;
        }
        .message {
            text-align: center;
            font-size: 1.2em;
            color: red;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <h1>🛒GROCERY ITEM</h1>
    <hr>

    <?php if ($item): ?>
        <table>
            <caption>FETCH ONE GROCERY ITEM</caption>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Supplier</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Expiry Date</th>
                <th>Discount</th>
                <th>Last Restock</th>
            </tr>
            <tr>
                <td><?= $item['item_id']; ?></td>
                <td><?= $item['item_name']; ?></td>
                <td><?= $item['category']; ?></td>
                <td><?= $item['supplier']; ?></td>
                <td class="price"><?= number_format($item['unit_price'], 2); ?></td>
                <td><?= $item['quantity_in_stock']; ?></td>
                <td><?= $item['expiry_date']; ?></td>
                <td class="discount"><?= $item['discount_rate']; ?>%</td>
                <td><?= $item['last_restock_date']; ?></td>
            </tr>
        </table>
    <?php else: ?>
        <div class="message">❌ No record found for this item.</div>
    <?php endif; ?>
</body>
</html>
