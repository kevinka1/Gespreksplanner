<?php
require_once("../database/db.php");

class LoginController
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=gespreksplanner;charset=utf8", 'root', '');
    }

    public function login($username, $password)
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE username = ? LIMIT 1');
        $query->execute([$username]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Set a session variable to indicate the user is logged in
            session_start();
            $_SESSION['user'] = $user['username'];
            $_SESSION['userRole'] = $user['Role'];
        
            // Redirect to the dashboard or home page
            header('Location: ../pages/dashboard.php');
            exit();
        } else {
            echo '<p class="error-message">Invalid username or password.</p>';
        }
        
    }
}
