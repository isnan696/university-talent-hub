# TECH_STACK.md

**Project:** University Talent Hub

**Version:** 2.0

**Status:** Final

**Framework:** Laravel 12

**Database:** PostgreSQL 17

---

# 1. Overview

Dokumen ini menjelaskan seluruh teknologi yang digunakan dalam pengembangan sistem **University Talent Hub**.

Pemilihan teknologi didasarkan pada beberapa prinsip berikut:

- Open Source
- Modern
- Stable
- Scalable
- Mudah dipelajari
- Cocok untuk Laravel 12
- Mendukung pengembangan jangka panjang

---

# 2. System Architecture

Sistem menggunakan arsitektur **Client-Server** berbasis REST API.

```text
+----------------------+
|      Frontend        |
|  Blade + Bootstrap   |
+----------+-----------+
           |
           | REST API
           |
+----------v-----------+
|      Laravel 12      |
| Business Logic Layer |
+----------+-----------+
           |
           |
+----------v-----------+
|    PostgreSQL 17     |
+----------------------+
```

---

# 3. Frontend Stack

| Technology | Version | Purpose |
|------------|---------|---------|
| HTML5 | Latest | Markup |
| CSS3 | Latest | Styling |
| Bootstrap | 5.3 | Responsive UI |
| JavaScript | ES6 | Interactivity |
| Blade | Laravel 12 | Template Engine |

---

# 4. Backend Stack

| Technology | Version | Purpose |
|------------|---------|---------|
| PHP | 8.3+ | Programming Language |
| Laravel | 12 | Backend Framework |
| Composer | Latest | Dependency Manager |

---

# 5. Database Stack

| Technology | Version | Purpose |
|------------|---------|---------|
| PostgreSQL | 17 | Database |
| UUID | v4 | Primary Key |
| Eloquent ORM | Laravel | ORM |

---

# 6. AI Recommendation Stack

Jenis AI yang digunakan bukan Machine Learning melainkan **Rule-Based Recommendation System**.

Teknologi:

- Laravel Service
- Business Rules
- PostgreSQL
- PHP

---

## Recommendation Flow

```text
Student Data

↓

Rule Engine

↓

Priority Calculation

↓

Recommendation

↓

Dashboard
```

---

# 7. Authentication

Framework menggunakan Laravel Authentication.

Fitur:

- Login
- Logout
- Session
- Middleware
- CSRF Protection
- Password Hashing

Role:

- Admin
- Student

---

# 8. Storage

Seluruh file disimpan menggunakan Laravel Storage.

```text
storage/app/public
```

Jenis file:

- Profile Photo
- Certificate
- Portfolio Image
- Reward Image

Database hanya menyimpan:

```text
file_path
```

---

# 9. Development Tools

| Software | Purpose |
|----------|---------|
| Visual Studio Code | Code Editor |
| Git | Version Control |
| GitHub | Repository |
| Composer | PHP Dependency |
| Node.js | Frontend Build |
| npm | Package Manager |

---

# 10. UI Framework

Framework UI:

Bootstrap 5.3

Keuntungan:

- Responsive
- Cepat
- Dokumentasi lengkap
- Mudah dikustomisasi

---

# 11. API Architecture

API menggunakan RESTful API.

Method:

- GET
- POST
- PUT
- PATCH
- DELETE

Format data:

```json
{
    "success": true,
    "message": "Success",
    "data": {}
}
```

---

# 12. Database Architecture

Database menggunakan PostgreSQL.

Fitur:

- UUID
- Foreign Key
- Constraint
- Index
- Transaction
- Soft Delete

---

# 13. Security Stack

Keamanan aplikasi menggunakan:

- CSRF Protection
- Password Hashing
- Validation
- Authorization
- Middleware
- Prepared Statement

---

# 14. Logging

Logging menggunakan:

Laravel Log

Audit menggunakan:

activity_logs

---

# 15. File Upload

Validasi file:

Image

- JPG
- JPEG
- PNG

Document

- PDF

Maximum Size

5 MB

---

# 16. Development Workflow

```text
Requirement

↓

PRD

↓

Database Design

↓

API Design

↓

Backend Development

↓

Frontend Development

↓

Testing

↓

Deployment
```

