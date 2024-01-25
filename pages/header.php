<?php
require_once '../pages/header.php';
session_start();

if (!isset($_SESSION['user'])) {
    // Redirect to login page if the user is not logged in
    header('Location: ../pages/login.php');
    exit();
}


$Role = $_SESSION['userRole']; // Retrieve the user's role from the session
$username = $_SESSION['user']; // Retrieve the user's name from the session
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styling/css.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="dashboard.php">dashboard</a></li>
                <li><a href="appointments.php">Afspraken Maken</a></li>
                <?php
                if ($Role == 1) {
                    // Admin ziet extra menu-items
                    echo '<li><a href="../pages/register.php">Gebruiker Aanmaken</a></li>';
                }
                ?>
                <li style="float: right;"><a href="logout.php">Uitloggen</a></li>
            </ul>
        </nav>
    </header>
</body>