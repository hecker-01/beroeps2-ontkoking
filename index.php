<?php
require_once 'config.php';
// Configuration

$currentPage = 'home';
$pageTitle = 'Ontkoking - Vindt hier al je recepten!';
// Page variables

include 'views/header.php';
// Include header

include 'views/hero.php';
// Include hero section

include 'views/recipe-section.php';
// Include content section (recipe of the day)

include 'views/reviews.php';
// Include reviews section

include 'views/footer.php';
// Include footer
?>


