# Database Design Document

# University Talent Hub

Version 2.0

---

# Document Information

| Item | Information |
|------|-------------|
| Project | University Talent Hub |
| Document | Database Design Document |
| Version | 2.0 |
| Status | Final |
| Database | PostgreSQL |
| Framework | Laravel 12 |
| Last Update | July 2026 |

---

# 1. Database Overview

## Purpose

Dokumen ini menjelaskan rancangan basis data yang digunakan pada aplikasi **University Talent Hub**.

Dokumen menjadi acuan implementasi database, migrasi Laravel, optimasi query, keamanan data, serta integrasi dengan Backend API.

---

## Goals

Database dirancang untuk memenuhi kebutuhan berikut.

- Menyimpan data pengguna.
- Menyimpan kompetensi mahasiswa.
- Menyimpan sertifikat.
- Menyimpan portofolio.
- Menyimpan proses verifikasi.
- Menyimpan sistem poin.
- Menyimpan leaderboard.
- Menyimpan reward.
- Menyimpan opportunity.
- Menyimpan hasil Rule-Based AI Recommendation.
- Menyimpan aktivitas pengguna.

---

# 2. Database Design Principles

Perancangan database mengikuti prinsip berikut.

## Simplicity

Struktur tabel dibuat sederhana namun tetap mudah dikembangkan.

---

## Normalization

Minimal memenuhi Third Normal Form (3NF).

---

## Scalability

Database mudah dikembangkan apabila jumlah mahasiswa bertambah.

---

## Security

Seluruh relasi menggunakan Foreign Key.

Password disimpan menggunakan Hash.

---

## Performance

Menggunakan Index pada kolom yang sering digunakan.

---

## Maintainability

Seluruh tabel menggunakan naming convention yang konsisten.

---

# 3. Technology Stack

| Component | Technology |
|-----------|------------|
| DBMS | PostgreSQL 16 |
| ORM | Laravel Eloquent |
| Migration | Laravel Migration |
| Seeder | Laravel Seeder |
| UUID | UUID v4 |
| Charset | UTF-8 |
| Timezone | Asia/Jakarta |

---

# 4. Naming Convention

## Table

Menggunakan

snake_case

Contoh

users

student_profiles

reward_claims

---

## Column

Menggunakan

snake_case

Contoh

student_id

verification_status

created_at

---

## Primary Key

Seluruh tabel menggunakan

id

(UUID)

---

## Foreign Key

Menggunakan format

nama_tabel_id

Contoh

user_id

student_id

reward_id

---

## Pivot Table

Format

table_a_table_b

Contoh

student_skills

---

# 5. UUID Strategy

Seluruh Primary Key menggunakan UUID Version 4.

Contoh

users.id

student_profiles.id

skills.id

certificates.id

portfolios.id

rewards.id

opportunities.id

---

Keuntungan UUID

- Tidak mudah ditebak.
- Aman untuk REST API.
- Siap untuk distributed system.
- Tidak bergantung pada Auto Increment.
- Mudah dikembangkan menjadi Multi Campus.

---

# 6. Database Architecture

```text
React Frontend
        │
REST API
        │
Laravel Backend
        │
Service Layer
        │
Repository
        │
PostgreSQL
```

---

# 7. Database Modules

Database terdiri dari beberapa modul utama.

## Authentication

- users

---

## Student

- student_profiles

---

## Skill

- skills

---

## Certificate

- certificates

---

## Portfolio

- portfolios

---

## Verification

- verifications

---

## Point System

- points
- point_histories

---

## Reward

- rewards
- reward_claims

---

## Opportunity

- opportunities

---

## Recommendation

- ai_recommendations

---

## Logging

- activity_logs

---

# End of Part 1
# 8. Entity Relationship Overview

Database **University Talent Hub** terdiri dari 13 entitas utama yang saling berhubungan untuk mendukung proses pengelolaan kompetensi mahasiswa.

---

## Entity List

| No | Entity | Description |
|----|--------|-------------|
| 1 | users | Menyimpan akun pengguna |
| 2 | student_profiles | Profil mahasiswa |
| 3 | skills | Data kompetensi mahasiswa |
| 4 | certificates | Data sertifikat |
| 5 | portfolios | Data portofolio |
| 6 | verifications | Riwayat verifikasi |
| 7 | points | Total poin mahasiswa |
| 8 | point_histories | Riwayat perubahan poin |
| 9 | rewards | Data reward |
| 10 | reward_claims | Riwayat klaim reward |
| 11 | opportunities | Peluang pengembangan |
| 12 | ai_recommendations | Hasil Rule-Based Recommendation |
| 13 | activity_logs | Log aktivitas sistem |

---

# 9. Entity Relationship Diagram (ERD)

## High Level ERD

```text
                        +----------------+
                        |     users      |
                        +--------+-------+
                                 |
                           1 : 1 |
                                 |
                                 ▼
                  +-----------------------------+
                  |     student_profiles         |
                  +-------------+---------------+
                                |
          +----------+----------+----------+-----------+
          |          |          |          |           |
          |1:N       |1:N       |1:N       |1:1        |1:N
          ▼          ▼          ▼          ▼           ▼

      +-------+  +------------+ +-----------+ +---------+ +----------------+
      |skills |  |certificates| |portfolios | | points  | |point_histories |
      +---+---+  +------+-----+ +-----+-----+ +----+----+ +--------+-------+
          |             |             |            |               |
          |             |             |            |               |
          +------+------+-------------+------------+---------------+
                         |
                         |
                         ▼
                 +---------------+
                 | verifications |
                 +---------------+

student_profiles
        |
        |1:N
        ▼
+----------------------+
| ai_recommendations   |
+----------------------+

student_profiles
        |
        |1:N
        ▼
+------------------+
| reward_claims    |
+---------+--------+
          |
          |N:1
          ▼
     +---------+
     | rewards |
     +---------+

+----------------+
| opportunities  |
+----------------+

+----------------+
| activity_logs  |
+----------------+
```

---

# 9.1 Core Modules

## Authentication Module

Entity

- users

---

## Student Module

Entity

- student_profiles

---

## Competency Module

Entity

- skills
- certificates
- portfolios

---

## Verification Module

Entity

- verifications

---

## Point Module

Entity

- points
- point_histories

---

## Reward Module

Entity

- rewards
- reward_claims

---

## Opportunity Module

Entity

- opportunities

---

## AI Module

Entity

- ai_recommendations

---

## Logging Module

Entity

- activity_logs

---

# 9.2 Relationship Summary

| Parent | Child | Relationship |
|----------|--------|--------------|
| users | student_profiles | One to One |
| student_profiles | skills | One to Many |
| student_profiles | certificates | One to Many |
| student_profiles | portfolios | One to Many |
| student_profiles | points | One to One |
| student_profiles | point_histories | One to Many |
| student_profiles | reward_claims | One to Many |
| student_profiles | ai_recommendations | One to Many |
| rewards | reward_claims | One to Many |

---

# 9.3 Relationship Description

## User → Student Profile

Satu akun pengguna hanya memiliki satu profil mahasiswa.

Relationship

One-to-One

---

## Student → Skills

Mahasiswa dapat memiliki banyak skill.

Relationship

One-to-Many

---

## Student → Certificates

Mahasiswa dapat memiliki banyak sertifikat.

Relationship

One-to-Many

---

## Student → Portfolios

Mahasiswa dapat memiliki banyak portofolio.

Relationship

One-to-Many

---

## Student → Points

Setiap mahasiswa hanya memiliki satu data total poin.

Relationship

One-to-One

---

## Student → Point Histories

Setiap perubahan poin akan dicatat sebagai histori.

Relationship

One-to-Many

---

## Student → Reward Claims

Mahasiswa dapat melakukan beberapa kali klaim reward.

Relationship

One-to-Many

---

## Reward → Reward Claims

Satu reward dapat diklaim oleh banyak mahasiswa.

Relationship

One-to-Many

---

