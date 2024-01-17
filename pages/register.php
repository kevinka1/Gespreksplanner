<?php
require_once '../controllers/register_process.php';

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../styling/css.css">
</head>
<body>
    <div class="registration-container">
        <h1>Registreren</h1>
        <form action="../controllers/register_process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="role">Role (0 or 1):</label>
            <input type="number" id="role" name="role" required>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
