<?php
require_once __DIR__ . '/bootstrap.php';

$pageTitle = 'Contact - ' . SITE_NAME;
$currentPage = 'contact';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validate_csrf($_POST['csrf_token'] ?? null)) {
        setFlash('error', 'Ongeldige sessie. Probeer opnieuw.');
    } else {
        $name = trim($_POST['name'] ?? '');
        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
        $subject = trim($_POST['subject'] ?? '');
        $message = trim($_POST['message'] ?? '');

        if ($name && $email && $subject && $message) {
            setFlash('success', 'Bedankt! We nemen zo snel mogelijk contact met je op.');
        } else {
            setFlash('error', 'Vul alle velden correct in.');
        }
    }

    redirect('contact.php');
}

include 'views/header.php';
?>

<section class="contact-section">
    <div class="contact-header">
        <h2>Neem contact op</h2>
        <h1>We horen graag van je</h1>
        <p>Heb je vragen of feedback? Laat het ons weten.</p>
    </div>

    <div class="contact-form-container">
        <form action="contact.php" method="POST" class="contact-form">
            <input type="hidden" name="csrf_token" value="<?php echo escape(csrf_token()); ?>">
            <div class="form-group">
                <label for="name" class="form-label">Naam</label>
                <input type="text" id="name" name="name" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="subject" class="form-label">Onderwerp</label>
                <input type="text" id="subject" name="subject" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="message" class="form-label">Bericht</label>
                <textarea id="message" name="message" rows="6" class="form-input" required></textarea>
            </div>

            <button type="submit" class="btn btn-hero btn-auth">
                Verstuur bericht
            </button>
        </form>
    </div>

    <div class="contact-info">
        <div>
            <h3>📧 Email</h3>
            <p>info@ontkoking.nl</p>
        </div>
        <div>
            <h3>📞 Telefoon</h3>
            <p>+31 20 123 4567</p>
        </div>
        <div>
            <h3>📍 Locatie</h3>
            <p>Amsterdam, Nederland</p>
        </div>
    </div>
</section>

<?php
include 'views/footer.php';
?>
