<?php
require_once __DIR__ . '/bootstrap.php';

$pageTitle = 'Alle Recepten - ' . SITE_NAME;
$currentPage = 'recipes';
$recipes = fetchAllRecipes();

include 'views/header.php';
?>

<section class="recipes-list-section">
    <div class="recipes-header">
        <h2>Ontdek</h2>
        <h1>Alle Recepten</h1>
        <p>Blader door de nieuwste creaties van ontkoking community.</p>
    </div>

    <?php if (empty($recipes)): ?>
        <div class="empty-state">
            <p>Er zijn nog geen recepten beschikbaar. Log in als admin om het eerste recept toe te voegen.</p>
        </div>
    <?php else: ?>
        <div class="recipes-grid">
            <?php foreach ($recipes as $recipe): ?>
                <article class="recipe-card">
                    <div class="recipe-card-image" style="background-image: url('<?php echo escape($recipe['image_url'] ?: IMAGES_PATH . 'spaghetti-bolognese.avif'); ?>');"></div>
                    <div class="recipe-card-body">
                        <div class="recipe-meta-line">
                            <span><?php echo escape(ucfirst($recipe['difficulty'])); ?></span>
                            <?php if (!empty($recipe['prep_time'])): ?>
                                <span>⏱ <?php echo escape($recipe['prep_time']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($recipe['servings'])): ?>
                                <span>👥 <?php echo escape($recipe['servings']); ?></span>
                            <?php endif; ?>
                        </div>
                        <h3><?php echo escape($recipe['title']); ?></h3>
                        <p><?php echo escape($recipe['description']); ?></p>
                        <div class="recipe-card-footer">
                            <div>
                                <small>Door <?php echo escape($recipe['author_name'] ?? 'Onbekend'); ?></small>
                                <small><?php echo date('d M Y', strtotime($recipe['created_at'])); ?></small>
                            </div>
                            <a href="recipe.php?id=<?php echo $recipe['id']; ?>" class="btn btn-hero">Bekijk recept</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?php
include 'views/footer.php';
?>
