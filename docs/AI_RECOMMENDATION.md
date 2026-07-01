# AI Recommendation Documentation

# University Talent Hub

Version : 1.0

---

# Table of Contents

1. Overview
2. Objectives
3. AI Architecture
4. Recommendation Flow
5. Recommendation Categories
6. Recommendation Rules
7. Recommendation Score
8. Example Scenario

---

# 1. Overview

AI Recommendation merupakan fitur yang memberikan rekomendasi otomatis kepada mahasiswa berdasarkan data yang dimiliki pada sistem.

Rekomendasi dihasilkan menggunakan pendekatan **Rule-Based Recommendation Engine**, yaitu serangkaian aturan (rules) yang mengevaluasi profil mahasiswa untuk memberikan saran yang relevan.

Versi ini dipilih karena:

- Mudah diimplementasikan.
- Tidak membutuhkan dataset pelatihan.
- Cepat diproses.
- Cocok untuk Minimum Viable Product (MVP).
- Dapat dikembangkan menjadi Machine Learning di masa depan.

---

# 2. Objectives

Tujuan AI Recommendation adalah:

- Membantu mahasiswa meningkatkan kompetensi.
- Memberikan rekomendasi skill yang perlu dipelajari.
- Menyarankan sertifikasi yang relevan.
- Menampilkan peluang magang atau kompetisi yang sesuai.
- Mendorong mahasiswa melengkapi profil talent.

---

# 3. AI Architecture

```text
Student Data
│
├── Profile
├── Skills
├── Certificates
├── Portfolios
├── Total Points
└── Activity History
        │
        ▼
Rule-Based Recommendation Engine
        │
        ▼
Recommendation Generator
        │
        ▼
Recommendation Database
        │
        ▼
Frontend Dashboard
```

---

# 4. Recommendation Flow

```text
Mahasiswa Login
        │
        ▼
Ambil Data Mahasiswa
        │
        ▼
Analisis Profil
        │
        ▼
Hitung Rule
        │
        ▼
Hitung Priority Score
        │
        ▼
Generate Recommendation
        │
        ▼
Simpan ke Database
        │
        ▼
Tampilkan pada Dashboard
```

---

# 5. Recommendation Categories

AI menghasilkan rekomendasi dalam beberapa kategori.

| Category | Description |
|-----------|-------------|
| Skill | Skill yang perlu dipelajari |
| Certificate | Sertifikasi yang direkomendasikan |
| Portfolio | Project yang sebaiknya dibuat |
| Competition | Kompetisi yang sesuai |
| Opportunity | Magang atau freelance |
| Learning | Materi pembelajaran |

---

# 6. Input Data

AI menggunakan data berikut.

| Data | Source |
|------|--------|
| Profil Mahasiswa | students |
| Skill | student_skills |
| Sertifikat | certificates |
| Portfolio | portfolios |
| Total Point | student_points |
| Riwayat Aktivitas | verification_logs |

---

# 7. Recommendation Priority

AI memberikan tingkat prioritas.

| Priority | Description |
|----------|-------------|
| High | Sangat direkomendasikan |
| Medium | Direkomendasikan |
| Low | Opsional |

---

# 8. AI Process

Tahapan AI terdiri dari:

1. Data Collection
2. Data Analysis
3. Rule Matching
4. Score Calculation
5. Recommendation Ranking
6. Recommendation Output

---

# End AI_RECOMMENDATION.md Part 1
# 9. Rule-Based Recommendation Engine

Rule-Based Recommendation Engine merupakan inti dari AI Recommendation pada University Talent Hub.

Engine bekerja dengan cara:

1. Mengumpulkan data mahasiswa.
2. Mencocokkan data dengan aturan (rules).
3. Menghasilkan rekomendasi.
4. Memberikan skor prioritas.
5. Menampilkan rekomendasi pada dashboard.

---

# 10. Rule Evaluation Flow

