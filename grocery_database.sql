DROP TABLE IF EXISTS GroceryItems;

CREATE TABLE GroceryItems (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(50) NOT NULL,
    category VARCHAR(30),
    supplier VARCHAR(50),
    unit_price DECIMAL(10,2),
    quantity_in_stock INT,
    expiry_date DATE,
    discount_rate DECIMAL(5,2),
    last_restock_date DATE
);

INSERT INTO GroceryItems (item_name, category, supplier, unit_price, quantity_in_stock, expiry_date, discount_rate, last_restock_date)
VALUES
('Apple', 'Fruits', 'Fruit Nest', 38.00, 100, '2025-11-30', 0, '2025-10-20'),
('Milk', 'Dairy', 'FreshLacta', 99.25, 50, '2025-11-10', 5.00, '2025-10-25'),
('Bread', 'Bakery', 'Fresh Crust', 27.25, 80, '2025-11-05', 0, '2025-10-26'),
('Eggs', 'Dairy', 'Daily Nest', 11.99, 200, '2025-11-15', 0, '2025-10-24'),
('Banana', 'Fruits', 'Fruit Nest', 25.00, 120, '2025-11-28', 0, '2025-10-22'),
('Chicken', 'Meat', 'Daily Nest', 215.00, 10, '2025-11-15', 0, '2025-10-30'),
('Fish', 'Seafood', 'FinPeak', 120.00, 15, '2025-11-18', 10.00, '2025-10-27'),
('Cheese', 'Dairy', 'FreshLacta', 184.00, 40, '2025-12-05', 0, '2025-10-25'),
('Tomato', 'Vegetables', 'Pure Garden', 19.00, 70, '2025-11-20', 0, '2025-10-23'),
('Potato', 'Vegetables', 'Pure Garden', 15.00, 90, '2025-12-01', 0, '2025-10-21');
