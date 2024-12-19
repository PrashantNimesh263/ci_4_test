This is a simple CRUD application built with CodeIgniter 4 to manage products and users, along with an API for products. It includes user authentication (login/register) and product management features. The app has the following routes:

Products:
    View all products
    Create, Edit, and Delete products
Users:
    User Registration
    User Login
    User Logout

#Features

CRUD operations for managing products.
User authentication (login, register).
RESTful API for products.
CSRF Protection and Form Validation.
Custom Authentication Filter to protect product routes.

#Requirements

PHP >= 7.4
MySQL Database
CodeIgniter 4 (latest version)

#Setup 

Install composer 
Install Xampp
Install PHP

#Database Setup

1. Create a Database:
    
    I have added a file ci_4_test.sql in the folder Please import this file
    Open phpMyAdmin or your preferred MySQL tool.
    Create a database named ci_4_test.

2.Configure Database Settings:

    Open app/Config/Database.php.

    public $default = [
        'DSN'      => '',
        'hostname' => 'localhost',
        'username' => 'root',       // Default MySQL username (root)
        'password' => '',           // Default MySQL password (empty for XAMPP or MAMP)
        'database' => 'ci_4_test',  // Database name
        'DBDriver' => 'MySQLi',     // MySQL Database driver
        'charset'  => 'utf8mb4',    // Set the character set to UTF-8
        'DBCollat' => 'utf8mb4_general_ci', // Set the collation
        'port'     => 3306,         // Default MySQL port
    ];

    Update the database configuration as follows:

#Run the Development Server

  php spark serve

#Access the Application

Products Page: Navigate to http://localhost:8080/ to view the list of products.
Login/Registration: Access http://localhost:8080/login for login and http://localhost:8080/register for user registration.
API Endpoints:
    GET /api/products: Fetch all products.
    POST /api/products: Create a new product.
    GET /api/products/{id}: Get a product by ID.
    PUT /api/products/{id}: Update a product.
    DELETE /api/products/{id}: Delete a product.

#Test the Application

User Registration/Login: Ensure the login system works and that the user’s name is shown in the header when logged in.
Product Management: Test creating, viewing, editing, and deleting products.
API Endpoints: Test the API using tools like Postman or cURL.

