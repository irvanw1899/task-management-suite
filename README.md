# Task Management Suite
This is a simple task management application built with Laravel. The application allows users to manage their tasks using a web interface.

## Requirements
- PHP >= 8.2
- Composer
- Laravel >= 10.x
- PostgreSQL or any other database supported by Laravel

## Setup Instructions
### 1. Clone the Repository

```bash
git clone https://github.com/irvanw1899/task-management-suite.git
cd task-management-suite

### 2. Install Dependency

```bash
composer install

### 3. Configure Environment Variables

```bash
APP_NAME=TMS-Suite
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=task_management
DB_USERNAME=postgres
DB_PASSWORD=password

### 4. Run Migrations

```bash
php artisan migrate

### 5. Serve the Application & Compile Assets

```bash
php artisan serve
&
npm run dev

### 6. Testing

```bash
php artisan test



