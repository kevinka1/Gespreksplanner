<?php

class LoginController
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
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

            // Redirect to the dashboard or home page
            header('Location: dashboard.php');
            exit();
        } else {
            echo '<p class="error-message">Invalid username or password.</p>';
        }
    }
}
    