## Student → AI Recommendations

Sistem dapat menghasilkan lebih dari satu rekomendasi untuk setiap mahasiswa.

Relationship

One-to-Many

---

# 9.4 Cardinality Summary

| Relationship | Cardinality |
|--------------|------------|
| User → Student Profile | 1 : 1 |
| Student → Skill | 1 : N |
| Student → Certificate | 1 : N |
| Student → Portfolio | 1 : N |
| Student → Point | 1 : 1 |
| Student → Point History | 1 : N |
| Student → Reward Claim | 1 : N |
| Reward → Reward Claim | 1 : N |
| Student → AI Recommendation | 1 : N |

---

# 9.5 Database Statistics

| Category | Total |
|----------|------:|
| Total Tables | 13 |
| Core Modules | 8 |
| One-to-One Relationship | 2 |
| One-to-Many Relationship | 7 |
| Many-to-Many Relationship | 0 |

---

# End of Part 2
# 10. Table Specifications

Bagian ini menjelaskan spesifikasi setiap tabel pada database University Talent Hub.

Seluruh tabel menggunakan standar berikut:

- Primary Key menggunakan UUID v4.
- Menggunakan `created_at` dan `updated_at`.
- Soft Delete diterapkan pada tabel utama menggunakan `deleted_at`.
- Seluruh Foreign Key menggunakan referential integrity PostgreSQL.

---

# 10.1 Table : users

## Description

Menyimpan informasi akun pengguna yang digunakan untuk proses autentikasi dan otorisasi.

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| name | VARCHAR(150) | No | - | Nama lengkap |
| email | VARCHAR(150) | No | - | Email pengguna |
| password | VARCHAR(255) | No | - | Password Hash |
| role | VARCHAR(20) | No | student | student / administrator |
| email_verified_at | TIMESTAMP | Yes | NULL | Verifikasi email |
| remember_token | VARCHAR(100) | Yes | NULL | Remember Login |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Waktu diperbarui |
| deleted_at | TIMESTAMP | Yes | NULL | Soft Delete |

---

## Constraints

Primary Key

- id

Unique

- email

Check Constraint

role IN

- student
- administrator

---

## Index

| Index | Type |
|--------|------|
| users_pkey | Primary |
| users_email_unique | Unique |
| idx_users_role | B-Tree |

---

## Relationships

| Related Table | Relationship |
|---------------|--------------|
| student_profiles | One-to-One |
| activity_logs | One-to-Many |

---

# 10.2 Table : student_profiles

## Description

Menyimpan informasi profil mahasiswa.

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| user_id | UUID | No | - | Relasi ke users |
| nim | VARCHAR(30) | No | - | Nomor Induk Mahasiswa |
| program_studi | VARCHAR(100) | No | - | Program Studi |
| angkatan | SMALLINT | No | - | Tahun angkatan |
| phone | VARCHAR(20) | Yes | NULL | Nomor telepon |
| bio | TEXT | Yes | NULL | Biografi singkat |
| photo | VARCHAR(255) | Yes | NULL | Lokasi foto profil |
| github_url | VARCHAR(255) | Yes | NULL | URL GitHub |
| linkedin_url | VARCHAR(255) | Yes | NULL | URL LinkedIn |
| profile_completion | SMALLINT | No | 0 | Persentase kelengkapan profil |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Waktu diperbarui |
| deleted_at | TIMESTAMP | Yes | NULL | Soft Delete |

---

## Constraints

Primary Key

- id

Foreign Key

user_id → users.id

Unique

- user_id
- nim

---

## Index

| Index | Type |
|--------|------|
| student_profiles_pkey | Primary |
| idx_student_user | B-Tree |
| idx_student_nim | Unique |
| idx_program_studi | B-Tree |
| idx_angkatan | B-Tree |

---

## Relationships

| Parent | Relationship |
|---------|--------------|
| users | One-to-One |

| Child | Relationship |
|---------|-------------|
| skills | One-to-Many |
| certificates | One-to-Many |
| portfolios | One-to-Many |
| points | One-to-One |
| point_histories | One-to-Many |
| reward_claims | One-to-Many |
| ai_recommendations | One-to-Many |

---

## Validation Rules

| Field | Rule |
|--------|------|
| nim | Required, Unique |
| program_studi | Required |
| angkatan | Required |
| github_url | URL |
| linkedin_url | URL |
| phone | Numeric |

---

## Business Rules

- Satu User hanya boleh memiliki satu Student Profile.
- NIM tidak boleh sama.
- Profile Completion dihitung otomatis oleh sistem.
- Mahasiswa dapat memperbarui profil kapan saja.
- Administrator hanya memiliki akses baca terhadap profil mahasiswa.

---

# 10.3 Entity Summary

| Table | Records |
|--------|---------|
| users | Dynamic |
| student_profiles | Dynamic |

---

# 10.4 Data Flow

```text
Register/Login
        │
        ▼
users
        │
        ▼
student_profiles
        │
        ▼
Dashboard
```

---

# End of Part 3
# 10.5 Table : skills

## Description

Menyimpan data kompetensi (skill) yang dimiliki mahasiswa.

Data skill dapat ditambahkan oleh mahasiswa dan harus melalui proses verifikasi Administrator sebelum dianggap valid.

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| student_profile_id | UUID | No | - | Relasi ke student_profiles |
| skill_name | VARCHAR(100) | No | - | Nama skill |
| category | VARCHAR(50) | No | General | Kategori skill |
| level | VARCHAR(20) | No | Beginner | Beginner / Intermediate / Advanced |
| description | TEXT | Yes | NULL | Deskripsi skill |
| verification_status | VARCHAR(20) | No | pending | Status verifikasi |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Dibuat |
| updated_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Diubah |
| deleted_at | TIMESTAMP | Yes | NULL | Soft Delete |

---

## Constraints

Primary Key

- id

Foreign Key

student_profile_id → student_profiles.id

Check Constraint

verification_status

- pending
- approved
- rejected

Check Constraint

level

- Beginner
- Intermediate
- Advanced

---

## Index

| Index | Type |
|--------|------|
| idx_skill_student | B-Tree |
| idx_skill_category | B-Tree |
| idx_skill_status | B-Tree |

---

## Business Rules

- Skill baru berstatus **Pending**.
- Skill hanya memperoleh poin setelah disetujui.
- Mahasiswa hanya dapat mengubah skill miliknya sendiri.
- Administrator tidak dapat mengubah isi skill, hanya melakukan verifikasi.

---

# 10.6 Table : certificates

## Description

Menyimpan sertifikat kompetensi mahasiswa.

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| student_profile_id | UUID | No | - | Relasi ke student_profiles |
| certificate_name | VARCHAR(200) | No | - | Nama sertifikat |
| organizer | VARCHAR(150) | No | - | Penyelenggara |
| issue_date | DATE | No | - | Tanggal terbit |
| expiry_date | DATE | Yes | NULL | Masa berlaku |
| credential_url | VARCHAR(255) | Yes | NULL | URL validasi |
| file_path | VARCHAR(255) | No | - | Lokasi file sertifikat |
| verification_status | VARCHAR(20) | No | pending | Status verifikasi |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Dibuat |
| updated_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Diubah |
| deleted_at | TIMESTAMP | Yes | NULL | Soft Delete |

---

## Constraints

Primary Key

- id

Foreign Key

student_profile_id → student_profiles.id

Check Constraint

verification_status

- pending
- approved
- rejected

---

## Index

| Index | Type |
|--------|------|
| idx_certificate_student | B-Tree |
| idx_certificate_issue_date | B-Tree |
| idx_certificate_status | B-Tree |

---

## Business Rules

- File wajib bertipe PDF/JPG/PNG.
- Ukuran file maksimum 5 MB.
- Sertifikat hanya memperoleh poin setelah diverifikasi.
- Administrator hanya melakukan approve atau reject.

---

# 10.7 Table : portfolios

## Description

