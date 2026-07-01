# Task Management Documentation

# University Talent Hub

Version : 1.0

---

# Table of Contents

1. Overview
2. Development Methodology
3. Project Timeline
4. Team Roles
5. Sprint Planning
6. Product Backlog
7. Definition of Ready
8. Definition of Done
9. Priority Matrix

---

# 1. Overview

Dokumen ini digunakan sebagai acuan seluruh proses pengembangan aplikasi **University Talent Hub** mulai dari tahap perencanaan hingga implementasi.

Task disusun menggunakan pendekatan **Agile Scrum** sehingga pengembangan dapat dilakukan secara bertahap (iteratif) dan mudah menyesuaikan perubahan kebutuhan selama proses hackathon maupun pengembangan lanjutan.

---

# 2. Development Methodology

Metodologi yang digunakan adalah:

```
Agile Scrum
```

Alur pengembangan:

```text
Product Backlog

↓

Sprint Planning

↓

Development

↓

Testing

↓

Review

↓

Deployment
```

---

# 3. Project Timeline

Estimasi pengembangan MVP:

| Sprint | Durasi | Fokus |
|----------|---------|---------------------------|
| Sprint 1 | 1 Minggu | Authentication & Setup Project |
| Sprint 2 | 1 Minggu | Talent Profile & Skill |
| Sprint 3 | 1 Minggu | Verification & Gamification |
| Sprint 4 | 1 Minggu | AI Recommendation & Deployment |

Total estimasi:

```
4 Sprint
```

---

# 4. Team Roles

## Product Owner

Tugas:

- Menentukan kebutuhan sistem
- Menentukan prioritas fitur
- Melakukan review hasil sprint

---

## UI/UX Designer

Tugas:

- Mendesain tampilan aplikasi
- Membuat Design System
- Menyusun prototype Figma

---

## Frontend Developer

Tugas:

- Implementasi React
- Integrasi REST API
- Responsive Design

---

## Backend Developer

Tugas:

- Laravel REST API
- Database
- Authentication
- Business Logic

---

## QA / Tester

Tugas:

- Functional Testing
- Bug Report
- Regression Testing

---

# 5. Sprint Planning

## Sprint 1

Target

- Project Setup
- Authentication
- Database
- UI Layout

Deliverables

- Login
- Dashboard Layout
- Database Migration
- Git Repository

---

## Sprint 2

Target

- Talent Profile
- Skill
- Certificate
- Portfolio

Deliverables

- CRUD Skill
- CRUD Certificate
- CRUD Portfolio
- Upload File

---

## Sprint 3

Target

- Verification
- Point System
- Leaderboard
- Reward

Deliverables

- Verification Module
- Reward Module
- Leaderboard
- Notification

---

## Sprint 4

Target

- AI Recommendation
- Opportunity
- Deployment
- Final Testing

Deliverables

- AI Engine
- Opportunity Module
- Presentation Ready

---

# 6. Product Backlog

Prioritas dibagi menjadi:

| Priority | Description |
|-----------|-------------|
| High | Wajib ada pada MVP |
| Medium | Penting tetapi dapat ditunda |
| Low | Pengembangan lanjutan |

---

## Epic 1 — Authentication

Priority

```
High
```

---

### User Story

Sebagai mahasiswa,

Saya ingin login ke sistem,

Agar dapat mengakses Talent Hub.

---

Acceptance Criteria

- Login berhasil.
- Password terenkripsi.
- Session tersimpan.
- Logout berhasil.

---

Story Point

```
5
```

---

## Epic 2 — Student Profile

Priority

```
High
```

---

### User Story

Sebagai mahasiswa,

Saya ingin melengkapi profil,

Agar administrator mengetahui kompetensi saya.

---

Acceptance Criteria

- Edit profil berhasil.
- Upload foto berhasil.
- Progress profil diperbarui.

---

Story Point

```
8
```

---

## Epic 3 — Skill Management

Priority

```
High
```

---

### User Story

Sebagai mahasiswa,

Saya ingin menambahkan skill,

Agar skill saya dapat diverifikasi.

---

Acceptance Criteria

