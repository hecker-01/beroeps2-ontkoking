<?php
require_once __DIR__ . '/bootstrap.php';

$currentPage = 'recipes';
$recipeId = isset($_GET['id']) ? (int) $_GET['id'] : null;

if (!$recipeId) {
    require __DIR__ . '/404.php';
    exit;
}

$recipe = fetchRecipeById($recipeId);

if (!$recipe) {
    require __DIR__ . '/404.php';
    exit;
}

$pageTitle = $recipe['title'] . ' - ' . SITE_NAME;
$ingredients = splitTextToList($recipe['ingredients']);
$instructions = splitTextToList($recipe['instructions']);

include 'views/header.php';
include 'views/recipe-view.php';
include 'views/footer.php';
?>
