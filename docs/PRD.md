# Product Requirements Document (PRD)

# University Talent Hub

---

Version : 3.0

Status : Draft

Project Type : Web Application

Last Update : July 2026

---

# Document Information

| Item | Value |
|------|-------|
| Project | University Talent Hub |
| Version | 3.0 |
| Document Type | Product Requirements Document |
| Status | Draft |
| Platform | Web |
| Frontend | React + Vite |
| Backend | Laravel 12 |
| Database | PostgreSQL |
| Authentication | Laravel Sanctum |
| API | REST API |
| Web Server | Apache / Nginx |

---

# Revision History

| Version | Date | Description |
|----------|------|-------------|
| 1.0 | June 2026 | Initial Draft |
| 2.0 | July 2026 | Requirement Refinement |
| 3.0 | July 2026 | Complete Documentation Refactoring |

---

# Table of Contents

1. Executive Summary
2. Business Background
3. Problem Statement
4. Business Opportunity
5. Product Vision
6. Product Goals
7. Objectives
8. Success Metrics
9. Stakeholders
10. User Roles
11. User Personas
12. Scope
13. Functional Requirements
14. Non Functional Requirements
15. Business Rules
16. User Journey
17. User Stories
18. Dashboard Requirements
19. AI Recommendation
20. Gamification
21. Data Requirements
22. Security Requirements
23. Acceptance Criteria
24. MVP Roadmap
25. Traceability Matrix
26. Risks
27. Constraints
28. Future Enhancement
29. Appendix

---

# 1. Executive Summary

## Overview

University Talent Hub merupakan aplikasi berbasis web yang dirancang untuk membantu perguruan tinggi mengelola data kompetensi mahasiswa secara terintegrasi.

Sistem memungkinkan mahasiswa membangun profil profesional melalui pengelolaan keterampilan, sertifikat, dan portofolio, kemudian seluruh data tersebut diverifikasi oleh Administrator sehingga kualitas informasi yang disimpan tetap terjaga.

Selain sebagai media dokumentasi kompetensi, sistem juga menerapkan konsep **Gamification** dan **AI Recommendation** untuk meningkatkan motivasi mahasiswa dalam mengembangkan kemampuan yang relevan dengan kebutuhan industri.

---

## Product Vision

Membangun platform pengelolaan kompetensi mahasiswa yang modern, terintegrasi, mudah digunakan, dan mampu membantu mahasiswa mengembangkan potensi melalui rekomendasi berbasis data.

---

## Product Mission

- Menjadi pusat data kompetensi mahasiswa.
- Meningkatkan validitas data melalui proses verifikasi.
- Memotivasi mahasiswa menggunakan sistem gamifikasi.
- Memberikan rekomendasi pengembangan kompetensi.
- Menjadi fondasi integrasi dengan sistem akademik di masa depan.

---

# 2. Business Background

Pada banyak perguruan tinggi, data kompetensi mahasiswa masih tersebar di berbagai media seperti sertifikat digital, repository proyek, dokumen pribadi, maupun media penyimpanan lainnya.

Akibatnya:

- Kompetensi mahasiswa sulit dipantau.
- Data sering tidak terdokumentasi dengan baik.
- Sulit melakukan validasi kemampuan mahasiswa.
- Kampus tidak memiliki data kompetensi yang terpusat.
- Mahasiswa kesulitan membangun personal branding akademik.

University Talent Hub dikembangkan untuk mengatasi permasalahan tersebut melalui satu platform yang mengintegrasikan seluruh data kompetensi mahasiswa.

---

# 3. Problem Statement

Permasalahan yang ingin diselesaikan oleh sistem meliputi:

## P1

Belum terdapat sistem yang mampu mengelola kompetensi mahasiswa secara terpusat.

---

## P2

Data keterampilan, sertifikat, dan portofolio masih tersebar sehingga sulit dikelola.

---

## P3

Tidak terdapat proses verifikasi yang memastikan validitas kompetensi mahasiswa.

---

## P4

Mahasiswa belum memiliki motivasi yang kuat untuk terus meningkatkan kompetensinya.

---

## P5

Belum tersedia rekomendasi pengembangan kompetensi berdasarkan data mahasiswa.

---

# 4. Business Opportunity

Implementasi University Talent Hub memberikan manfaat bagi berbagai pihak.

## Bagi Mahasiswa

- Memiliki profil kompetensi digital.
- Mendokumentasikan seluruh pencapaian.
- Mendapatkan rekomendasi pengembangan diri.
- Memperoleh reward melalui sistem poin.

---

## Bagi Perguruan Tinggi

- Memiliki basis data kompetensi mahasiswa.
- Mempermudah proses monitoring.
- Mendukung kegiatan akademik dan non-akademik.
- Menjadi sumber data untuk program pengembangan mahasiswa.

---

# 5. Product Vision

University Talent Hub dikembangkan sebagai platform yang menghubungkan mahasiswa dengan peluang pengembangan kompetensi melalui sistem pengelolaan data, verifikasi, gamifikasi, dan rekomendasi berbasis aturan (Rule-Based Recommendation).

---

# 6. Product Goals

## Goal 1

Menyediakan sistem pengelolaan kompetensi mahasiswa yang terintegrasi.

---

## Goal 2

Meningkatkan kualitas data kompetensi melalui proses verifikasi.

---

## Goal 3

Mendorong mahasiswa aktif meningkatkan kompetensinya.

---

## Goal 4

Memberikan rekomendasi pengembangan kompetensi berdasarkan profil mahasiswa.

---

## Goal 5

Menyediakan dashboard yang informatif bagi mahasiswa dan administrator.

---

# 7. Project Objectives

Proyek ini memiliki tujuan sebagai berikut.

### O1

Mahasiswa dapat mengelola profil kompetensi secara mandiri.

### O2

Administrator dapat melakukan verifikasi data kompetensi.

### O3

Sistem mampu menghitung poin secara otomatis.

### O4

Sistem dapat menampilkan leaderboard mahasiswa.

### O5

Sistem memberikan rekomendasi pengembangan kompetensi.

### O6

Sistem menyediakan informasi peluang seperti lomba, seminar, workshop, bootcamp, dan magang.

---

# 8. Success Metrics

Keberhasilan sistem diukur menggunakan indikator berikut.

| KPI | Target |
|------|--------|
| Login Success Rate | ≥ 99% |
| Dashboard Load Time | < 3 Detik |
| API Response Time | < 500 ms |
| File Upload Success | ≥ 99% |
| Recommendation Accuracy | ≥ 95% |
| Verification Success | 100% |
| Critical Bug | 0 sebelum Release |
| User Satisfaction (UAT) | ≥ 85% |

---

# 9. Stakeholders

| Stakeholder | Responsibility |
|--------------|---------------|
| Product Owner | Menentukan kebutuhan sistem |
| Administrator | Mengelola dan memverifikasi data |
| Mahasiswa | Mengelola data kompetensi |
| Frontend Developer | Mengembangkan antarmuka pengguna |
| Backend Developer | Mengembangkan layanan backend |
| QA Engineer | Melakukan pengujian aplikasi |

---

# End of Part 1
# 10. Stakeholder Analysis

## Primary Stakeholders

### Administrator

Administrator merupakan pihak yang bertanggung jawab mengelola seluruh data kompetensi mahasiswa yang masuk ke dalam sistem.

Tanggung jawab Administrator meliputi:

- Login ke sistem
- Melihat dashboard statistik
- Mengelola data mahasiswa
- Melakukan pencarian mahasiswa berdasarkan kompetensi
- Memverifikasi Skill
- Memverifikasi Sertifikat
- Memverifikasi Portfolio
- Memberikan Point
- Mengelola Reward
- Membuat Opportunity
- Melihat Leaderboard

---

### Mahasiswa

Mahasiswa merupakan pengguna utama sistem yang bertugas membangun profil kompetensinya.

Tanggung jawab Mahasiswa meliputi:

- Login
- Melengkapi Profil
- Menambah Skill
- Upload Sertifikat
- Upload Portfolio
- Submit Verifikasi
- Melihat Status Pengajuan
- Melihat Leaderboard
- Claim Reward
- Melihat AI Recommendation

---

# 11. User Roles

Sistem hanya memiliki dua Role utama.

| Role | Description |
|------|-------------|
| Administrator | Mengelola sistem dan memverifikasi seluruh data mahasiswa |
| Mahasiswa | Mengelola profil kompetensi pribadi |

---

# 12. User Persona

## Persona 1

### Mahasiswa

**Nama**

Andi Pratama

**Usia**

20 Tahun

**Program Studi**

D3 Teknik Informatika

### Goals

- Memiliki profil kompetensi yang profesional.
- Mengumpulkan sertifikat.
- Mendapatkan poin.
- Masuk Top Leaderboard.
- Mendapatkan Reward.

### Pain Points

- Portfolio tersebar di banyak platform.
- Sertifikat sulit dikelola.
- Tidak mengetahui kompetensi apa yang harus ditingkatkan.

---

## Persona 2

### Administrator

**Nama**

Admin Kemahasiswaan

### Goals

- Memastikan validitas data mahasiswa.
- Menemukan mahasiswa berdasarkan kompetensi.
- Mengelola Reward.
- Mengelola Opportunity.

### Pain Points

- Sulit mencari mahasiswa dengan skill tertentu.
- Data kompetensi tidak terpusat.
- Sulit melakukan monitoring.

---

# 13. Product Scope

## In Scope

Fitur yang termasuk dalam MVP.

### Authentication

- Login
- Logout

---

### Talent Profile

- Edit Profil
- Upload Foto
- Biodata
- Kontak

---

### Skill Management

- Tambah Skill
- Upload Bukti
- Submit Verifikasi

---

### Certificate Management

- Upload Sertifikat
- Submit Verifikasi

---

### Portfolio Management

- Tambah Portfolio
- Upload Thumbnail
- GitHub URL
- Demo URL
- Submit Verifikasi

---

### Verification

Administrator dapat:

- Approve
- Reject
- Memberikan Catatan

---

### Point System

Point diberikan setelah:

- Skill Approved
- Certificate Approved
- Portfolio Approved

---

### Leaderboard

Menampilkan:

- Ranking
- Total Point
- Top Student

---

### Reward

Mahasiswa dapat:

- Melihat Reward
- Claim Reward

Administrator dapat:

- CRUD Reward

---

### Opportunity

Administrator dapat:

- Membuat Opportunity

Mahasiswa dapat:

- Melihat Opportunity

---

### AI Recommendation

Memberikan rekomendasi berdasarkan:

- Skill
- Sertifikat
- Portfolio
- Point

---

### Talent Search

Administrator dapat mencari mahasiswa berdasarkan:

- Skill
- Nama
- Point

---

# Out of Scope

Fitur berikut tidak termasuk dalam MVP.

- Mobile Application
- Single Sign-On (SSO)
- Machine Learning
- Chat
- Video Call
- Email Notification
- Multi Campus
- Company Portal

---

# 14. Business Process

Business Process utama sistem.

```text
Mahasiswa

↓

Login

↓

Lengkapi Profil

↓

Tambah Skill / Sertifikat / Portfolio

↓

Submit Verifikasi

↓

Administrator Review

↓

Approve / Reject

↓

Point Bertambah

↓

Leaderboard Update

↓

Claim Reward

↓

AI Recommendation Update
```

---

# 15. Business Workflow

## Workflow Skill

```text
Tambah Skill

↓

Upload Bukti

↓

Submit

↓

Pending

↓

Administrator Review

↓

Approve

↓

Tambah Point
```

---

## Workflow Certificate

```text
Upload Sertifikat

↓

Submit

↓

Pending

↓

Review

↓

Approve

↓

Tambah Point
```

---

## Workflow Portfolio

```text
Tambah Portfolio

↓

Upload Thumbnail

↓

Submit

↓

Pending

↓

Review

↓

Approve

↓

Tambah Point
```

---

## Workflow Reward

```text
Mahasiswa

↓

Lihat Reward

↓

Point Cukup?

├── Tidak
│
└── Ya

↓

Claim Reward

↓

Point Berkurang

↓

Riwayat Claim
```

---

# 16. Feature Mapping

| Module | Mahasiswa | Administrator |
|----------|:---------:|:-------------:|
| Login | ✅ | ✅ |
| Dashboard | ✅ | ✅ |
| Talent Profile | ✅ | ❌ |
| Skill | ✅ | Review |
| Certificate | ✅ | Review |
| Portfolio | ✅ | Review |
| Verification | ❌ | ✅ |
| Point | View | Manage |
| Leaderboard | View | View |
| Reward | Claim | CRUD |
| Opportunity | View | CRUD |
| Talent Search | ❌ | ✅ |
| AI Recommendation | View | ❌ |

---

# End of Part 2
# 17. Functional Requirements

