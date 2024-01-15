<?php
session_start();

if (!isset($_SESSION['user'])) {
    // Redirect to login page if the user is not logged in
    header('Location: dashboarrd.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, <?php echo $_SESSION['user']; ?>!</h1>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
