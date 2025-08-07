# Laravel Blog Management System 📝

A simple blog/article management system built with Laravel and Laravel Breeze. It allows authenticated users to create, edit, and delete blog posts with optional images.

## Features

-  Public homepage showing all blog posts
-  Authentication with Laravel Breeze (Login/Registration)
-  Admin dashboard to manage blog posts
-  Upload images with posts
-  Create, edit, delete blog posts

## Screenshots

<table>
  <tr>
    <td align="center">
      <img src="public/blog%20management%20system%20screenshots/Admin%20Dashboard.PNG" width="400" alt="Admin Dashboard" /><br/>
      <b>Admin Dashboard</b>
    </td>
    <td align="center">
      <img src="public/blog%20management%20system%20screenshots/Create%20Now%20post.PNG" width="400" alt="Create New Post" /><br/>
      <b>Create New Post</b>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="public/blog%20management%20system%20screenshots/Edite%20Post.PNG" width="400" alt="Edit Post" /><br/>
      <b>Edit Post</b>
    </td>
    <td align="center">
      <img src="public/blog%20management%20system%20screenshots/Home%20page.PNG" width="400" alt="Home Page" /><br/>
      <b>Home Page</b>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="public/blog%20management%20system%20screenshots/login.PNG" width="400" alt="Login" /><br/>
      <b>Login Page</b>
    </td>
    <td align="center">
      <img src="public/blog%20management%20system%20screenshots/signup-login.PNG" width="400" alt="Signup & Login" /><br/>
      <b>Signup & Login</b>
    </td>
  </tr>
</table>


## 📦 Installation

### Prerequisites

- PHP >= 8.1
- Composer
- Node.js and npm
- MySQL or any supported DBMS

### Steps

```bash
# Clone the repo
git clone https://github.com/yourusername/your-repo-name.git

# Navigate to project
cd your-repo-name

# Install dependencies
composer install
npm install && npm run dev

# Set up .env file
cp .env.example .env
php artisan key:generate

# Configure DB credentials in .env
# Then run:
php artisan migrate

# Run the server
php artisan serve
```

Visit: `http://127.0.0.1:8000`

## Admin Access

To access the dashboard, register a new user and login. You will be redirected to `/dashboard`.

## Folder Structure

- `/app` – Laravel backend (controllers, models, etc.)
- `/resources/views` – Blade templates (home, dashboard, create/edit post)
- `/public` – Public assets (images, css, etc.)

## 🛡️ Security & Cleanup

> Make sure not to upload sensitive files like `.env`, `/vendor`, `node_modules`, or your `storage` contents.

Use this in your `.gitignore`:

```
/vendor
/node_modules
.env
/public/storage
/storage/*.key
```

## 📄 License

This project is open-sourced for learning and portfolio purposes. Add a license if needed.

## 🔗 Showcase

-  [Live Demo (if any)](https://your-live-demo-link.com)
-  [LinkedIn](www.linkedin.com/in/mubashir-naqvi-4497b125b)
