# 🏨 Hotel Management System

A web-based hotel management application built with **Laravel 13** for the backend and **React JS + Vite** for the frontend.

The application aims to simplify hotel operations by managing rooms, clients, reservations, payments, invoices, and statistics through a centralized platform.

---

## 📌 Table of Contents

- [Project Overview](#-project-overview)
- [Main Features](#-main-features)
- [User Roles](#-user-roles)
- [Technologies](#-technologies)
- [Project Structure](#-project-structure)
- [Prerequisites](#-prerequisites)
- [Installation](#-installation)
- [Database Setup](#-database-setup)
- [Running the Application](#-running-the-application)
- [API Communication](#-api-communication)
- [Git Workflow](#-git-workflow)
- [Development Team](#-development-team)

---

## 📖 Project Overview

Hotel Management System is a web application designed to manage the main activities of a hotel.

The project follows a **Monorepo Architecture**, which means that the frontend and backend are stored in the same GitHub repository but remain two separate applications.

- **Frontend:** React JS
- **Backend:** Laravel REST API
- **Database:** MySQL

React communicates with Laravel through HTTP requests using JSON.

---

## ✨ Main Features

The application includes the following modules:

- **Room Management:** Create, update, delete and display hotel rooms.
- **Room Types Management:** Manage room categories, capacities and prices.
- **Client Management:** Manage client information and identity details.
- **Reservation Management:** Create and manage hotel reservations.
- **Availability Management:** Check room availability and prevent overlapping reservations.
- **Payment Management:** Record payments and calculate remaining balances.
- **Invoice Management:** Generate and manage invoices.
- **Dashboard & Statistics:** Display hotel statistics and financial information.
- **Authentication:** Secure login and logout.
- **Role Management:** Control access according to user permissions.

---

## 👥 User Roles

The system supports three main user roles:

| Role | Description |
|---|---|
| Admin | Manages users, rooms, clients, reservations and system statistics. |
| Receptionist | Manages rooms, clients, reservations, check-in, check-out and payments. |
| Client | Can make reservations and consult personal reservations and payments. |

Access to protected resources is controlled by the Laravel backend.

---

## 🛠 Technologies & Tools

### Languages

![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

### Frameworks and Libraries

![React](https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)

### Database

![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

### Tools and Design

![Git](https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white)
![GitHub](https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white)
![VS Code](https://img.shields.io/badge/VS_Code-007ACC?style=for-the-badge&logo=visualstudiocode&logoColor=white)
![Postman](https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white)

### Package Managers

![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white)
![npm](https://img.shields.io/badge/npm-CB3837?style=for-the-badge&logo=npm&logoColor=white)

---

## ⚙️ Prerequisites

Before installing the project, make sure you have installed:

| Software | Required |
|---|---|
| PHP | 8.3 or higher |
| Composer | Latest stable version |
| Node.js | Compatible LTS version |
| npm | Installed with Node.js |
| MySQL | 8.0+ recommended |
| Git | Latest stable version |

You can verify the installations using:

```bash
php -v
composer -V
node -v
npm -v
git --version
```

---

## 🚀 Installation

### 1. Clone the Repository

Clone the project from GitHub:

```bash
git clone https://github.com/USERNAME/hotel-management.git
```

Navigate to the project directory:

```bash
cd hotel-management
```

### 2. Backend Setup – Laravel

Navigate to the backend directory:

```bash
cd backend
```

Install PHP dependencies:

```bash
composer install
```

Create the environment file:

**Windows PowerShell:**

```powershell
Copy-Item .env.example .env
```

**Linux / macOS:**

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Install API routes and Sanctum if they have not already been configured in the project:

```bash
php artisan install:api
```

### 3. Frontend Setup – React

Open another terminal and navigate to the frontend directory:

```bash
cd frontend
```

Install JavaScript dependencies:

```bash
npm install
```

---

## 🗄 Database Setup

Create a MySQL database named:

```sql
CREATE DATABASE hotel_management;
```

Navigate to the backend directory:

```bash
cd backend
```

Run database migrations:

```bash
php artisan migrate
```

If database seeders have been created and configured:

```bash
php artisan db:seed
```

Or run migrations and seeders together:

```bash
php artisan migrate --seed
```

---

## ▶️ Running the Application

The backend and frontend must run simultaneously in two separate terminals.

### Terminal 1 – Laravel Backend

```bash
cd backend
php artisan serve
```

Backend URL:

http://127.0.0.1:8000

### Terminal 2 – React Frontend

```bash
cd frontend
npm run dev
```

Frontend URL:

http://localhost:5173

---

## 🌿 Git Workflow

The project uses Git and GitHub for collaborative development.

### Main Branches

- `main`: Stable and production-ready code.
- `develop`: Main development branch.
- `feature/*`: Individual feature branches.

### Create a Feature Branch

```bash
git checkout develop
git pull origin develop

git checkout -b feature/feature-name
```

### Save and Push Your Changes

```bash
git add .
git commit -m "feat: describe your changes"
git push -u origin feature/feature-name
```

### Update Your Local Project

```bash
git checkout develop
git pull origin develop
```

### Collaboration Rules

1. Never push directly to `main`.
2. Work on your own feature branch.
3. Pull the latest changes before starting new work.
4. Use meaningful commit messages.
5. Create a Pull Request before merging into `develop`.
6. Test your code before pushing.
7. Never commit environment files or sensitive information.

---

## 🔒 Security Notes

The following files and directories must not be committed to GitHub:

- `backend/.env`
- `frontend/.env`
- `backend/vendor/`
- `frontend/node_modules/`

Each team member must configure their own local environment files.

Sensitive client information must be protected and accessible only to authorized users.

---

## 👨‍💻 Development Team

**Project:** Hotel Management System

**Architecture:** Monorepo

**Backend:** Laravel 13

**Frontend:** React JS + Vite

**Database:** MySQL

**Team Size:** 3 Members

---

## 📄 License

This project is developed for educational and academic purposes.
