<?php
// Include database connection or any necessary files
require_once 'db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? '';

    // Hash the password (use bcrypt in a production environment)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $query = $db->prepare('INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)');
    $query->execute([$username, $email, $hashedPassword, $role]);

    // Redirect to the dashboard with a success message
    header('Location: dashboard.php?registration=success&username=' . urlencode($username));
    exit();
}
 