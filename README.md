# 🐝 Bee Management System

Welcome to the **Bee Management System**! This project is designed to help beekeepers efficiently manage hives, track honey production, and monitor the health of their colonies. 🍯✨

## 📌 Project Structure
```
📂 bee-management-system
│── 📂 api          # PHP API files
│── 📂 config       # Database connection setup
│── 📂 models       # PHP classes for Hives, Users, etc.
│── 📂 controllers  # Business logic for CRUD operations
│── 📂 public       # Frontend HTML, CSS, JS
│── 📂 uploads      # Store images (hives, honey jars, etc.)
│── index.php       # Main entry file
│── .env.example    # Environment variables (DB credentials)
```

## 🛠️ Setup Instructions
### 1️⃣ Clone the Repository
```sh
$ git clone https://github.com/your-repo/bee-management-system.git
$ cd bee-management-system
```

### 2️⃣ Start MySQL in Docker
```sh
$ docker run --name mysql-db -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=bee_management -p 3306:3306 -d mysql:latest
```

### 3️⃣ Access MySQL and Create Tables
```sh
$ docker exec -it mysql-db mysql -uroot -p
```
Then, inside MySQL shell:
```sql
USE bee_management;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    role ENUM('admin', 'beekeeper') NOT NULL DEFAULT 'beekeeper',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

CREATE TABLE hives (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(255),
    status ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

CREATE TABLE honey_production (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hive_id INT,
    production_date DATE,
    quantity DECIMAL(10,2),
    FOREIGN KEY (hive_id) REFERENCES hives(id) ON DELETE CASCADE
);
```

### 4️⃣ Start the PHP Server
```sh
$ php -S localhost:8000 -t public/
```

### 5️⃣ Test the API Endpoints 🚀
Use `curl` or Postman to test authentication:
```sh
$ curl -X POST -H "Content-Type: application/json" -d '{"username": "admin", "password": "adminpassword123"}' http://localhost:8000/api/auth.php
```

## 🔥 Next Steps
- Fix the `connection refused` issue for `auth.php`
- Implement frontend 🖥️
- Add more API endpoints 🛠️

Happy coding! 🚀🐝

