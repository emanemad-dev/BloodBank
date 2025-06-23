# 🩸 Blood Bank Management System

A complete Blood Bank system built with Laravel, offering a **public website**, **admin dashboard**, and a fully documented **RESTful API**.  
The system allows blood donation management, client interaction, and content control via a user-friendly interface.

---

## 🚀 Features

### 🔹 Website (Frontend)
- Blood donation request form
- List and filter available blood types
- View blog posts and awareness content
- Contact form for inquiries

### 🔹 Admin Dashboard
- Manage donation requests
- Manage posts, categories, and settings
- Manage clients and notifications
- Set up blood types, cities, and governorates

### 🔹 RESTful API
- Register/login clients with token-based auth
- Submit and view donation requests
- Manage notification settings
- Retrieve blood types, posts, and more

---

## 📁 Folder Structure (Main Controllers)

```
app/Http/Controllers/
├── AuthController.php
├── BloodTypeController.php
├── CategoryController.php
├── CityController.php
├── ClientController.php
├── ContactController.php
├── DonationRequestController.php
├── GovernorateController.php
├── NotificationSettingsController.php
├── PostController.php
├── SettingController.php
└── TokenController.php
```

---

## 🛠️ Technologies Used

- Laravel (PHP Framework)
- Blade Templating Engine
- MySQL
- Laravel Passport or Sanctum (for API authentication)
- RESTful API structure

---

## 📦 Installation

1. Clone the repository:

```bash
git clone https://github.com/your-username/blood-bank.git
cd blood-bank
```

2. Install dependencies:

```bash
composer install
```

3. Configure your `.env` file:

```bash
cp .env.example .env
php artisan key:generate
```

4. Set your DB credentials in `.env`, then run:

```bash
php artisan migrate --seed
```

5. (If using Passport) Install passport:

```bash
php artisan passport:install
```

6. Serve the app:

```bash
php artisan serve
```

Visit `http://localhost:8000`

---

## 🔑 Authentication

- API endpoints are protected using token-based authentication.
- Clients can register, login, and manage their donation data securely.

---

## 📬 Contact

For support or inquiries, feel free to reach out via email or open an issue.

---

## 📝 License

This project is licensed under the [MIT License](LICENSE).

---

## ✨ Credits

Developed as a full-stack Laravel application to support blood donation campaigns and streamline hospital communication.