Seluruh kebutuhan fungsional diberi kode **FR (Functional Requirement)** sebagai referensi implementasi.

---

# FR-001 Authentication

## Objective

Memastikan hanya pengguna yang memiliki akun dapat mengakses sistem.

---

## Business Value

- Menjaga keamanan data.
- Memisahkan hak akses Administrator dan Mahasiswa.

---

## Actor

- Administrator
- Mahasiswa

---

## Priority

⭐⭐⭐⭐⭐ Critical

---

## Preconditions

- Pengguna memiliki akun aktif.

---

## Main Flow

1. Pengguna membuka halaman Login.
2. Mengisi Email.
3. Mengisi Password.
4. Sistem melakukan validasi.
5. Sistem membuat Session.
6. Dashboard ditampilkan.

---

## Alternative Flow

- Email salah.
- Password salah.
- Akun tidak aktif.

---

## Business Rules

BR-001

Email harus unik.

BR-002

Password disimpan menggunakan hashing.

---

## Acceptance Criteria

- Login berhasil.
- Logout berhasil.
- Session tersimpan.

---

## API Mapping

POST /api/login

POST /api/logout

---

## Database

users

---

## UI Screen

Login Page

Dashboard

---

# FR-002 Dashboard

## Objective

Memberikan ringkasan informasi sesuai Role.

---

## Actor

- Mahasiswa
- Administrator

---

## Priority

⭐⭐⭐⭐⭐ Critical

---

## Dashboard Mahasiswa

Menampilkan:

- Total Skill
- Total Sertifikat
- Total Portfolio
- Total Point
- Ranking
- AI Recommendation
- Reward

---

## Dashboard Administrator

Menampilkan:

- Total Mahasiswa
- Total Skill
- Total Sertifikat
- Total Portfolio
- Pending Verification
- Total Reward
- Opportunity Aktif

---

## Acceptance Criteria

Dashboard dimuat < 3 detik.

---

## API Mapping

GET /api/dashboard

---

## Database

users

skills

certificates

portfolios

points

---

# FR-003 Talent Profile

## Objective

Mahasiswa dapat membangun profil profesional.

---

## Actor

Mahasiswa

---

## Functional Scope

- Edit Profil
- Upload Foto
- Biodata
- Kontak
- Bio

---

## Acceptance Criteria

- Profil berhasil disimpan.
- Progress Profile diperbarui.

---

## API Mapping

GET /api/profile

PUT /api/profile

---

## Database

student_profiles

---

# FR-004 Skill Management

## Objective

Mahasiswa dapat mengelola Skill.

---

## Functional Scope

- Tambah Skill
- Edit Skill
- Hapus Skill
- Upload Bukti
- Submit Verifikasi

---

## Workflow

Tambah Skill

↓

Upload Bukti

↓

Submit

↓

Pending

↓

Administrator Review

↓

Approved

↓

Tambah Point

---

## Acceptance Criteria

- Skill berhasil ditambahkan.
- Bukti berhasil diunggah.
- Status Pending.

---

## API Mapping

GET /api/skills

POST /api/skills

PUT /api/skills/{id}

DELETE /api/skills/{id}

POST /api/skills/{id}/submit

---

## Database

skills

skill_verifications

---

# FR-005 Certificate Management

## Objective

Mahasiswa dapat mengunggah sertifikat.

---

## Functional Scope

- Upload Sertifikat
- Edit
- Hapus
- Submit Verifikasi

---

## Acceptance Criteria

- Sertifikat berhasil disimpan.
- Status Pending.

---

## API Mapping

GET /api/certificates

POST /api/certificates

PUT /api/certificates/{id}

DELETE /api/certificates/{id}

POST /api/certificates/{id}/submit

---

## Database

certificates

certificate_verifications

---

# FR-006 Portfolio Management

## Objective

Mahasiswa dapat membangun Portfolio.

---

## Functional Scope

- Tambah Portfolio
- Upload Thumbnail
- GitHub URL
- Demo URL
- Submit Verifikasi

---

## Acceptance Criteria

Portfolio berhasil ditambahkan.

---

## API Mapping

GET /api/portfolios

POST /api/portfolios

PUT /api/portfolios/{id}

DELETE /api/portfolios/{id}

POST /api/portfolios/{id}/submit

---

## Database

portfolios

portfolio_verifications

---

# FR-007 Verification

## Objective

Administrator memverifikasi seluruh pengajuan mahasiswa.

---

## Actor

Administrator

---

## Functional Scope

- Approve
- Reject
- Memberikan Catatan

---

## Workflow

Pending

↓

Review

↓

Approve / Reject

↓

Point Update

---

## Acceptance Criteria

- Status berubah.
- Catatan tersimpan.
- Point otomatis dihitung.

---

## API Mapping

POST /api/verifications/{id}/approve

POST /api/verifications/{id}/reject

---

## Database

verifications

points

---

# FR-008 Point System

## Objective

Menghitung poin mahasiswa secara otomatis.

---

## Trigger

- Skill Approved
- Certificate Approved
- Portfolio Approved

---

## Acceptance Criteria

- Point bertambah otomatis.
- Riwayat point tersimpan.

---

## API Mapping

GET /api/points

---

## Database

points

point_histories

---

# FR-009 Leaderboard

## Objective

Menampilkan peringkat mahasiswa berdasarkan total poin.

---

## Actor

Mahasiswa

Administrator

---

## Acceptance Criteria

Leaderboard selalu menggunakan data terbaru.

---

## API Mapping

GET /api/leaderboard

---

## Database

leaderboard_view

---

# FR-010 Reward

## Objective

Mahasiswa dapat menukar poin menjadi hadiah.

---

## Functional Scope

Mahasiswa

- Lihat Reward
- Claim Reward

Administrator

- CRUD Reward

---

## Acceptance Criteria

- Point mencukupi.
- Stock tersedia.

---

## API Mapping

GET /api/rewards

POST /api/rewards

POST /api/rewards/{id}/claim

---

## Database

rewards

reward_claims

---

# End of PRD Part 3 (Section 1)
# FR-011 Opportunity Management

## Objective

Administrator dapat mempublikasikan berbagai peluang pengembangan mahasiswa seperti lomba, seminar, workshop, bootcamp, pelatihan, maupun magang sehingga mahasiswa memperoleh informasi yang relevan untuk meningkatkan kompetensinya.

---

## Business Value

- Meningkatkan partisipasi mahasiswa.
- Mempermudah penyebaran informasi.
- Mendukung pengembangan kompetensi mahasiswa.
- Menjadi penghubung antara kampus dan mahasiswa.

---

## Actor

Administrator

Mahasiswa

---

## Priority

⭐⭐⭐⭐ Medium

---

## Functional Scope

Administrator

- Menambah Opportunity
- Mengubah Opportunity
- Menghapus Opportunity
- Mengaktifkan Opportunity
- Menonaktifkan Opportunity

Mahasiswa

- Melihat daftar Opportunity
- Melihat Detail Opportunity

---

## Preconditions

Administrator telah login.

---

## Main Flow

Administrator

↓

Tambah Opportunity

↓

Isi Informasi

↓

Publish

↓

Mahasiswa Melihat Opportunity

---

## Alternative Flow

Data belum lengkap

↓

Validasi gagal

↓

Opportunity tidak disimpan

---

## Business Rules

BR-021

Opportunity harus memiliki tanggal mulai.

---

BR-022

Opportunity harus memiliki tanggal berakhir.

---

BR-023

Opportunity yang melewati tanggal berakhir otomatis menjadi Nonaktif.

---

## Acceptance Criteria

- Opportunity berhasil dipublikasikan.
- Opportunity hanya tampil jika status aktif.
- Mahasiswa dapat melihat detail Opportunity.

---

## API Mapping

GET /api/opportunities

GET /api/opportunities/{id}

POST /api/opportunities

PUT /api/opportunities/{id}

DELETE /api/opportunities/{id}

---

## Database Mapping

opportunities

---

## UI Mapping

Admin Opportunity Page

Student Opportunity Page

--------------------------------------------------------

# FR-012 Talent Search

## Objective

Administrator dapat menemukan mahasiswa berdasarkan kompetensi yang dimiliki.

---

## Business Value

- Mempermudah pencarian talenta.
- Mendukung kebutuhan dosen.
- Mendukung kebutuhan organisasi.
- Mendukung kebutuhan industri.

---

## Actor

Administrator

---

## Priority

⭐⭐⭐⭐⭐ Critical

---

## Functional Scope

Administrator dapat melakukan pencarian berdasarkan:

- Nama
- Program Studi
- Skill
- Point
- Status Verifikasi

---

## Preconditions

Administrator Login.

---

## Main Flow

Administrator

↓

Masukkan Keyword

↓

Filter Data

↓

Hasil Ditampilkan

↓

Melihat Detail Mahasiswa

---

## Alternative Flow

Data tidak ditemukan.

---

## Business Rules

BR-024

Hanya Administrator yang dapat mengakses Talent Search.

---

BR-025

Data yang ditampilkan merupakan data yang telah diverifikasi.

---

## Acceptance Criteria

- Search berjalan cepat.
- Filter bekerja.
- Data sesuai keyword.

---

## API Mapping

GET /api/students

GET /api/students/search

GET /api/students/{id}

---

## Database Mapping

users

student_profiles

skills

points

---

## UI Mapping

Talent Search

Student Detail

--------------------------------------------------------

# FR-013 AI Recommendation

## Objective

Memberikan rekomendasi pengembangan kompetensi berdasarkan data mahasiswa.

---

## Business Value

- Membantu mahasiswa menentukan langkah berikutnya.
- Meningkatkan kualitas kompetensi.
- Mendorong mahasiswa lebih aktif.

---

## Actor

Mahasiswa

---

## Priority

⭐⭐⭐⭐ High

---

## Recommendation Source

AI Recommendation menggunakan data berikut:

- Profile
- Skill
- Certificate
- Portfolio
- Point
- Verification Status

---

## Recommendation Engine

Versi MVP menggunakan:

Rule-Based Recommendation Engine

Contoh:

IF

Skill Backend < 3

THEN

Rekomendasi:

"Tambahkan Skill Laravel."

---

IF

Portfolio = 0

THEN

Rekomendasi:

"Buat Portfolio pertama."

---

IF

Point < 20

THEN

Rekomendasi:

"Lengkapi sertifikat untuk memperoleh lebih banyak poin."

---

IF

Profile Completion < 100%

THEN

Rekomendasi:

"Lengkapi data profil."

---

## Main Flow

Mahasiswa Login

↓

Dashboard

↓

Sistem Membaca Data

↓

Rule Engine

↓

Generate Recommendation

↓

Recommendation Ditampilkan

---

## Alternative Flow

Belum ada data.

↓

Recommendation Default

"Lengkapi Profil Anda."

---

## Business Rules

BR-026

Recommendation hanya menggunakan data yang telah diverifikasi.

---

BR-027

Recommendation diperbarui setiap terdapat perubahan data kompetensi.

---

BR-028

Recommendation maksimal menampilkan 5 rekomendasi.

---

## Acceptance Criteria

- Recommendation muncul pada Dashboard.
- Recommendation berubah sesuai data terbaru.
- Recommendation dihasilkan kurang dari 1 detik.

---

## API Mapping

GET /api/recommendations

---

## Database Mapping

recommendations

student_profiles

skills

certificates

portfolios

points

---

## UI Mapping

Student Dashboard

Recommendation Card

--------------------------------------------------------

# Functional Requirement Summary

| ID | Module | Priority |
|----|--------------------------|----------|
| FR-001 | Authentication | Critical |
| FR-002 | Dashboard | Critical |
| FR-003 | Talent Profile | Critical |
| FR-004 | Skill Management | Critical |
| FR-005 | Certificate Management | Critical |
| FR-006 | Portfolio Management | Critical |
| FR-007 | Verification | Critical |
| FR-008 | Point System | Critical |
| FR-009 | Leaderboard | High |
| FR-010 | Reward Management | High |
| FR-011 | Opportunity Management | Medium |
| FR-012 | Talent Search | Critical |
| FR-013 | AI Recommendation | High |

--------------------------------------------------------

# End of Chapter 17

Functional Requirements Completed
# 18. Business Rules

Business Rules merupakan aturan utama yang mengatur seluruh proses bisnis pada University Talent Hub.

---

# 18.1 Authentication Rules

## BR-001

Pengguna wajib memiliki akun aktif sebelum dapat mengakses sistem.

---

## BR-002

Setiap pengguna hanya dapat login menggunakan satu akun yang terdaftar.

---

## BR-003

Password harus disimpan menggunakan algoritma hashing yang aman.

---

## BR-004

Session akan berakhir secara otomatis setelah periode tidak aktif.

---

# 18.2 Talent Profile Rules

## BR-005

Mahasiswa hanya dapat mengubah data profil miliknya sendiri.

