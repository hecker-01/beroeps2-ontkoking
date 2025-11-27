<?php
/**
 * Simple bootstrapper to share configuration, helpers and services
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/services/UserService.php';
require_once __DIR__ . '/services/RecipeService.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

