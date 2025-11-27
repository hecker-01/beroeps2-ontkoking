<?php
http_response_code(404);
require_once __DIR__ . '/bootstrap.php';

$currentPage = '404';
$pageTitle = '404 - Pagina niet gevonden | Ontkoking';

include 'views/header.php';
?>

<main class="error-page">
    <div class="error-container">
        <h1>404</h1>
        <h2>Oeps! Pagina niet gevonden</h2>
        <p>De pagina die je zoekt bestaat niet of is verplaatst.</p>
        <p>Misschien vind je wat je zoekt op één van deze pagina's:</p>
        <nav class="error-nav">
            <a href="/" class="btn">Terug naar home</a>
            <a href="/recipes" class="btn">Bekijk recepten</a>
            <a href="/contact" class="btn">Contact</a>
        </nav>
    </div>
</main>

<style>
.error-page {
    min-height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
    text-align: center;
}

.error-container {
    max-width: 600px;
}

.error-container h1 {
    font-size: 8rem;
    font-weight: 700;
    color: #ff6b6b;
    margin: 0;
}

.error-container h2 {
    margin: 1rem 0 0.5rem 0;
}

.error-nav {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-top: 2rem;
    flex-wrap: wrap;
}

.error-nav .btn {
    padding: 0.85rem 1.75rem;
    background-color: #424242;
    color: #fff;
    border-radius: 999px;
    text-decoration: none;
    transition: transform 0.3s ease, background-color 0.3s ease;
}

.error-nav .btn:hover {
    transform: translateY(-2px);
    background-color: #616161;
}

@media (max-width: 600px) {
    .error-container h1 {
        font-size: 5rem;
    }
}
</style>

<?php
include 'views/footer.php';
?>