---

## BR-006

Profil dianggap lengkap apabila seluruh informasi wajib telah diisi.

Field wajib:

- Foto Profil
- Nama
- NIM
- Program Studi
- Angkatan
- Nomor Telepon
- Email
- Bio Singkat

---

# 18.3 Skill Rules

## BR-007

Skill baru memiliki status awal:

Pending

---

## BR-008

Skill tidak memperoleh poin sebelum diverifikasi.

---

## BR-009

Skill yang ditolak dapat diperbaiki dan diajukan kembali.

---

# 18.4 Certificate Rules

## BR-010

Setiap sertifikat harus memiliki bukti berupa file.

---

## BR-011

Status awal sertifikat adalah:

Pending

---

## BR-012

Sertifikat hanya memperoleh poin setelah disetujui Administrator.

---

# 18.5 Portfolio Rules

## BR-013

Portfolio harus memiliki minimal:

- Judul
- Deskripsi
- Thumbnail

---

## BR-014

Portfolio dapat menyertakan:

- GitHub URL
- Demo URL

---

## BR-015

Portfolio memperoleh poin setelah status berubah menjadi Approved.

---

# 18.6 Verification Rules

## BR-016

Hanya Administrator yang dapat melakukan proses verifikasi.

---

## BR-017

Administrator hanya memiliki dua keputusan:

- Approved
- Rejected

---

## BR-018

Administrator dapat memberikan catatan ketika melakukan verifikasi.

---

## BR-019

Seluruh riwayat verifikasi harus disimpan.

---

# 18.7 Point Rules

Point hanya diberikan apabila data telah diverifikasi.

---

## Certificate

| Jenis | Point |
|--------|------:|
| Lokal | 1 |
| Regional | 3 |
| Nasional | 5 |
| Internasional | 10 |

---

## Portfolio

| Jenis | Point |
|--------|------:|
| Personal Project | 2 |
| Freelance Project | 5 |
| Industry Project | 8 |

---

## Competition

| Prestasi | Point |
|----------|------:|
| Juara Kompetisi | 10 |

---

## Skill

Setiap Skill yang disetujui memperoleh poin sesuai kategori yang ditentukan Administrator.

Contoh:

| Level | Point |
|--------|------:|
| Basic | 1 |
| Intermediate | 3 |
| Advanced | 5 |

---

## BR-020

Point diberikan secara otomatis setelah proses verifikasi berhasil.

---

## BR-021

Point tidak dapat dikurangi kecuali digunakan untuk melakukan Claim Reward.

---

## BR-022

Seluruh perubahan point harus tercatat pada Point History.

---

# 18.8 Leaderboard Rules

## BR-023

Leaderboard dihitung berdasarkan Total Point.

---

## BR-024

Apabila dua mahasiswa memiliki poin yang sama, maka urutan ditentukan berdasarkan:

1. Jumlah aktivitas terverifikasi.
2. Waktu memperoleh poin terakhir.

---

## BR-025

Leaderboard diperbarui secara otomatis setelah perubahan point.

---

# 18.9 Reward Rules

## BR-026

Reward hanya dapat diklaim apabila point mencukupi.

---

## BR-027

Claim Reward akan mengurangi point mahasiswa.

---

## BR-028

Reward yang stoknya habis tidak dapat diklaim.

---

## BR-029

Riwayat claim reward harus disimpan.

---

# 18.10 Opportunity Rules

## BR-030

Opportunity hanya dapat dibuat oleh Administrator.

---

## BR-031

Opportunity harus memiliki:

- Judul
- Deskripsi
- Tanggal Mulai
- Tanggal Berakhir

---

## BR-032

Opportunity otomatis menjadi Nonaktif apabila melewati tanggal berakhir.

---

# 18.11 AI Recommendation Rules

## BR-033

Recommendation hanya menggunakan data yang telah diverifikasi.

---

## BR-034

Recommendation diperbarui setiap terjadi perubahan data kompetensi.

---

## BR-035

Maksimal lima rekomendasi ditampilkan pada Dashboard.

---

## BR-036

Apabila mahasiswa belum memiliki data kompetensi, sistem menampilkan rekomendasi awal:

"Lengkapi profil dan tambahkan kompetensi pertamamu."

---

# 18.12 Talent Search Rules

## BR-037

Talent Search hanya dapat digunakan oleh Administrator.

---

## BR-038

Administrator dapat melakukan pencarian berdasarkan:

- Nama
- Skill
- Program Studi
- Total Point

---

## BR-039

Data hasil pencarian hanya menampilkan kompetensi yang telah diverifikasi.

---

# 18.13 General Rules

## BR-040

Seluruh aktivitas penting dicatat pada Activity Log.

---

## BR-041

Data tidak dihapus secara permanen (Soft Delete).

---

## BR-042

Seluruh komunikasi antara Frontend dan Backend menggunakan HTTPS pada lingkungan produksi.

---

# Business Rule Summary

| Category | Total Rules |
|-----------|------------:|
| Authentication | 4 |
| Talent Profile | 2 |
| Skill | 3 |
| Certificate | 3 |
| Portfolio | 3 |
| Verification | 4 |
| Point System | 3 |
| Leaderboard | 3 |
| Reward | 4 |
| Opportunity | 3 |
| AI Recommendation | 4 |
| Talent Search | 3 |
| General | 3 |

**Total Business Rules: 42**

---

# End of Chapter 18
# 19. Non-Functional Requirements

Non-Functional Requirements (NFR) mendefinisikan standar kualitas yang harus dipenuhi oleh sistem University Talent Hub.

---

# 19.1 Performance Requirements

## NFR-001

Dashboard harus dapat dimuat dalam waktu kurang dari **3 detik** pada koneksi internet normal.

---

## NFR-002

Response REST API rata-rata tidak lebih dari **500 ms**.

---

## NFR-003

Proses Login maksimal **2 detik**.

---

## NFR-004

Proses Upload File maksimal **10 detik** untuk ukuran file ≤ 5 MB.

---

## NFR-005

Sistem mampu menangani minimal **100 pengguna aktif secara bersamaan** tanpa penurunan performa yang signifikan.

---

# 19.2 Availability

## NFR-006

Target ketersediaan sistem minimal:

99%

---

## NFR-007

Apabila terjadi kegagalan aplikasi, sistem dapat dipulihkan melalui backup database.

---

# 19.3 Security

## NFR-008

Seluruh password disimpan menggunakan algoritma hashing Laravel.

---

## NFR-009

Seluruh endpoint yang membutuhkan autentikasi wajib menggunakan Laravel Sanctum.

---

## NFR-010

Setiap pengguna hanya dapat mengakses data sesuai hak aksesnya (Role-Based Access Control).

---

## NFR-011

Seluruh komunikasi menggunakan protokol HTTPS pada lingkungan produksi.

---

## NFR-012

File upload hanya menerima format yang telah ditentukan.

Contoh:

- PDF
- JPG
- JPEG
- PNG

---

## NFR-013

Ukuran maksimal file upload adalah **5 MB**.

---

# 19.4 Reliability

## NFR-014

Seluruh transaksi database harus menggunakan Transaction untuk menjaga konsistensi data.

---

## NFR-015

Data yang telah berhasil disimpan tidak boleh hilang meskipun terjadi kegagalan pada proses berikutnya.

---

# 19.5 Scalability

## NFR-016

Arsitektur aplikasi harus memungkinkan penambahan modul baru tanpa mengubah modul yang sudah ada.

---

## NFR-017

Database harus dirancang agar mudah dikembangkan ketika jumlah mahasiswa meningkat.

---

# 19.6 Maintainability

## NFR-018

Kode backend mengikuti struktur MVC Laravel.

---

## NFR-019

Kode frontend menggunakan Component-Based Architecture React.

---

## NFR-020

Setiap endpoint REST API harus memiliki dokumentasi.

---

## NFR-021

Seluruh source code menggunakan Git Version Control.

---

# 19.7 Usability

## NFR-022

Antarmuka menggunakan desain modern dengan dominasi warna terang (Putih, Biru, Abu-abu Muda).

---

## NFR-023

Navigasi harus konsisten pada seluruh halaman.

---

## NFR-024

Pengguna dapat memahami fungsi utama sistem tanpa memerlukan pelatihan khusus.

---

## NFR-025

Sistem mendukung tampilan responsif untuk Desktop, Tablet, dan Mobile Browser.

---

# 19.8 Compatibility

## NFR-026

Sistem mendukung browser berikut:

- Google Chrome
- Microsoft Edge
- Mozilla Firefox
- Safari

---

## NFR-027

Sistem berjalan pada:

- Windows
- Linux
- macOS

---

# 19.9 Data Integrity

## NFR-028

Primary Key harus bersifat unik.

---

## NFR-029

Foreign Key harus menjaga hubungan antar tabel.

---

## NFR-030

Soft Delete digunakan pada data utama untuk menghindari kehilangan data permanen.

---

# 19.10 Logging & Monitoring

## NFR-031

Seluruh aktivitas penting dicatat pada Activity Log.

Contoh:

- Login
- Logout
- Upload Skill
- Upload Sertifikat
- Upload Portfolio
- Verifikasi
- Claim Reward

---

## NFR-032

Kesalahan sistem dicatat pada Error Log.

---

# 19.11 Backup & Recovery

## NFR-033

Database dibackup secara berkala.

---

## NFR-034

Backup dapat digunakan untuk proses restore apabila terjadi kegagalan sistem.

---

# 19.12 Accessibility

## NFR-035

Ukuran teks minimal 14 px.

---

## NFR-036

Kontras warna memenuhi standar keterbacaan.

---

## NFR-037

Seluruh tombol memiliki label yang jelas.

---

# 19.13 Localization

## NFR-038

Bahasa utama aplikasi adalah Bahasa Indonesia.

---

## NFR-039

Struktur aplikasi memungkinkan penambahan dukungan bahasa lain pada versi berikutnya.

---

# 19.14 Audit Trail

## NFR-040

Setiap perubahan data penting menyimpan informasi:

- User
- Waktu
- Aktivitas
- Data yang diubah

---

# Non-Functional Requirement Summary

| Category | Total |
|----------|------:|
| Performance | 5 |
| Availability | 2 |
| Security | 6 |
| Reliability | 2 |
| Scalability | 2 |
| Maintainability | 4 |
| Usability | 4 |
| Compatibility | 2 |
| Data Integrity | 3 |
| Logging | 2 |
| Backup | 2 |
| Accessibility | 3 |
| Localization | 2 |
| Audit Trail | 1 |

**Total NFR: 40**

---

# End of Chapter 19
# 20. User Stories & Acceptance Criteria

Bab ini menjelaskan kebutuhan sistem dari sudut pandang pengguna (User Story) beserta kriteria penerimaan (Acceptance Criteria) yang menjadi acuan implementasi dan pengujian.

---

# Epic 1 — Authentication

## US-001 Login

### User Story

Sebagai **Mahasiswa** atau **Administrator**, saya ingin login ke dalam sistem agar dapat mengakses fitur sesuai hak akses saya.

### Acceptance Criteria

**Scenario 1 — Login Berhasil**

**Given**

- Pengguna memiliki akun aktif.

**When**

- Memasukkan email dan password yang benar.

**Then**

- Sistem berhasil melakukan autentikasi.
- Dashboard ditampilkan.
- Session dibuat.

---

**Scenario 2 — Login Gagal**

**Given**

- Email atau password salah.

**When**

- Menekan tombol Login.

**Then**

- Sistem menampilkan pesan kesalahan.
- Pengguna tetap berada di halaman Login.

---

Priority

Critical

---

# Epic 2 — Talent Profile

## US-002 Edit Profile

### User Story

Sebagai Mahasiswa, saya ingin melengkapi profil agar informasi kompetensi saya menjadi lengkap.

### Acceptance Criteria

**Given**

Mahasiswa telah login.

**When**

Mengubah data profil.

**Then**

- Data berhasil diperbarui.
- Progress Profile berubah.

---

Priority

Critical

---

# Epic 3 — Skill Management

## US-003 Menambah Skill

### User Story

Sebagai Mahasiswa, saya ingin menambahkan Skill agar kompetensi saya dapat diverifikasi.

### Acceptance Criteria

**Given**

Mahasiswa login.

**When**

Mengisi data Skill dan menyimpan.

**Then**

- Skill tersimpan.
- Status Pending.
- Belum memperoleh Point.

---

## US-004 Submit Skill

### User Story

Sebagai Mahasiswa, saya ingin mengirim Skill untuk diverifikasi Administrator.

### Acceptance Criteria

**Given**

Skill telah dibuat.

**When**

Menekan tombol Submit.

**Then**

Status berubah menjadi Pending Review.

---

Priority

Critical

---

# Epic 4 — Certificate Management

## US-005 Upload Certificate

### User Story

