<?php
require_once("../controllers/LoginController.php");

$LoginController = new LoginController();

if (isset($_POST['username'], $_POST['password'])) {
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    $LoginController->login($Username, $Password, $role);
}
?>