Menyimpan data proyek atau portofolio mahasiswa.

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| student_profile_id | UUID | No | - | Relasi ke student_profiles |
| project_title | VARCHAR(200) | No | - | Judul proyek |
| project_description | TEXT | No | - | Deskripsi proyek |
| project_url | VARCHAR(255) | Yes | NULL | URL proyek |
| github_url | VARCHAR(255) | Yes | NULL | Repository GitHub |
| thumbnail | VARCHAR(255) | Yes | NULL | Thumbnail proyek |
| verification_status | VARCHAR(20) | No | pending | Status verifikasi |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Dibuat |
| updated_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Diubah |
| deleted_at | TIMESTAMP | Yes | NULL | Soft Delete |

---

## Constraints

Primary Key

- id

Foreign Key

student_profile_id → student_profiles.id

Check Constraint

verification_status

- pending
- approved
- rejected

---

## Index

| Index | Type |
|--------|------|
| idx_portfolio_student | B-Tree |
| idx_portfolio_status | B-Tree |
| idx_project_title | B-Tree |

---

## Business Rules

- Mahasiswa dapat memiliki lebih dari satu portofolio.
- URL GitHub bersifat opsional.
- Portofolio memperoleh poin setelah disetujui Administrator.
- Portofolio yang ditolak dapat diperbaiki dan diajukan ulang.

---

# 10.8 Competency Module Summary

| Table | Parent | Child |
|--------|--------|-------|
| skills | student_profiles | verifications |
| certificates | student_profiles | verifications |
| portfolios | student_profiles | verifications |

---

# 10.9 Verification Workflow

```text
Student

↓

Tambah Data

↓

Status = Pending

↓

Administrator Review

↓

Approve / Reject

↓

Update Verification

↓

Update Point

↓

Refresh Leaderboard

↓

Generate Rule-Based AI Recommendation
```

---

# 10.10 Validation Rules

## Skill

- Nama skill wajib diisi.
- Level harus sesuai pilihan.
- Tidak boleh ada skill duplikat untuk mahasiswa yang sama.

---

## Certificate

- Nama sertifikat wajib diisi.
- File wajib diunggah.
- Format file harus valid.
- Tanggal terbit wajib diisi.

---

## Portfolio

- Judul proyek wajib diisi.
- Deskripsi proyek wajib diisi.
- URL harus valid jika diisi.
- Thumbnail bersifat opsional.

---

# 10.11 Relationship Summary

| Parent Table | Child Table | Cardinality |
|--------------|-------------|-------------|
| student_profiles | skills | 1 : N |
| student_profiles | certificates | 1 : N |
| student_profiles | portfolios | 1 : N |

---

# End of Part 4
# 10.12 Table : verifications

## Description

Menyimpan status verifikasi terhadap data Skill, Certificate, dan Portfolio yang diajukan mahasiswa.

Setiap data kompetensi wajib melalui proses verifikasi Administrator sebelum dianggap valid.

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| student_profile_id | UUID | No | - | Relasi mahasiswa |
| reference_type | VARCHAR(30) | No | - | skill / certificate / portfolio |
| reference_id | UUID | No | - | ID data yang diverifikasi |
| status | VARCHAR(20) | No | pending | Status verifikasi |
| verified_by | UUID | Yes | NULL | Administrator |
| verified_at | TIMESTAMP | Yes | NULL | Waktu verifikasi |
| notes | TEXT | Yes | NULL | Catatan verifikasi |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Dibuat |
| updated_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Diubah |

---

## Constraints

Primary Key

- id

Foreign Key

student_profile_id → student_profiles.id

verified_by → users.id

Check Constraint

status

- pending
- approved
- rejected

reference_type

- skill
- certificate
- portfolio

---

## Index

| Index | Type |
|--------|------|
| idx_verification_student | B-Tree |
| idx_verification_status | B-Tree |
| idx_reference | Composite |

---

# 10.13 Table : verification_logs

## Description

Menyimpan histori seluruh aktivitas verifikasi sehingga setiap perubahan status dapat ditelusuri.

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| verification_id | UUID | No | - | Relasi verifikasi |
| previous_status | VARCHAR(20) | Yes | NULL | Status sebelumnya |
| current_status | VARCHAR(20) | No | - | Status baru |
| changed_by | UUID | No | - | Administrator |
| notes | TEXT | Yes | NULL | Catatan |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Waktu perubahan |

---

## Relationships

verification_logs

↓

verification_id

↓

verifications.id

---

## Business Rules

- Seluruh perubahan status harus dicatat.
- Tidak boleh ada update tanpa log.
- Log tidak boleh dihapus.

---

# 10.14 Table : points

## Description

Menyimpan total poin mahasiswa.

Tabel ini hanya menyimpan nilai akhir sehingga proses pembacaan Dashboard dan Leaderboard menjadi lebih cepat.

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| student_profile_id | UUID | No | - | Relasi mahasiswa |
| total_points | INTEGER | No | 0 | Total poin |
| last_updated | TIMESTAMP | No | CURRENT_TIMESTAMP | Update terakhir |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Dibuat |
| updated_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Diubah |

---

## Constraints

Primary Key

- id

Foreign Key

student_profile_id

Unique

- student_profile_id

---

## Index

| Index | Type |
|--------|------|
| idx_total_points | B-Tree |
| idx_student_points | Unique |

---

## Business Rules

- Setiap mahasiswa hanya memiliki satu record poin.
- Total poin tidak boleh bernilai negatif.
- Perubahan poin hanya dilakukan oleh sistem setelah verifikasi.

---

# 10.15 Table : point_histories

## Description

Menyimpan histori seluruh perubahan poin mahasiswa.

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| student_profile_id | UUID | No | - | Relasi mahasiswa |
| source_type | VARCHAR(30) | No | - | Skill / Certificate / Portfolio / Reward |
| source_id | UUID | Yes | NULL | ID sumber poin |
| point_change | INTEGER | No | - | Nilai perubahan |
| description | TEXT | Yes | NULL | Keterangan |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Waktu perubahan |

---

## Constraints

Check Constraint

point_change <> 0

---

## Business Rules

- Seluruh perubahan poin harus memiliki histori.
- Pengurangan poin karena klaim reward juga dicatat.
- Histori tidak boleh diubah maupun dihapus.

---

# 10.16 Point Calculation Flow

```text
Student Submit Data
          │
          ▼
Status = Pending
          │
          ▼
Administrator Review
          │
          ▼
Approved?
     │
 ┌───┴────┐
 │        │
No       Yes
 │        │
 ▼        ▼
Reject  Business Rule Engine
             │
             ▼
     Calculate Points
             │
             ▼
 Update points Table
             │
             ▼
Insert point_histories
             │
             ▼
 Refresh Leaderboard
             │
             ▼
 Generate AI Recommendation
```

---

# 10.17 Example Point Rules

| Activity | Point |
|----------|------:|
| Beginner Skill | 10 |
| Intermediate Skill | 20 |
| Advanced Skill | 30 |
| Certificate | 25 |
| Portfolio | 40 |
| Competition Winner | 50 *(Future Enhancement)* |

---

# 10.18 Verification Status Lifecycle

```text
Pending
   │
   ├─────────────┐
   │             │
   ▼             ▼
Approved     Rejected
   │             │
   │             ▼
   │       Student Revision
   │             │
   └─────────────┘
         │
         ▼
      Pending
```

---

# 10.19 Relationship Summary

| Parent | Child | Relationship |
|---------|-------|--------------|
| student_profiles | verifications | 1 : N |
| verifications | verification_logs | 1 : N |
| student_profiles | points | 1 : 1 |
| student_profiles | point_histories | 1 : N |

---

# 10.20 Business Process Summary

1. Mahasiswa mengirim data kompetensi.
2. Sistem membuat data verifikasi dengan status **Pending**.
3. Administrator melakukan review.
4. Jika **Approved**, sistem:
   - Menambahkan poin.
   - Menyimpan histori poin.
   - Memperbarui leaderboard.
   - Memperbarui Rule-Based AI Recommendation.
