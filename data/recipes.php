<?php
// Sample recipe data structure
// In a real application, this would come from a database

function getRecipeOfTheDay() {
    return [
        'name' => 'Spaghetti Bolognese',
        'image' => 'images/spaghetti-bolognese.avif',
        'description' => 'Een klassiek Italiaans gerecht met een rijke vleessaus',
        'instructions' => [
            'Snijd ui, wortel, bleekselderij en knoflook fijn.',
            'Bak gehakt rul in olijfolie. Voeg groenten toe en bak 5 min.',
            'Voeg tomatenpuree, tomatenblokjes, bouillon, kruiden, zout en peper toe. Laat 20-30 min sudderen.',
            'Kook spaghetti volgens verpakking.',
            'Serveer spaghetti met saus en bestrooi met Parmezaanse kaas.'
        ],
        'ingredients' => [
            '400 g spaghetti',
            '300-400 g rundergehakt',
            '1 ui, 2 teentjes knoflook',
            '1 wortel, 1 stengel bleekselderij',
            '400 g tomatenblokjes, 2 el tomatenpuree',
            '100 ml bouillon, 100 ml rode wijn (optioneel)',
            '1 tl oregano, 1 tl basilicum',
            '2 el olijfolie, zout en peper',
            'Parmezaanse kaas (optioneel)'
        ]
    ];
}

function getReviews() {
    return [
        [
            'title' => 'Heeerlijken recepten',
            'text' => 'De recepten zijn fantastisch! Heel makkelijk te volgen en erg lekker.',
            'author' => 'Jan'
        ],
        [
            'title' => 'Makkelijk te vinden',
            'text' => 'Ik heb eindelijk een plek gevonden met duidelijke en heerlijke recepten.',
            'author' => 'Lisa'
        ],
        [
            'title' => 'makkelijk te begrijpen',
            'text' => 'De stap-voor-stap instructies zijn perfect. Mijn familie is fan!',
            'author' => 'Mark'
        ]
    ];
}

function getAllRecipes() {
    return [
        [
            'id' => 1,
            'name' => 'Spaghetti Bolognese',
            'image' => 'images/spaghetti-bolognese.avif',
            'category' => 'Italian',
            'difficulty' => 'easy'
        ],
        // Add more recipes here
    ];
}
?>

