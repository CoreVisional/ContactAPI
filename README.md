# **Contact Form API**

This API allows for the creation and submission of a customer contact form using XAMPP, MySQL, HTML/CSS, Javascript, and PHP. The database structure alongside its migration is built using PHP Phinx with composer.

# **Third-party Tools**
PHP Phinx from Rob Morgan (https://github.com/cakephp/phinx)

# **Setup**
1. Ensure that XAMPP and Composer are installed on your system.

2. Start the Apache server and MySQL in your XAMPP control panel.

3. Open up PHPMyAdmin page from XAMPP control panel.

4. Create a new database called "customercontact".

5. Clone or download the repository.

6. Open up your terminal, run the command below
```
"composer update"
```

7. Ensure that the configuration of "phinx.php" matches the configuration of your XAMPP database.

8. In your terminal, run the command below to migrate database structure to "customercontact".
```
php vendor/bin/phinx migrate
```

9. In your terminal, run the command below to seed the 3 postcodes data to "customercontact".
```
php vendor/bin/phinx seed:run
```

10. Avoid running this application with extension like "Live Server" as this may cause some issues fetching data from the API.
