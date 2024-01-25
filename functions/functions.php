<?php

include_once '../database/db.php';

function getTeachers($pdo) {
    $query = "SELECT `username` FROM `users` WHERE `Role`=1";
    $statement = $pdo->query($query);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}



function getLatestAppointments($pdo, $limit = 10) {
    $query = "SELECT id, afspraak, leraar, email, opmerking FROM Afspraken ORDER BY Created_at DESC LIMIT :limit";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

?>