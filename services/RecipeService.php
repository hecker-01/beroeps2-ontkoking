<?php

require_once __DIR__ . '/../database.php';

function fetchFeaturedRecipe(): ?array
{
    $pdo = getPDO();
    $stmt = $pdo->query('SELECT r.*, u.name as author_name FROM recipes r LEFT JOIN users u ON u.id = r.created_by ORDER BY r.created_at DESC LIMIT 1');
    return $stmt->fetch() ?: null;
}

function fetchAllRecipes(): array
{
    $pdo = getPDO();
    $stmt = $pdo->query('SELECT r.*, u.name AS author_name FROM recipes r LEFT JOIN users u ON u.id = r.created_by ORDER BY r.created_at DESC');
    return $stmt->fetchAll();
}

function fetchRecipeById(int $id): ?array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare('SELECT r.*, u.name AS author_name FROM recipes r LEFT JOIN users u ON u.id = r.created_by WHERE r.id = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch() ?: null;
}

function createRecipe(array $data, int $userId): int
{
    $pdo = getPDO();
    $stmt = $pdo->prepare(
        'INSERT INTO recipes (title, description, ingredients, instructions, image_url, difficulty, prep_time, servings, created_by, created_at)
         VALUES (:title, :description, :ingredients, :instructions, :image_url, :difficulty, :prep_time, :servings, :created_by, NOW())'
    );

    $stmt->execute([
        'title' => $data['title'],
        'description' => $data['description'],
        'ingredients' => $data['ingredients'],
        'instructions' => $data['instructions'],
        'image_url' => $data['image_url'],
        'difficulty' => $data['difficulty'],
        'prep_time' => $data['prep_time'],
        'servings' => $data['servings'],
        'created_by' => $userId,
    ]);

    return (int) $pdo->lastInsertId();
}

function splitTextToList(?string $text): array
{
    if (!$text) {
        return [];
    }

    $lines = preg_split('/\r\n|\r|\n/', $text);
    $lines = array_map('trim', $lines);
    return array_values(array_filter($lines));
}

?>

