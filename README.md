# 🌍 Country-Based Recipe Recommendation System

![PHP](https://img.shields.io/badge/PHP-8.x-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.x-orange?logo=mysql)
![HTML](https://img.shields.io/badge/HTML-5-E34F26?logo=html5&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow?logo=javascript)
![API](https://img.shields.io/badge/API-TheMealDB-orange)
![CSS](https://img.shields.io/badge/CSS-3-1572B6?logo=css3&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?logo=tailwind-css)
![Apache](https://img.shields.io/badge/Apache-Server-D22128?logo=apache)
![License](https://img.shields.io/badge/License-MIT-green)


A full-stack **Country-Based Recipe Recommendation System** built with **PHP**, **MySQL**, **JavaScript**, and **Tailwind CSS**, using a free public **recipe API**.
The system allows users to **search recipes**, filter by country, view detailed instructions, and intelligently caches API responses for high performance.

---

## 🚀 Key Features

### 🍽️ User Features

- Search recipes by name or keyword
- Filter recipes by country (Indian, Italian, Mexican, etc.)
- View detailed recipe pages with instructions and images
- Fast search results with AJAX (no page reload)
- Mobile-friendly and responsive UI

---

### ⚙️ System & Backend Features

- External recipe data via TheMealDB API
- Smart API caching system using MySQL
- Search analytics logging
- Popular country tracking
- Optimized database indexing
- Clean frontend ↔ backend ↔ database architecture

---

### 🧠 API & Data Strategy

- Recipe Source: TheMealDB (free, no API key required)
- Recipes are not stored permanently
- API responses are cached to reduce:
  - API calls
  - Load time
  - Server stress

### Cached Data Includes:

- Search results
- Country-based filters
- Expiration-based cache cleanup

---

### 🧑‍💻 Tech Stack

| Layer    | Technology                     |
| -------- | ------------------------------ |
| Frontend | HTML, Tailwind CSS, JavaScript |
| Backend  | PHP (Procedural)               |
| Database | MySQL                          |
| API      | TheMealDB                      |
| Caching  | MySQL-based cache system       |
| Server   | Apache (XAMPP)                 |

---

## 📁 Project Structure

```text
recipe-app/
├── api/
│   └── fetch-recipes.php
│
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── db.php
│
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── app.js
│   └── images/
│
├── index.php
├── search.php
├── recipe.php
├── README.md
```

---
## ⚙️ Installation & Setup

### 1️⃣ Clone Repository
```text
git clone https://github.com/badhonacharia/country-based-recipe-app.git
```
### 2️⃣  Move to Server Root
```text
xampp/htdocs/recipe-app
```

### 3️⃣ Create Database

Create a MySQL database named:

```text
recipe_app
```
Run the following tables:

```text
CREATE TABLE search_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    keyword VARCHAR(255),
    country VARCHAR(100),
    ip_address VARCHAR(45),
    searched_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE recipe_cache (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cache_key CHAR(32) UNIQUE,
    response_json LONGTEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    expires_at TIMESTAMP
);

CREATE TABLE popular_countries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    country VARCHAR(100) UNIQUE,
    search_count INT DEFAULT 1,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        ON UPDATE CURRENT_TIMESTAMP
);
```

### 4️⃣ Configure Database Connection

Edit:

```text
includes/db.php
```
```text
$conn = new mysqli("localhost", "root", "", "recipe_app");
```

### 5️⃣ Run the Project

```text
http://localhost/recipe-app
```
---
## 🔐 Security & Performance Notes
- Prepared statements used for database operations
- API response caching reduces external API calls
- Input length validation prevents abuse
- UTF-8 (utf8mb4) character support
- Indexed database columns for fast search
---
## 🌱 Future Enhancements
- Ingredient-based filtering
- Recipe categories & tags
- User accounts and favorites
- Admin analytics dashboard
- Rate-limiting & API abuse protection
- SEO-friendly URLs
- Monetization (ads / affiliate links)
---

## ⚠️ Disclaimer

This project is intended for educational and portfolio purposes.
All recipe data belongs to their respective sources via the public API.

---

## 📄 License
This project is licensed under the **MIT License**.
You are free to:
- Use the project for personal or commercial purposes
- Modify and distribute the code
- Use it in your own projects with proper attribution
See the [LICENSE](LICENSE) file for full details.
---

## 👨‍💻 Author

**[Badhon Acharia](https://octteen.com/badhonacharia/)**

Web Developer | PHP | WordPress | Backend System

**[GitHub](https://github.com/badhonacharia/)**   **[Portfolio](https://octteen.com/badhonacharia/)**

---
