<?php
include 'dbconfig.php';

$item_id = 1; // Change this to the item you want to update

try {
    $stmt = $conn->prepare("UPDATE GroceryItems SET 
        item_name = :name, 
        category = :category, 
        supplier = :supplier, 
        unit_price = :price, 
        quantity_in_stock = :quantity, 
        expiry_date = :expiry, 
        discount_rate = :discount, 
        last_restock_date = :restock 
        WHERE item_id = :id");

    $stmt->execute([
        ':name' => 'name',
        ':category' => 'category',
        ':supplier' => 'supplier',
        ':price' => 'price',
        ':quantity' => 'quantity',
        ':expiry' => 'expiry',
        ':discount' => 'discount',
        ':restock' => 'restock',
        ':id' => $item_id
    ]);

    $message = "✅ Grocery item updated successfully!";

    // Fetch the updated item
    $stmt2 = $conn->prepare("SELECT * FROM GroceryItems WHERE item_id = :id");
    $stmt2->execute([':id' => $item_id]);
    $item = $stmt2->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $message = "❌ Error updating record: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Grocery Item</title>
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
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 95%;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
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
    <h1>✏️ Update Grocery Item</h1>
    <hr>
    <p class="message"><?= $message ?></p>

    <?php if (isset($item) && $item): ?>
    <table>
        <caption>UPDATED ITEM</caption>
        <tr>
            <th>ID</th><th>Name</th><th>Category</th><th>Supplier</th>
            <th>Price</th><th>Quantity</th><th>Expiry Date</th>
            <th>Discount</th><th>Last Restock</th>
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
    <?php endif; ?>
</body>
</html>