5. Jika **Rejected**, mahasiswa dapat memperbaiki data dan mengajukan ulang.

---

# End of Part 5
# 10.21 Table : reward_categories

## Description

Menyimpan kategori reward agar data reward terstruktur dan memenuhi prinsip normalisasi (3NF).

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| name | VARCHAR(100) | No | - | Nama kategori |
| description | TEXT | Yes | NULL | Deskripsi kategori |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Dibuat |
| updated_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Diubah |

---

## Sample Data

| Name |
|------|
| Merchandise |
| Voucher |
| Sertifikat |
| Beasiswa |
| Workshop |

---

## Relationships

reward_categories

↓

rewards

One-to-Many

---

# 10.22 Table : rewards

## Description

Menyimpan seluruh reward yang dapat ditukarkan menggunakan poin mahasiswa.

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| category_id | UUID | No | - | Relasi kategori |
| title | VARCHAR(150) | No | - | Nama reward |
| description | TEXT | Yes | NULL | Deskripsi reward |
| required_points | INTEGER | No | 0 | Poin yang dibutuhkan |
| stock | INTEGER | No | 0 | Jumlah stok |
| image | VARCHAR(255) | Yes | NULL | Gambar reward |
| status | VARCHAR(20) | No | active | active / inactive |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Dibuat |
| updated_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Diubah |
| deleted_at | TIMESTAMP | Yes | NULL | Soft Delete |

---

## Constraints

Foreign Key

category_id → reward_categories.id

Check Constraint

status

- active
- inactive

required_points >= 0

stock >= 0

---

## Index

| Index | Type |
|--------|------|
| idx_reward_category | B-Tree |
| idx_reward_status | B-Tree |
| idx_required_points | B-Tree |

---

## Business Rules

- Reward hanya dapat diklaim jika status Active.
- Reward dengan stok 0 tidak dapat diklaim.
- Required Point tidak boleh negatif.

---

# 10.23 Table : reward_claims

## Description

Menyimpan riwayat penukaran poin mahasiswa terhadap reward.

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| student_profile_id | UUID | No | - | Relasi mahasiswa |
| reward_id | UUID | No | - | Reward yang diklaim |
| used_points | INTEGER | No | - | Poin yang dipakai |
| status | VARCHAR(20) | No | pending | pending / approved / rejected / completed |
| claimed_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Waktu klaim |
| processed_at | TIMESTAMP | Yes | NULL | Diproses admin |
| processed_by | UUID | Yes | NULL | Administrator |
| notes | TEXT | Yes | NULL | Catatan |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Dibuat |
| updated_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Diubah |

---

## Relationships

student_profile_id → student_profiles.id

reward_id → rewards.id

processed_by → users.id

---

## Business Rules

- Klaim hanya dapat dilakukan jika poin mencukupi.
- Setelah klaim berhasil, poin mahasiswa langsung dikurangi.
- Seluruh transaksi dicatat pada point_histories.
- Administrator dapat menyetujui atau menolak proses penyerahan reward apabila diperlukan.

---

# 10.24 Reward Claim Flow

```text
Student

↓

Open Reward Page

↓

Select Reward

↓

Check Point

↓

Enough Point?

├──── No
│
└── Display Warning

↓

Yes

↓

Check Stock

↓

Available?

├──── No
│
└── Out of Stock

↓

Yes

↓

Create Reward Claim

↓

Reduce Student Point

↓

Insert Point History

↓

Update Stock

↓

Success
```

---

# 10.25 Table : opportunities

## Description

Menyimpan informasi peluang pengembangan mahasiswa seperti lomba, seminar, pelatihan, magang, maupun workshop.

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| title | VARCHAR(200) | No | - | Judul opportunity |
| category | VARCHAR(50) | No | - | Competition / Internship / Seminar / Workshop |
| organizer | VARCHAR(150) | No | - | Penyelenggara |
| description | TEXT | No | - | Deskripsi |
| registration_url | VARCHAR(255) | Yes | NULL | Link pendaftaran |
| location | VARCHAR(150) | Yes | NULL | Lokasi |
| start_date | DATE | No | - | Tanggal mulai |
| end_date | DATE | No | - | Tanggal berakhir |
| image | VARCHAR(255) | Yes | NULL | Poster |
| status | VARCHAR(20) | No | active | active / expired |
| created_by | UUID | No | - | Administrator |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Dibuat |
| updated_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Diubah |
| deleted_at | TIMESTAMP | Yes | NULL | Soft Delete |

---

## Relationships

created_by → users.id

---

## Business Rules

- Opportunity hanya dapat dibuat oleh Administrator.
- Opportunity otomatis berubah menjadi **Expired** apabila melewati tanggal berakhir.
- Mahasiswa hanya dapat melihat Opportunity yang berstatus **Active**.

---

# 10.26 Opportunity Workflow

```text
Administrator

↓

Create Opportunity

↓

Validation

↓

Save Database

↓

Publish

↓

Visible on Student Dashboard

↓

Expired Automatically
```

---

# 10.27 Relationship Summary

| Parent | Child | Relationship |
|---------|-------|--------------|
| reward_categories | rewards | 1 : N |
| rewards | reward_claims | 1 : N |
| student_profiles | reward_claims | 1 : N |
| users | opportunities | 1 : N |

---

# 10.28 Module Summary

| Table | Function |
|--------|----------|
| reward_categories | Kategori reward |
| rewards | Daftar reward |
| reward_claims | Riwayat klaim reward |
| opportunities | Informasi peluang |

---

# End of Part 6
# 10.29 Table : ai_recommendations

## Description

Menyimpan hasil rekomendasi yang dihasilkan oleh Rule-Based AI Recommendation Engine berdasarkan data kompetensi mahasiswa.

Rekomendasi bersifat dinamis dan dapat diperbarui setiap kali terjadi perubahan pada Skill, Certificate, Portfolio, maupun Point.

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| student_profile_id | UUID | No | - | Relasi mahasiswa |
| recommendation_type | VARCHAR(50) | No | - | Jenis rekomendasi |
| title | VARCHAR(200) | No | - | Judul rekomendasi |
| description | TEXT | No | - | Isi rekomendasi |
| priority | SMALLINT | No | 1 | Prioritas (1-5) |
| status | VARCHAR(20) | No | active | active / completed / dismissed |
| generated_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Waktu dibuat |
| expires_at | TIMESTAMP | Yes | NULL | Masa berlaku |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Dibuat |
| updated_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Diubah |

---

## Constraints

Primary Key

- id

Foreign Key

student_profile_id → student_profiles.id

Check Constraint

priority

1 - 5

status

- active
- completed
- dismissed

---

## Index

| Index | Type |
|--------|------|
| idx_ai_student | B-Tree |
| idx_ai_priority | B-Tree |
| idx_ai_status | B-Tree |

---

## Recommendation Types

| Type | Description |
|------|-------------|
| Skill Improvement | Menambah kompetensi |
| Certification | Mengikuti sertifikasi |
| Portfolio | Menambah proyek |
| Competition | Mengikuti lomba |
| Workshop | Mengikuti workshop |
| Internship | Mengikuti magang |

---

## Business Rules

- Rekomendasi hanya dapat dilihat oleh mahasiswa terkait.
- Sistem dapat menghasilkan lebih dari satu rekomendasi.
- Rekomendasi lama dapat digantikan apabila profil mahasiswa berubah secara signifikan.
- Administrator hanya memiliki hak akses baca untuk keperluan monitoring.

---

# 10.30 Rule-Based Recommendation Process

```text
Student Profile
        │
        ▼
Skills
Certificates
Portfolios
Points
        │
        ▼
Rule Evaluation
        │
        ▼
Priority Calculation
        │
        ▼
Generate Recommendation
        │
        ▼
Save ai_recommendations
        │
        ▼
Display on Dashboard
```

---

# 10.31 Example Rules

