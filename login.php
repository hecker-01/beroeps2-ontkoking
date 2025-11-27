<?php
require_once __DIR__ . '/bootstrap.php';

$pageTitle = 'Login - ' . SITE_NAME;
$currentPage = 'login';

include 'views/header.php';
?>

<section class="auth-section">
    <div class="auth-container">
        <h1 class="auth-title">Login</h1>
        <form action="process-login.php" method="POST" class="auth-form">
            <input type="hidden" name="csrf_token" value="<?php echo escape(csrf_token()); ?>">
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Wachtwoord</label>
                <input type="password" id="password" name="password" class="form-input" required>
            </div>
            <button type="submit" class="btn btn-hero btn-auth">
                Login
            </button>
            <div class="auth-link">
                <p>Nog geen account? <a href="register.php">Maak er een aan</a></p>
            </div>
        </form>
    </div>
</section>

<?php
include 'views/footer.php';
?>
