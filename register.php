<?php
// Configuration
require_once 'config.php';

// Page variables
$pageTitle = 'Account Aanmaken - ' . SITE_NAME;
$currentPage = 'register';

// Include header
include 'views/header.php';
?>

<section class="auth-section">
    <div class="auth-container">
        <h1 class="auth-title">Account Aanmaken</h1>
        <form action="process-register" method="POST" class="auth-form">
            <div class="form-group">
                <label for="name" class="form-label">Gebruikersnaam</label>
                <input type="text" id="name" name="name" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Wachtwoord</label>
                <input type="password" id="password" name="password" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="confirm_password" class="form-label">Bevestig Wachtwoord</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-input" required>
            </div>
            <button type="submit" class="btn btn-hero btn-auth">
                Account Aanmaken
            </button>
            <div class="auth-link">
                <p>Al een account? <a href="login.php">Log hier in</a></p>
            </div>
        </form>
    </div>
</section>

<?php
// Include footer
include 'views/footer.php';
?>
