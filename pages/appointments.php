<?php
require_once '../pages/header.php';

require_once '../database/db.php';

require_once '../functions/functions.php';


if (!isset($_SESSION['user'])) {
    // Redirect naar de inlogpagina als de gebruiker niet is ingelogd
    header('Location: ../pages/login.php');
    exit();
}

// 
$Role = $_SESSION['userRole']; // Haal de rol van de gebruiker op uit de sessie
$userName = $_SESSION['user']; // Haal de naam van de gebruiker op uit de sessie

$teachers = getTeachers($pdo); // Haal alle leraren op uit de database
$gebruiker = getUserIds($pdo); // Haal alle gebruikers op uit de database
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afspraken Maken</title>
    <link rel="stylesheet" href="../styling/css.css">
</head>
<body>
    
<div class="content-container">
        <?php
        echo "<h1>Afspraken Maken - $userName!</h1>";
        ?>

        <form action="../controllers/appointments_process.php" method="post">
            <label for="teacher">Kies de productowner:</label>
            <select id="teacher" name="teacher" required>
                <?php
                foreach ($teachers as $teacher) {
                    echo '<option value="'. $teacher['username'] . '">'. $teacher['username'] . '   </option>';
                }
                ?>
            </select>
            <?php
                if ($Role == 1) {
                    $Username = $gebruiker[0]['username'];
                
        echo'    <label for="gebruikers">Kies de bijpassende leerlingen:</label>
            <select id="gebruikers" name="gebruikers" required>;
                foreach ($gebruiker as $gebruikers) {
                    <option value="'. $Username . '">'. $Username . '   </option>';
                }
            
                ?>
            </select>

            <label for="afspraak">Afspraak:</label>
            <input type="text" id="afspraak" name="afspraak" required>

            <label for="opmerking">Opmerking:</label>
            <textarea id="opmerking" name="opmerking"></textarea>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <!-- add label for timestamp choose day and the time
            <label for="timestamp">Kies een dag en tijd:</label>
            <input type="datetime-local" id="timestamp" name="timestamp" required> -->


            <button type="submit">Afspraak Maken</button>
        </form>
    </div>
</body>
</html>
