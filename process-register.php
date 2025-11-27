<?php
require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('register.php');
}

if (!validate_csrf($_POST['csrf_token'] ?? null)) {
    setFlash('error', 'Ongeldige sessie. Probeer opnieuw.');
    redirect('register.php');
}

$name = trim($_POST['name'] ?? '');
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

$errors = [];

if (strlen($name) < 3) {
    $errors[] = 'Naam moet minimaal 3 tekens bevatten.';
}

if (!$email) {
    $errors[] = 'Voer een geldig e-mailadres in.';
}

if (strlen($password) < 8) {
    $errors[] = 'Wachtwoord moet minimaal 8 tekens bevatten.';
}

if ($password !== $confirmPassword) {
    $errors[] = 'Wachtwoorden komen niet overeen.';
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        setFlash('error', $error);
    }
    redirect('register.php');
}

$user = createUser($name, $email, $password);

if (!$user) {
    setFlash('error', 'Dit e-mailadres is al geregistreerd.');
    redirect('register.php');
}

setFlash('success', 'Account aangemaakt! Je kunt nu inloggen.');
redirect('login.php');
?>

