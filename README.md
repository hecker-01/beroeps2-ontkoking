# Ontkoking - PHP Recipe Website

A Dutch recipe website built with PHP and organized using a view-based architecture.

## 🏗️ Project Structure

```
beroeps2-ontkoking/
├── index.php              # Main entry point
├── login.php              # Login page
├── config.php             # Site configuration
├── .htaccess             # Apache URL rewriting rules
├── data/
│   └── recipes.php       # Recipe data (can be replaced with database)
├── views/
│   ├── header.php        # Header component
│   ├── footer.php        # Footer component
│   ├── hero.php          # Hero section
│   ├── recipe-section.php # Recipe display section
│   └── reviews.php       # Reviews section
├── styles/
│   └── index.css         # Main stylesheet
├── scripts/
│   └── index.js          # JavaScript for theme toggle
└── images/               # Image assets

```

## 🚀 Getting Started

### Prerequisites
- PHP 7.4 or higher
- Apache web server (with mod_rewrite enabled)
- Or any PHP development environment (XAMPP, MAMP, WAMP, etc.)

### Installation

1. **Clone or download this repository**
   ```bash
   cd /Users/jesse/PhpstormProjects/beroeps2-ontkoking
   ```

2. **Start your PHP server**
   
   **Option A: Using built-in PHP server (for development)**
   ```bash
   php -S localhost:8000
   ```
   Then visit: http://localhost:8000

   **Option B: Using MAMP/XAMPP/WAMP**
   - Place the project in your htdocs/www folder
   - Access via http://localhost/beroeps2-ontkoking

   **Option C: Using Apache**
   - Configure a virtual host pointing to this directory
   - Make sure mod_rewrite is enabled

3. **Access the website**
   - Home page: http://localhost:8000/ (or your configured URL)
   - Login page: http://localhost:8000/login.php

## 📁 File Structure Explained

### Core Files

- **index.php**: Main entry point that includes all view components
- **config.php**: Contains site-wide configuration constants (paths, site name, etc.)
- **login.php**: Login page (form only, can be extended with authentication)

### Views (views/)

All view files are modular PHP components that can be included:

- **header.php**: Site header with navigation and theme toggle
- **footer.php**: Site footer with links and copyright
- **hero.php**: Hero section with main banner
- **recipe-section.php**: Displays recipe of the day
- **reviews.php**: Customer reviews section

### Data (data/)

- **recipes.php**: Contains functions that return recipe data
  - Can be replaced with database queries later

### Assets

- **styles/**: CSS files
- **scripts/**: JavaScript files
- **images/**: Image assets

## 🎨 Features

- ✅ Modular view-based architecture
- ✅ Dark/Light theme toggle with localStorage persistence
- ✅ Responsive design
- ✅ Clean URL structure with .htaccess
- ✅ Separated concerns (views, config, data)
- ✅ Easy to extend with more pages

## 🔧 Configuration

Edit `config.php` to modify:
- Site name
- Base paths
- Default theme
- Database settings (for future use)

## 📝 Adding New Pages

1. Create a new PHP file (e.g., `recipes.php`)
2. Include config and necessary views:
   ```php
   <?php
   require_once 'config.php';
   $pageTitle = 'All Recipes';
   include 'views/header.php';
   ?>
   
   <!-- Your page content here -->
   
   <?php include 'views/footer.php'; ?>
   ```

## 🗄️ Database Integration (Future)

The project is ready for database integration:
1. Uncomment database settings in `config.php`
2. Create a `db.php` file for database connection
3. Replace data functions in `data/recipes.php` with database queries

Example:
```php
function getRecipeOfTheDay() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM recipes ORDER BY created_at DESC LIMIT 1");
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
```

## 🎯 Next Steps

- [ ] Add database integration
- [ ] Implement user authentication
- [ ] Create recipe listing page
- [ ] Add recipe detail pages
- [ ] Implement search functionality
- [ ] Add user recipe submission
- [ ] Create admin panel

## 📄 License

See LICENSE file for details.

## 👥 Authors

SDO Team

---

**Note**: The original `index.html` file has been converted to a PHP-based system. The HTML file is kept for reference but is no longer the entry point.