| Condition | Recommendation |
|-----------|----------------|
| Skill < 3 | Tambahkan skill baru |
| Certificate = 0 | Ikuti pelatihan atau sertifikasi |
| Portfolio = 0 | Buat portofolio pertama |
| Point < 100 | Ikuti lebih banyak kegiatan |
| Point ≥ 250 | Klaim reward yang tersedia |

---

# 10.32 Table : activity_logs

## Description

Menyimpan seluruh aktivitas penting pengguna sebagai audit trail sistem.

---

## Table Structure

| Column | Type | Nullable | Default | Description |
|---------|------|----------|---------|-------------|
| id | UUID | No | uuid_generate_v4() | Primary Key |
| user_id | UUID | No | - | Pengguna |
| activity | VARCHAR(150) | No | - | Nama aktivitas |
| module | VARCHAR(100) | No | - | Modul terkait |
| description | TEXT | Yes | NULL | Detail aktivitas |
| ip_address | VARCHAR(45) | Yes | NULL | Alamat IP |
| user_agent | TEXT | Yes | NULL | Browser |
| created_at | TIMESTAMP | No | CURRENT_TIMESTAMP | Waktu aktivitas |

---

## Constraints

Primary Key

- id

Foreign Key

user_id → users.id

---

## Index

| Index | Type |
|--------|------|
| idx_activity_user | B-Tree |
| idx_activity_module | B-Tree |
| idx_activity_created | B-Tree |

---

## Example Activities

| Activity | Module |
|----------|--------|
| Login | Authentication |
| Logout | Authentication |
| Add Skill | Skill |
| Upload Certificate | Certificate |
| Add Portfolio | Portfolio |
| Claim Reward | Reward |
| Verify Submission | Verification |
| Create Opportunity | Opportunity |

---

## Business Rules

- Activity Log bersifat **append-only**.
- Data log tidak dapat diubah.
- Data log hanya dapat dihapus melalui kebijakan retensi sistem.
- Administrator dapat melihat seluruh log.
- Mahasiswa tidak memiliki akses ke Activity Log.

---

# 10.33 Activity Logging Flow

```text
User Action
      │
      ▼
Middleware
      │
      ▼
Activity Logger
      │
      ▼
activity_logs
      │
      ▼
Administrator Dashboard
```

---

# 10.34 Relationship Summary

| Parent | Child | Relationship |
|---------|-------|--------------|
| student_profiles | ai_recommendations | 1 : N |
| users | activity_logs | 1 : N |

---

# 10.35 Module Summary

| Table | Purpose |
|--------|---------|
| ai_recommendations | Menyimpan hasil Rule-Based AI Recommendation |
| activity_logs | Audit trail seluruh aktivitas sistem |

---

# End of Part 7
# 11. Relationship Mapping

Bagian ini menjelaskan hubungan antar tabel pada database University Talent Hub.

Seluruh relasi menggunakan **Foreign Key Constraint** untuk menjaga integritas data.

---

# 11.1 Relationship Overview

| Parent Table | Child Table | Relationship | Foreign Key |
|---------------|------------|--------------|-------------|
| users | student_profiles | One-to-One | user_id |
| users | verifications | One-to-Many | verified_by |
| users | reward_claims | One-to-Many | processed_by |
| users | opportunities | One-to-Many | created_by |
| users | activity_logs | One-to-Many | user_id |
| student_profiles | skills | One-to-Many | student_profile_id |
| student_profiles | certificates | One-to-Many | student_profile_id |
| student_profiles | portfolios | One-to-Many | student_profile_id |
| student_profiles | verifications | One-to-Many | student_profile_id |
| student_profiles | points | One-to-One | student_profile_id |
| student_profiles | point_histories | One-to-Many | student_profile_id |
| student_profiles | reward_claims | One-to-Many | student_profile_id |
| student_profiles | ai_recommendations | One-to-Many | student_profile_id |
| reward_categories | rewards | One-to-Many | category_id |
| rewards | reward_claims | One-to-Many | reward_id |
| verifications | verification_logs | One-to-Many | verification_id |

---

# 11.2 Foreign Key Constraints

## users → student_profiles

```text
users.id
      │
      ▼
student_profiles.user_id
```

Delete Rule

RESTRICT

Update Rule

CASCADE

---

## student_profiles → skills

```text
student_profiles.id
        │
        ▼
skills.student_profile_id
```

Delete Rule

CASCADE

Update Rule

CASCADE

---

## student_profiles → certificates

```text
student_profiles.id
        │
        ▼
certificates.student_profile_id
```

Delete Rule

CASCADE

Update Rule

CASCADE

---

## student_profiles → portfolios

```text
student_profiles.id
        │
        ▼
portfolios.student_profile_id
```

Delete Rule

CASCADE

Update Rule

CASCADE

---

## student_profiles → points

```text
student_profiles.id
        │
        ▼
points.student_profile_id
```

Delete Rule

CASCADE

Update Rule

CASCADE

---

## student_profiles → point_histories

```text
student_profiles.id
        │
        ▼
point_histories.student_profile_id
```

Delete Rule

CASCADE

Update Rule

CASCADE

---

## student_profiles → reward_claims

```text
student_profiles.id
        │
        ▼
reward_claims.student_profile_id
```

Delete Rule

RESTRICT

Update Rule

CASCADE

---

## reward_categories → rewards

```text
reward_categories.id
         │
         ▼
rewards.category_id
```

Delete Rule

RESTRICT

Update Rule

CASCADE

---

## rewards → reward_claims

```text
rewards.id
      │
      ▼
reward_claims.reward_id
```

Delete Rule

RESTRICT

Update Rule

CASCADE

---

## users → opportunities

```text
users.id
      │
      ▼
opportunities.created_by
```

Delete Rule

RESTRICT

Update Rule

CASCADE

---

## users → activity_logs

```text
users.id
      │
      ▼
activity_logs.user_id
```

Delete Rule

RESTRICT

Update Rule

CASCADE

---

## users → verifications

```text
users.id
      │
      ▼
verifications.verified_by
```

Delete Rule

SET NULL

Update Rule

CASCADE

---

## verifications → verification_logs

```text
verifications.id
        │
        ▼
verification_logs.verification_id
```

Delete Rule

CASCADE

Update Rule

CASCADE

---

## users → reward_claims

```text
users.id
      │
      ▼
reward_claims.processed_by
```

Delete Rule

SET NULL

Update Rule

CASCADE

---

# 11.3 Relationship Diagram

```text
users
 │
 ├────────────── student_profiles
 │                    │
 │                    ├──────── skills
 │                    ├──────── certificates
 │                    ├──────── portfolios
 │                    ├──────── points
 │                    ├──────── point_histories
 │                    ├──────── reward_claims
 │                    ├──────── ai_recommendations
 │                    └──────── verifications
 │                                  │
 │                                  ▼
 │                           verification_logs
 │
 ├────────────── activity_logs
 │
 └────────────── opportunities

reward_categories
         │
         ▼
      rewards
         │
         ▼
   reward_claims
```

---

# 11.4 Referential Integrity Rules

## Rule RI-001

Seluruh Foreign Key wajib mengacu pada Primary Key yang valid.

---

## Rule RI-002

Tidak boleh terdapat data anak tanpa data induk.

---

## Rule RI-003

Primary Key tidak boleh diubah secara manual.

---

## Rule RI-004

Soft Delete digunakan pada tabel utama sehingga histori tetap terjaga.

---

## Rule RI-005

Tabel histori seperti:

- point_histories
- verification_logs
- activity_logs

bersifat **append-only** dan tidak boleh diperbarui.

---

# 11.5 Cascade Strategy

| Relationship | Delete | Update |
|--------------|--------|--------|
| User → Student Profile | Restrict | Cascade |
| Student → Skill | Cascade | Cascade |
| Student → Certificate | Cascade | Cascade |
| Student → Portfolio | Cascade | Cascade |
| Student → Point | Cascade | Cascade |
| Student → Point History | Cascade | Cascade |
| Student → AI Recommendation | Cascade | Cascade |
| Reward → Reward Claim | Restrict | Cascade |
| Verification → Verification Log | Cascade | Cascade |

