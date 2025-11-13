<?php
// Configuration
require_once 'config.php';

// Page variables
$pageTitle = 'Login - ' . SITE_NAME;
$currentPage = 'login';

// Include header
include 'views/header.php';
?>

<section class="login-section" style="max-width: 500px; margin: 4rem auto; padding: 2rem;">
    <div class="login-container" style="background-color: #424242; padding: 3rem; border-radius: 12px;">
        <h1 style="text-align: center; color: white; margin-bottom: 2rem;">Login</h1>
        <form action="process-login" method="POST" style="display: flex; flex-direction: column; gap: 1.5rem;">
            <div class="form-group">
                <label for="email" style="color: white; font-size: 1.1rem; display: block; margin-bottom: 0.5rem;">Email</label>
                <input type="email" id="email" name="email" required
                       style="width: 100%; padding: 0.75rem; border-radius: 8px; border: none; font-size: 1rem;">
            </div>
            <div class="form-group">
                <label for="password" style="color: white; font-size: 1.1rem; display: block; margin-bottom: 0.5rem;">Password</label>
                <input type="password" id="password" name="password" required
                       style="width: 100%; padding: 0.75rem; border-radius: 8px; border: none; font-size: 1rem;">
            </div>
            <button type="submit" class="btn btn-hero" style="width: 100%; margin-top: 1rem;">
                Login
            </button>
        </form>
    </div>
</section>

<?php
// Include footer
include 'views/footer.php';
?>

