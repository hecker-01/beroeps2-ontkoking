<?php
// Configuration
require_once 'config.php';
require_once 'helpers.php';
require_once 'data/recipes.php';

// Page variables
$pageTitle = 'All Recipes - ' . SITE_NAME;
$currentPage = 'recipes';

// Get all recipes
$recipes = getAllRecipes();

// Include header
include 'views/header.php';
?>

<section class="recipes-list-section" style="max-width: 1200px; margin: 4rem auto; padding: 0 1.5rem;">
    <div class="recipes-header" style="text-align: center; margin-bottom: 3rem;">
        <h2 style="font-size: 1.5rem; margin-bottom: 0.5rem;">Ontdek</h2>
        <h1 style="font-size: 2.5rem; margin: 0;">Alle Recepten</h1>
    </div>

    <div class="recipes-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
        <?php foreach ($recipes as $recipe): ?>
            <div class="recipe-card" style="background-color: #424242; border-radius: 12px; overflow: hidden; transition: transform 0.3s ease;">
                <img src="<?php echo escape($recipe['image']); ?>"
                     alt="<?php echo escape($recipe['name']); ?>"
                     style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h3 style="color: white; margin: 0 0 1rem 0; font-size: 1.3rem;">
                        <?php echo escape($recipe['name']); ?>
                    </h3>
                    <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                        <span style="color: #aaa; font-size: 0.9rem;">
                            📁 <?php echo escape($recipe['category']); ?>
                        </span>
                        <span style="color: #aaa; font-size: 0.9rem;">
                            ⭐ <?php echo escape($recipe['difficulty']); ?>
                        </span>
                    </div>
                    <a href="recipe.php?id=<?php echo $recipe['id']; ?>"
                       class="btn btn-hero"
                       style="display: inline-block; text-decoration: none; padding: 0.75rem 1.5rem;">
                        View Recipe
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php
// Include footer
include 'views/footer.php';
?>

