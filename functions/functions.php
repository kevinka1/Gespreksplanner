<?php

include_once '../database/db.php';

function getTeachers($pdo) {
    $query = "SELECT `username` FROM `users` WHERE `Role`=1";
    $statement = $pdo->query($query);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}


function getUserIds($pdo) {
    $query = "SELECT `username` FROM `users` WHERE `Role` = 0";
    $statement = $pdo->query($query);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}




function getLatestAppointments($pdo, $limit = 10) {
    $query = "SELECT id, afspraak, leraar, email, opmerking, username FROM Afspraken ORDER BY Created_at  LIMIT :limit";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}



/**
 * Delete an appointment from the database and send an email.
 *
 * @param PDO $pdo PDO instance for database connection
 * @param int $appointmentId ID of the appointment to be deleted
 */
function deleteAppointment($pdo, $appointmentId) {
    // Retrieve email address for sending email
    $query = "SELECT email FROM Afspraken WHERE id = :id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $appointmentId, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $email = $result['email'];

        // Send email
        $subject = "Your appointment has been canceled";
        $message = "Unfortunately, your appointment has been canceled. Contact us for further details.";
        $headers = "From: {$_SESSION['user']}";

        mail($email, $subject, $message, $headers);
    }

    // Delete appointment from the database
    $deleteQuery = "DELETE FROM Afspraken WHERE id = :id";
    $deleteStatement = $pdo->prepare($deleteQuery);
    $deleteStatement->bindParam(':id', $appointmentId, PDO::PARAM_INT);
    $deleteStatement->execute();

    // Set a session variable to indicate successful deletion
    $_SESSION['delete_success'] = true;
}

// Add any additional functions you need here

?>


