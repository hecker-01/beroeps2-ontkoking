<?php
/**
 * Global site configuration
 */

const SITE_NAME = 'Ontkoking';
const SITE_URL = 'https://101729.stu.sd-lab.nl/beroeps2-ontkoking';

require_once __DIR__ . '/db_password.php';

// Path configuration
const BASE_PATH = __DIR__;
const IMAGES_PATH = 'images/';
const STYLES_PATH = 'styles/';
const SCRIPTS_PATH = 'scripts/';

// Default settings
const DEFAULT_THEME = 'dark';

// Database configuration (MariaDB on localhost)
const DB_HOST = 'localhost';
const DB_PORT = 3306;
const DB_NAME = 'stu_101729';
const DB_USER = 'db101729';
?>