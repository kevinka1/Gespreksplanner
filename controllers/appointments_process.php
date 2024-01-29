<?php
require_once '../database/db.php';

require_once '../functions/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if form is submitted via POST

    // Validate and sanitize form data
    $teacher = isset($_POST['teacher']) ? htmlspecialchars($_POST['teacher']) : '';
    $username = isset($_POST['gebruikers']) ? htmlspecialchars($_POST['gebruikers']) : '';
    $afspraak = isset($_POST['afspraak']) ? htmlspecialchars($_POST['afspraak']) : '';
    $opmerking = isset($_POST['opmerking']) ? htmlspecialchars($_POST['opmerking']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    //$tijd = isset($_POST['timestamp']) ? htmlspecialchars($_POST['timestamp']) : '';

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
       // ':timestamp' => $tijd
        ]);

   
    // Redirect to a success page or handle further actions
    header('Location: ../pages/dashboard.php');
    exit();
} else {
    // If the form is not submitted via POST, redirect to the appointments page
    header('Location: appointments.php');
    exit();
}
?>
