CREATE DATABASE IF NOT EXISTS ontkoking DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ontkoking;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(190) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS recipes (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(190) NOT NULL,
    description TEXT NOT NULL,
    ingredients MEDIUMTEXT NOT NULL,
    instructions MEDIUMTEXT NOT NULL,
    image_url VARCHAR(255) DEFAULT NULL,
    difficulty ENUM('easy', 'medium', 'hard') NOT NULL DEFAULT 'medium',
    prep_time VARCHAR(60) DEFAULT NULL,
    servings VARCHAR(60) DEFAULT NULL,
    created_by INT UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_recipes_user FOREIGN KEY (created_by) REFERENCES users (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed admin user (password: admin123)
INSERT INTO users (name, email, password_hash, role)
VALUES ('Admin', 'admin@ontkoking.test', '$2y$12$MUeUfIFxTQkkWgHOriCX7uMetZKg1lb1n02aUY5361gQrKE.dyEcq', 'admin')
ON DUPLICATE KEY UPDATE email = email;

