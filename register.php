<?php
require_once 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['password_confirm'];

    if ($password !== $passwordConfirm) {
        die("Hasla nie sa takie same.");
    }

    $mysqli = mysqli_connect($server, $user, $pass, $base);
    $query = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    echo "Rejestracja zakonczona sukcesem!";
}
?>