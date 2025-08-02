# User-Data-Form-with-Status-Toggle-PHP-MySQL-
This project is a simple PHP web application that allows the user to: - Submit a name and age. - Store the submitted data into a MySQL database. - Display all records in a table. - Toggle each user's status between 0 and 1 using a button. - Immediately reflect the updated status on the webpage.


##  Technologies Used
- HTML
- CSS 
- PHP 
- MySQL
- phpMyAdmin 
- XAMPP 

---

1. Start XAMPP Services
 • Open XAMPP Control Panel
 • Start Apache and MySQL

2. Create the Database and Table
 1. Go to phpMyAdmin
 2. Create a new database called: users_db

3. Inside that database, create a table named users using the following structure:

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  age INT,
  status TINYINT(1) DEFAULT 0
);

4. Open the App in Browser
Go to: localhost/u/iindex.php

 How It Works
 • User fills the form with name and age, then clicks Submit.
 • The data is inserted into the users table.
 • Below the form, a table shows all existing records.
 • Each row has a Toggle button that updates the status between 0 and 1 for that user.
 • The page refreshes and displays the updated status.
 
