<?php
/**
 * Helper functions for the application
 */

/**
 * Sanitize output for HTML display
 */
function escape($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Check if current page matches
 */
function isCurrentPage($page) {
    global $currentPage;
    return isset($currentPage) && $currentPage === $page;
}

/**
 * Include a view file
 */
function view($viewName, $data = []) {
    extract($data);
    $viewPath = BASE_PATH . '/views/' . $viewName . '.php';
    if (file_exists($viewPath)) {
        include $viewPath;
    } else {
        echo "View '{$viewName}' not found.";
    }
}

/**
 * Redirect to another page
 */
function redirect($url) {
    header("Location: {$url}");
    exit;
}

/**
 * Get asset URL
 */
function asset($path) {
    return SITE_URL . '/' . ltrim($path, '/');
}

