<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('register.php');
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$passwordConfirmation = $_POST['password_confirmation'] ?? '';

$_SESSION['old'] = [
    'name' => $name,
    'email' => $email
];

if ($name === '' || $email === '' || $password === '') {
    setFlash('error', 'Alle velden zijn verplicht.');
    redirect('register.php');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setFlash('error', 'Voer een geldig e-mailadres in.');
    redirect('register.php');
}

if (strlen($password) < 6) {
    setFlash('error', 'Het wachtwoord moet minimaal 6 tekens bevatten.');
    redirect('register.php');
}

if ($password !== $passwordConfirmation) {
    setFlash('error', 'De wachtwoorden komen niet overeen.');
    redirect('register.php');
}

if (!registerUser($name, $email, $password)) {
    setFlash('error', 'Dit e-mailadres is al geregistreerd.');
    redirect('register.php');
}

unset($_SESSION['old']);
setFlash('success', 'Registratie geslaagd! Je kunt nu inloggen.');
redirect('login.php');
