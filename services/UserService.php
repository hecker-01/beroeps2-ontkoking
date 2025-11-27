<?php

require_once __DIR__ . '/../database.php';

function findUserByEmail(string $email): ?array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
    $stmt->execute(['email' => $email]);

    return $stmt->fetch() ?: null;
}

function createUser(string $name, string $email, string $password): ?array
{
    $pdo = getPDO();

    $stmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    if ($stmt->fetchColumn() > 0) {
        return null;
    }

    $hash = password_hash($password, PASSWORD_BCRYPT);
    $insert = $pdo->prepare(
        'INSERT INTO users (name, email, password_hash, role, created_at)
         VALUES (:name, :email, :password_hash, :role, NOW())'
    );

    $insert->execute([
        'name' => $name,
        'email' => $email,
        'password_hash' => $hash,
        'role' => 'user',
    ]);

    $userId = (int) $pdo->lastInsertId();
    return [
        'id' => $userId,
        'name' => $name,
        'email' => $email,
        'role' => 'user',
    ];
}

function verifyUserCredentials(string $email, string $password): ?array
{
    $user = findUserByEmail($email);
    if (!$user || empty($user['password_hash'])) {
        return null;
    }

    if (!password_verify($password, $user['password_hash'])) {
        return null;
    }

    return $user;
}

