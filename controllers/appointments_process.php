<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user'])) {
        // Redirect naar de inlogpagina als de gebruiker niet is ingelogd
        header('Location: index.php');
        exit();
    }

    // Aannemende dat je een 'Role'-kolom hebt in je 'Users'-tabel
    $userRole = $_SESSION['userRole']; // Haal de rol van de gebruiker op uit de sessie
    $userName = $_SESSION['userName']; // Haal de naam van de gebruiker op uit de sessie

    // Ontvang de formuliervelden
    $teacherId = $_POST['teacher'] ?? '';
    $time = $_POST['time'] ?? '';
    $email = $_POST['email'] ?? '';
    $comment = $_POST['comment'] ?? '';

    // Voer hier validatie uit indien nodig

    // Voeg hier de logica toe om de beschikbaarheid van de leraar en het tijdsblok te controleren
    $availabilityCheck = checkTeacherAvailability($teacherId, $time);

    if ($availabilityCheck) {
        // Voeg hier de logica toe om de afspraak in de database op te slaan
        saveAppointment($teacherId, $time, $email, $comment);

        // Redirect naar een bevestigingspagina of naar de afsprakenpagina
        header('Location: appointment_confirmation.php');
        exit();
    } else {
        // Beschikbaarheidscontrole mislukt, stuur de gebruiker terug naar de afsprakenpagina met een foutmelding
        $_SESSION['error_message'] = 'Geselecteerde tijd is niet beschikbaar. Kies een andere tijd.';
        header('Location: appointments.php');
        exit();
    }
} else {
    // Als het formulier niet correct is ingediend, stuur de gebruiker terug naar de afsprakenpagina
    header('Location: appointments.php');
    exit();
}

// Voeg hier eventueel meer functies toe om de beschikbaarheid en opslaan van afspraken te controleren
function checkTeacherAvailability($teacherId, $time) {
    // Implementeer de logica om de beschikbaarheid van de leraar te controleren
    // Return true als beschikbaar, false als niet beschikbaar
    // Voor nu laten we het altijd als beschikbaar zien
    return true;
}

function saveAppointment($teacherId, $time, $email, $comment) {
    // Implementeer de logica om de afspraak in de database op te slaan
    // Voor nu laten we het leeg
}
