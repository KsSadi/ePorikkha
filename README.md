# 📚 ePorikkha - Online Exam & Contest Platform

<div align="center">

![ePorikkha Logo](https://via.placeholder.com/150x150)

**A modern, feature-rich examination platform built with Laravel 12**

[![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![License](https://img.shields.io/badge/License-MIT-blue.svg?style=for-the-badge)](LICENSE)

</div>

## 📋 Overview

**ePorikkha** is a comprehensive online examination and contest platform designed to streamline the process of creating, administering, and evaluating exams. Whether you're an educational institution, corporate training department, or competition organizer, ePorikkha provides the tools you need.

> 💡 **ePorikkha** ("পরীক্ষা" meaning "examination" in Bengali) brings traditional testing into the digital age with advanced features and intuitive design.

## ✨ Key Features

- 🔐 **Role-based access control** (Admin, Organizer, Jury, Participant)
- 📝 **Multiple question types** (MCQ, Short answer, Long answer, etc.)
- ⏱️ **Customizable exam timers and settings**
- 🤖 **Automated and manual evaluation options**
- 📊 **Comprehensive result analysis and reporting**
- 🎯 **Contest and competition management**
- 📱 **Responsive design for all devices**
- 🔍 **Plagiarism detection capabilities**
- 🏆 **Certificate generation for successful participants**
- 📢 **Notification system for important updates**

## 👥 User Roles & Permissions

### Admin
- Complete system control and configuration
- Approve/reject organizer applications
- Generate system-wide reports
- Manage users, roles, and permissions
- Access to all backend functions

### Organizer
- Create and manage exams or contests
- Add and edit questions for their exams
- Configure exam settings (duration, scoring, etc.)
- Publish results and manage participants
- Add jury members to evaluate subjective answers

### Jury / Evaluator
- Evaluate subjective answers
- Provide marks and feedback to participants
- Collaborate with organizers on scoring criteria
- Override automated scoring when necessary

### Participant / Student
- Register and enroll in available exams
- Take exams within the specified time frame
- View results and performance analytics
- Download certificates (when eligible)
- Track personal progress over time

## 🛠️ Technology Stack

- **Backend:** Laravel 12.x
- **Database:** MySQL/PostgreSQL
- **Frontend:** Blade Templates, Alpine.js, Tailwind CSS
- **Authentication:** Laravel Sanctum
- **Real-time Features:** Laravel Echo, Pusher
- **PDF Generation:** DomPDF
- **Testing:** PHPUnit
- **Deployment:** Docker support

## ⚙️ Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL or PostgreSQL
- Git

### Setup Instructions

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/eporikkha.git
   cd eporikkha
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies:**
   ```bash
   npm install
   ```

4. **Set up environment file:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database in the .env file:**
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=eporikkha
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run migrations and seeders:**
   ```bash
   php artisan migrate --seed
   ```

7. **Build frontend assets:**
   ```bash
   npm run dev
   ```

8. **Start the development server:**
   ```bash
   php artisan serve
   ```

9. **Access the application:**
   Visit `http://localhost:8000` in your browser.

## 📦 Docker Installation (Alternative)

You can also use Docker for easier setup:

```bash
docker-compose up -d
docker-compose exec app php artisan migrate --seed
```

## 🧪 Running Tests

```bash
php artisan test
```

## 🚀 Deployment

### Server Requirements
- PHP 8.2+
- Composer
- MySQL/PostgreSQL
- Nginx or Apache
- SSL Certificate (Recommended)

### Deployment Steps

Refer to the [deployment guide](DEPLOYMENT.md) for detailed instructions.

## 📸 Screenshots

<div align="center">
  <img src="https://via.placeholder.com/400x225" alt="Dashboard Screenshot" width="400"/>
  <img src="https://via.placeholder.com/400x225" alt="Exam Creation" width="400"/>
  <img src="https://via.placeholder.com/400x225" alt="Student View" width="400"/>
  <img src="https://via.placeholder.com/400x225" alt="Results Panel" width="400"/>
</div>

## 📊 System Architecture

```
├── Admin Panel
│   ├── User Management
│   ├── System Configuration
│   └── Reports & Analytics
├── Organizer Dashboard
│   ├── Exam/Contest Creator
│   ├── Question Bank
│   └── Result Management
├── Jury Interface
│   ├── Answer Evaluation
│   └── Feedback System
└── Participant Portal
    ├── Exam Taking Interface
    ├── Result Viewer
    └── Certificate Download
```

## 🗺️ Roadmap

- [ ] Integration with LMS platforms
- [ ] Advanced analytics dashboard
- [ ] AI-assisted question generation
- [ ] Mobile application
- [ ] Offline examination mode
- [ ] Multi-language support
- [ ] Virtual proctoring capabilities

## 🤝 Contributing

Contributions are welcome! Please check our [Contributing Guidelines](CONTRIBUTING.md) before submitting pull requests.

## ⚠️ Known Issues

See [GitHub Issues](https://github.com/yourusername/eporikkha/issues) for current bugs and feature requests.

## 📜 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 Support

For support and queries, please contact:
- Email: support@eporikkha.com
- [Join our Discord community](https://discord.gg/eporikkha)

## ⭐ Star Us!

If you find this project useful, please consider giving it a star on GitHub!