Sebagai Mahasiswa, saya ingin mengunggah sertifikat agar kompetensi saya dapat divalidasi.

### Acceptance Criteria

**Given**

Mahasiswa login.

**When**

Mengunggah file sertifikat.

**Then**

- File berhasil disimpan.
- Status Pending.

---

Priority

Critical

---

# Epic 5 — Portfolio Management

## US-006 Upload Portfolio

### User Story

Sebagai Mahasiswa, saya ingin menambahkan Portfolio sehingga hasil karya saya dapat diverifikasi.

### Acceptance Criteria

**Given**

Mahasiswa login.

**When**

Mengisi data Portfolio.

**Then**

Portfolio berhasil ditambahkan.

---

Priority

Critical

---

# Epic 6 — Verification

## US-007 Approve Verification

### User Story

Sebagai Administrator, saya ingin memverifikasi data mahasiswa agar hanya data valid yang memperoleh Point.

### Acceptance Criteria

**Given**

Data berstatus Pending.

**When**

Administrator memilih Approve.

**Then**

- Status menjadi Approved.
- Point otomatis bertambah.
- Riwayat tersimpan.

---

## US-008 Reject Verification

### User Story

Sebagai Administrator, saya ingin menolak data yang tidak valid.

### Acceptance Criteria

**Given**

Data Pending.

**When**

Administrator memilih Reject.

**Then**

- Status menjadi Rejected.
- Catatan tersimpan.
- Point tidak bertambah.

---

Priority

Critical

---

# Epic 7 — Point System

## US-009 Automatic Point

### User Story

Sebagai Mahasiswa, saya ingin memperoleh Point secara otomatis setelah data disetujui.

### Acceptance Criteria

**Given**

Status berubah menjadi Approved.

**When**

Verifikasi selesai.

**Then**

Point bertambah sesuai aturan.

---

Priority

Critical

---

# Epic 8 — Leaderboard

## US-010 View Leaderboard

### User Story

Sebagai Mahasiswa, saya ingin melihat peringkat sehingga saya mengetahui posisi saya dibanding mahasiswa lain.

### Acceptance Criteria

**Given**

Mahasiswa login.

**When**

Membuka Leaderboard.

**Then**

- Ranking tampil.
- Point tampil.
- Urutan benar.

---

Priority

High

---

# Epic 9 — Reward

## US-011 Claim Reward

### User Story

Sebagai Mahasiswa, saya ingin menukar Point menjadi Reward.

### Acceptance Criteria

**Given**

Point mencukupi.

**When**

Menekan tombol Claim.

**Then**

- Reward berhasil diklaim.
- Point berkurang.
- Riwayat tersimpan.

---

Priority

High

---

# Epic 10 — Opportunity

## US-012 Publish Opportunity

### User Story

Sebagai Administrator, saya ingin mempublikasikan Opportunity agar mahasiswa memperoleh informasi terbaru.

### Acceptance Criteria

**Given**

Administrator login.

**When**

Menyimpan Opportunity.

**Then**

Opportunity muncul pada halaman mahasiswa.

---

Priority

Medium

---

# Epic 11 — Talent Search

## US-013 Search Student

### User Story

Sebagai Administrator, saya ingin mencari mahasiswa berdasarkan kompetensi sehingga mudah menemukan talenta yang sesuai.

### Acceptance Criteria

**Given**

Administrator login.

**When**

Memasukkan kata kunci.

**Then**

Daftar mahasiswa sesuai filter ditampilkan.

---

Priority

Critical

---

# Epic 12 — AI Recommendation

## US-014 AI Recommendation

### User Story

Sebagai Mahasiswa, saya ingin memperoleh rekomendasi pengembangan kompetensi berdasarkan data saya.

### Acceptance Criteria

**Given**

Mahasiswa memiliki data kompetensi.

**When**

Membuka Dashboard.

**Then**

Sistem menampilkan maksimal lima rekomendasi yang relevan.

---

Priority

High

---

# User Story Summary

| Epic | User Story | Priority |
|------|------------|----------|
| Authentication | 1 | Critical |
| Talent Profile | 1 | Critical |
| Skill | 2 | Critical |
| Certificate | 1 | Critical |
| Portfolio | 1 | Critical |
| Verification | 2 | Critical |
| Point System | 1 | Critical |
| Leaderboard | 1 | High |
| Reward | 1 | High |
| Opportunity | 1 | Medium |
| Talent Search | 1 | Critical |
| AI Recommendation | 1 | High |

Total User Stories: **14**

---

# End of Chapter 20
# 21. Data Requirements

Bab ini mendefinisikan kebutuhan data utama yang digunakan oleh sistem University Talent Hub.

---

# 21.1 Entity Relationship Overview

Sistem terdiri dari beberapa entitas utama berikut:

- User
- Student Profile
- Skill
- Certificate
- Portfolio
- Verification
- Point
- Point History
- Reward
- Reward Claim
- Opportunity
- AI Recommendation
- Activity Log

---

# 21.2 User

## Description

Menyimpan informasi akun pengguna.

## Attributes

| Attribute | Type | Description |
|------------|------|-------------|
| id | UUID | Primary Key |
| name | String | Nama lengkap |
| email | String | Email pengguna |
| password | String | Password Hash |
| role | Enum | administrator / mahasiswa |
| status | Boolean | Status akun |
| created_at | Timestamp | Waktu dibuat |
| updated_at | Timestamp | Waktu diperbarui |

---

# 21.3 Student Profile

## Description

Menyimpan informasi profil mahasiswa.

## Attributes

| Attribute | Type |
|------------|------|
| id | UUID |
| user_id | UUID |
| nim | String |
| program_studi | String |
| angkatan | Integer |
| phone | String |
| bio | Text |
| photo | String |
| github_url | String |
| linkedin_url | String |

---

# 21.4 Skill

## Description

Menyimpan data kompetensi mahasiswa.

## Attributes

| Attribute | Type |
|------------|------|
| id | UUID |
| student_id | UUID |
| category | String |
| skill_name | String |
| level | Enum |
| evidence_file | String |
| verification_status | Enum |

---

# 21.5 Certificate

## Description

Menyimpan sertifikat mahasiswa.

## Attributes

| Attribute | Type |
|------------|------|
| id | UUID |
| student_id | UUID |
| title | String |
| organizer | String |
| certificate_level | Enum |
| issue_date | Date |
| certificate_file | String |
| verification_status | Enum |

---

# 21.6 Portfolio

## Description

Menyimpan hasil karya mahasiswa.

## Attributes

| Attribute | Type |
|------------|------|
| id | UUID |
| student_id | UUID |
| title | String |
| description | Text |
| github_url | String |
| demo_url | String |
| thumbnail | String |
| verification_status | Enum |

---

# 21.7 Verification

## Description

Menyimpan hasil verifikasi Administrator.

## Attributes

| Attribute | Type |
|------------|------|
| id | UUID |
| entity_type | Enum |
| entity_id | UUID |
| reviewer_id | UUID |
| status | Enum |
| notes | Text |
| verified_at | Timestamp |

---

# 21.8 Point

## Description

Menyimpan total poin mahasiswa.

## Attributes

| Attribute | Type |
|------------|------|
| id | UUID |
| student_id | UUID |
| total_point | Integer |

---

# 21.9 Point History

## Description

Menyimpan riwayat perubahan poin.

## Attributes

| Attribute | Type |
|------------|------|
| id | UUID |
| student_id | UUID |
| activity | String |
| point | Integer |
| created_at | Timestamp |

---

# 21.10 Reward

## Description

Daftar hadiah yang dapat ditukar mahasiswa.

## Attributes

| Attribute | Type |
|------------|------|
| id | UUID |
| title | String |
| description | Text |
| point_required | Integer |
| stock | Integer |
| image | String |
| status | Boolean |

---

# 21.11 Reward Claim

## Description

Riwayat penukaran reward.

## Attributes

| Attribute | Type |
|------------|------|
| id | UUID |
| reward_id | UUID |
| student_id | UUID |
| point_used | Integer |
| claim_date | Timestamp |

---

# 21.12 Opportunity

## Description

Informasi kegiatan pengembangan kompetensi.

## Attributes

| Attribute | Type |
|------------|------|
| id | UUID |
| title | String |
| description | Text |
| category | Enum |
| location | String |
| registration_link | String |
| start_date | Date |
| end_date | Date |
| status | Boolean |

---

# 21.13 AI Recommendation

## Description

Menyimpan hasil rekomendasi sistem.

## Attributes

| Attribute | Type |
|------------|------|
| id | UUID |
| student_id | UUID |
| recommendation_type | String |
| title | String |
| description | Text |
| priority | Enum |

---

# 21.14 Activity Log

## Description

Mencatat aktivitas penting pengguna.

## Attributes

| Attribute | Type |
|------------|------|
| id | UUID |
| user_id | UUID |
| activity | String |
| ip_address | String |
| created_at | Timestamp |

---

# 21.15 Data Relationships

| Parent | Relationship | Child |
|---------|--------------|-------|
| User | 1 : 1 | Student Profile |
| Student Profile | 1 : N | Skill |
| Student Profile | 1 : N | Certificate |
| Student Profile | 1 : N | Portfolio |
| Student Profile | 1 : 1 | Point |
| Student Profile | 1 : N | Point History |
| Student Profile | 1 : N | Reward Claim |
| Student Profile | 1 : N | AI Recommendation |
| Reward | 1 : N | Reward Claim |
| Administrator | 1 : N | Verification |

---

# 21.16 Data Validation Rules

| Entity | Validation |
|---------|------------|
| User | Email harus unik |
| Skill | Nama skill wajib diisi |
| Certificate | File wajib diunggah |
| Portfolio | Judul wajib diisi |
| Reward | Point harus lebih dari 0 |
| Opportunity | Tanggal selesai harus lebih besar dari tanggal mulai |

---

# 21.17 Data Retention

| Data | Retention |
|------|-----------|
| Activity Log | 1 Tahun |
| Verification History | Permanen |
| Point History | Permanen |
| Reward Claim | Permanen |
| Opportunity | Sampai dinonaktifkan |
| Student Profile | Selama akun aktif |

---

# End of Chapter 21
# 22. Security Requirements

Bab ini mendefinisikan kebutuhan keamanan sistem University Talent Hub untuk menjaga kerahasiaan, integritas, dan ketersediaan data.

---

# 22.1 Security Objectives

Sistem harus mampu:

- Melindungi data mahasiswa.
- Mencegah akses tidak sah.
- Menjamin integritas data.
- Menjaga kerahasiaan informasi pengguna.
- Mencatat seluruh aktivitas penting pengguna.

---

# 22.2 Authentication

Authentication dilakukan menggunakan Laravel Sanctum.

## SR-001

Setiap pengguna wajib login sebelum mengakses sistem.

---

## SR-002

Password tidak boleh disimpan dalam bentuk Plain Text.

Menggunakan:

- bcrypt
- Argon2id

---

## SR-003

Session Authentication hanya berlaku untuk pengguna yang berhasil login.

---

## SR-004

Logout akan menghapus Session pengguna.

---

# 22.3 Authorization

Sistem menerapkan Role Based Access Control (RBAC).

Role:

- Administrator
- Mahasiswa

---

## Administrator

Hak akses:

- Dashboard
- Verifikasi
- Reward
- Opportunity
- Talent Search
- Leaderboard

---

## Mahasiswa

Hak akses:

- Dashboard
- Profile
- Skill
- Certificate
- Portfolio
- Reward
- Leaderboard
- AI Recommendation

---

## SR-005

Mahasiswa hanya dapat mengakses data miliknya sendiri.

---

## SR-006

Administrator memiliki akses penuh terhadap proses verifikasi.

---

# 22.4 Password Policy

## SR-007

Minimal 8 karakter.

---

## SR-008

Mengandung:

- Huruf besar
- Huruf kecil
- Angka

---

## SR-009

Password disimpan menggunakan Hash.

---

# 22.5 Session Management

## SR-010

Session otomatis berakhir setelah periode tidak aktif.

---

## SR-011

Pengguna harus login kembali setelah Session berakhir.

---

# 22.6 Input Validation

Seluruh input divalidasi pada sisi Backend.

---

## SR-012

Field wajib tidak boleh kosong.

---

## SR-013

Email harus valid.

---

## SR-014

URL GitHub dan Demo harus menggunakan format URL yang benar.

---

## SR-015

Tanggal tidak boleh melebihi tanggal saat ini untuk sertifikat.

---

# 22.7 File Upload Security

File yang diizinkan:

- PDF
- PNG
- JPG
- JPEG

---

## SR-016

Ukuran maksimal file:

5 MB

---

## SR-017

Nama file diubah secara otomatis untuk menghindari konflik nama.

---

## SR-018

File disimpan pada direktori yang aman dan tidak dapat diakses secara langsung tanpa izin.

