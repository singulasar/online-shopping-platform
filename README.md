
# Project Setup Guide

## Prerequisites

Ensure you have the following software installed on your machine:

1. **PHP** (version 7.4 or higher)
2. **Composer** (latest version)
3. **Node.js** and **npm** (latest version)
4. **MySQL** (or any other database you are using)
5. **Git** (for version control)

## Steps to Setup the Project Locally

### 1. Install PHP Dependencies

Use Composer to install the required PHP dependencies.

```bash
composer install
```

### 2. Set Up Environment Variables

Copy the `.env.example` file to `.env` and configure your environment variables. Make sure to set up your database credentials and other necessary configurations.

```bash
cp .env.example .env
```

Edit the `.env` file to match your environment settings.

### 3. Generate Application Key

Generate the application key using the following command:

```bash
php artisan key:generate
```

### 4. Install Node.js Dependencies

Use npm to install the required Node.js dependencies.

```bash
npm install
```

### 5. Compile Assets

Compile the assets using the following command:

```bash
npm run dev
```

### 6. Set Up the Database

Run the database migrations to set up your database schema.

```bash
php artisan migrate
```

run seeders to populate the database with initial data.

```bash
php artisan db:seed
```

### 7. Start the Development Server

Finally, start the development server.

```bash
php artisan serve
```

Open your browser and navigate to `http://localhost:8000` to see the application running.

## Running PHP Tests

### 1. Install PHPUnit

Ensure PHPUnit is installed. If it's not installed globally, you can add it to your project via Composer.

```bash
composer require --dev phpunit/phpunit
```

### 2. Run the Tests

Execute the PHP tests using the following command:

```bash
./vendor/bin/phpunit
```

This will run all the tests located in the `tests` directory.

---