---

# 17. Folder Structure

```text
app/
bootstrap/
config/
database/
docs/
public/
resources/
routes/
storage/
tests/
vendor/
```

---

# 18. Laravel Architecture

```text
Controller

↓

Service

↓

Repository

↓

Model

↓

Database
```

---

# 19. Coding Standard

Standar yang digunakan:

- PSR-12
- Laravel Convention
- Clean Code
- SOLID Principle
- DRY Principle
- KISS Principle

---

# 20. Naming Convention

Controller

```text
StudentController
```

Model

```text
StudentProfile
```

Migration

```text
create_student_profiles_table
```

Seeder

```text
StudentSeeder
```

Repository

```text
StudentRepository
```

Service

```text
StudentService
```

---

# 21. Git Strategy

Branch:

```text
main
develop
feature/*
hotfix/*
```

Commit Message:

```text
feat:

fix:

refactor:

docs:

style:

test:

chore:
```

---

# 22. Environment

Development

```text
Windows 11

PHP 8.3

Laravel 12

PostgreSQL 17
```

Production

```text
Ubuntu Server

Nginx

PHP-FPM

PostgreSQL

SSL
```

---

# 23. Performance Strategy

Menggunakan:

- Pagination
- Lazy Loading
- Eager Loading
- Database Index
- Query Optimization

---

# 24. Scalability

Future Enhancement

- Redis Cache
- Queue Worker
- Notification
- Docker
- CI/CD
- Multi Campus

---

# 25. Technology Roadmap

## Phase 1

- Laravel
- PostgreSQL
- Bootstrap

---

## Phase 2

- Redis
- Queue
- Email Notification

---

## Phase 3

- Machine Learning Recommendation
- Mobile Application
- Analytics Dashboard

---

# 26. Technology Summary

| Layer | Technology |
|--------|------------|
| Frontend | HTML5, CSS3, Bootstrap 5.3, JavaScript, Blade |
| Backend | PHP 8.3, Laravel 12 |
| Database | PostgreSQL 17 |
| Authentication | Laravel Authentication |
| AI | Rule-Based Recommendation |
| Storage | Laravel Storage |
| Version Control | Git & GitHub |
| Testing | PHPUnit |
| Deployment | Ubuntu, Nginx, PHP-FPM |

---

# 27. Final Checklist

| Item | Status |
|------|--------|
| Frontend Stack | ✅ |
| Backend Stack | ✅ |
| Database Stack | ✅ |
| Authentication | ✅ |
| Security | ✅ |
| Storage | ✅ |
| Development Tools | ✅ |
| Performance | ✅ |
| Scalability | ✅ |
| Deployment Ready | ✅ |

---
# 28. Testing Stack

Framework pengujian yang digunakan selama proses development.

| Technology | Purpose |
|------------|---------|
| PHPUnit | Unit Testing |
| Laravel Test Suite | Feature Testing |
| Postman | API Testing |
| Browser DevTools | Frontend Debugging |

---

## Testing Type

- Unit Test
- Feature Test
- Integration Test
- User Acceptance Test (UAT)

---

# 29. API Documentation

Dokumentasi API dibuat menggunakan standar REST API.

Format Response

```json
{
    "success": true,
    "message": "Success",
    "data": {}
}
```

HTTP Status

| Code | Description |
|------|-------------|
| 200 | Success |
| 201 | Created |
| 400 | Bad Request |
| 401 | Unauthorized |
| 403 | Forbidden |
| 404 | Not Found |
| 422 | Validation Error |
| 500 | Internal Server Error |

---

# 30. Database Convention

Database Engine

PostgreSQL 17

Primary Key

UUID

Naming

snake_case

Relationship

Foreign Key

Soft Delete

Laravel Standard

Timestamp

created_at

updated_at

deleted_at

---

# 31. Laravel Packages

Package yang digunakan pada proyek.

| Package | Purpose |
|---------|----------|
| laravel/framework | Main Framework |
| laravel/tinker | Development |
| fakerphp/faker | Seeder |
| barryvdh/laravel-debugbar | Debugging |
| doctrine/dbal | Database Modification |
| intervention/image | Image Processing |

