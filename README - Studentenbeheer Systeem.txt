# Client Management System (KW1C Project)

## Project Description
This is a PHP-based web application designed to manage client data. The system is connected to a MySQL database and handles a dataset of nearly 2000 records.

## Features (CRUD)
* **Read:** View a complete overview of all registered clients in a Bootstrap-styled table.
* **Create:** Register new clients using a web form.
* **Update:** Edit existing client information.
* **Delete:** Remove clients from the system with a confirmation prompt.
* **Custom Favicon:** KW1C branding added for recognition.

## Installation Instructions
1. Place all files in the `htdocs` folder of your XAMPP installation.
2. Start Apache and MySQL in the XAMPP Control Panel.
3. Import the provided SQL file (`websitedb_haye.sql`) via phpMyAdmin.
4. Open your browser and navigate to `http://localhost/index.php`.

## Technical Details
* **Language:** PHP 8 / HTML5 / CSS3
* **Database:** MariaDB/MySQL
* **Framework:** Bootstrap 5 (via CDN)
* **Connection:** Database connection handled via `db.php`
