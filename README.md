# 📦 Campus Lost & Found Management System

A full-stack web application designed to help students and campus
communities **report, track, and recover** lost and found items. The
system provides separate interfaces for users and admins, enabling
efficient item management, verification, and resolution.

## 🚀 Features

### 👤 **User Features**

-   User **signup, login, and password reset**\
-   Post **Lost** or **Found** items with details (title, description,
    category, location, date)\
-   View and manage your submitted reports\
-   Receive status updates when items are reviewed or resolved\
-   Search and browse all lost & found items

### 🛠️ **Admin Features**

-   Admin dashboard for **managing users and item reports**\
-   Approve, update, or mark items as **resolved/claimed**\
-   Ability to remove inappropriate or duplicate posts\
-   Monitor platform statistics (total users, active reports, resolved
    cases)

## 📊 Home Page Insights

Displays summarized platform data: - Total registered users\
- Active lost item reports\
- Active found item reports\
- Successfully resolved cases

## 🧰 Tech Stack

  Layer                    Technology
  ------------------------ ---------------------
  **Frontend**             HTML, CSS
  **Backend**              PHP
  **Database**             MySQL / SQL
  **Deployment Support**   Dockerfile included

## 🗄️ Project Structure

    /Campus-Lost-and-Found-System
    │── admin/           # Admin dashboard & functionalities
    │── controllers/      # Backend logic (login, reset password, etc.)
    │── models/           # Database-related code
    │── views/            # Frontend UI pages
    │── public/           # CSS, assets, and static content
    │── database/         # SQL schema & connection files
    │── Dockerfile        # Optional Docker setup
    │── README.md         # Project documentation

## 🔧 Installation & Setup

### 1️⃣ Clone the Repository

git clone
https://github.com/276Siddhant/Campus-Lost-and-Found-System.git

### 2️⃣ Setup Database

-   Create a MySQL database\
-   Import the provided `.sql` file from the project's `/database`
    folder\
-   Update database credentials in:

```{=html}
<!-- -->
```
    /models/config.php

### 3️⃣ Run the Project

-   Start Apache & MySQL (XAMPP / WAMP / LAMP)\
-   Place the project folder in:
    -   `htdocs/` for XAMPP\
    -   `www/` for WAMP\
-   Visit in browser:\
    http://localhost/Campus-Lost-and-Found-System/

## 🧪 Future Improvements

-   Add image upload support\
-   Email notification system\
-   Advanced search filters\
-   Improved UI/UX\
-   REST API version

## 🧑‍💻 Author

**Siddhant Vedpathak**\
GitHub: https://github.com/276Siddhant