---

# 32. Composer Dependencies

Core Dependency

```bash
composer install
```

Development Dependency

```bash
composer require --dev barryvdh/laravel-debugbar
```

Image Processing

```bash
composer require intervention/image
```

---

# 33. NPM Packages

Install

```bash
npm install
```

Build

```bash
npm run dev
```

Production

```bash
npm run build
```

---

Package utama

- Vite
- Bootstrap
- Axios

---

# 34. Browser Support

Minimum Browser

| Browser | Version |
|----------|---------|
| Chrome | Latest |
| Edge | Latest |
| Firefox | Latest |
| Safari | Latest |

---

# 35. Coding Workflow

```text
Requirement

↓

Documentation

↓

Database Design

↓

Migration

↓

Seeder

↓

Backend API

↓

Frontend UI

↓

Testing

↓

Deployment

↓

Maintenance
```

---

# 36. Development Environment

## Hardware Minimum

| Component | Minimum |
|-----------|----------|
| CPU | Intel i3 / Ryzen 3 |
| RAM | 8 GB |
| Storage | 20 GB SSD |

---

## Recommended

| Component | Recommended |
|-----------|--------------|
| CPU | Intel i5 / Ryzen 5 |
| RAM | 16 GB |
| SSD | 256 GB |

---

# 37. Production Environment

| Component | Recommendation |
|-----------|---------------|
| OS | Ubuntu Server 24.04 LTS |
| Web Server | Nginx |
| PHP | 8.3 |
| Database | PostgreSQL 17 |
| SSL | Let's Encrypt |

---

# 38. Maintenance Strategy

Maintenance dilakukan secara berkala.

Aktivitas:

- Update Framework
- Update Dependency
- Backup Database
- Security Patch
- Bug Fix
- Performance Review

---

# 39. Future Technology

Tahap berikutnya setelah MVP selesai.

## Version 2

- Email Notification
- Dashboard Analytics
- PDF Export

---

## Version 3

- Redis Cache
- Queue Worker
- Realtime Notification

---

## Version 4

- Mobile App (Flutter)
- Machine Learning Recommendation
- WebSocket Notification

---

# 40. Technology Decision

## Why Laravel?

- Modern Framework
- MVC Architecture
- Eloquent ORM
- Built-in Authentication
- Queue
- Cache
- Validation
- Artisan CLI

---

## Why PostgreSQL?

- Open Source
- ACID Compliant
- High Performance
- Strong Constraint
- UUID Support
- Full Text Search

---

## Why Bootstrap?

- Responsive
- Lightweight
- Easy Customization
- Fast Development

---

## Why Rule-Based AI?

- Tidak membutuhkan dataset.
- Mudah dikembangkan.
- Cocok untuk MVP.
- Cepat diimplementasikan.
- Mudah dijelaskan pada sidang TA.

---

# 41. Final Technology Checklist

| Category | Status |
|----------|--------|
| Frontend | ✅ |
| Backend | ✅ |
| Database | ✅ |
| REST API | ✅ |
| Authentication | ✅ |
| Security | ✅ |
| Storage | ✅ |
| Testing | ✅ |
| Deployment | ✅ |
| Documentation | ✅ |
| Performance | ✅ |
| Scalability | ✅ |

---
# 42. Project Directory Structure

Struktur direktori proyek mengikuti standar Laravel 12.

```text
university-talent-hub/
│
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   ├── Requests/
│   │   └── Resources/
│   │
│   ├── Models/
│   ├── Services/
│   ├── Repositories/
│   ├── Policies/
│   └── Providers/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── docs/
│   ├── PRD.md
│   ├── DATABASE.md
│   ├── API_SPEC.md
│   ├── UI_UX.md
│   ├── ARCHITECTURE.md
│   ├── TESTING.md
│   ├── DEPLOYMENT.md
│   ├── TECH_STACK.md
│   └── TASK.md
│
├── public/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│
├── storage/
│   ├── app/
│   ├── framework/
│   └── logs/
│
├── tests/
│
├── vendor/
│
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```

---

# 43. Application Layer