- CRUD Skill.
- Upload bukti.
- Submit verifikasi.
- Status berubah menjadi Pending.

---

Story Point

```
8
```

---

## Epic 4 — Certificate

Priority

```
High
```

---

### User Story

Sebagai mahasiswa,

Saya ingin mengunggah sertifikat,

Agar mendapatkan poin setelah diverifikasi.

---

Acceptance Criteria

- CRUD Sertifikat.
- Upload file.
- Status Pending.
- Menunggu verifikasi.

---

Story Point

```
8
```

---

## Epic 5 — Portfolio

Priority

```
High
```

---

### User Story

Sebagai mahasiswa,

Saya ingin menambahkan portfolio,

Agar hasil karya saya dapat dinilai.

---

Acceptance Criteria

- CRUD Portfolio.
- Upload Thumbnail.
- GitHub URL.
- Demo URL.

---

Story Point

```
8
```

---

## Epic 6 — Verification

Priority

```
High
```

---

### User Story

Sebagai administrator,

Saya ingin memverifikasi data mahasiswa,

Agar data yang tampil valid.

---

Acceptance Criteria

- Approve.
- Reject.
- Catatan Admin.
- Histori Verifikasi.

---

Story Point

```
13
```

---

## Epic 7 — Point System

Priority

```
High
```

---

### User Story

Sebagai sistem,

Saya ingin memberikan poin secara otomatis,

Agar leaderboard selalu diperbarui.

---

Acceptance Criteria

- Point otomatis bertambah.
- Histori poin tersimpan.
- Total poin diperbarui.

---

Story Point

```
8
```

---

**End TASK.md — Part 1**
# 6. Product Backlog (Lanjutan)

---

## Epic 8 — Leaderboard

Priority

```
High
```

---

### User Story

Sebagai mahasiswa,

Saya ingin melihat peringkat saya,

Agar saya termotivasi meningkatkan kompetensi.

---

Acceptance Criteria

- Ranking ditampilkan berdasarkan total poin.
- Ranking diperbarui otomatis setelah poin berubah.
- Mendukung filter mingguan, bulanan, semester, dan keseluruhan.

---

Story Point

```
8
```

---

## Epic 9 — Reward System

Priority

```
High
```

---

### User Story

Sebagai mahasiswa,

Saya ingin menukarkan poin dengan reward,

Agar saya mendapatkan apresiasi atas pencapaian saya.

---

Acceptance Criteria

- Daftar reward tampil.
- Validasi poin dilakukan.
- Validasi stok dilakukan.
- Point otomatis berkurang.
- Riwayat claim tersimpan.

---

Story Point

```
13
```

---

## Epic 10 — AI Recommendation

Priority

```
Medium
```

---

### User Story

Sebagai mahasiswa,

Saya ingin memperoleh rekomendasi otomatis,

Agar mengetahui skill yang perlu dipelajari.

---

Acceptance Criteria

- AI menghasilkan rekomendasi.
- Berdasarkan skill.
- Berdasarkan sertifikat.
- Berdasarkan portfolio.
- Berdasarkan total poin.

---

Story Point

```
13
```

---

## Epic 11 — Opportunity

Priority

```
Medium
```

---

### User Story

Sebagai mahasiswa,

Saya ingin melihat peluang magang dan lomba,

Agar dapat mengikuti kegiatan yang sesuai.

---

Acceptance Criteria

- Daftar opportunity tampil.
- Filter kategori.
- Detail opportunity.
- Deadline ditampilkan.

---

Story Point

```
8
```

---

## Epic 12 — Notification

Priority

```
Medium
```

---

### User Story

Sebagai mahasiswa,

Saya ingin menerima notifikasi,

Agar mengetahui perubahan status verifikasi.

---

Acceptance Criteria

- Skill disetujui.
- Skill ditolak.
- Sertifikat diverifikasi.
- Reward berhasil.
- AI Recommendation baru.

---

Story Point

```
5
```

---

## Epic 13 — Dashboard Analytics

Priority

```
Medium
```

---

### User Story

Sebagai administrator,

Saya ingin melihat statistik aplikasi,

Agar dapat memonitor aktivitas mahasiswa.

---

Acceptance Criteria

