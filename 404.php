<?php
http_response_code(404);
require_once 'config.php';

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
    font-weight: bold;
    color: var(#ff6b6b);
    margin: 0;
    line-height: 1;
}

.error-container h2 {
    font-size: 2rem;
    margin: 1rem 0;
    color: var(#333);
}

.error-container p {
    font-size: 1.1rem;
    margin: 1rem 0;
    color: var(#666);
}

.error-nav {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-top: 2rem;
    flex-wrap: wrap;
}

.error-nav .btn {
    padding: 0.75rem 1.5rem;
    background-color: var(#ff6b6b);
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.error-nav .btn:hover {
    background-color: var(#ff5252);
}
</style>

<?php
include 'views/footer.php';
?>

