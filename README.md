# 🚀 CodeFram – Lightweight PHP Framework

CodeFram is a lightweight PHP framework inspired by **Laravel**, built to help developers understand the internals of modern PHP frameworks.  
It comes with **MVC architecture, routing, a Blade-like template engine, and a clean project structure**.

---

## ✨ Features
- 🔹 **MVC Architecture** – Separation of Models, Views, and Controllers  
- 🔹 **Routing System** – Define clean GET/POST routes  
- 🔹 **Template Engine (CodeFram Template)** – Similar to Laravel Blade (`{{ }}` syntax, sections, layouts)  
- 🔹 **Database Layer** – PDO-based ORM-like query builder  
- 🔹 **Middleware Support** – Pre-request logic made easy  
- 🔹 **Environment Config** – `.env` file for flexible settings  
- 🔹 **Error Handling** – Custom exception handler  

---

## 📂 Project Structure
```
app/               # Application (Controllers, Models, Core classes)
public/            # Public folder (entry point & assets)
   ├── index.php   # Main entry file
   ├── assets/     # CSS, JS, images
routes/            # Route definitions
vendor/            # Composer dependencies
views/             # Blade-like templates
.env               # Environment configuration
composer.json      # Composer autoload & scripts
composer.lock      # Composer lock file
```

---

## ⚡ Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/jahid-facts/codefram.git
   cd codefram
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Configure your `.env` file:
   ```env
   APP_NAME=CodeFram
   APP_ENV=local
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=codefram_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

---

## ▶️ Running the Project
Start the development server with:

```bash
composer serve
```

This runs:

```bash
php -S localhost:8000 -t public
```

Now open: [http://localhost:8000](http://localhost:8000)

---

## 🖥️ Example Usage

### ✅ Route
```php
// routes/web.php
use Core\Routing\Route;

Route::get('/', 'HomeController@index');
Route::post('/contact', 'ContactController@store');
```

### ✅ Controller
```php
// app/Controllers/HomeController.php
namespace App\Controllers;

use Core\Controller\Controller;

class HomeController extends Controller {
    public function index() {
        return view('home', ['title' => 'Welcome to CodeFram 🚀']);
    }
}
```

### ✅ Template
```html
<!-- views/home.fram.php -->
@extends('layouts.master')

@section('content')
    <h1>{{ $title }}</h1>
    <p>This page is rendered with CodeFram Template Engine 🚀</p>
@endsection
```

---

## 📌 Roadmap
- [ ] Authentication system  
- [ ] CLI commands (migrations, cache clear)  
- [ ] Advanced ORM features  
- [ ] Package management system  

---

## 🤝 Contribution
Contributions are welcome! Please submit issues and pull requests.

---

## 📄 License
CodeFram is open-sourced under the [MIT License](LICENSE).
