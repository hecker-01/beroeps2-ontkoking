    <section class="content-section">
        <div class="Text">
            <h2>Nieuws</h2>
            <h1>Recept van de dag</h1>
        </div>

        <?php if ($featuredRecipe): ?>
            <div class="upper-content" style="background-image: url('<?php echo escape($featuredRecipe['image_url'] ?: IMAGES_PATH . 'spaghetti-bolognese.avif'); ?>');">
                <p class="upper-text"><?php echo escape($featuredRecipe['title']); ?></p>
            </div>

            <div class="lower-content">
                <div class="lower-box">
                    <h3><?php echo escape($featuredRecipe['title']); ?> – Bereidingswijze</h3>
                    <?php foreach (array_slice(splitTextToList($featuredRecipe['instructions']), 0, 5) as $index => $step): ?>
                        <p><?php echo ($index + 1) . '. ' . escape($step); ?></p>
                    <?php endforeach; ?>
                    <a href="recipe.php?id=<?php echo $featuredRecipe['id']; ?>" class="inline-link">Bekijk volledige recept</a>
                </div>
                <div class="lower-box">
                    <h3>Ingrediënten</h3>
                    <ul>
                        <?php foreach (array_slice(splitTextToList($featuredRecipe['ingredients']), 0, 8) as $ingredient): ?>
                            <li><?php echo escape($ingredient); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <p>Er is nog geen recept van de dag. Voeg het eerste recept toe via het adminpaneel.</p>
            </div>
        <?php endif; ?>
    </section>
