# PHP Task Manager API with Login & Bootstrap UI

A simple PHP-based task management app using:

- PHP + MySQL (API)
- Bootstrap 5 (Frontend)
- Session-based login/logout
- Auth-protected routes
- CRUD operations on tasks
- Password strength meter

## 🧩 Features

- ✅ User registration & login (session-based)
- ✅ Password strength meter (live feedback)
- ✅ Responsive dashboard with task list
- ✅ Edit/delete tasks using modals
- ✅ Protected routes — each user sees only their tasks

## 🛠️ Tech Stack

- PHP (Vanilla)
- MySQL
- Bootstrap 5
- jQuery (AJAX)
- Git

## 🚀 Getting Started

1. Clone the repo  
   `git clone https://github.com/your-username/php-task-manager.git`

2. Set up your DB using `database.sql` (if available)

3. Configure DB in `api/db.php`

4. Run locally using Apache / XAMPP

## 📂 Directory Structure


project/
├── api/
│ ├── auth/ ← login, register, logout
│ ├── tasks/ ← create, read, update, delete
│ └── db.php
├── public/
│ ├── login.html
│ ├── register.html
│ └── dashboard.html
└── README.md


## 🙌 Credits

Built by Bhuvanesh Anand as a beginner-friendly PHP API + UI project.
