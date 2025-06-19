# PHP Task Management API

This is a simple REST API built with core PHP and MySQL to manage tasks.

## Endpoints

| Method | Endpoint         | Description           |
|--------|------------------|-----------------------|
| GET    | /api/read.php    | Get all tasks         |
| POST   | /api/create.php  | Create new task       |
| PUT    | /api/update.php  | Update existing task  |
| DELETE | /api/delete.php  | Delete a task         |

## Database

```sql
CREATE TABLE tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  description TEXT,
  status ENUM('pending', 'done') DEFAULT 'pending'
);
