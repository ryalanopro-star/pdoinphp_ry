# Grocery Items Management (PHP PDO)

**Created by:** Ryan Alano
**Course & Section:** UCOS 3-2

A simple PHP CRUD project using **PDO** to manage grocery items.
This project demonstrates secure database operations and organized PHP scripting for item management.

---

## 📁 Project Contents

| File                   | Description                                         |
| -----------------------| --------------------------------------------------- |
| `dbconfig.php`         | Establishes a secure PDO database connection        |
| `insert.php`           | Adds new grocery items to the database              |
| `update.php`           | Updates item details such as price or quantity      |
| `delete.php`           | Removes an item by its ID                           |
| `fetchall.php`         | Retrieves and displays all grocery items            |
| `fetch.php`            | Fetches details of a specific item                  |
| `table.php`            | Displays grocery items in an HTML table             |
| `grocery_database.sql` | SQL file containing table structure and sample data |

---

## 🧮 SQL Features

* Filtering items by category
* Sorting prices from highest to lowest
* Searching items using the `LIKE` operator
* Calculating average price per category
* Computing total stock value

---

## ⚙️ Setup Instructions

1. Move the project folder to

   ```
   C:\xampp\htdocs\midterm_exam
   ```
2. Open **XAMPP** and start **Apache** & **MySQL**.
3. Import the `grocery_database.sql` file into **phpMyAdmin**.
4. Run the project in your browser:

   ```
   http://localhost/midterm_exam/table.php
   ```

---

## 💡 Notes

* Make sure PDO is enabled in your PHP configuration.
* All scripts use **prepared statements** to prevent SQL injection.
* You can modify `dbconfig.php` to match your local database settings.