```text
Student Data
      │
      ▼
Profile Analysis
      │
      ▼
Skill Analysis
      │
      ▼
Certificate Analysis
      │
      ▼
Portfolio Analysis
      │
      ▼
Point Analysis
      │
      ▼
Recommendation Rules
      │
      ▼
Priority Score
      │
      ▼
Recommendation Output
```

---

# 11. Recommendation Rules

## Rule 1

### Missing Skill

IF

Mahasiswa belum memiliki skill Docker

THEN

Rekomendasi

```
Pelajari Docker Fundamentals
```

Priority

```
High
```

---

## Rule 2

IF

Mahasiswa belum memiliki GitHub Portfolio

THEN

```
Unggah project ke GitHub
```

Priority

```
High
```

---

## Rule 3

IF

Portfolio < 2

THEN

```
Buat minimal 2 portfolio baru
```

Priority

```
High
```

---

## Rule 4

IF

Sertifikat = 0

THEN

```
Ikuti sertifikasi online
```

Priority

```
High
```

---

## Rule 5

IF

Skill Laravel dimiliki

AND

Skill REST API belum ada

THEN

```
Pelajari REST API Development
```

Priority

```
Medium
```

---

## Rule 6

IF

Skill Python dimiliki

AND

Machine Learning belum ada

THEN

```
Pelajari Machine Learning
```

Priority

```
Medium
```

---

## Rule 7

IF

Total Point < 20

THEN

```
Lengkapi profil dan unggah skill
```

Priority

```
High
```

---

## Rule 8

IF

Profile Completion < 80%

THEN

```
Lengkapi profil talent
```

Priority

```
High
```

---

## Rule 9

IF

Mahasiswa memiliki

Laravel

MySQL

Git

THEN

```
Rekomendasikan Backend Internship
```

Priority

```
High
```

---

## Rule 10

IF

Mahasiswa memiliki

Flutter

Firebase

THEN

```
Rekomendasikan Mobile Developer Internship
```

Priority

```
High
```

---

## Rule 11

IF

Mahasiswa memiliki

UI/UX

Figma

THEN

```
Rekomendasikan UI Design Competition
```

Priority

```
Medium
```

---

## Rule 12

IF

Mahasiswa belum memiliki sertifikat nasional

THEN

```
Ikuti sertifikasi nasional
```

Priority

```
Medium
```

---

## Rule 13

IF

Mahasiswa memiliki lebih dari 5 skill

THEN

```
Tambahkan portfolio untuk menunjukkan implementasi skill
```

Priority

```
Medium
```

---

## Rule 14

IF

Mahasiswa belum pernah mengikuti kompetisi

THEN

```
Ikuti kompetisi tingkat universitas
```

Priority

```
Medium
```

---

## Rule 15

IF

Mahasiswa berada pada Top 20 Leaderboard

THEN

```
Pertahankan performa dengan mengikuti kegiatan baru
```

Priority

```
Low
```

---

# 12. Decision Tree

```text
Student
│
├── Profile Complete?
│       │
│       ├── No
│       │      ▼
│       │  Complete Profile
│       │
│       └── Yes
│
├── Skills < Target?
│       │
│       ├── Yes
│       │      ▼
│       │ Learn New Skills
│       │
│       └── No
│
├── Certificates Available?
│       │
│       ├── No
│       │      ▼
│       │ Get Certification
│       │
│       └── Yes
│
├── Portfolio Available?
│       │
│       ├── No
│       │      ▼
│       │ Build Portfolio
│       │
│       └── Yes
│
└── Generate Recommendation
```

---

# 13. Recommendation Priority Score

AI memberikan skor berdasarkan kondisi mahasiswa.

| Condition | Score |
|------------|------:|
| Profil belum lengkap | 30 |
| Skill kurang | 25 |
| Tidak memiliki sertifikat | 20 |
| Portfolio sedikit | 15 |
| Point rendah | 10 |

