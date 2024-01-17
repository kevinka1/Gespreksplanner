<?php
session_start();

if (!isset($_SESSION['user'])) {
    // Redirect to login page if the user is not logged in
    header('Location: ../pages/login.php');
    exit();
}


$Role = $_SESSION['userRole']; // Retrieve the user's role from the session
$username = $_SESSION['user']; // Retrieve the user's name from the session

// Check if registration success message is set in the URL
if (isset($_GET['registration']) && $_GET['registration'] === 'success') {
    $registeredUsername = $_GET['username'] ?? '';
    $registeredUsername = urldecode($registeredUsername); // Decode the username
    echo "<script>alert('Account for $registeredUsername has been successfully created!');</script>";
}

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
                <li><a href="my_appointments.php">Mijn Afspraken</a></li>
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

    <div class="dashboard-container">
        <?php
        if ($Role == 0) {
            echo "<h1>Welcome, $username!</h1>";
        } elseif ($Role == 1) {
            echo "<h1>Welcome, $username!</h1>";
        }
        ?>
    </div>
</body>
</html>