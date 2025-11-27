<?php
require_once __DIR__ . '/bootstrap.php';
requireAdmin();

$pageTitle = 'Beheerpaneel - ' . SITE_NAME;
$currentPage = 'admin';
$recipes = fetchAllRecipes();

include 'views/header.php';
?>

<section class="admin-dashboard">
    <div class="admin-header">
        <h1>Beheerpaneel</h1>
        <p>Voeg nieuwe recepten toe en beheer bestaande inzendingen.</p>
    </div>

    <div class="admin-grid">
        <div class="admin-card">
            <h2>Nieuw recept</h2>
            <p>Vul de onderstaande velden in om een recept te publiceren.</p>
            <form action="process-recipe.php" method="POST" class="admin-form">
                <input type="hidden" name="csrf_token" value="<?php echo escape(csrf_token()); ?>">
                <div class="form-group">
                    <label for="title" class="form-label">Titel</label>
                    <input type="text" id="title" name="title" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Korte beschrijving</label>
                    <textarea id="description" name="description" class="form-input" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="ingredients" class="form-label">Ingrediënten (één per regel)</label>
                    <textarea id="ingredients" name="ingredients" class="form-input" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="instructions" class="form-label">Instructies (één stap per regel)</label>
                    <textarea id="instructions" name="instructions" class="form-input" rows="6" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image_url" class="form-label">Afbeeldings-URL</label>
                    <input type="url" id="image_url" name="image_url" class="form-input" placeholder="https://example.com/image.jpg">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="difficulty" class="form-label">Moeilijkheid</label>
                        <select id="difficulty" name="difficulty" class="form-input">
                            <option value="easy">Makkelijk</option>
                            <option value="medium" selected>Gemiddeld</option>
                            <option value="hard">Uitdagend</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prep_time" class="form-label">Bereidingstijd</label>
                        <input type="text" id="prep_time" name="prep_time" class="form-input" placeholder="45 minuten">
                    </div>
                    <div class="form-group">
                        <label for="servings" class="form-label">Porties</label>
                        <input type="text" id="servings" name="servings" class="form-input" placeholder="4 personen">
                    </div>
                </div>
                <button type="submit" class="btn btn-hero btn-auth">Recept publiceren</button>
            </form>
        </div>

        <div class="admin-card">
            <h2>Laatste recepten</h2>
            <?php if (empty($recipes)): ?>
                <p>Er zijn nog geen recepten toegevoegd.</p>
            <?php else: ?>
                <div class="admin-table">
                    <?php foreach ($recipes as $recipe): ?>
                        <article class="admin-recipe-row">
                            <div>
                                <h3><?php echo escape($recipe['title']); ?></h3>
                                <p><?php echo escape($recipe['description']); ?></p>
                                <small>Door <?php echo escape($recipe['author_name'] ?? 'Onbekend'); ?> op <?php echo date('d M Y', strtotime($recipe['created_at'])); ?></small>
                            </div>
                            <a href="recipe.php?id=<?php echo $recipe['id']; ?>" class="btn btn-contact">Bekijken</a>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
include 'views/footer.php';
?>

