<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('login.php');
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$_SESSION['old'] = [
    'email' => $email
];

if ($email === '' || $password === '') {
    setFlash('error', 'Vul je e-mailadres en wachtwoord in.');
    redirect('login.php');
}

$user = authenticateUser($email, $password);

if (!$user) {
    setFlash('error', 'Onjuiste combinatie van e-mail en wachtwoord.');
    redirect('login.php');
}

loginUser($user);
unset($_SESSION['old']);
setFlash('success', 'Welkom terug, ' . $user['name'] . '!');
redirect('index.php');
