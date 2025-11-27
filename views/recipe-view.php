<main class="recipe-detail">
  <section class="recipe-hero">
    <div class="recipe-media">
      <img
        src="<?php echo escape($recipe['image_url'] ?: IMAGES_PATH . 'spaghetti-bolognese.avif'); ?>"
        alt="<?php echo escape($recipe['title']); ?>"
        class="recipe-image"
      />
    </div>
    <div class="recipe-meta">
      <h1 class="recipe-title"><?php echo escape($recipe['title']); ?></h1>
      <div class="recipe-author">
        <img
          src="<?php echo IMAGES_PATH; ?>logo-lightmode.png"
          alt="<?php echo escape($recipe['author_name'] ?? 'Auteur'); ?>"
          class="author-avatar"
        />
        <div class="author-info">
          <span class="author-label">Gepost door</span>
          <span class="author-name"><?php echo escape($recipe['author_name'] ?? 'Onbekend'); ?></span>
        </div>
      </div>
      <p class="recipe-intro">
        <?php echo escape($recipe['description']); ?>
      </p>
      <div class="recipe-tags">
        <?php if (!empty($recipe['prep_time'])): ?>
          <span class="tag">⏱ <?php echo escape($recipe['prep_time']); ?></span>
        <?php endif; ?>
        <?php if (!empty($recipe['servings'])): ?>
          <span class="tag">👨‍👩‍👧 <?php echo escape($recipe['servings']); ?></span>
        <?php endif; ?>
        <span class="tag">⭐ <?php echo escape(ucfirst($recipe['difficulty'])); ?></span>
      </div>
    </div>
  </section>

  <section class="recipe-summary">
    <div class="summary-box">
      <h2>Over het gerecht</h2>
      <p>
        <?php echo escape($recipe['description']); ?>
      </p>
    </div>
  </section>

  <section class="recipe-info-grid">
    <div class="info-box">
      <h3>Ingrediënten</h3>
      <ul>
        <?php foreach ($ingredients as $ingredient): ?>
          <li><?php echo escape($ingredient); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="info-box">
      <h3>Bereidingswijze</h3>
      <ol>
        <?php foreach ($instructions as $step): ?>
          <li><?php echo escape($step); ?></li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>

  <section class="recipe-reviews">
    <header class="reviews-header">
      <h2>Reviews</h2>
      <p>Reviews worden toegevoegd zodra gebruikers feedback kunnen achterlaten.</p>
    </header>
    <div class="reviews-list">
      <article class="review-card">
        <div class="review-author">
          <img
            src="<?php echo IMAGES_PATH; ?>logo-lightmode.png"
            alt="Community"
            class="review-avatar"
          />
          <div>
            <span class="review-name">Community</span>
            <span class="review-date"><?php echo date('d M Y', strtotime($recipe['created_at'])); ?></span>
          </div>
        </div>
        <p>Dit recept is nog vers uit de keuken. Laat ons weten wat je ervan vindt!</p>
      </article>
    </div>
  </section>
</main>
