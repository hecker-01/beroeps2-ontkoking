<?php

// Ensure session availability across the app
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Site configuration
const SITE_NAME = 'Ontkoking';
const SITE_URL = 'http://localhost';

// Path configuration
const BASE_PATH = __DIR__;
const IMAGES_PATH = 'images/';
const STYLES_PATH = 'styles/';
const SCRIPTS_PATH = 'scripts/';
const DATA_PATH = __DIR__ . '/data/';
const USER_DATA_FILE = DATA_PATH . 'users.json';


// Default settings
const DEFAULT_THEME = 'dark';

// Database configuration (for future use)
// define('DB_HOST', 'localhost');
// define('DB_NAME', 'ontkoking');
// define('DB_USER', 'root');
// define('DB_PASS', '');

require_once __DIR__ . '/helpers.php';
?>