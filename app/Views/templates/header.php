<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter 4 Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>CodeIgniter 4 CRUD Application</h2>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            
        
            
            <!-- Display User Name if Logged In -->
            <?php if (session()->get('is_logged_in')): ?>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="/products" class="nav-link">Products</a></li>
                    <li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li>
                </ul>
                <span class="navbar-text ml-auto">
                    Welcome, <?= session()->get('user_name'); ?>
                </span>
            <?php else: ?>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="/register" class="nav-link">Register</a></li>
                <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
            </ul>
            <?php endif; ?>
        </nav>
        <hr>