---

Prioritas ditentukan berdasarkan total skor.

| Score | Priority |
|--------|----------|
| 80–100 | High |
| 50–79 | Medium |
| 0–49 | Low |

---

# 14. Recommendation Output

Contoh hasil rekomendasi:

```json
[
    {
        "title":"Pelajari Docker",
        "category":"Skill",
        "priority":"High"
    },
    {
        "title":"Ikuti Sertifikasi Laravel",
        "category":"Certificate",
        "priority":"Medium"
    },
    {
        "title":"Backend Internship",
        "category":"Opportunity",
        "priority":"High"
    }
]
```

---

# End AI_RECOMMENDATION.md Part 2
# 15. Recommendation Scoring Algorithm

## Overview

Setiap rekomendasi memiliki skor prioritas yang dihitung berdasarkan kondisi mahasiswa.

Semakin tinggi skor, semakin tinggi prioritas rekomendasi yang diberikan.

---

## Scoring Formula

```text
Recommendation Score

=

Profile Score

+

Skill Score

+

Certificate Score

+

Portfolio Score

+

Point Score

+

Activity Score
```

---

## Detail Scoring

### Profile Completion

| Kondisi | Score |
|----------|-------|
| < 50% | +30 |
| 50% - 79% | +20 |
| ≥ 80% | +0 |

---

### Skills

| Kondisi | Score |
|----------|-------|
| < 3 Skill | +30 |
| 3 - 5 Skill | +20 |
| > 5 Skill | +0 |

---

### Certificates

| Kondisi | Score |
|----------|-------|
| Tidak ada | +25 |
| 1 Sertifikat | +15 |
| ≥ 2 Sertifikat | +0 |

---

### Portfolio

| Kondisi | Score |
|----------|-------|
| Tidak ada | +25 |
| 1 Portfolio | +15 |
| ≥ 2 Portfolio | +0 |

---

### Total Point

| Kondisi | Score |
|----------|-------|
| < 20 | +20 |
| 20 - 50 | +10 |
| > 50 | +0 |

---

### Activity

| Kondisi | Score |
|----------|-------|
| Tidak ada aktivitas 30 hari | +15 |
| Aktif | +0 |

---

## Final Priority

| Score | Priority |
|--------|----------|
| ≥ 80 | High |
| 50 - 79 | Medium |
| < 50 | Low |

---

# 16. Recommendation Algorithm

```text
Mulai

↓

Ambil Data Mahasiswa

↓

Hitung Profile Completion

↓

Hitung Skill

↓

Hitung Sertifikat

↓

Hitung Portfolio

↓

Hitung Total Point

↓

Hitung Aktivitas

↓

Evaluasi Rule

↓

Hitung Score

↓

Urutkan Berdasarkan Priority

↓

Simpan Recommendation

↓

Tampilkan Dashboard

↓

Selesai
```

---

# 17. Recommendation Engine Pseudocode

```text
START

Load Student

Load Skills

Load Certificates

Load Portfolio

Load Points

Load Activities

IF Profile < 80%

    Add Recommendation

ENDIF

IF Skill Count < 3

    Add Recommendation

ENDIF

IF Certificate Count == 0

    Add Recommendation

ENDIF

IF Portfolio Count == 0

    Add Recommendation

ENDIF

IF Point < 20

    Add Recommendation

ENDIF

Sort Recommendation

Save Recommendation

END
```

---

# 18. Sequence Diagram

```text
Mahasiswa

↓

Dashboard

↓

Recommendation Service

↓

Database

↓

Load Student Data

↓

Rule Engine

↓

Generate Recommendation

↓

Save Recommendation

↓

Return Recommendation

↓

Dashboard
```

---

# 19. Laravel Implementation Concept

Direktori yang disarankan:

```text
app

└── Services

    └── RecommendationService.php
```

Service bertugas untuk:

