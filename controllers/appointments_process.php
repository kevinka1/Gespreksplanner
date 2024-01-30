<?php
session_start(); // Start the session

require_once '../database/db.php';
require_once '../functions/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if form is submitted via POST

    // Validate and sanitize form data
    $teacher = isset($_POST['teacher']) ? htmlspecialchars($_POST['teacher']) : '';
    $afspraak = isset($_POST['afspraak']) ? htmlspecialchars($_POST['afspraak']) : '';
    $opmerking = isset($_POST['opmerking']) ? htmlspecialchars($_POST['opmerking']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';

    // Check if 'userRole' and 'user' are set in the session
    if (isset($_SESSION['userRole'], $_SESSION['user'])) {
        // Check the user role
        if ($_SESSION['userRole'] == 0) {
            // If the user is a "leerling," automatically set the username
            $username = $_SESSION['user'];
        } elseif ($_SESSION['userRole'] == 1) {
            // If the user is a "leraar," get the selected username from the dropdown
            $username = isset($_POST['gebruikers']) ? htmlspecialchars($_POST['gebruikers']) : '';
        } else {
            // Handle other cases or redirect as needed
            header('Location: ../pages/dashboard.php');
            exit();
        }

        // Perform any additional validation if needed

        // Example: Insert the appointment into the database
        $query = "INSERT INTO afspraken (afspraak, leraar, opmerking, email, username) VALUES (:afspraak, :leraar, :opmerking, :email, :username)";
        $statement = $pdo->prepare($query);
        $_SESSION['create_success'] = true;
        $statement->execute([
            ':afspraak' => $afspraak,
            ':leraar' => $teacher,
            ':opmerking' => $opmerking,
            ':email' => $email,
            ':username' => $username,
        ]);

        // Redirect to a success page or handle further actions
        header('Location: ../pages/dashboard.php');
        exit();
    } else {
        // Redirect if 'userRole' or 'user' is not set in the session
        header('Location: ../pages/dashboard.php');
        exit();
    }
} else {
    // If the form is not submitted via POST, redirect to the appointments page
    header('Location: ../pages/appointments.php');
    exit();
}
?>
