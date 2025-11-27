<?php
require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && validate_csrf($_POST['csrf_token'] ?? null)) {
    logoutUser();
    setFlash('success', 'Je bent uitgelogd.');
}

redirect('index.php');
?>