- Mengambil data mahasiswa.
- Menghitung skor.
- Mengevaluasi rule.
- Menghasilkan rekomendasi.
- Menyimpan hasil rekomendasi.

Controller hanya memanggil:

```text
RecommendationService
```

Sehingga business logic tetap terpisah dari controller.

---

# 20. Recommendation Lifecycle

```text
Student Login

↓

Load Profile

↓

Analyze Data

↓

Generate Recommendation

↓

Store Recommendation

↓

Display Dashboard

↓

Student Adds Skill

↓

Recalculate Recommendation

↓

Update Dashboard
```

---

# 21. Performance Strategy

Untuk menjaga performa aplikasi, rekomendasi tidak dihitung pada setiap request.

Strategi yang digunakan:

- Generate saat mahasiswa login pertama kali.
- Generate setelah data profil diperbarui.
- Generate setelah skill disetujui.
- Generate setelah sertifikat disetujui.
- Generate setelah portfolio disetujui.
- Generate melalui Scheduler setiap malam.

---

# 22. Future Enhancement

Versi saat ini menggunakan Rule-Based Recommendation Engine.

Pada pengembangan berikutnya, sistem dapat ditingkatkan menjadi:

## Machine Learning Recommendation

Menggunakan histori mahasiswa sebagai dataset.

Contoh algoritma:

- Decision Tree
- Random Forest
- K-Nearest Neighbor (KNN)
- Naive Bayes

---

## Collaborative Filtering

Mahasiswa dengan profil serupa akan memperoleh rekomendasi yang mirip.

Contoh:

Mahasiswa A

↓

Laravel

MySQL

REST API

↓

Mahasiswa B memiliki profil hampir sama.

↓

AI menyarankan:

Docker

Clean Architecture

Backend Internship

---

## Content-Based Recommendation

AI menganalisis:

- Skill
- Sertifikat
- Portfolio
- Opportunity

Kemudian memberikan rekomendasi berdasarkan kemiripan atribut.

---

## Large Language Model (LLM)

Pada tahap lanjutan, AI dapat diintegrasikan dengan LLM untuk memberikan rekomendasi yang lebih personal, misalnya:

- Roadmap belajar yang disesuaikan dengan profil mahasiswa.
- Saran pengembangan portofolio.
- Ringkasan kelebihan dan area yang perlu ditingkatkan.
- Persiapan menghadapi peluang magang atau kompetisi.

Implementasi ini memerlukan evaluasi terkait biaya, privasi data, dan ketersediaan layanan AI.

---

# 23. Security Considerations

AI Recommendation harus:

- Tidak mengubah data mahasiswa secara langsung.
- Hanya menghasilkan rekomendasi.
- Menggunakan data yang telah diverifikasi.
- Tidak menyimpan data sensitif di luar database.
- Menghasilkan rekomendasi yang dapat dijelaskan (explainable).

---

# 24. Success Metrics

| KPI | Target |
|------|--------|
| Recommendation Generated | ≥ 95% |
| Average Processing Time | < 1 Detik |
| Dashboard Load | < 3 Detik |
| Failed Recommendation | < 1% |
| Rule Evaluation Success | 100% |

---

# 25. Module Summary

AI Recommendation pada **University Talent Hub** menggunakan pendekatan **Rule-Based Recommendation Engine** untuk menghasilkan rekomendasi yang relevan berdasarkan profil mahasiswa, keterampilan, sertifikat, portofolio, poin, dan aktivitas. Pendekatan ini dipilih karena sederhana, mudah dijelaskan, cepat diimplementasikan, serta sesuai untuk pengembangan Minimum Viable Product (MVP).

Arsitektur modul dirancang agar mudah dikembangkan di masa mendatang menjadi sistem berbasis Machine Learning tanpa perlu mengubah struktur database maupun API secara signifikan.

---

# End of AI_RECOMMENDATION.md