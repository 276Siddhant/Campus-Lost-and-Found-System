# 📦 Campus Lost & Found System

A web-based application that helps students and staff **report lost
items**, **upload found items**, and **manage retrievals** easily within
a college campus. The system provides authentication, item management,
an admin dashboard, and automated status handling.

## 🚀 Features

### 🔐 User Features

-   User signup & login system
-   Upload images of lost/found items
-   Search for items by keywords
-   View item details
-   Reset forgotten passwords
-   Responsive UI

### 🛠 Admin Features

-   Manage all item reports
-   View system statistics
-   Moderate uploaded content
-   Update item status

### 📡 Technical Features

-   PHP backend
-   MySQL database
-   Secure password hashing
-   API endpoints for async operations
-   Image uploads stored server-side

## 🧰 Tech Stack

-   Frontend: HTML, CSS, JavaScript
-   Backend: PHP
-   Database: MySQL
-   Server: XAMPP / Apache
-   Version Control: Git + GitHub

## 📁 Project Structure

    📁 Campus-Lost-and-Found-System
    │
    ├── 📁 sql
    │   └── lost_and_found_db.sql
    │
    ├── 📁 static
    │   ├── 📁 css
    │   └── 📁 images
    │
    ├── 📁 uploads
    │
    ├── admin.php
    ├── api.php
    ├── CNAME
    ├── db_connect.php
    ├── forgot_password.php
    ├── get_stats.php
    ├── home.php
    ├── index.php
    ├── login.php
    ├── README.md
    ├── reset.php
    ├── signup.php
    └── test.php

## 🗄️ Database Setup

1.  Open phpMyAdmin\

2.  Create a database (e.g., `lost_and_found`)

3.  Import SQL file:

        sql/lost_and_found_db.sql

4.  Update database config in `db_connect.php`.

## ⚙️ How to Run the Project Locally

``` sh
git clone https://github.com/your-username/Campus-Lost-and-Found-System.git
```

Move the project into XAMPP `htdocs/`, start Apache & MySQL, then open:

    http://localhost/Campus-Lost-and-Found-System/

## 🔌 API Endpoints

  Endpoint                     Method   Description
  ---------------------------- -------- -------------
  api.php?action=add_item      POST     Add item
  api.php?action=get_items     GET      Fetch items
  api.php?action=delete_item   POST     Delete item
  get_stats.php                GET      Stats

## 🤝 Contributing

1.  Fork\
2.  Create branch\
3.  Commit\
4.  PR

## 📝 License

MIT License.