---

# 22.8 API Security

Seluruh endpoint API menggunakan autentikasi.

---

## SR-019

Endpoint privat wajib menggunakan middleware authentication.

---

## SR-020

Setiap request divalidasi sebelum diproses.

---

## SR-021

Response API tidak boleh mengembalikan informasi sensitif seperti password atau token internal.

---

# 22.9 Data Security

## SR-022

Soft Delete digunakan untuk data utama.

---

## SR-023

Seluruh transaksi penting menggunakan Database Transaction.

---

## SR-024

Foreign Key digunakan untuk menjaga integritas data.

---

# 22.10 Audit Trail

Aktivitas berikut dicatat:

- Login
- Logout
- Tambah Skill
- Upload Sertifikat
- Upload Portfolio
- Verifikasi
- Claim Reward
- Tambah Opportunity

---

## SR-025

Setiap log menyimpan:

- User
- Waktu
- Aktivitas
- IP Address

---

# 22.11 Error Handling

## SR-026

Pesan error kepada pengguna tidak boleh menampilkan detail internal aplikasi.

Contoh:

❌ SQL Error

✅ Terjadi kesalahan, silakan coba kembali.

---

## SR-027

Seluruh exception dicatat pada Error Log.

---

# 22.12 Security Headers

Server produksi harus menggunakan:

- HTTPS
- HSTS
- X-Frame-Options
- X-Content-Type-Options
- Content Security Policy (CSP)

---

# 22.13 Backup Security

## SR-028

Backup database hanya dapat diakses oleh Administrator sistem.

---

## SR-029

Backup dilakukan secara berkala sesuai jadwal.

---

# 22.14 Privacy

## SR-030

Data mahasiswa hanya digunakan untuk kebutuhan pengelolaan kompetensi di dalam sistem.

---

## SR-031

Sistem tidak membagikan data mahasiswa kepada pihak lain tanpa otorisasi.

---

# Security Requirement Summary

| Category | Total |
|----------|------:|
| Authentication | 4 |
| Authorization | 2 |
| Password Policy | 3 |
| Session | 2 |
| Input Validation | 4 |
| File Upload | 3 |
| API Security | 3 |
| Data Security | 3 |
| Audit Trail | 1 |
| Error Handling | 2 |
| Security Header | 1 |
| Backup | 2 |
| Privacy | 2 |

Total Security Requirements : **32**

---

# End of Chapter 22
# 23. Dashboard Requirements

Dashboard merupakan halaman utama setelah pengguna berhasil melakukan login.

Dashboard dirancang agar mampu menampilkan informasi penting secara cepat, ringkas, dan mudah dipahami sesuai dengan peran pengguna.

---

# 23.1 Dashboard Overview

Sistem menyediakan dua jenis Dashboard.

| Dashboard | Pengguna |
|------------|-----------|
| Student Dashboard | Mahasiswa |
| Administrator Dashboard | Administrator |

---

# 23.2 Student Dashboard

## Objective

Memberikan ringkasan perkembangan kompetensi mahasiswa secara real-time.

---

## UI Theme

Modern

Minimalis

Light Mode

Dominan Putih

Accent Color:

- Primary Blue
- Emerald Green
- Orange
- Red

---

## Layout

--------------------------------------

Navbar

--------------------------------------

Sidebar

Dashboard

Profile

Skill

Certificate

Portfolio

Leaderboard

Reward

Opportunity

--------------------------------------

Content

--------------------------------------

Footer

--------------------------------------

---

# 23.3 Dashboard Components

## DC-001 Welcome Card

Menampilkan:

- Foto Mahasiswa
- Nama
- NIM
- Program Studi

Contoh

Halo,

Ahmad Isnan Wahyudi

D3 Teknik Informatika

Selamat datang kembali.

---

## DC-002 Profile Completion

Progress Bar

Contoh

Profile Completion

85%

---

Progress dihitung berdasarkan:

- Foto
- Bio
- Nomor HP
- Github
- LinkedIn
- Skill
- Sertifikat
- Portfolio

---

## DC-003 Statistics Card

Menampilkan

Total Skill

Total Certificate

Total Portfolio

Total Point

Contoh

+----------------+

Skill

12

+----------------+

Certificate

8

+----------------+

Portfolio

5

+----------------+

Point

86

+----------------+

---

## DC-004 Verification Status

Menampilkan

Pending

Approved

Rejected

---

## DC-005 AI Recommendation

Card khusus rekomendasi.

Contoh

Recommended Skill

Laravel

Priority

High

Reason

Portfolio Backend masih sedikit.

Action

Tambah Skill

---

Menampilkan maksimal

5 Recommendation

---

## DC-006 Leaderboard Preview

Top 5 Mahasiswa

Menampilkan

Ranking

Nama

Point

---

## DC-007 Reward Preview

Menampilkan

Reward yang dapat diklaim.

Contoh

Mouse Wireless

100 Point

Claim

---

## DC-008 Opportunity

Menampilkan Opportunity terbaru.

Informasi

Judul

Kategori

Deadline

Lokasi

---

## DC-009 Recent Activity

Menampilkan aktivitas terakhir.

Contoh

✔ Skill Laravel disetujui

✔ Sertifikat AWS diupload

✔ Point bertambah

---

# 23.4 Administrator Dashboard

## Objective

Memberikan informasi statistik keseluruhan sistem.

---

## AC-001 Summary Cards

Menampilkan

Total Mahasiswa

Total Skill

Total Certificate

Total Portfolio

Pending Verification

Reward

Opportunity

---

## AC-002 Verification Queue

Menampilkan daftar verifikasi terbaru.

Kolom

Mahasiswa

Jenis

Tanggal

Status

Aksi

---

## AC-003 Statistics Chart

Menampilkan grafik

Skill Terpopuler

Certificate Distribution

Portfolio Growth

Point Distribution

---

## AC-004 Leaderboard

Top 10 Mahasiswa.

---

## AC-005 Opportunity Summary

Jumlah Opportunity

Aktif

Nonaktif

Selesai

---

## AC-006 Reward Summary

Reward Aktif

Reward Habis

Reward Terbanyak Diklaim

---

## AC-007 Activity Log

Menampilkan

Login

Verifikasi

Upload

Claim Reward

---

# 23.5 Dashboard Navigation

Student

Dashboard

↓

Profile

↓

Skill

↓

Certificate

↓

Portfolio

↓

Leaderboard

↓

Reward

↓

Opportunity

↓

Logout

---

Administrator

Dashboard

↓

Verification

↓

Student

↓

Reward

↓

Opportunity

↓

Leaderboard

↓

Activity Log

↓

Logout

---

# 23.6 Dashboard Widgets

Student Dashboard

| Widget | Priority |
|----------|----------|
| Welcome | High |
| Statistics | High |
| Profile Completion | High |
| Verification Status | High |
| AI Recommendation | High |
| Leaderboard | Medium |
| Reward | Medium |
| Opportunity | Medium |
| Activity | Low |

---

Administrator Dashboard

| Widget | Priority |
|----------|----------|
| Summary | High |
| Verification Queue | High |
| Statistics | High |
| Leaderboard | Medium |
| Reward | Medium |
| Opportunity | Medium |
| Activity Log | Low |

---

# 23.7 Responsive Design

Desktop

>= 1200 px

Sidebar tampil penuh.

---

Tablet

768–1199 px

Sidebar dapat diperkecil.

---

Mobile

< 768 px

Sidebar berubah menjadi Drawer Menu.

Grid berubah menjadi satu kolom.

---

# 23.8 Dashboard Performance

Dashboard harus:

- Load < 3 detik
- Lazy Loading untuk tabel
- Pagination pada data besar
- Skeleton Loading saat fetch data
- Cache data statistik jika memungkinkan

---

# 23.9 Empty State

Jika belum memiliki data.

Contoh

Belum ada Skill.

Tambahkan Skill pertamamu.

Button

Tambah Skill

---

# 23.10 Error State

Jika terjadi kesalahan.

Contoh

Terjadi kesalahan.

Silakan coba kembali.

Button

Refresh

---

# Dashboard Requirement Summary

| Dashboard | Widget |
|------------|-------:|
| Student | 9 |
| Administrator | 7 |

Total Widget

16 Widget

---

# End of Chapter 23
# 24. MVP Roadmap & Release Planning

Roadmap ini menjelaskan tahapan pengembangan University Talent Hub mulai dari Minimum Viable Product (MVP) hingga versi pengembangan berikutnya.

---

# 24.1 Development Strategy

Metode pengembangan menggunakan pendekatan **Agile Scrum**.

Karakteristik:

- Pengembangan bertahap (Incremental)
- Iterasi singkat (Sprint)
- Prioritas berdasarkan Business Value
- Evaluasi setiap akhir Sprint

---

# 24.2 Product Release

| Version | Status | Target |
|----------|--------|--------|
| v1.0 | MVP | Hackathon Submission |
| v1.1 | Improvement | Internal Testing |
| v2.0 | Production Ready | Kampus |

---

# 24.3 MVP Scope (Version 1.0)

Fitur wajib yang harus tersedia pada versi pertama.

### Authentication

- Login
- Logout

---

### Student Profile

- Edit Profil
- Upload Foto
- Biodata

---

### Skill Management

- CRUD Skill
- Upload Bukti
- Submit Verifikasi

---

### Certificate Management

- CRUD Sertifikat
- Upload File
- Submit Verifikasi

---

### Portfolio Management

- CRUD Portfolio
- Upload Thumbnail
- GitHub URL
- Demo URL

---

### Verification

- Approve
- Reject
- Catatan Verifikasi

---

### Point System

- Perhitungan Point Otomatis
- Riwayat Point

---

### Leaderboard

- Ranking Mahasiswa
- Total Point

---

### Reward

- Daftar Reward
- Claim Reward

---

### Opportunity

- Daftar Opportunity
- Detail Opportunity

---

### AI Recommendation

- Rule-Based Recommendation

---

# 24.4 Sprint Planning

## Sprint 1

Durasi:

1 Minggu

Target:

Authentication

Dashboard

Student Profile

---

Deliverable

- Login
- Dashboard
- Edit Profil

---

## Sprint 2

Durasi

1 Minggu

Target

Skill

Certificate

Portfolio

---

Deliverable

CRUD lengkap

Upload File

Submit Verifikasi

---

## Sprint 3

Durasi

1 Minggu

Target

Verification

Point

Leaderboard

---

Deliverable

Approve

Reject

Perhitungan Point

Leaderboard

---

## Sprint 4

Durasi

1 Minggu

Target

Reward

Opportunity

AI Recommendation

---

Deliverable

Reward

Opportunity

Recommendation

---

# 24.5 Milestone

| Milestone | Deliverable |
|------------|-------------|
| M1 | Authentication & Dashboard |
| M2 | Student Competency Module |
| M3 | Verification & Point |
| M4 | Reward & AI Recommendation |
| M5 | Final Testing |
| M6 | Deployment |

---

# 24.6 Priority Matrix

## Critical

- Authentication
- Dashboard
- Student Profile
- Skill
- Certificate
- Portfolio
- Verification
- Point

---

## High

- Leaderboard
- Reward
- AI Recommendation
- Talent Search

---

## Medium

- Opportunity

---

## Low

- Activity Log Enhancement
- Dashboard Analytics

---

# 24.7 Release Checklist

Sebelum MVP dinyatakan selesai, seluruh poin berikut harus terpenuhi:

- Authentication berjalan dengan baik.
- Dashboard menampilkan data sesuai peran pengguna.
- Mahasiswa dapat mengelola profil, skill, sertifikat, dan portofolio.
- Administrator dapat melakukan verifikasi.
- Sistem menghitung poin secara otomatis.
- Leaderboard diperbarui setelah perubahan poin.
- Reward dapat diklaim sesuai jumlah poin.
- Opportunity dapat dipublikasikan dan dilihat mahasiswa.
- AI Recommendation menampilkan rekomendasi berdasarkan data yang telah diverifikasi.
- Pengujian fungsional utama telah lulus.

---

# 24.8 Definition of Done (DoD)

Sebuah fitur dinyatakan selesai apabila:

- Requirement telah diimplementasikan.
- Tidak terdapat error kritis.
- Seluruh Acceptance Criteria terpenuhi.
- Telah diuji oleh tim.
- Dokumentasi diperbarui.
- Kode telah di-review (jika dikerjakan oleh tim).

---

# 24.9 Success Indicator

MVP dianggap berhasil apabila:

- Seluruh fitur Critical selesai.
- Seluruh pengujian utama berhasil.
- Tidak ada bug kritis.
- Sistem dapat digunakan untuk demonstrasi hackathon.
- Dokumentasi proyek lengkap.

---

# End of Chapter 24
# 25. Requirement Traceability Matrix (RTM)

