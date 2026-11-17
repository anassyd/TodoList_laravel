# TodoList

A simple task manager built with Laravel 13 while learning the framework step by step.
Each user has their own private list of tasks they can add, complete, rename and delete.

## Features

- Register, login and logout, built by hand without a starter kit
- Add, edit, complete and delete tasks
- Each user sees only their own tasks
- Authorization with a Policy, so no one can edit or delete someone else's task
- Validation with error messages and old input
- Success messages after each action
- Shared Blade layout with a sidebar
- UI styled with Tailwind CSS in a shadcn-like look, using Blade components

## Tech stack

- PHP 8.3+ and Laravel 13
- SQLite
- Blade, Tailwind CSS 4 and Vite

## Requirements

- PHP 8.3 or newer
- Composer
- Node.js and npm

## Getting started

1. Clone the repository and enter the folder:

   ```bash
   git clone <repository-url>
   cd TodoList_laravel
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Install JavaScript dependencies:

   ```bash
   npm install
   ```

4. Create your environment file:

   ```bash
   cp .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Create the database tables:

   ```bash
   php artisan migrate
   ```

   If you're asked to create the SQLite database file, answer `yes`.

7. Build the front-end assets:

   ```bash
   npm run build
   ```

8. Start the server:

   ```bash
   php artisan serve
   ```

Then open http://127.0.0.1:8000 and create an account.

## Development

While changing views or styles, run Vite in a second terminal so Tailwind picks up new classes:

```bash
npm run dev
```

## Project structure

| Path | What it contains |
|---|---|
| `routes/web.php` | All routes, grouped by `auth` and `guest` middleware |
| `app/Http/Controllers/TaskController.php` | Listing, creating, editing, toggling and deleting tasks |
| `app/Http/Controllers/AuthController.php` | Register, login and logout |
| `app/Policies/TaskPolicy.php` | Who can update or delete a task |
| `app/Models` | `User` and `Task` models and their relationship |
| `resources/views/layouts/app.blade.php` | Shared layout with the sidebar |
| `resources/views/components` | Reusable UI pieces: button, input, label, alert and more |
