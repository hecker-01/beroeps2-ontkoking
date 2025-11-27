<?php
require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('login.php');
}

if (!validate_csrf($_POST['csrf_token'] ?? null)) {
    setFlash('error', 'Ongeldige sessie. Probeer opnieuw.');
    redirect('login.php');
}

$email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    setFlash('error', 'Vul zowel je e-mailadres als wachtwoord in.');
    redirect('login.php');
}

$user = verifyUserCredentials($email, $password);

if (!$user) {
    setFlash('error', 'Onjuiste inloggegevens.');
    redirect('login.php');
}

loginUser($user);
setFlash('success', 'Welkom terug, ' . $user['name'] . '!');

redirect(isAdmin() ? 'admin.php' : 'index.php');
?>

