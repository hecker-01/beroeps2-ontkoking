<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo STYLES_PATH; ?>index.css">
</head>
<body>
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <img src="<?php echo IMAGES_PATH; ?>logo-darkmode.png" alt="<?php echo SITE_NAME; ?> Logo" class="logo-img">
            </div>
            <nav class="nav-buttons">

                <div class="theme-toggle">
                    <input type="checkbox" id="theme-switch" class="theme-switch">
                    <label for="theme-switch" class="toggle-label">
                        <span class="toggle-icon moon">🌙</span>
                        <span class="toggle-circle"></span>
                        <span class="toggle-icon sun">☀️</span>
                    </label>
                </div>

                <a href="./login.php" class="btn btn-login">
                    <img src="<?php echo IMAGES_PATH; ?>user-login-2.png" alt="Login" class="login-icon">
                </a>

                <a href="./contact.php" class="btn btn-contact" style="text-decoration: none;">Contact</a>
            </nav>
        </div>
    </header>