---

# 11.6 Data Integrity Checklist

| Rule | Status |
|------|--------|
| Primary Key pada seluruh tabel | ✅ |
| Foreign Key pada seluruh relasi | ✅ |
| UUID digunakan sebagai Primary Key | ✅ |
| Referential Integrity | ✅ |
| Cascade Strategy ditentukan | ✅ |
| Soft Delete diterapkan pada tabel utama | ✅ |
| Histori bersifat append-only | ✅ |

---

# End of Part 8
# 12. Index Strategy

## Purpose

Strategi indexing dirancang untuk meningkatkan performa query pada proses:

- Login
- Dashboard
- Leaderboard
- Verifikasi
- Reward
- Opportunity
- AI Recommendation

---

# 12.1 Primary Index

Seluruh tabel menggunakan Primary Key berupa UUID.

| Table | Primary Key |
|---------|------------|
| users | id |
| student_profiles | id |
| skills | id |
| certificates | id |
| portfolios | id |
| verifications | id |
| verification_logs | id |
| points | id |
| point_histories | id |
| reward_categories | id |
| rewards | id |
| reward_claims | id |
| opportunities | id |
| ai_recommendations | id |
| activity_logs | id |

---

# 12.2 Unique Index

| Table | Column |
|---------|---------|
| users | email |
| student_profiles | nim |
| student_profiles | user_id |

---

# 12.3 Foreign Key Index

Semua Foreign Key wajib memiliki index.

| Table | Indexed Column |
|---------|----------------|
| student_profiles | user_id |
| skills | student_profile_id |
| certificates | student_profile_id |
| portfolios | student_profile_id |
| verifications | student_profile_id |
| verifications | verified_by |
| verification_logs | verification_id |
| points | student_profile_id |
| point_histories | student_profile_id |
| rewards | category_id |
| reward_claims | reward_id |
| reward_claims | student_profile_id |
| opportunities | created_by |
| ai_recommendations | student_profile_id |
| activity_logs | user_id |

---

# 12.4 Composite Index

Beberapa query membutuhkan lebih dari satu kolom.

## Skills

(student_profile_id, verification_status)

---

Certificates

(student_profile_id, verification_status)

---

Portfolios

(student_profile_id, verification_status)

---

Reward Claims

(student_profile_id, status)

---

AI Recommendation

(student_profile_id, priority)

---

Activity Logs

(user_id, created_at)

---

# 12.5 Full Text Search

Full Text Search digunakan pada PostgreSQL untuk meningkatkan pencarian.

Kolom yang menggunakan Full Text Search:

- project_title
- project_description
- certificate_name
- opportunity_title
- opportunity_description

---

# 12.6 Query Optimization

Dashboard Student

Mengambil:

- Profile
- Skill
- Certificate
- Portfolio
- Point

Menggunakan eager loading Laravel.

---

Leaderboard

Mengurutkan berdasarkan

total_points DESC

Menggunakan index

idx_total_points

---

Verification

Filter berdasarkan

status

Menggunakan

idx_verification_status

---

Recommendation

Filter berdasarkan

student_profile_id

priority

Menggunakan Composite Index

---

# 13. Database Normalization

Database dirancang mengikuti Third Normal Form (3NF).

---

# 13.1 First Normal Form (1NF)

Semua tabel memenuhi:

- Tidak ada repeating group
- Nilai bersifat atomic
- Tidak ada array

Status

✅

---

# 13.2 Second Normal Form (2NF)

Semua atribut non-key bergantung penuh pada Primary Key.

Status

✅

---

# 13.3 Third Normal Form (3NF)

Tidak terdapat ketergantungan transitif.

Contoh

Reward Category dipisahkan menjadi tabel sendiri.

Status

✅

---

# 13.4 Denormalization

Database hanya melakukan denormalisasi pada tabel:

points

Alasan

Agar Leaderboard lebih cepat.

Daripada menghitung seluruh histori poin setiap request.

---

# 13.5 Data Consistency Rules

Rule 1

Email tidak boleh duplikat.

---

Rule 2

NIM tidak boleh duplikat.

---

Rule 3

Point tidak boleh negatif.

---

Rule 4

Reward Stock tidak boleh negatif.

---

Rule 5

Verification Status hanya boleh

Pending

Approved

Rejected

---

Rule 6

Recommendation Priority

1-5

---

Rule 7

Soft Delete hanya diterapkan pada tabel utama.

---

# 13.6 Storage Estimation

Estimasi untuk 10.000 mahasiswa.

| Table | Estimated Rows |
|---------|---------------:|
| users | 10.000 |
| student_profiles | 10.000 |
| skills | 80.000 |
| certificates | 40.000 |
| portfolios | 30.000 |
| verifications | 150.000 |
| verification_logs | 250.000 |
| points | 10.000 |
| point_histories | 300.000 |
| rewards | 100 |
| reward_claims | 20.000 |
| opportunities | 2.000 |
| ai_recommendations | 60.000 |
| activity_logs | 1.000.000+ |

---

# 13.7 Performance Target

| Operation | Target |
|------------|---------|
| Login | < 300 ms |
| Dashboard | < 500 ms |
| Leaderboard | < 300 ms |
| Verification | < 500 ms |
| Reward Claim | < 500 ms |
| AI Recommendation | < 700 ms |

---

# 13.8 Database Quality Checklist

| Item | Status |
|--------|--------|
| 1NF | ✅ |
| 2NF | ✅ |
| 3NF | ✅ |
| Foreign Key | ✅ |
| UUID | ✅ |
| Composite Index | ✅ |
| Full Text Search | ✅ |
| Soft Delete | ✅ |
| Performance Ready | ✅ |

---

# End of Part 9
# 14. Laravel Migration Order

## Purpose

Urutan migration dirancang untuk memastikan seluruh tabel dapat dibuat tanpa terjadi kesalahan Foreign Key Constraint.

Migration harus dijalankan sesuai urutan berikut.

---

## 14.1 Migration Order

| Order | Migration File | Description |
|--------|----------------|-------------|
| 001 | create_users_table | Tabel akun pengguna |
| 002 | create_student_profiles_table | Profil mahasiswa |
| 003 | create_reward_categories_table | Kategori reward |
| 004 | create_rewards_table | Data reward |
| 005 | create_skills_table | Data skill mahasiswa |
| 006 | create_certificates_table | Data sertifikat |
| 007 | create_portfolios_table | Data portofolio |
| 008 | create_verifications_table | Data verifikasi |
| 009 | create_verification_logs_table | Riwayat verifikasi |
| 010 | create_points_table | Total poin mahasiswa |
| 011 | create_point_histories_table | Histori perubahan poin |
| 012 | create_reward_claims_table | Riwayat klaim reward |
| 013 | create_opportunities_table | Informasi opportunity |
| 014 | create_ai_recommendations_table | Hasil Rule-Based Recommendation |
| 015 | create_activity_logs_table | Audit log aktivitas |

---

# 15. Migration Dependency

Tabel berikut menunjukkan ketergantungan antar migration.

| Table | Depends On |
|--------|------------|
| student_profiles | users |
| rewards | reward_categories |
| skills | student_profiles |
| certificates | student_profiles |
| portfolios | student_profiles |
| verifications | users |
| verification_logs | verifications |
| points | student_profiles |
| point_histories | student_profiles |
| reward_claims | student_profiles, rewards |
| opportunities | users |
| ai_recommendations | student_profiles |
| activity_logs | users |

---

# 16. Verification Architecture

## Overview

University Talent Hub menggunakan pendekatan **Polymorphic Relationship** Laravel untuk proses verifikasi.

Dengan pendekatan ini, satu tabel `verifications` dapat digunakan untuk memverifikasi berbagai jenis data tanpa perlu membuat tabel verifikasi terpisah.