Requirement Traceability Matrix (RTM) digunakan untuk memastikan setiap kebutuhan fungsional memiliki keterkaitan dengan desain sistem, implementasi, database, antarmuka, serta proses pengujian.

---

# 25.1 Objective

RTM bertujuan untuk:

- Memastikan seluruh Functional Requirement telah diimplementasikan.
- Mempermudah proses development.
- Mempermudah proses testing.
- Menghindari requirement yang terlewat.
- Mempermudah proses maintenance.

---

# 25.2 Traceability Matrix

| FR ID | Module | API | Database | UI Screen | Test Case |
|--------|--------|-----|-----------|-----------|-----------|
| FR-001 | Authentication | POST /login, POST /logout | users | Login Page | TC-001 |
| FR-002 | Dashboard | GET /dashboard | users, points | Dashboard | TC-002 |
| FR-003 | Student Profile | GET/PUT /profile | student_profiles | Profile Page | TC-003 |
| FR-004 | Skill | CRUD /skills | skills | Skill Page | TC-004 |
| FR-005 | Certificate | CRUD /certificates | certificates | Certificate Page | TC-005 |
| FR-006 | Portfolio | CRUD /portfolios | portfolios | Portfolio Page | TC-006 |
| FR-007 | Verification | POST /verify | verifications | Verification Page | TC-007 |
| FR-008 | Point System | GET /points | points, point_histories | Dashboard | TC-008 |
| FR-009 | Leaderboard | GET /leaderboard | leaderboard_view | Leaderboard | TC-009 |
| FR-010 | Reward | CRUD /rewards | rewards, reward_claims | Reward Page | TC-010 |
| FR-011 | Opportunity | CRUD /opportunities | opportunities | Opportunity Page | TC-011 |
| FR-012 | Talent Search | GET /students/search | student_profiles, skills | Talent Search | TC-012 |
| FR-013 | AI Recommendation | GET /recommendations | recommendations | Dashboard | TC-013 |

---

# 25.3 Requirement Coverage

## Functional Requirement

| Requirement | Status |
|-------------|--------|
| Authentication | Covered |
| Dashboard | Covered |
| Student Profile | Covered |
| Skill Management | Covered |
| Certificate Management | Covered |
| Portfolio Management | Covered |
| Verification | Covered |
| Point System | Covered |
| Leaderboard | Covered |
| Reward | Covered |
| Opportunity | Covered |
| Talent Search | Covered |
| AI Recommendation | Covered |

Coverage:

100%

---

# 25.4 Database Traceability

| Database Table | Functional Requirement |
|----------------|------------------------|
| users | Authentication |
| student_profiles | Student Profile |
| skills | Skill |
| certificates | Certificate |
| portfolios | Portfolio |
| verifications | Verification |
| points | Point System |
| point_histories | Point History |
| rewards | Reward |
| reward_claims | Reward Claim |
| opportunities | Opportunity |
| recommendations | AI Recommendation |
| activity_logs | Activity Log |

---

# 25.5 API Traceability

| Endpoint | Feature |
|-----------|---------|
| POST /login | Login |
| POST /logout | Logout |
| GET /dashboard | Dashboard |
| GET /profile | Profile |
| PUT /profile | Update Profile |
| CRUD /skills | Skill Management |
| CRUD /certificates | Certificate Management |
| CRUD /portfolios | Portfolio Management |
| POST /verify | Verification |
| GET /leaderboard | Leaderboard |
| CRUD /rewards | Reward |
| POST /rewards/{id}/claim | Claim Reward |
| CRUD /opportunities | Opportunity |
| GET /students/search | Talent Search |
| GET /recommendations | AI Recommendation |

---

# 25.6 UI Traceability

| UI Screen | Functional Requirement |
|-----------|------------------------|
| Login | Authentication |
| Dashboard | Dashboard |
| Profile | Student Profile |
| Skill | Skill Management |
| Certificate | Certificate Management |
| Portfolio | Portfolio Management |
| Verification | Verification |
| Leaderboard | Leaderboard |
| Reward | Reward Management |
| Opportunity | Opportunity Management |
| Talent Search | Talent Search |
| AI Recommendation Card | AI Recommendation |

---

# 25.7 Testing Traceability

| Test Case | Requirement |
|------------|-------------|
| TC-001 | Login |
| TC-002 | Dashboard |
| TC-003 | Student Profile |
| TC-004 | Skill |
| TC-005 | Certificate |
| TC-006 | Portfolio |
| TC-007 | Verification |
| TC-008 | Point |
| TC-009 | Leaderboard |
| TC-010 | Reward |
| TC-011 | Opportunity |
| TC-012 | Talent Search |
| TC-013 | AI Recommendation |

---

# 25.8 Change Management

Setiap perubahan requirement harus:

1. Mendapat persetujuan Product Owner.
2. Memperbarui PRD.
3. Memperbarui Database Design apabila diperlukan.
4. Memperbarui API Specification apabila diperlukan.
5. Memperbarui UI/UX apabila diperlukan.
6. Memperbarui Test Case.
7. Memperbarui dokumentasi proyek.

---

# 25.9 Version Control

| Version | Description |
|----------|-------------|
| v1.0 | Initial PRD |
| v2.0 | Requirement Revision |
| v3.0 | Final Hackathon Version |

---

# 25.10 Traceability Summary

| Item | Total |
|------|------:|
| Functional Requirement | 13 |
| API Endpoint Group | 15 |
| Database Entity | 13 |
| UI Screen | 12 |
| Test Case | 13 |

Seluruh Functional Requirement memiliki keterkaitan dengan desain database, endpoint API, antarmuka pengguna, dan skenario pengujian sehingga cakupan implementasi mencapai **100%**.

---

# End of Chapter 25
# 27. Project Constraints & Assumptions

Bab ini mendefinisikan batasan (Constraints) dan asumsi (Assumptions) yang digunakan selama proses perancangan dan pengembangan University Talent Hub.

---

# 27.1 Project Constraints

Constraint adalah batasan yang harus dipatuhi selama pengembangan proyek.

---

## PC-001 Platform

Aplikasi dikembangkan dalam bentuk:

- Web Application

Tidak mencakup:

- Android Application
- iOS Application
- Desktop Application

---

## PC-002 Target User

Sistem hanya digunakan oleh:

- Mahasiswa
- Administrator

Belum mendukung:

- Dosen
- Alumni
- Perusahaan
- Mitra Industri

---

## PC-003 Campus Scope

Versi MVP hanya digunakan untuk satu institusi.

Target:

Universitas AMIKOM Yogyakarta

Belum mendukung:

- Multi Kampus
- Multi Fakultas dengan konfigurasi berbeda

---

## PC-004 Authentication

Autentikasi menggunakan akun internal aplikasi.

Belum mendukung:

- Single Sign-On (SSO)
- Google Login
- Microsoft Login

---

## PC-005 AI Recommendation

AI Recommendation menggunakan:

Rule-Based Recommendation Engine

Belum menggunakan:

- Machine Learning
- Deep Learning
- Large Language Model (LLM)

---

## PC-006 Deployment

Deployment menggunakan satu server aplikasi.

Belum menggunakan:

- Microservices
- Kubernetes
- Load Balancer

---

## PC-007 Notification

Versi MVP belum mendukung:

- Email Notification
- Push Notification
- WhatsApp Notification

---

## PC-008 Offline Mode

Sistem hanya dapat digunakan ketika perangkat memiliki koneksi internet.

Offline Mode belum tersedia.

---

## PC-009 Language

Bahasa utama aplikasi:

Bahasa Indonesia

Belum mendukung:

- English
- Bahasa lainnya

---

## PC-010 Browser Support

Browser yang didukung:

- Google Chrome
- Microsoft Edge
- Mozilla Firefox
- Safari

Browser lama di luar daftar tersebut tidak dijamin kompatibel.

---

# 27.2 Technical Constraints

## Backend

Laravel 12

---

## Frontend

React.js

---

## Database

PostgreSQL

---

## API

REST API

---

## Authentication

Laravel Sanctum

---

## Storage

Local Storage (Development)

Public Storage (Production)

---

## Version Control

Git

---

# 27.3 Resource Constraints

Pengembangan dilakukan oleh tim hackathon dengan sumber daya terbatas.

Batasan meliputi:

- Waktu pengembangan singkat.
- Jumlah anggota tim terbatas.
- Infrastruktur sederhana.
- Fokus pada penyelesaian MVP.

---

# 27.4 Business Constraints

- Data kompetensi bergantung pada input mahasiswa.
- Proses verifikasi dilakukan secara manual oleh Administrator.
- Poin hanya diberikan setelah proses verifikasi selesai.
- Reward bergantung pada kebijakan institusi.

---

# 27.5 Assumptions

Asumsi yang digunakan selama pengembangan:

### PA-001

Mahasiswa telah memiliki akun untuk mengakses sistem.

---

### PA-002

Administrator memiliki kewenangan untuk memverifikasi seluruh data kompetensi.

---

### PA-003

Mahasiswa mengunggah dokumen yang valid dan sesuai.

---

### PA-004

Koneksi internet tersedia saat menggunakan aplikasi.

---

### PA-005

Server memiliki kapasitas yang cukup untuk menjalankan aplikasi MVP.

---

### PA-006

Data point dihitung berdasarkan Business Rules yang telah ditentukan.

---

### PA-007

Seluruh pengguna menggunakan browser modern yang didukung.

---

### PA-008

Administrator melakukan verifikasi secara berkala sehingga data kompetensi tetap mutakhir.

---

# 27.6 Dependencies

Keberhasilan proyek bergantung pada beberapa komponen berikut:

| Dependency | Description |
|------------|-------------|
| PostgreSQL | Penyimpanan data utama |
| Laravel Sanctum | Authentication |
| React.js | Antarmuka pengguna |
| REST API | Komunikasi Frontend dan Backend |
| Git | Version Control |
| Cloud Hosting | Deployment Production |

---

# 27.7 Out of Scope

Fitur berikut tidak termasuk dalam ruang lingkup MVP.

- Mobile Application
- Multi Campus
- Company Portal
- Dosen Dashboard
- Alumni Dashboard
- Chat System
- Video Conference
- Single Sign-On
- Machine Learning Recommendation
- Email Notification
- Push Notification
- WhatsApp Notification
- Multi Language
- Offline Mode

---

# 27.8 Constraint Summary

| Category | Total |
|----------|------:|
| Platform Constraints | 10 |
| Technical Constraints | 7 |
| Resource Constraints | 4 |
| Business Constraints | 4 |
| Assumptions | 8 |
| Dependencies | 6 |
| Out of Scope Features | 12 |

---

# End of Chapter 27
# 28. Future Enhancement

Bab ini menjelaskan rencana pengembangan University Talent Hub setelah versi MVP berhasil diimplementasikan.

Pengembangan dilakukan secara bertahap berdasarkan kebutuhan pengguna, kesiapan teknologi, dan prioritas bisnis.

---

# 28.1 Enhancement Strategy

Strategi pengembangan dibagi menjadi beberapa fase.

| Version | Focus |
|----------|-------|
| v1.0 | Minimum Viable Product (Hackathon) |
| v1.1 | Stabilization & Improvement |
| v2.0 | Smart Campus Integration |
| v3.0 | AI & Industry Collaboration |

---

# 28.2 Version 1.1

## Objective

Meningkatkan kualitas sistem berdasarkan hasil evaluasi pengguna setelah implementasi MVP.

---

## Planned Features

### Dashboard Improvement

- Statistik yang lebih lengkap
- Grafik perkembangan kompetensi
- Filter dashboard

---

### Verification Improvement

- Filter verifikasi
- Bulk Approval
- Riwayat verifikasi lebih lengkap

---

### Reward Improvement

- Kategori reward
- Pencarian reward
- Riwayat claim yang lebih detail

---

### Opportunity Improvement

- Filter berdasarkan kategori
- Filter berdasarkan tanggal
- Pencarian opportunity

---

### Performance Improvement

- Optimasi query database
- Caching data dashboard
- Optimasi loading halaman

---

# 28.3 Version 2.0

## Objective

Mengintegrasikan University Talent Hub dengan layanan kampus.

---

## Planned Features

### Single Sign-On (SSO)

Integrasi dengan akun institusi.

---

### Academic Information Integration

Sinkronisasi data mahasiswa dari sistem akademik.

---

### Lecturer Dashboard

Dosen dapat:

- Melihat kompetensi mahasiswa
- Memberikan rekomendasi
- Memantau perkembangan mahasiswa

---

### Organization Dashboard

Organisasi mahasiswa dapat mencari kandidat berdasarkan kompetensi.

---

### Digital Badge

Mahasiswa memperoleh badge berdasarkan pencapaian.

Contoh:

- Backend Developer
- UI/UX Designer
- Data Analyst
- Mobile Developer

---

### Advanced Leaderboard