- Statistik mahasiswa.
- Statistik verifikasi.
- Statistik reward.
- Statistik portfolio.

---

Story Point

```
8
```

---

# 7. Sprint Board

## Sprint 1

### To Do

- Setup Repository
- Setup Laravel
- Setup React
- Setup PostgreSQL

---

### In Progress

- Authentication
- UI Layout

---

### Done

- Project Initialization

---

## Sprint 2

### To Do

- CRUD Skill
- CRUD Certificate
- CRUD Portfolio
- Upload File

---

## Sprint 3

### To Do

- Verification
- Point System
- Leaderboard
- Reward

---

## Sprint 4

### To Do

- AI Recommendation
- Opportunity
- Final Testing
- Deployment

---

# 8. Task Priority Matrix

| Priority | Target |
|----------|--------|
| High | Sprint Saat Ini |
| Medium | Sprint Berikutnya |
| Low | Future Enhancement |

---

# 9. Bug Priority Matrix

| Priority | Response Time |
|----------|---------------|
| Critical | < 4 Jam |
| High | < 1 Hari |
| Medium | < 3 Hari |
| Low | Sprint Berikutnya |

---

# 10. Definition of Ready (DoR)

Sebuah task dapat dikerjakan apabila:

- Requirement jelas.
- UI telah disetujui.
- Database tersedia.
- API telah didefinisikan.
- Acceptance Criteria tersedia.

---

# 11. Definition of Done (DoD)

Sebuah task dianggap selesai apabila:

- Coding selesai.
- Code Review selesai.
- Tidak terdapat error.
- Lulus Functional Testing.
- Lulus UI Testing.
- Lulus API Testing.
- Dokumentasi diperbarui.
- Berhasil di-merge ke branch utama.

---

# 12. Risk Management

| Risiko | Dampak | Mitigasi |
|---------|--------|----------|
| Requirement berubah | Jadwal mundur | Gunakan Agile Sprint |
| Bug saat Demo | Presentasi terganggu | Lakukan testing sebelum demo |
| Konflik Git | Pengembangan terhambat | Terapkan Git Flow |
| Database Error | Kehilangan data | Backup harian |
| API Error | Frontend gagal mengambil data | Gunakan standard response & logging |

---

# 13. Milestone

| Milestone | Target |
|------------|--------|
| Project Setup | ✅ Sprint 1 |
| Authentication | ✅ Sprint 1 |
| Talent Profile | ✅ Sprint 2 |
| Verification | ✅ Sprint 3 |
| Gamification | ✅ Sprint 3 |
| AI Recommendation | ✅ Sprint 4 |
| Deployment | ✅ Sprint 4 |
| Final Presentation | ✅ Setelah Sprint 4 |

---

# 14. Release Checklist

## Functional

- Login
- Dashboard
- Talent Profile
- Skill
- Certificate
- Portfolio
- Verification
- Reward
- Leaderboard
- Opportunity
- AI Recommendation
- Notification

---

## Technical

- REST API berjalan.
- Database Migration berhasil.
- Seeder berhasil.
- Storage berjalan.
- Upload File berjalan.

---

## Testing

- Unit Test.
- Integration Test.
- User Acceptance Test (UAT).
- Cross Browser Test.
- Responsive Test.

---

# 15. Success Metrics

Indikator keberhasilan MVP:

| KPI | Target |
|------|--------|
| Login Berhasil | ≥ 99% |
| Waktu Muat Dashboard | < 3 detik |
| Upload Dokumen | < 10 detik |
| Response API | < 500 ms |
| Keberhasilan Verifikasi | ≥ 95% |
| Error Rate | < 1% |

---

# 16. Summary

Task Management disusun menggunakan pendekatan **Agile Scrum** sehingga seluruh pekerjaan terbagi menjadi beberapa sprint dengan prioritas yang jelas. Setiap fitur memiliki User Story, Acceptance Criteria, dan Story Point sehingga memudahkan proses estimasi, implementasi, hingga pengujian. Dokumen ini dapat langsung digunakan sebagai acuan pengelolaan proyek pada GitHub Projects, Trello, Jira, maupun Notion.

---

**End of TASK.md**