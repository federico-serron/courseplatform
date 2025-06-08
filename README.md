# Course Platform

A web application built with **Laravel 8**, **TailwindCSS**, and **Livewire**.

## Prerequisites
- PHP >= 7.4 (recommended 8.x)
- Composer
- Node.js (preferably v16, but workaround available for newer versions)
- npm
- MySQL

## Installation & Setup

### 1. Clone the repository
```bash
git clone <your-repo-url>
cd courseplatform
```

### 2. Install PHP dependencies
```bash
composer install
```

### 3. Install Node dependencies
```bash
npm install
```

### 4. Configure Environment
- Copy `.env.example` to `.env` if needed:
  ```bash
  cp .env.example .env
  ```
- Set your database credentials in `.env`:
  ```env
  DB_DATABASE=courses
  DB_USERNAME=root
  DB_PASSWORD=yourpassword
  ```
- Generate the Laravel app key:
  ```bash
  php artisan key:generate
  ```

### 5. Prepare the Database
- Create the database in MySQL (e.g., `courses`).
- Run migrations and seeders:
  ```bash
  php artisan migrate --seed
  # Or for a fresh start:
  php artisan migrate:fresh --seed
  ```

### 6. Storage Link
```bash
php artisan storage:link
```

### 7. Compile Frontend Assets
#### If using Node.js v17 or newer (including v20+):
- You must use the OpenSSL legacy provider workaround:

  **On Windows (PowerShell):**
  ```powershell
  $env:NODE_OPTIONS="--openssl-legacy-provider"; npm run dev
  ```
  **On Windows (CMD):**
  ```cmd
  set NODE_OPTIONS=--openssl-legacy-provider && npm run dev
  ```
  **On Linux/macOS:**
  ```bash
  export NODE_OPTIONS=--openssl-legacy-provider
  npm run dev
  ```

#### If using Node.js v16:
```bash
npm run dev
```

### 8. Run the Laravel Development Server
```bash
php artisan serve
```
Visit [http://localhost:8000](http://localhost:8000) in your browser.

---

## Tech Stack
- **Backend:** Laravel 8
- **Frontend:** TailwindCSS, Livewire
- **Database:** MySQL

---

## Troubleshooting
- If you see `ERR_OSSL_EVP_UNSUPPORTED`, use the workaround above for Node.js/OpenSSL.
- If you get `Cannot write to directory "public/storage/courses"`, make sure to run `php artisan storage:link` and ensure the directory exists and is writable.
- For permission/role seeder errors, use `php artisan migrate:fresh --seed` to reset your DB in development.

---

## License
MIT
