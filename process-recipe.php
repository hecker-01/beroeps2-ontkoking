<?php
require_once __DIR__ . '/bootstrap.php';
requireAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('admin.php');
}

if (!validate_csrf($_POST['csrf_token'] ?? null)) {
    setFlash('error', 'Ongeldige sessie. Probeer opnieuw.');
    redirect('admin.php');
}

$payload = [
    'title' => trim($_POST['title'] ?? ''),
    'description' => trim($_POST['description'] ?? ''),
    'ingredients' => trim($_POST['ingredients'] ?? ''),
    'instructions' => trim($_POST['instructions'] ?? ''),
    'image_url' => trim($_POST['image_url'] ?? ''),
    'difficulty' => trim($_POST['difficulty'] ?? 'medium'),
    'prep_time' => trim($_POST['prep_time'] ?? ''),
    'servings' => trim($_POST['servings'] ?? ''),
];

$errors = [];

if (strlen($payload['title']) < 3) {
    $errors[] = 'Titel moet minimaal 3 tekens bevatten.';
}

if (strlen($payload['description']) < 10) {
    $errors[] = 'Beschrijving moet minimaal 10 tekens bevatten.';
}

if (strlen($payload['ingredients']) < 10) {
    $errors[] = 'Ingrediënten mogen niet leeg zijn.';
}

if (strlen($payload['instructions']) < 10) {
    $errors[] = 'Instructies mogen niet leeg zijn.';
}

if (!in_array($payload['difficulty'], ['easy', 'medium', 'hard'], true)) {
    $errors[] = 'Ongeldige moeilijkheidsgraad.';
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        setFlash('error', $error);
    }
    redirect('admin.php');
}

try {
    createRecipe($payload, currentUser()['id']);
    setFlash('success', 'Recept succesvol toegevoegd.');
} catch (Throwable $e) {
    setFlash('error', 'Kon recept niet opslaan: ' . $e->getMessage());
}

redirect('admin.php');
?>

