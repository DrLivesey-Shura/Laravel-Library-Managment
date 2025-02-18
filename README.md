# Laravel Library & Task Management

A simple Library and Task Management System built with Laravel for learning purposes. This project allows users to manage books and tasks with role-based authentication.

## Features

### Library Management (No Authentication Required)
- View a list of books with images and details
- Add new books
- Edit book details
- Delete books

### Task Management (With Authentication)
- User authentication (roles: Admin/User)
- **Admin**: View, create, edit, and delete tasks
- **User**: Only view the list of tasks

## Installation

1. **Clone the repository**
   ```sh
   git clone <repository-url>
   cd <project-folder>
   ```

2. **Install dependencies**
   ```sh
   composer install
   ```

3. **Set up environment variables**
   - Copy `.env.example` to `.env`
   - Configure database settings in `.env`

4. **Generate application key**
   ```sh
   php artisan key:generate
   ```

5. **Run migrations**
   ```sh
   php artisan migrate
   ```

6. **Seed the database (for default roles and users)**
   ```sh
   php artisan db:seed
   ```

7. **Run the development server**
   ```sh
   php artisan serve
   ```
   The project will be available at `http://127.0.0.1:8000/`

## Usage
- Visit the home page to see a list of books.
- Register or log in as a user.
- If logged in as an **admin**, manage tasks (CRUD operations available).
- If logged in as a **user**, only view tasks.

## Technologies Used
- Laravel
- Blade Templating Engine
- MySQL (or any configured database in `.env`)
- Bootstrap (for basic styling)
- Laravel Authentication (for role-based access control)

## Contributing
This project was built for learning purposes, but feel free to fork and improve it.

## License
This project is open-source and available under the [MIT License](LICENSE).

