# **Contact Form API**

This API allows for the creation and submission of a customer contact form using XAMPP, MySQL, HTML/CSS, Javascript, and PHP. The database structure alongside its migration is built using PHP Phinx with composer.

# **Third-party Tools**
PHP Phinx from (https://github.com/cakephp/phinx)

# **Setup**
1. Ensure that XAMPP and Composer are installed on your system.
2. Open up PHPMyAdmin page from XAMPP control panel.
3. Create a new database called "customercontact".
4. Clone or download the repository.
5. Open up your terminal, type "composer update" (without the quotation marks).
6. Ensure that the configuration of "phinx.php" matches the configuration of your XAMPP database.
7. In your terminal, run "php vendor/bin/phinx migrate" to migrate database structure to "customercontact".
8. In your terminal, run "php vendor/bin/phinx seed:run" to seed the 3 postcodes data to "customercontact".
9. To run this application, you may either use "php -S localhost:<port number>" in your terminal or run directly using your XAMPP server.
10. Avoid running this application with extension like "Live Server" as this may cause some issues fetching data from the API.
