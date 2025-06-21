# PHP Task Manager API (with User Authentication)

A simple RESTful API built with PHP & MySQL to manage tasks with user login and session-based authentication.

## 📁 Folder Structure

/api/
├── db.php
├── Task.php
├── auth/
│ ├── register.php
│ ├── login.php
│ └── logout.php
└── tasks/
├── create.php
├── read.php
├── update.php
└── delete.php


## 📦 Features

- User registration (`/auth/register.php`)
- User login + session (`/auth/login.php`)
- User logout (`/auth/logout.php`)
- Protected Task CRUD:
  - Create (`/tasks/create.php`)
  - Read (`/tasks/read.php`)
  - Update (`/tasks/update.php`)
  - Delete (`/tasks/delete.php`)

## 🔐 Authentication

Login sets a PHP session using `$_SESSION['user_id']`.  
All task-related APIs require the user to be logged in.

## 🧪 Testing

Use **Postman** to test endpoints.

### Register
`POST /api/auth/register.php`
```json
{
  "username": "admin",
  "password": "secret"
}

Login
POST /api/auth/login.php

Protected Endpoint
GET /api/tasks/read.php

Logout
GET /api/auth/logout.php