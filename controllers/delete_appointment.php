<?php
require_once '../database/db.php';

require_once '../functions/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if form is submitted via POST

    // Validate and sanitize form data
    $appointmentId = isset($_POST['appointment_id']) ? intval($_POST['appointment_id']) : 0;

    // Perform any additional validation if needed

    // Example: Delete the appointment from the database
    deleteAppointment($pdo, $appointmentId);

    // Set a session variable to indicate successful deletion
    $_SESSION['delete_success'] = true;

    // Redirect to the dashboard or a success page
    header('Location: ../pages/dashboard.php');
    exit();
} else {
    // If the form is not submitted via POST, redirect to the dashboard
    header('Location: ../pages/dashboard.php');
    exit();
}
?>
 