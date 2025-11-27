# Ontkoking - PHP Recipe Platform

Modernized Dutch recipe portal with authentication, admin tooling and a MariaDB backend.

## 🏗️ Project Structure

```
beroeps2-ontkoking/
├── index.php              # Landing page (hero + featured recipe + reviews)
├── recipes.php            # Grid with all recipes from the database
├── recipe.php             # Detailed recipe view
├── login.php / register.php / logout.php
├── admin.php              # Admin panel (protected)
├── bootstrap.php          # Loads config, helpers, DB connection and services
├── config.php             # Global constants + DB credentials
├── database/
│   └── schema.sql         # MariaDB schema (users + recipes)
├── services/
│   ├── UserService.php
│   └── RecipeService.php
├── views/                 # Header, footer, hero, recipe sections, etc.
├── styles/                # Global CSS
├── scripts/               # Theme toggle JS
└── images/                # Static assets
```

## 🚀 Getting Started

### Prerequisites
- PHP 8.1+ with PDO & mysqli extensions
- MariaDB (or MySQL) reachable at `127.0.0.1:3306`
- Any local web server (built-in PHP server, MAMP/XAMPP, Apache, …)

### Installation
1. **Clone the repository**
   ```bash
   cd /Users/jesse/IdeaProjects/beroeps2-ontkoking
   ```
2. **Create the database + tables**
   ```bash
   mysql -u root -p < database/schema.sql
   ```
   This creates the required `users` and `recipes` tables and seeds an admin account:  
   `admin@ontkoking.test` / `admin123`.
3. **Configure DB access (optional)**
   Update `config.php` if your MariaDB host, port or credentials differ.
4. **Start the development server**
   ```bash
   php -S localhost:8000
   ```
   Browse to:
   - Home: http://localhost:8000/
   - Login: http://localhost:8000/login.php
   - Admin: http://localhost:8000/admin.php (after signing in as admin)

## 📁 Key Components

- **bootstrap.php** – central include that loads config, helpers, database connection, services and starts the session.
- **services/UserService.php** – all user/account DB operations (register, login, role checks).
- **services/RecipeService.php** – CRUD helpers for recipes, including featured recipe selection.
- **views/header.php / footer.php** – shared layout with navigation, flash messages and script loading.
- **process-\*** scripts – controllers that handle login, registration, logout and recipe creation with CSRF validation.

## 🎨 Features

- ✅ Secure login & registration with bcrypt hashed passwords
- ✅ CSRF-protected forms and flash messaging
- ✅ Role-based admin panel to add new recipes
- ✅ Recipes list + detail view powered by MariaDB
- ✅ Responsive layout with dark/light toggle persisted in localStorage
- ✅ Clean helper/service architecture with a single bootstrap entry

## 🔧 Configuration

`config.php` exposes the knobs you’re most likely to touch:

```php
const DB_HOST = '127.0.0.1';
const DB_PORT = 3306;
const DB_NAME = 'ontkoking';
const DB_USER = 'root';
const DB_PASS = '';
```

Change these to match your local environment, then reload the app.

## 🗄️ Database

We intentionally keep it to **two tables**:

- `users`: name, email, bcrypt hash, role (`user` or `admin`)
- `recipes`: title, description, ingredients (newline separated), instructions, metadata + foreign key to the author

Import `database/schema.sql` to create everything. Need another admin later?:

```sql
UPDATE users SET role = 'admin' WHERE email = 'you@example.com';
```

## 📝 Adding New Pages

Every page follows the same pattern:

```php
<?php
require_once __DIR__ . '/bootstrap.php';
$pageTitle = 'My new page';
include 'views/header.php';
?>

<!-- page content -->

<?php include 'views/footer.php'; ?>
```

Use the services (`fetchAllRecipes()`, `fetchRecipeById()`, etc.) to access data safely.

## 🎯 Next Steps / Ideas

- [ ] Recipe search & filtering
- [ ] User-submitted reviews/comments
- [ ] Image uploads + media management
- [ ] Automated feature tests for services/controllers

## 📄 License

See `LICENSE` for details.

