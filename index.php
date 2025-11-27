<?php
require_once __DIR__ . '/bootstrap.php';

$currentPage = 'home';
$pageTitle = 'Ontkoking - Vind hier al je recepten!';

$featuredRecipe = fetchFeaturedRecipe();

include 'views/header.php';
include 'views/hero.php';
include 'views/recipe-section.php';
include 'views/reviews.php';
include 'views/footer.php';
?>
