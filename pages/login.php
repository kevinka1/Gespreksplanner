<?php
session_start();

require_once '../database/db.php';
require_once '../controllers/LoginController.php';

$loginController = new LoginController($pdo);

if (isset($_SESSION['user'])) {
    // Redirect to dashboard or home page if the user is already logged in
    header('Location: dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $loginController->login($username, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../styling/css.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="../interface/Login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