Filter:

- Program Studi
- Angkatan
- Fakultas

---

# 28.4 Version 3.0

## Objective

Membangun Talent Hub yang lebih cerdas dan terintegrasi dengan dunia industri.

---

## Planned Features

### AI Recommendation 2.0

Menggunakan Machine Learning untuk menghasilkan rekomendasi yang lebih personal.

Contoh:

- Rekomendasi pelatihan
- Rekomendasi sertifikasi
- Rekomendasi jalur karier
- Analisis kesenjangan kompetensi (Skill Gap)

---

### Industry Portal

Perusahaan dapat:

- Mencari mahasiswa
- Melihat profil kompetensi
- Membuka peluang magang
- Membuka lowongan kerja

---

### Talent Matching

Sistem mencocokkan mahasiswa dengan peluang berdasarkan:

- Skill
- Sertifikat
- Portofolio
- Minat
- Total Point

---

### Internship Management

Mahasiswa dapat:

- Melihat lowongan magang
- Mengirim lamaran
- Memantau status aplikasi

---

### Achievement System

Pencapaian otomatis, seperti:

- First Certificate
- Top Contributor
- Top Portfolio
- 100 Points Club
- Competition Winner

---

# 28.5 Mobile Application

Pengembangan aplikasi mobile untuk Android dan iOS.

Fitur utama:

- Dashboard
- Leaderboard
- Reward
- Opportunity
- AI Recommendation
- Notifikasi

---

# 28.6 Notification System

Jenis notifikasi yang direncanakan:

- Verifikasi berhasil
- Verifikasi ditolak
- Reward berhasil diklaim
- Opportunity baru
- Pengingat melengkapi profil

Media:

- Email
- Push Notification
- WhatsApp (opsional)

---

# 28.7 Analytics Dashboard

Dashboard analitik untuk Administrator.

Menampilkan:

- Pertumbuhan pengguna
- Statistik kompetensi
- Distribusi sertifikat
- Distribusi portofolio
- Aktivitas pengguna
- Tren poin mahasiswa

---

# 28.8 Multi Campus Support

Pengembangan agar sistem dapat digunakan oleh lebih dari satu institusi.

Fitur:

- Multi Kampus
- Multi Fakultas
- Multi Program Studi
- Isolasi data antar institusi

---

# 28.9 API Integration

Integrasi dengan layanan eksternal.

Contoh:

- GitHub API
- LinkedIn API
- Google Drive
- Sistem Akademik Kampus

---

# 28.10 AI Roadmap

| Version | AI Capability |
|----------|---------------|
| v1.0 | Rule-Based Recommendation |
| v2.0 | Rule + Data Analytics |
| v3.0 | Machine Learning Recommendation |
| v4.0 | Predictive Career Recommendation |

---

# 28.11 Future Technology Stack

| Component | Planned Technology |
|-----------|--------------------|
| Backend | Laravel (LTS) |
| Frontend | React.js / Next.js |
| Database | PostgreSQL |
| Storage | Cloud Object Storage |
| Queue | Redis |
| Cache | Redis |
| Search | Elasticsearch / OpenSearch |
| AI | Python + Machine Learning |

---

# 28.12 Enhancement Priority

| Feature | Priority |
|----------|----------|
| Dashboard Improvement | High |
| Verification Improvement | High |
| Digital Badge | High |
| SSO Integration | Medium |
| Lecturer Dashboard | Medium |
| Organization Dashboard | Medium |
| Industry Portal | High |
| Mobile Application | Medium |
| Notification System | Medium |
| AI Recommendation 2.0 | High |
| Talent Matching | High |
| Multi Campus | Low |

---

# 28.13 Success Vision

University Talent Hub diharapkan berkembang menjadi platform terintegrasi yang:

- Membantu mahasiswa membangun portofolio kompetensi.
- Memudahkan institusi mengelola data talenta.
- Mendukung dosen dalam pembinaan mahasiswa.
- Menghubungkan mahasiswa dengan peluang akademik dan industri.
- Menjadi pusat pengelolaan talenta digital di lingkungan perguruan tinggi.

---

# End of Chapter 28
# 29. Appendix

Appendix berisi informasi pendukung yang digunakan selama penyusunan Product Requirement Document (PRD) University Talent Hub.

---

# 29.1 Document Information

| Item | Information |
|------|-------------|
| Project Name | University Talent Hub |
| Document | Product Requirement Document (PRD) |
| Version | 3.0 |
| Status | Final Draft |
| Document Owner | Product Owner |
| Last Updated | July 2026 |

---

# 29.2 Revision History

| Version | Date | Description | Author |
|----------|------|-------------|--------|
| 1.0 | July 2026 | Initial PRD | Product Team |
| 2.0 | July 2026 | Requirement Revision | Product Team |
| 3.0 | July 2026 | Final Hackathon Version | Product Team |

---

# 29.3 Glossary

| Term | Description |
|------|-------------|
| Talent Hub | Platform untuk mengelola kompetensi mahasiswa |
| Portfolio | Kumpulan hasil karya mahasiswa |
| Skill | Kompetensi yang dimiliki mahasiswa |
| Certificate | Bukti kompetensi atau pelatihan |
| Verification | Proses validasi data oleh Administrator |
| Leaderboard | Peringkat mahasiswa berdasarkan poin |
| Reward | Hadiah yang dapat ditukar menggunakan poin |
| Opportunity | Informasi peluang seperti lomba, seminar, pelatihan, atau magang |
| Recommendation | Rekomendasi pengembangan kompetensi yang dihasilkan sistem |

---

# 29.4 Acronyms

| Acronym | Meaning |
|----------|---------|
| PRD | Product Requirement Document |
| UI | User Interface |
| UX | User Experience |
| API | Application Programming Interface |
| REST | Representational State Transfer |
| CRUD | Create, Read, Update, Delete |
| RBAC | Role-Based Access Control |
| MVP | Minimum Viable Product |
| SLA | Service Level Agreement |
| UUID | Universally Unique Identifier |
| HTTPS | HyperText Transfer Protocol Secure |
| AI | Artificial Intelligence |

---

# 29.5 References

Dokumen ini disusun berdasarkan:

1. Dokumen studi kasus Hackathon University Talent Hub.
2. Hasil analisis kebutuhan pengguna.
3. Dokumen UI/UX Design.
4. Dokumen Database Design.
5. Dokumen API Specification.
6. Dokumen Architecture.
7. Dokumen Testing Plan.

---

# 29.6 Related Documents

| Document | Description |
|----------|-------------|
| README.md | Gambaran umum proyek |
| UI_UX.md | Desain antarmuka pengguna |
| DATABASE.md | Desain basis data |
| API_SPEC.md | Spesifikasi REST API |
| ARCHITECTURE.md | Arsitektur sistem |
| AI_RECOMMENDATION.md | Desain Recommendation Engine |
| TESTING.md | Strategi dan skenario pengujian |
| DEPLOYMENT.md | Panduan deployment |
| TASK.md | Daftar pekerjaan proyek |

---

# 29.7 Coding Standards

Backend

- Laravel Coding Standard
- PSR-12

---

Frontend

- ESLint
- Prettier

---

Git

- Conventional Commit

Contoh:

feat: add reward module

fix: leaderboard ranking bug

docs: update PRD

---

# 29.8 File Naming Convention

Dokumen

UPPER_CASE.md

Contoh

PRD.md

DATABASE.md

API_SPEC.md

---

Source Code

camelCase

PascalCase

Contoh

StudentController.php

RewardService.php

LeaderboardCard.jsx

---

# 29.9 Versioning Strategy

Menggunakan Semantic Versioning.

Format:

MAJOR.MINOR.PATCH

Contoh:

1.0.0

1.1.0

2.0.0

---

# 29.10 Approval

| Role | Status |
|------|--------|
| Product Owner | Pending |
| Technical Lead | Pending |
| UI/UX Designer | Pending |
| Backend Developer | Pending |
| Frontend Developer | Pending |

---

# 29.11 Document Checklist

Sebelum proyek memasuki tahap implementasi, pastikan dokumen berikut telah tersedia.

| Document | Status |
|----------|--------|
| PRD | ✅ |
| README | ✅ |
| UI/UX | ✅ |
| Database Design | ✅ |
| API Specification | ✅ |
| Architecture | ✅ |
| AI Recommendation | ✅ |
| Testing | ✅ |
| Deployment | ✅ |
| Task Management | ✅ |

---

# 29.12 Final Notes

Dokumen PRD ini menjadi acuan utama dalam proses analisis, desain, implementasi, pengujian, dan pengembangan University Talent Hub.

Perubahan terhadap requirement harus melalui proses review agar seluruh dokumen pendukung tetap konsisten.

---

# End of Chapter 29
# 30. UI Navigation Map

Bab ini menjelaskan struktur navigasi antar halaman pada aplikasi **University Talent Hub**.

Tujuan utama Navigation Map adalah:

- Mempermudah implementasi Frontend.
- Menjadi acuan UI/UX Designer.
- Menjelaskan alur perpindahan halaman.
- Menjamin konsistensi navigasi.

---

# 30.1 Navigation Structure

```text
Guest
 │
 ▼
Login
 │
 ├───────────────┐
 │               │
 ▼               ▼
Student      Administrator
Dashboard     Dashboard
```

---

# 30.2 Student Navigation Map

```text
Login
 │
 ▼
Dashboard
 │
 ├──────────────► Profile
 │                  │
 │                  ▼
 │            Edit Profile
 │
 ├──────────────► Skill
 │                  │
 │                  ├── Add Skill
 │                  ├── Edit Skill
 │                  └── Detail Skill
 │
 ├──────────────► Certificate
 │                  │
 │                  ├── Upload Certificate
 │                  ├── Edit Certificate
 │                  └── Detail Certificate
 │
 ├──────────────► Portfolio
 │                  │
 │                  ├── Add Portfolio
 │                  ├── Edit Portfolio
 │                  └── Detail Portfolio
 │
 ├──────────────► Leaderboard
 │
 ├──────────────► Reward
 │                  │
 │                  ├── Reward Detail
 │                  └── Claim Reward
 │
 ├──────────────► Opportunity
 │                  │
 │                  └── Opportunity Detail
 │
 ├──────────────► AI Recommendation
 │
 └──────────────► Logout
```

---

# 30.3 Administrator Navigation Map

```text
Login
 │
 ▼
Dashboard
 │
 ├──────────────► Verification
 │                  │
 │                  ├── Skill Verification
 │                  ├── Certificate Verification
 │                  └── Portfolio Verification
 │
 ├──────────────► Student Management
 │                  │
 │                  └── Student Detail
 │
 ├──────────────► Reward Management
 │                  │
 │                  ├── Add Reward
 │                  ├── Edit Reward
 │                  └── Reward Detail
 │
 ├──────────────► Opportunity Management
 │                  │
 │                  ├── Add Opportunity
 │                  ├── Edit Opportunity
 │                  └── Opportunity Detail
 │
 ├──────────────► Leaderboard
 │
 ├──────────────► Activity Log
 │
 └──────────────► Logout
```

---

# 30.4 Sidebar Menu

## Student

```text
Dashboard

Profile

Skill

Certificate

Portfolio

Leaderboard

Reward

Opportunity

AI Recommendation

Logout
```

---

## Administrator

```text
Dashboard

Verification

Students

Rewards

Opportunities

Leaderboard

Activity Log

Logout
```

---

# 30.5 Breadcrumb Example

Dashboard

↓

Skill

↓

Add Skill

---

Dashboard

↓

Portfolio

↓

Portfolio Detail

---

Dashboard

↓

Reward

↓

Reward Detail

↓

Claim Reward

---

# 30.6 Navigation Rules

NR-001

Logo selalu menuju Dashboard.

---

NR-002

Sidebar menampilkan menu sesuai Role pengguna.

---

NR-003

Halaman yang sedang aktif harus memiliki indikator visual (Active State).

---

NR-004

Setelah login, pengguna langsung diarahkan ke Dashboard sesuai role.

---

NR-005

Setelah logout, pengguna diarahkan kembali ke halaman Login.

---

NR-006

Pengguna tidak dapat mengakses halaman tanpa autentikasi.

---

NR-007

Mahasiswa tidak dapat mengakses halaman Administrator.

---

NR-008

Administrator tidak dapat mengakses halaman khusus mahasiswa yang bersifat personal (misalnya Edit Profil Mahasiswa sebagai pengguna).

---

# 30.7 Responsive Navigation

Desktop

- Sidebar permanen.
- Navbar horizontal.

---

Tablet

- Sidebar dapat di-collapse.

---

Mobile

- Sidebar berubah menjadi Drawer Menu.
- Bottom Navigation tidak digunakan pada versi MVP.

---

# 30.8 Navigation Design Principles

Navigasi dirancang berdasarkan prinsip:

