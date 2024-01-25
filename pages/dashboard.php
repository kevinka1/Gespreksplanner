
<?php
include '../pages/header.php';  // Include header

require_once '../database/db.php';

require_once '../functions/functions.php';

// Check if registration success message is set in the URL
if (isset($_GET['registration']) && $_GET['registration'] === 'success') {
    $registeredUsername = $_GET['username'] ?? '';
    $registeredUsername = urldecode($registeredUsername); // Decode the username
    echo "<script>alert('Account for $registeredUsername has been successfully created!');</script>";
}

$appointments = getLatestAppointments($pdo, 4);

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

    <div class="content-container">
        <?php
        echo "<h1>Welcome to the Dashboard!</h1>";
        ?>

        <div class="appointment-container">
            <?php
                foreach ($appointments as $appointment) {
                    echo '<div class="appointment-column appointment-id-' . $appointment['id'] . '">';
                echo '<p><strong>Afspraak:</strong> ' . $appointment['afspraak'] . '</p>';
                echo '<p><strong>Leraar:</strong> ' . $appointment['leraar'] . '</p>';
                echo '<p><strong>Email:</strong> ' . $appointment['email'] . '</p>';
                echo '<p><strong>Opmerking:</strong> ' . $appointment['opmerking'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

</body>

</html>