Project menggunakan pendekatan **Layered Architecture**.

```text
Presentation Layer

↓

Controller Layer

↓

Service Layer

↓

Repository Layer

↓

Model Layer

↓

Database Layer
```

---

## Presentation Layer

Bertanggung jawab terhadap tampilan aplikasi.

Komponen:

- Blade
- Bootstrap
- JavaScript

---

## Controller Layer

Bertugas menerima request dari client.

Contoh:

- AuthController
- DashboardController
- SkillController
- CertificateController
- PortfolioController
- RewardController
- OpportunityController

---

## Service Layer

Berisi seluruh business logic aplikasi.

Contoh:

```text
StudentService

SkillService

VerificationService

RewardService

PointService

RecommendationService
```

---

## Repository Layer

Berfungsi sebagai penghubung antara Service dan Database.

Contoh:

```text
StudentRepository

SkillRepository

RewardRepository

VerificationRepository
```

---

## Model Layer

Menggunakan Laravel Eloquent ORM.

Contoh:

```text
User

StudentProfile

Skill

Certificate

Portfolio

Reward
```

---

# 44. Coding Principles

Seluruh kode mengikuti prinsip berikut.

## SOLID Principle

- Single Responsibility Principle
- Open Closed Principle
- Liskov Substitution Principle
- Interface Segregation Principle
- Dependency Inversion Principle

---

## DRY

Don't Repeat Yourself

---

## KISS

Keep It Simple Stupid

---

## Clean Code

- Meaningful Variable Name
- Small Function
- Readable Code
- Consistent Formatting

---

# 45. Error Handling Strategy

Laravel menggunakan Exception Handler.

Jenis error yang ditangani.

- Validation Error
- Authentication Error
- Authorization Error
- Database Error
- File Upload Error
- Internal Server Error

---

Response Error

```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {}
}
```

---

# 46. Logging Strategy

Logging menggunakan Laravel Logging.

Channel:

- daily
- stack

Log penting:

- Login
- Logout
- Verification
- Reward Claim
- Exception
- API Error

---

# 47. Configuration Management

Konfigurasi aplikasi menggunakan file:

```text
.env
```

Konfigurasi utama:

- APP_NAME
- APP_ENV
- APP_KEY
- APP_URL
- DB_CONNECTION
- DB_HOST
- DB_PORT
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD

---

# 48. Versioning Strategy

Version Control menggunakan Git.

Branch utama:

```text
main
```

Branch development:

```text
develop
```

Branch fitur:

```text
feature/auth

feature/dashboard

feature/skill

feature/reward

feature/opportunity
```

Branch perbaikan:

```text
hotfix/login

hotfix/database
```

---

# 49. Release Strategy

Tahapan release.

```text
Development

↓

Testing

↓

Staging

↓

Production
```

---

# 50. Conclusion

Teknologi yang dipilih telah disesuaikan dengan kebutuhan sistem University Talent Hub.

Dengan menggunakan Laravel 12, PostgreSQL 17, Bootstrap 5.3, dan Rule-Based Recommendation System, aplikasi memiliki fondasi yang kuat untuk:

- Pengembangan cepat.
- Mudah dipelihara.
- Aman.
- Skalabel.
- Siap dikembangkan pada versi berikutnya.

Dokumen ini menjadi acuan utama dalam proses implementasi seluruh teknologi yang digunakan pada proyek.

---

# Revision History

| Version | Date | Description |
|----------|------|-------------|
| 1.0 | June 2026 | Initial Tech Stack |
| 2.0 | July 2026 | Updated sesuai PRD v3.0 dan DATABASE v2.0 |

---

# Related Documents

- PRD.md
- DATABASE.md
- API_SPEC.md
- UI_UX.md
- ARCHITECTURE.md
- TESTING.md
- DEPLOYMENT.md
- README.md

---

# End of TECH_STACK.md

**Version:** 2.0

**Status:** Final

**Framework:** Laravel 12

**Database:** PostgreSQL 17

**Frontend:** Blade + Bootstrap 5.3

**Architecture:** Layered MVC + REST API

**AI Engine:** Rule-Based Recommendation System

**Ready for Development**