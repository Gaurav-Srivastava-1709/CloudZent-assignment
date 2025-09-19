# CloudZent Assignment - Local Setup Guide

Follow these steps to run the project locally.

---

1. Clone the Repository

Open your terminal and run:

```bash
git clone https://github.com/Gaurav-Srivastava-1709/CloudZent-assignment.git
cd CloudZent-assignment
```

---
2. Install Dependencies

Laravel projects need PHP packages via Composer and frontend packages via npm.
```bash
composer install
npm install
npm run build
```
---
3. Create .env File

Copy the example environment file:
```bash
# Linux / Mac
cp .env.example .env

# Windows (PowerShell)
copy .env.example .env
```
---
4. Generate Application Key
```bash
php artisan key:generate
```
---
5. Configure Database

Open .env in your project root and set your database connection. Example for MySQL:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=book_crud   # Replace with your database name
DB_USERNAME=root
DB_PASSWORD=
```
---
6. Run Migrations and Seeders

This will create the tables in your database:
```
php artisan migrate
php artisan db:seed
```
---
7. Serve the Application

Run the Laravel development server:
```
php artisan serve
```

By default, it will be available at:
http://127.0.0.1:8000

Notes

If you are using Vite for assets, you can also run a dev server for live-reloading:
```bash
npm run dev
```

Make sure you have PHP, Composer, Node.js, and MySQL installed locally.
