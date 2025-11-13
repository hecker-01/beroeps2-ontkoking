<?php
// Configuration
require_once 'config.php';
require_once 'helpers.php';

// Page variables
$pageTitle = 'Contact - ' . SITE_NAME;
$currentPage = 'contact';

// Include header
include 'views/header.php';
?>

<section class="contact-section" style="max-width: 800px; margin: 4rem auto; padding: 0 1.5rem;">
    <div class="contact-header" style="text-align: center; margin-bottom: 3rem;">
        <h2 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #e0e0e0;">Get in Touch</h2>
        <h1 style="font-size: 2.5rem; margin: 0; color: #e0e0e0;">Contact Us</h1>
        <p style="color: #aaa; margin-top: 1rem; font-size: 1.1rem;">
            Heeft u vragen? We horen graag van u!
        </p>
    </div>

    <div class="contact-form-container" style="background-color: #424242; padding: 3rem; border-radius: 12px;">
        <form action="process-contact" method="POST" style="display: flex; flex-direction: column; gap: 1.5rem;">
            <div class="form-group">
                <label for="name" style="color: white; font-size: 1.1rem; display: block; margin-bottom: 0.5rem;">
                    Name
                </label>
                <input type="text" id="name" name="name" required
                       style="width: 100%; padding: 0.75rem; border-radius: 8px; border: none; font-size: 1rem;">
            </div>

            <div class="form-group">
                <label for="email" style="color: white; font-size: 1.1rem; display: block; margin-bottom: 0.5rem;">
                    Email
                </label>
                <input type="email" id="email" name="email" required
                       style="width: 100%; padding: 0.75rem; border-radius: 8px; border: none; font-size: 1rem;">
            </div>

            <div class="form-group">
                <label for="subject" style="color: white; font-size: 1.1rem; display: block; margin-bottom: 0.5rem;">
                    Subject
                </label>
                <input type="text" id="subject" name="subject" required
                       style="width: 100%; padding: 0.75rem; border-radius: 8px; border: none; font-size: 1rem;">
            </div>

            <div class="form-group">
                <label for="message" style="color: white; font-size: 1.1rem; display: block; margin-bottom: 0.5rem;">
                    Message
                </label>
                <textarea id="message" name="message" rows="6" required
                          style="width: 100%; padding: 0.75rem; border-radius: 8px; border: none; font-size: 1rem; resize: vertical;"></textarea>
            </div>

            <button type="submit" class="btn btn-hero" style="width: 100%; margin-top: 1rem;">
                Send Message
            </button>
        </form>
    </div>

    <div class="contact-info" style="margin-top: 3rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
        <div style="text-align: center; padding: 2rem; background-color: #424242; border-radius: 12px;">
            <h3 style="color: white; margin-bottom: 1rem;">📧 Email</h3>
            <p style="color: #aaa;">info@ontkoking.nl</p>
        </div>
        <div style="text-align: center; padding: 2rem; background-color: #424242; border-radius: 12px;">
            <h3 style="color: white; margin-bottom: 1rem;">📞 Phone</h3>
            <p style="color: #aaa;">+31 20 123 4567</p>
        </div>
        <div style="text-align: center; padding: 2rem; background-color: #424242; border-radius: 12px;">
            <h3 style="color: white; margin-bottom: 1rem;">📍 Location</h3>
            <p style="color: #aaa;">Amsterdam, Netherlands</p>
        </div>
    </div>
</section>

<?php
// Include footer
include 'views/footer.php';
?>

