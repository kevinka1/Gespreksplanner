<?php
require_once '../database/db.php';

require_once '../functions/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if form is submitted via POST

    // Validate and sanitize form data
    $teacher = isset($_POST['teacher']) ? htmlspecialchars($_POST['teacher']) : '';
    $afspraak = isset($_POST['afspraak']) ? htmlspecialchars($_POST['afspraak']) : '';
    $opmerking = isset($_POST['opmerking']) ? htmlspecialchars($_POST['opmerking']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';

    // Perform any additional validation if needed

    // Example: Insert the appointment into the database
    $query = "INSERT INTO afspraken (afspraak, leraar, opmerking, email) VALUES (:afspraak, :leraar, :opmerking, :email)";
    $statement = $pdo->prepare($query);
    $statement->execute([
        ':afspraak' => $afspraak,
        ':leraar' => $teacher,
        ':opmerking' => $opmerking,
        ':email' => $email,
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