---

## Table Structure

| Column | Type | Description |
|---------|------|-------------|
| verifiable_type | VARCHAR(100) | Nama model yang diverifikasi |
| verifiable_id | UUID | ID data yang diverifikasi |

---

## Example

| verifiable_type | verifiable_id |
|-----------------|---------------|
| App\Models\Skill | UUID |
| App\Models\Certificate | UUID |
| App\Models\Portfolio | UUID |

---

## Advantages

- Mengurangi duplikasi struktur database.
- Mudah menambahkan entitas baru yang membutuhkan verifikasi.
- Sesuai dengan Laravel Eloquent Polymorphic Relationship.
- Menjadikan tabel **verifications** sebagai *Single Source of Truth* untuk seluruh status verifikasi.

---

# 17. Seeder Strategy

## Purpose

Seeder digunakan untuk menghasilkan data awal sehingga aplikasi dapat langsung digunakan setelah proses instalasi.

---

## Seeder Order

| Order | Seeder |
|--------|---------|
| 1 | RoleSeeder |
| 2 | AdminSeeder |
| 3 | RewardCategorySeeder |
| 4 | RewardSeeder |
| 5 | StudentSeeder |
| 6 | SkillSeeder |
| 7 | CertificateSeeder |
| 8 | PortfolioSeeder |
| 9 | VerificationSeeder |
| 10 | PointSeeder |
| 11 | OpportunitySeeder |

---

## Master Seeder

```php
DatabaseSeeder
│
├── RoleSeeder
├── AdminSeeder
├── RewardCategorySeeder
├── RewardSeeder
├── StudentSeeder
├── SkillSeeder
├── CertificateSeeder
├── PortfolioSeeder
├── VerificationSeeder
├── PointSeeder
└── OpportunitySeeder
```

---

# 18. Factory Strategy

Laravel Factory digunakan untuk menghasilkan data dummy selama proses development maupun testing.

---

## Factory List

| Factory | Purpose |
|----------|----------|
| UserFactory | Membuat akun pengguna |
| StudentProfileFactory | Membuat profil mahasiswa |
| SkillFactory | Membuat data skill |
| CertificateFactory | Membuat data sertifikat |
| PortfolioFactory | Membuat data portofolio |
| VerificationFactory | Membuat data verifikasi |
| RewardFactory | Membuat data reward |
| OpportunityFactory | Membuat data opportunity |
| AIRecommendationFactory | Membuat data rekomendasi |
| ActivityLogFactory | Membuat data audit log |

---

# 19. Sample Seeder Data

## Administrator

| Field | Value |
|--------|-------|
| Name | Administrator |
| Email | admin@talenthub.com |
| Password | password |

---

## Student

Jumlah data dummy yang dibuat:

- 50 Mahasiswa
- 200 Skill
- 100 Sertifikat
- 80 Portofolio
- 500 Histori Poin
- 20 Reward
- 10 Opportunity

---

# 20. Database Initialization

## Fresh Installation Flow

```text
Clone Repository

↓

Install Dependency

↓

Copy .env

↓

Generate Application Key

↓

Configure Database

↓

Run Migration

↓

Run Seeder

↓

Ready to Use
```

---

## Expected Result

Setelah seluruh migration dan seeder dijalankan, sistem akan memiliki:

- 15 tabel database.
- 1 akun Administrator.
- Data kategori reward.
- Data reward.
- Data mahasiswa dummy.
- Data skill.
- Data sertifikat.
- Data portofolio.
- Data opportunity.
- Data poin.
- Data rekomendasi.

---

# 20.1 Migration Checklist

| Item | Status |
|------|--------|
| Migration Order Defined | ✅ |
| Dependency Mapping | ✅ |
| Seeder Strategy | ✅ |
| Factory Strategy | ✅ |
| Dummy Data Strategy | ✅ |
| Fresh Installation Ready | ✅ |

---

# End of Part 10
# 21. Database Security

## Purpose

Keamanan database dirancang untuk menjaga kerahasiaan, integritas, dan ketersediaan data pada sistem **University Talent Hub**.

Seluruh mekanisme keamanan mengikuti prinsip **Least Privilege**, **Defense in Depth**, dan **Secure by Default**.

---

# 21.1 Authentication Security

Autentikasi aplikasi menggunakan **Laravel Sanctum**.

## Features

- Token Based Authentication
- Session Authentication
- CSRF Protection
- Secure Cookie
- Password Hashing (Bcrypt / Argon2id)

---

# 21.2 Authorization

Hak akses dibagi menjadi dua role utama.

| Role | Permission |
|------|------------|
| Administrator | Full Access |
| Student | Limited Access |

---

## Administrator

Administrator memiliki hak untuk:

- Verifikasi data
- Mengelola reward
- Mengelola opportunity
- Melihat seluruh activity log
- Melihat seluruh mahasiswa

---

## Student

Mahasiswa hanya dapat:

- Mengelola profil sendiri
- Mengelola skill sendiri
- Mengelola sertifikat sendiri
- Mengelola portofolio sendiri
- Melihat reward
- Mengklaim reward
- Melihat rekomendasi

---

# 21.3 Password Policy

Password harus memenuhi ketentuan berikut.

- Minimal 8 karakter
- Mengandung huruf besar
- Mengandung huruf kecil
- Mengandung angka
- Mengandung karakter khusus (disarankan)

Password tidak pernah disimpan dalam bentuk plain text.

---

# 21.4 Database Access Policy

Database hanya dapat diakses oleh:

- Laravel Backend
- Database Administrator

Frontend tidak memiliki akses langsung ke PostgreSQL.

Seluruh akses dilakukan melalui REST API.

---

# 21.5 Data Protection

Data penting yang harus dilindungi:

- Password
- Email
- Nomor Telepon
- Token Login

Strategi perlindungan:

- Password Hash
- HTTPS
- Validation
- Authorization
- CSRF Protection

---

# 21.6 SQL Injection Prevention

Seluruh query menggunakan:

- Laravel Query Builder
- Laravel Eloquent ORM
- Prepared Statement

Query SQL manual hanya diperbolehkan apabila benar-benar diperlukan.

---

# 21.7 File Upload Security

File yang diperbolehkan:

| Type | Extension |
|------|-----------|
| Image | JPG, JPEG, PNG |
| Document | PDF |

---

Ukuran maksimum:

5 MB

---

Validasi dilakukan terhadap:

- MIME Type
- File Size
- File Extension

---

# 21.8 Audit Trail

Seluruh aktivitas penting dicatat pada tabel:

activity_logs

Aktivitas yang dicatat:

- Login
- Logout
- Upload Skill
- Upload Certificate
- Upload Portfolio
- Reward Claim
- Verification
- Opportunity Management

---

# 22. Backup Strategy

## Purpose

Backup dilakukan untuk menghindari kehilangan data akibat kegagalan sistem.

---

## Backup Schedule

| Type | Frequency |
|------|-----------|
| Full Backup | Mingguan |
| Incremental Backup | Harian |

---

## Backup Location

- Local Storage
- External Drive
- Cloud Storage (Future Enhancement)

---

## Retention Policy

| Backup | Retention |
|---------|----------|
| Daily | 7 Hari |
| Weekly | 4 Minggu |
| Monthly | 12 Bulan |

---

# 22.1 Restore Procedure

Proses pemulihan database:

```text
Stop Application

↓

Restore Backup

↓

Verify Database

↓

Run Integrity Check

↓

Start Application
```

---

# 23. Performance Optimization

## Database Optimization

Strategi optimasi yang diterapkan:

- Indexing
- Composite Index
- Query Optimization
- Eager Loading
- Pagination

---

## Dashboard Query

Menggunakan:

- Eager Loading
- Relationship
- Cached Query (Future Enhancement)

---

## Leaderboard Query

Menggunakan:

ORDER BY total_points DESC

LIMIT 10

---

## Recommendation Query

Menggunakan index pada:

- student_profile_id
- priority

---

## Activity Log

