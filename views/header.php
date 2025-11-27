<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? escape($pageTitle) : SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo STYLES_PATH; ?>index.css">
</head>
<body>
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <a href="index.php" class="logo-link" aria-label="Ga naar home">
                    <img src="<?php echo IMAGES_PATH; ?>logo-darkmode.png" alt="<?php echo SITE_NAME; ?> Logo" class="logo-img">
                </a>
            </div>
            <nav class="nav-buttons">
                <a href="index.php" class="nav-link <?php echo isCurrentPage('home') ? 'active' : ''; ?>">Home</a>
                <a href="recipes.php" class="nav-link <?php echo isCurrentPage('recipes') ? 'active' : ''; ?>">Recepten</a>
                <a href="contact.php" class="nav-link <?php echo isCurrentPage('contact') ? 'active' : ''; ?>">Contact</a>
                <?php if (isAdmin()): ?>
                    <a href="admin.php" class="nav-link <?php echo isCurrentPage('admin') ? 'active' : ''; ?>">Admin</a>
                <?php endif; ?>
                <div class="theme-toggle">
                    <input type="checkbox" id="theme-switch" class="theme-switch">
                    <label for="theme-switch" class="toggle-label">
                        <span class="toggle-icon moon">🌙</span>
                        <span class="toggle-circle"></span>
                        <span class="toggle-icon sun">☀️</span>
                    </label>
                </div>
                <?php if (isLoggedIn()): ?>
                    <form action="logout.php" method="POST" class="logout-form">
                        <input type="hidden" name="csrf_token" value="<?php echo escape(csrf_token()); ?>">
                        <button type="submit" class="btn btn-contact">Logout</button>
                    </form>
                <?php else: ?>
                    <a href="login.php" class="btn btn-login">
                        <img src="<?php echo IMAGES_PATH; ?>user-login-2.png" alt="Login" class="login-icon">
                    </a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <?php $flashes = getFlashes(); ?>
    <?php if (!empty($flashes)): ?>
        <section class="flash-container">
            <?php foreach ($flashes as $type => $messages): ?>
                <?php foreach ($messages as $message): ?>
                    <div class="flash-message flash-<?php echo escape($type); ?>">
                        <?php echo escape($message); ?>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>
