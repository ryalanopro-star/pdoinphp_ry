<?php
require "dbconfig.php";

try {
    $stmt = $conn->prepare("DELETE FROM GroceryItems WHERE item_id = :id");

    // Change the ID to test
    $stmt->execute([':id' => 0]);

    // Check if any row was deleted
    if ($stmt->rowCount() > 0) {
        $message = "✅ Grocery item deleted successfully!";
    } else {
        $message = "❌ No item found with ID 4.";
    }
} catch (PDOException $e) {
    $message = "❌ Error deleting record: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Grocery Item</title>
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
    <h1>🗑️ Delete Grocery Item</h1>
    <hr>
    <p class="message"><?= $message ?></p>
</body>
</html>
