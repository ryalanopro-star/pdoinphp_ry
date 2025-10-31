<?php
include 'dbconfig.php';

// Fetch all records sorted by category ASC and price DESC
$stmt = $conn->prepare("SELECT * FROM GroceryItems ORDER BY category ASC, unit_price DESC");
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>🛒GROCERY ITEMS</title>
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
    </style>
</head>
<body>
    <h1>🛒GROCERY ITEMS</h1>
    <hr>
    <table>
        <caption>SORTED BY PRICE AND CATEGORY</caption>
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
        <?php foreach ($items as $item): ?>
        <tr>
            <td><?php echo $item['item_id']; ?></td>
            <td><?php echo $item['item_name']; ?></td>
            <td><?php echo $item['category']; ?></td>
            <td><?php echo $item['supplier']; ?></td>
            <td class="price"><?php echo number_format($item['unit_price'], 2); ?></td>
            <td><?php echo $item['quantity_in_stock']; ?></td>
            <td><?php echo $item['expiry_date']; ?></td>
            <td class="discount"><?php echo $item['discount_rate']; ?>%</td>
            <td><?php echo $item['last_restock_date']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
