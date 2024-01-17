<?php
session_start();

if (!isset($_SESSION['user'])) {
    // Redirect naar de inlogpagina als de gebruiker niet is ingelogd
    header('Location: ../pages/login.php');
    exit();
}

// 
$
$Role = $_SESSION['userRole']; // Haal de rol van de gebruiker op uit de sessie
$userName = $_SESSION['user']; // Haal de naam van de gebruiker op uit de sessie
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
        echo "<h1>Welcome, $userName!</h1>";
        ?>

        <h2>Afspraken Maken</h2>

        <form action="../controllers/appointments_process.php" method="post">
            <label for="teacher">Kies een leraar:</label>
            <select id="teacher" name="teacher" required>
                <!-- Vul deze dropdown met leraren met role 1 uit de database -->
                <!-- Voor nu laten we het handmatig ingevuld -->
                <option value="1">Leraar 1</option>
                <option value="2">Leraar 2</option>
                <!-- Voeg meer opties toe indien nodig -->
            </select>

            <!-- Hier komt de beschikbaarheidstabel -->
            <!-- Vul deze tabel met de beschikbaarheid van de geselecteerde leraar -->

            <label for="time">Kies een tijd:</label>
            <select id="time" name="time" required>
                <!-- Vul deze dropdown met beschikbare tijdsblokken van 15 minuten -->
                <option value="09:00">09:00 - 09:15</option>
                <option value="09:15">09:15 - 09:30</option>
                <!-- Voeg meer opties toe indien nodig -->
            </select>

            <label for="email">Jouw Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="comment">Opmerking:</label>
            <textarea id="comment" name="comment" rows="4"></textarea>

            <button type="submit">Afspraak Maken</button>
        </form>
    </div>
</body>
</html>