- Konsisten.
- Mudah dipelajari.
- Maksimal tiga klik menuju fitur utama.
- Ikon disertai label.
- Navigasi tetap sederhana dan fokus pada kebutuhan pengguna.

---

# 30.9 Navigation Summary

| Role | Total Menu |
|------|-----------:|
| Student | 10 |
| Administrator | 8 |

Seluruh halaman utama dapat diakses langsung dari Dashboard tanpa alur navigasi yang kompleks.

---

# End of Chapter 30
# 31. Permission Matrix

Bab ini mendefinisikan hak akses setiap jenis pengguna terhadap seluruh modul dalam sistem University Talent Hub.

Permission Matrix menjadi acuan implementasi:

- Role Based Access Control (RBAC)
- Laravel Policy
- Middleware
- Frontend Route Protection
- Menu Visibility
- API Authorization

---

# 31.1 User Roles

Sistem memiliki dua role utama.

| Role | Description |
|------|-------------|
| Administrator | Mengelola seluruh sistem |
| Student | Mengelola data kompetensi pribadi |

---

# 31.2 Permission Legend

| Symbol | Description |
|---------|-------------|
| C | Create |
| R | Read |
| U | Update |
| D | Delete |
| A | Approve / Verify |
| X | Tidak memiliki akses |

---

# 31.3 Module Permission Matrix

| Module | Student | Administrator |
|----------|:------:|:-------------:|
| Login | R | R |
| Logout | R | R |
| Dashboard | R | R |
| Student Profile | C R U | R |
| Skill | C R U D | R A |
| Certificate | C R U D | R A |
| Portfolio | C R U D | R A |
| Verification | X | C R U A |
| Point | R | R U |
| Point History | R | R |
| Leaderboard | R | R |
| Reward | R | C R U D |
| Reward Claim | C R | R |
| Opportunity | R | C R U D |
| AI Recommendation | R | R |
| Student Management | X | C R U D |
| Activity Log | X | R |

---

# 31.4 API Permission Matrix

## Authentication

| Endpoint | Student | Admin |
|----------|:------:|:-----:|
| POST /login | ✔ | ✔ |
| POST /logout | ✔ | ✔ |

---

## Profile

| Endpoint | Student | Admin |
|----------|:------:|:-----:|
| GET /profile | ✔ | ✔ |
| PUT /profile | ✔ | ✖ |

---

## Skill

| Endpoint | Student | Admin |
|----------|:------:|:-----:|
| GET /skills | ✔ | ✔ |
| POST /skills | ✔ | ✖ |
| PUT /skills/{id} | ✔ | ✖ |
| DELETE /skills/{id} | ✔ | ✖ |
| POST /skills/{id}/verify | ✖ | ✔ |

---

## Certificate

| Endpoint | Student | Admin |
|----------|:------:|:-----:|
| CRUD Certificate | ✔ | ✖ |
| Verify Certificate | ✖ | ✔ |

---

## Portfolio

| Endpoint | Student | Admin |
|----------|:------:|:-----:|
| CRUD Portfolio | ✔ | ✖ |
| Verify Portfolio | ✖ | ✔ |

---

## Reward

| Endpoint | Student | Admin |
|----------|:------:|:-----:|
| GET Rewards | ✔ | ✔ |
| Claim Reward | ✔ | ✖ |
| CRUD Reward | ✖ | ✔ |

---

## Opportunity

| Endpoint | Student | Admin |
|----------|:------:|:-----:|
| View Opportunity | ✔ | ✔ |
| CRUD Opportunity | ✖ | ✔ |

---

# 31.5 Frontend Menu Visibility

## Student Menu

| Menu | Visible |
|------|---------|
| Dashboard | ✔ |
| Profile | ✔ |
| Skill | ✔ |
| Certificate | ✔ |
| Portfolio | ✔ |
| Leaderboard | ✔ |
| Reward | ✔ |
| Opportunity | ✔ |
| AI Recommendation | ✔ |
| Activity Log | ✖ |
| Verification | ✖ |

---

## Administrator Menu

| Menu | Visible |
|------|---------|
| Dashboard | ✔ |
| Verification | ✔ |
| Student Management | ✔ |
| Reward Management | ✔ |
| Opportunity Management | ✔ |
| Leaderboard | ✔ |
| Activity Log | ✔ |
| Profile Mahasiswa (Read Only) | ✔ |

---

# 31.6 Database Permission

| Table | Student | Administrator |
|---------|:------:|:-------------:|
| users | Own | All |
| student_profiles | Own | All |
| skills | Own | All |
| certificates | Own | All |
| portfolios | Own | All |
| verifications | X | All |
| rewards | Read | CRUD |
| reward_claims | Own | All |
| opportunities | Read | CRUD |
| activity_logs | X | Read |

---

# 31.7 Business Rules

## PM-001

Mahasiswa hanya dapat mengubah data miliknya sendiri.

---

## PM-002

Administrator tidak boleh mengubah isi Skill, Certificate, atau Portfolio mahasiswa.

Administrator hanya dapat:

- Approve
- Reject
- Memberikan Catatan

---

## PM-003

Point hanya berubah melalui proses verifikasi.

---

## PM-004

Reward hanya dapat diklaim jika poin mencukupi.

---

## PM-005

Opportunity hanya dapat dibuat oleh Administrator.

---

## PM-006

AI Recommendation hanya dapat dilihat oleh mahasiswa yang bersangkutan.

---

# 31.8 Authorization Flow

```text
User Request
      │
      ▼
Authentication
      │
      ▼
Role Checking
      │
      ▼
Permission Checking
      │
      ▼
Business Rule Validation
      │
      ▼
Controller
      │
      ▼
Response
```

---

# 31.9 Laravel Implementation Mapping

| Laravel Component | Usage |
|-------------------|-------|
| Sanctum | Authentication |
| Middleware | Role Checking |
| Policy | Resource Authorization |
| Form Request | Validation |
| Gates | Permission Checking |

---

# 31.10 Permission Summary

| Role | Accessible Modules |
|------|-------------------:|
| Student | 10 |
| Administrator | 11 |

Seluruh modul pada sistem telah memiliki aturan hak akses yang jelas dan konsisten untuk mendukung implementasi Role Based Access Control (RBAC).

---

# End of Chapter 31
# 32. System Flow Diagram

Bab ini menjelaskan alur sistem University Talent Hub secara menyeluruh, mulai dari pengguna mengakses aplikasi hingga data diproses dan ditampilkan kembali kepada pengguna.

Diagram ini menjadi acuan implementasi Backend, Frontend, Database, serta Rule-Based AI Recommendation Engine.

---

# 32.1 High Level System Flow

```text
                +----------------------+
                |      Student         |
                +----------+-----------+
                           |
                           |
                +----------v-----------+
                |     React Frontend   |
                +----------+-----------+
                           |
                    REST API Request
                           |
                +----------v-----------+
                | Laravel Backend API  |
                +----------+-----------+
                           |
          +----------------+----------------+
          |                                 |
          |                                 |
+---------v---------+            +----------v----------+
| Business Services |            | Authentication      |
|                   |            | Laravel Sanctum     |
+---------+---------+            +----------+----------+
          |                                 |
          +----------------+----------------+
                           |
                +----------v-----------+
                | PostgreSQL Database  |
                +----------+-----------+
                           |
                +----------v-----------+
                | Rule-Based AI Engine |
                +----------+-----------+
                           |
                +----------v-----------+
                | API Response (JSON)  |
                +----------+-----------+
                           |
                +----------v-----------+
                | React Dashboard UI   |
                +----------------------+
```

---

# 32.2 Authentication Flow

```text
User

↓

Login Page

↓

Input Email & Password

↓

Validation

↓

Laravel Sanctum Authentication

↓

Authentication Success?

├── No
│
└── Error Message

↓

Yes

↓

Dashboard
```

---

# 32.3 Student Skill Submission Flow

```text
Dashboard

↓

Skill Menu

↓

Add Skill

↓

Input Skill Data

↓

Upload Evidence

↓

Validation

↓

Save Database

↓

Status

Pending Verification
```

---

# 32.4 Certificate Submission Flow

```text
Dashboard

↓

Certificate

↓

Upload Certificate

↓

Validation

↓

Store File

↓

Save Database

↓

Pending Verification
```

---

# 32.5 Portfolio Submission Flow

```text
Dashboard

↓

Portfolio

↓

Add Portfolio

↓

Input Project

↓

Upload Thumbnail

↓

Save

↓

Pending Verification
```

---

# 32.6 Verification Flow

```text
Administrator Login

↓

Verification Menu

↓

Choose Submission

↓

Review Data

↓

Approve / Reject

↓

Update Verification Status

↓

Update Student Point

↓

Send Response
```

---

# 32.7 Point Calculation Flow

```text
Verification Approved

↓

Determine Activity Type

↓

Business Rule Engine

↓

Calculate Point

↓

Update Point Table

↓

Insert Point History

↓

Refresh Leaderboard
```

---

# 32.8 Leaderboard Flow

```text
Student Point

↓

Sort Descending

↓

Generate Ranking

↓

Top Students

↓

Display Leaderboard
```

---

# 32.9 Reward Claim Flow

```text
Student

↓

Reward Page

↓

Choose Reward

↓

Check Point

↓

Enough Point?

├── No
│
└── Show Warning

↓

Yes

↓

Reduce Point

↓

Create Reward Claim

↓

Success
```

---

# 32.10 Opportunity Flow

```text
Administrator

↓

Create Opportunity

↓

Save Database

↓

Published

↓

Student Dashboard

↓

Opportunity List
```

---

# 32.11 Rule-Based AI Recommendation Flow

```text
Student Profile

+

Skill

+

Certificate

+

Portfolio

↓

Data Analyzer

↓

Rule Evaluation

↓

Generate Recommendation

↓

Priority Scoring

↓

Dashboard Recommendation Card
```

---

# 32.12 Error Handling Flow

```text
Request

↓

Validation

↓

Success?

├── No
│
└── Return Validation Error

↓

Yes

↓

Controller

↓

Business Service

↓

Database

↓

Response
```

---

# 32.13 Activity Logging Flow

```text
User Activity

↓

Middleware

↓

Activity Logger

↓

Activity Log Table

↓

Administrator Dashboard
```

---

# 32.14 End-to-End System Sequence

```text
Student

↓

React Frontend

↓

REST API

↓

Laravel Controller

↓

Service Layer

↓

Repository Layer

↓

PostgreSQL

↓

Business Rule Engine

↓

JSON Response

↓

React Dashboard
```

---

# 32.15 Integration Mapping

| Layer | Technology |
|--------|------------|
| Client | React.js |
| API | REST API |
| Backend | Laravel 12 |
| Authentication | Laravel Sanctum |
| Business Logic | Service Layer |
| Data Access | Repository Pattern |
| Database | PostgreSQL |
| Storage | Laravel Storage |
| Recommendation | Rule-Based AI Engine |

---

# 32.16 Design Principles

Arsitektur sistem dirancang dengan prinsip berikut:

- Separation of Concerns (SoC)
- Layered Architecture
- RESTful API
- Stateless Communication
- Secure Authentication
- Modular Development
- Maintainable Codebase
- Scalability Ready

---

# 32.17 Deployment Overview

```text
Browser
    │
    ▼
React Application
    │
    ▼
Laravel REST API
    │
    ▼
Service Layer
    │
    ▼
PostgreSQL Database
```

---

# 32.18 PRD Completion Checklist

| Area | Status |
|------|--------|
| Business Analysis | ✅ Complete |
| Functional Requirement | ✅ Complete |
| Non Functional Requirement | ✅ Complete |
| User Story | ✅ Complete |
| Business Rules | ✅ Complete |
| Dashboard Requirement | ✅ Complete |
| Data Requirement | ✅ Complete |
| Security Requirement | ✅ Complete |
| API Mapping | ✅ Complete |
| Database Mapping | ✅ Complete |
| Risk Analysis | ✅ Complete |
| Roadmap | ✅ Complete |
| Future Enhancement | ✅ Complete |
| Permission Matrix | ✅ Complete |
| Navigation Map | ✅ Complete |
| System Flow | ✅ Complete |

---

# 32.19 Final Statement

Product Requirement Document (PRD) ini menjadi dokumen induk (single source of truth) bagi seluruh proses pengembangan University Talent Hub.

Seluruh dokumen turunan seperti:

- UI_UX.md
- DATABASE.md
- API_SPEC.md
- ARCHITECTURE.md
- TESTING.md
- DEPLOYMENT.md
- TASK.md

harus mengacu pada PRD ini agar implementasi tetap konsisten dan sesuai dengan kebutuhan bisnis yang telah disepakati.

---

# End of Chapter 32

**=== END OF PRODUCT REQUIREMENT DOCUMENT (PRD) v3.0 ===**