<?php
require_once 'config.php';

$pageTitle = 'Registreren - ' . SITE_NAME;
$currentPage = 'register';

include 'views/header.php';

$error = getFlash('error');
$success = getFlash('success');
?>

<section class="login-section" style="max-width: 500px; margin: 4rem auto; padding: 2rem;">
    <div class="login-container" style="background-color: #424242; padding: 3rem; border-radius: 12px;">
        <h1 style="text-align: center; color: white; margin-bottom: 2rem;">Account aanmaken</h1>

        <?php if ($error): ?>
            <div style="background: #ff5c5c; color: white; padding: 0.75rem 1rem; border-radius: 8px; margin-bottom: 1rem;">
                <?php echo escape($error); ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div style="background: #4caf50; color: white; padding: 0.75rem 1rem; border-radius: 8px; margin-bottom: 1rem;">
                <?php echo escape($success); ?>
            </div>
        <?php endif; ?>

        <form action="process-register.php" method="POST" style="display: flex; flex-direction: column; gap: 1.5rem;">
            <div class="form-group">
                <label for="name" style="color: white; font-size: 1.1rem; display: block; margin-bottom: 0.5rem;">Naam</label>
                <input type="text" id="name" name="name" required
                       value="<?php echo isset($_SESSION['old']['name']) ? escape($_SESSION['old']['name']) : ''; ?>"
                       style="width: 100%; padding: 0.75rem; border-radius: 8px; border: none; font-size: 1rem;">
            </div>
            <div class="form-group">
                <label for="email" style="color: white; font-size: 1.1rem; display: block; margin-bottom: 0.5rem;">Email</label>
                <input type="email" id="email" name="email" required
                       value="<?php echo isset($_SESSION['old']['email']) ? escape($_SESSION['old']['email']) : ''; ?>"
                       style="width: 100%; padding: 0.75rem; border-radius: 8px; border: none; font-size: 1rem;">
            </div>
            <div class="form-group">
                <label for="password" style="color: white; font-size: 1.1rem; display: block; margin-bottom: 0.5rem;">Wachtwoord</label>
                <input type="password" id="password" name="password" required minlength="6"
                       style="width: 100%; padding: 0.75rem; border-radius: 8px; border: none; font-size: 1rem;">
            </div>
            <div class="form-group">
                <label for="password_confirmation" style="color: white; font-size: 1.1rem; display: block; margin-bottom: 0.5rem;">Bevestig wachtwoord</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required minlength="6"
                       style="width: 100%; padding: 0.75rem; border-radius: 8px; border: none; font-size: 1rem;">
            </div>
            <button type="submit" class="btn btn-hero" style="width: 100%; margin-top: 1rem;">
                Registreren
            </button>
        </form>
        <p style="color: white; text-align: center; margin-top: 1.5rem;">
            Heb je al een account? <a href="login.php" style="color: #ffb74d;">Inloggen</a>
        </p>
    </div>
</section>

<?php
unset($_SESSION['old']);
include 'views/footer.php';
?>
