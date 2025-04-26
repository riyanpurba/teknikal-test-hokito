# Laravel Project

## 🚀 Getting Started

Follow these steps to run this project locally:

## Step to setup the project

```
Framework: Laravel 8
PHP: v8.2.*
Database: MySQL

* User Login*
email : admin@example.com
password : password123
```

### 1. Clone the repository
```sh
git clone https://github.com/riyanpurba/teknikal-test-hokito.git
cd teknikal-test-hokito
```

### 2. Install Dependencies
```sh
composer install
```

### 3. Set Up Environment File
```sh
cp .env.example .env
```

### 4. Generate Application Key
```sh
php artisan key:generate
```

### 5. Configure Database in .env
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<name-database>
DB_USERNAME=<username-database>
DB_PASSWORD=<password-database>
```

### 6. Run Database Migrations (if applicable)
```sh
php artisan migrate
```

### 7. Run the Application
```sh
php artisan serve
```

---
Happy coding! 🎉