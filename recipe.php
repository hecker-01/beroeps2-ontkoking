<?php
// Configuration
require_once 'config.php';
require_once 'helpers.php';
require_once 'data/recipes.php';

// Page variables
$pageTitle = 'All Recipes - ' . SITE_NAME;
$currentPage = 'recipes';

// Get all recipes
$recipes = getAllRecipes();

// Include header
include 'views/header.php';
// Include recipe view
include 'views/recipe-view.php';
// Include footer
include 'views/footer.php';
?>

