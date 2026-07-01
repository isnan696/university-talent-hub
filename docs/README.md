# University Talent Hub

**Platform Manajemen Talenta Mahasiswa Berbasis Gamifikasi & AI Recommendation**

---

## 🚀 Overview

**University Talent Hub** adalah platform untuk mengelola, menilai, dan mengembangkan talenta mahasiswa melalui:

- Skill Management
- Certificate Tracking
- Portfolio Showcase
- Point & Reward System
- AI-Based Recommendation
- Opportunity Board

---

## 🧠 Key Features

### 🎯 Student Features
- Manage profile mahasiswa
- Tambah skill & sertifikasi
- Upload portfolio
- Sistem poin otomatis
- Klaim reward
- Lihat rekomendasi AI

---

### 🛡️ Admin Features
- Verifikasi skill & sertifikat
- Manajemen reward
- Manajemen opportunity
- Monitoring mahasiswa
- Dashboard analytics

---

### 🤖 AI Recommendation
- Rule-based recommendation engine
- Analisis kelengkapan profil
- Prioritas tindakan mahasiswa
- Smart suggestion system

---

## 🏗️ Tech Stack

| Layer | Technology |
|------|------------|
| Backend | Laravel 12 |
| Database | PostgreSQL 17 |
| Frontend | Blade + Bootstrap 5.3 |
| Auth | Laravel Session |
| AI | Rule-Based Engine |
| Storage | Laravel Storage |

---

## 📐 Architecture

```text
Frontend (Blade)
     ↓
Laravel Controller
     ↓
Service Layer
     ↓
Repository Layer
     ↓
PostgreSQL Database
```

---

## 📦 Installation

### 1. Clone Project

```bash
git clone https://github.com/username/university-talent-hub.git
cd university-talent-hub
```

---

### 2. Install Dependency

```bash
composer install
npm install && npm run build
```

---

### 3. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

---

### 4. Setup Database

```bash
php artisan migrate --seed
```

---

### 5. Run Project

```bash
php artisan serve
```

---

## 🔐 Default Role

| Role | Access |
|------|--------|
| Admin | Full system control |
| Student | Personal dashboard only |

---

## 📊 Main Modules

- Authentication
- Student Profile
- Skill Management
- Certificate Management
- Portfolio System
- Verification System
- Point System
- Reward System
- Opportunity Board
- AI Recommendation
- Activity Logging

---

## 🔄 System Flow

```text
Student Input Data
        ↓
Admin Verification
        ↓
Point Calculation
        ↓
Leaderboard Update
        ↓
AI Recommendation Generated
        ↓
Reward Claim Available
```

---

## 🧪 Testing

Run test suite:

```bash
php artisan test
```

---

## 🌐 Deployment

See full deployment guide:

👉 `DEPLOYMENT.md`

---

## 📁 Documentation

Full documentation tersedia di folder:

```text
/docs
```

Isi:

- PRD.md
- DATABASE.md
- API_SPEC.md
- ARCHITECTURE.md
- TECH_STACK.md
- TESTING.md
- DEPLOYMENT.md
- TASK.md
```

---

## 📌 Project Status

| Component | Status |
|----------|--------|
| Backend | ✅ Complete |
| Database Design | ✅ Complete |
| API Design | ✅ Complete |
| Architecture | ✅ Complete |
| Testing | ✅ Complete |
| Deployment | ✅ Ready |
| Documentation | ✅ Complete |

---

## 🎯 Future Roadmap

- Mobile App (Flutter)
- Real-time Notification
- Redis Cache
- Queue System
- Machine Learning Recommendation
- Multi-campus Support

---

## 👨‍💻 Author

University Talent Hub Project  
Built for Academic Hackathon / Final Project

---

## 📄 License

This project is for academic and educational purposes.

---

## 🏁 Final Status

**READY FOR PRODUCTION & PRESENTATION**

---

# End of README.md