Menggunakan pagination.

Tidak seluruh log dimuat sekaligus.

---

# 23.1 Monitoring

Monitoring dilakukan terhadap:

- Database Size
- Slow Query
- CPU Usage
- Memory Usage
- Connection Count

---

# 23.2 Database Maintenance

Maintenance dilakukan secara berkala.

Aktivitas maintenance meliputi:

- Vacuum Analyze
- Reindex
- Backup Verification
- Log Cleanup

---

# 24. Disaster Recovery

## Recovery Target

| Item | Target |
|------|---------|
| RPO | < 24 Jam |
| RTO | < 2 Jam |

---

## Recovery Flow

```text
Failure Detected

↓

Stop Application

↓

Restore Database

↓

Run Migration Check

↓

Verify Integrity

↓

Start Application

↓

System Online
```

---

# 25. Database Scalability

Database dirancang agar dapat dikembangkan tanpa mengubah struktur utama.

Strategi pengembangan:

- Penambahan Module Baru
- Horizontal Scaling (Future)
- Read Replica (Future)
- Database Partition (Future)

---

# 26. Security Checklist

| Item | Status |
|------|--------|
| Password Hashing | ✅ |
| Laravel Sanctum | ✅ |
| Authorization | ✅ |
| HTTPS Ready | ✅ |
| SQL Injection Protection | ✅ |
| File Validation | ✅ |
| Activity Log | ✅ |
| Backup Strategy | ✅ |
| Disaster Recovery | ✅ |
| Monitoring | ✅ |

---

# 27. Performance Checklist

| Item | Status |
|------|--------|
| Primary Index | ✅ |
| Foreign Key Index | ✅ |
| Composite Index | ✅ |
| Query Optimization | ✅ |
| Pagination | ✅ |
| Eager Loading | ✅ |
| Backup Ready | ✅ |
| Maintenance Plan | ✅ |

---

# End of Part 11
# 28. Appendix

Bagian ini berisi standar, konvensi, contoh data, serta evaluasi akhir terhadap rancangan database University Talent Hub.

---

# 28.1 Naming Standard

Seluruh objek database mengikuti standar penamaan berikut.

## Table

Menggunakan format:

snake_case

Contoh:

- users
- student_profiles
- reward_claims
- ai_recommendations

---

## Column

Menggunakan format:

snake_case

Contoh:

- student_profile_id
- created_at
- updated_at
- deleted_at

---

## Primary Key

Seluruh Primary Key menggunakan nama:

id

dengan tipe data:

UUID

---

## Foreign Key

Format:

<nama_tabel>_id

Contoh:

- user_id
- student_profile_id
- reward_id
- category_id

---

## Index

Format:

idx_<table>_<column>

Contoh:

- idx_users_email
- idx_skills_student
- idx_rewards_status

---

# 28.2 Timestamp Convention

Seluruh tabel utama menggunakan timestamp standar Laravel.

| Column | Description |
|---------|-------------|
| created_at | Data dibuat |
| updated_at | Data diperbarui |
| deleted_at | Soft Delete |

---

# 28.3 UUID Convention

Seluruh Primary Key menggunakan UUID Version 4.

Contoh:

```
550e8400-e29b-41d4-a716-446655440000
```

Keuntungan:

- Sulit ditebak
- Aman untuk REST API
- Mendukung distributed system
- Tidak bergantung pada auto increment

---

# 28.4 Soft Delete Convention

Soft Delete diterapkan pada tabel berikut.

- users
- student_profiles
- skills
- certificates
- portfolios
- rewards
- opportunities

Tabel histori **tidak menggunakan Soft Delete**, antara lain:

- verification_logs
- point_histories
- activity_logs

Karena tabel tersebut merupakan **audit trail**.

---

# 28.5 Sample Record

## users

| Field | Value |
|---------|--------|
| id | UUID |
| name | Ahmad Isnan Wahyudi |
| email | student@amikom.ac.id |
| role | student |

---

## student_profiles

| Field | Value |
|---------|--------|
| nim | 23.11.1234 |
| program_studi | D3 Teknik Informatika |
| angkatan | 2023 |

---

## skills

| Field | Value |
|---------|--------|
| skill_name | Laravel |
| category | Web Development |
| level | Intermediate |

---

## certificates

| Field | Value |
|---------|--------|
| certificate_name | Laravel Fundamental |
| organizer | Dicoding |

---

## portfolios

| Field | Value |
|---------|--------|
| project_title | University Talent Hub |
| github_url | https://github.com/example |

---

# 28.6 Laravel Eloquent Convention

Relationship yang digunakan.

| Model | Relationship |
|---------|-------------|
| User | hasOne(StudentProfile) |
| StudentProfile | belongsTo(User) |
| StudentProfile | hasMany(Skill) |
| StudentProfile | hasMany(Certificate) |
| StudentProfile | hasMany(Portfolio) |
| StudentProfile | hasOne(Point) |
| StudentProfile | hasMany(PointHistory) |
| StudentProfile | hasMany(RewardClaim) |
| StudentProfile | hasMany(AIRecommendation) |
| Reward | belongsTo(RewardCategory) |
| RewardCategory | hasMany(Reward) |
| Verification | morphTo() |

---

# 28.7 PostgreSQL Best Practices

Praktik terbaik yang diterapkan:

- UUID sebagai Primary Key
- Foreign Key Constraint
- Composite Index
- Check Constraint
- Soft Delete
- Timestamp
- Third Normal Form (3NF)
- Query Optimization
- Prepared Statement

---

# 28.8 Future Database Roadmap

Pengembangan database di masa mendatang dapat meliputi:

## Phase 2

- Badge System
- Achievement System
- Notification System
- Bookmark Opportunity

---

## Phase 3

- Multi Campus
- Multi Faculty
- Multi Organization
- AI Machine Learning Recommendation

---

## Phase 4

- Data Warehouse
- Business Intelligence Dashboard
- Analytics
- Predictive Recommendation

---

# 28.9 Database Quality Assessment

| Category | Status |
|----------|--------|
| Normalization | ✅ 3NF |
| UUID Strategy | ✅ |
| Referential Integrity | ✅ |
| Security | ✅ |
| Scalability | ✅ |
| Maintainability | ✅ |
| Performance | ✅ |
| Documentation | ✅ |

---

# 28.10 Final Checklist

## Database Design

- [x] Database Architecture
- [x] ERD
- [x] Relationship Mapping
- [x] Table Specification
- [x] Foreign Key Constraint
- [x] Index Strategy
- [x] Database Normalization

---

## Development

- [x] Migration Order
- [x] Seeder Strategy
- [x] Factory Strategy

---

## Production

- [x] Security
- [x] Backup Strategy
- [x] Monitoring
- [x] Performance Optimization
- [x] Disaster Recovery

---

## Documentation

- [x] Naming Convention
- [x] Sample Data
- [x] Best Practice
- [x] Future Roadmap

---

# 28.11 Document References

Dokumen ini memiliki keterkaitan dengan dokumen lain dalam proyek.

| Document | Purpose |
|----------|---------|
| PRD.md | Product Requirement Document |
| UI_UX.md | Desain antarmuka pengguna |
| API_SPEC.md | Dokumentasi REST API |
| ARCHITECTURE.md | Arsitektur sistem |
| TESTING.md | Strategi pengujian |
| DEPLOYMENT.md | Panduan deployment |
| README.md | Dokumentasi proyek |

---

# 28.12 Revision History

| Version | Date | Description |
|---------|------|-------------|
| 1.0 | June 2026 | Initial Database Design |
| 2.0 | July 2026 | Complete redesign aligned with PRD v3.0 |

---

# 28.13 Approval

| Role | Status |
|------|--------|
| Product Owner | Pending |
| System Analyst | Pending |
| Backend Developer | Pending |
| Database Designer | Pending |

---

# End of Database Design Document

**DATABASE.md**

**Version 2.0**

**Status: Final**

**Last Update: July 2026**