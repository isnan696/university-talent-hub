# UI / UX Design Documentation

# University Talent Hub

Version : 1.0

---

# Table of Contents

1. Design Philosophy
2. Design Goals
3. Target Users
4. Design Principles
5. Color System
6. Typography
7. Iconography
8. Spacing System
9. Border Radius
10. Shadow System
11. Grid System
12. Responsive Breakpoints
13. Layout Structure
14. Navigation

---

# 1. Design Philosophy

University Talent Hub mengusung konsep **Modern Academic Dashboard** yang menggabungkan kesan profesional, bersih, dan interaktif.

Berbeda dengan dashboard administrasi tradisional yang cenderung padat dan gelap, aplikasi ini menggunakan pendekatan **Light UI** agar nyaman digunakan dalam waktu lama oleh mahasiswa maupun administrator.

Konsep utama desain adalah:

- Clean
- Bright
- Professional
- Friendly
- Minimalist
- Responsive
- Easy to Learn

---

# 2. Design Goals

Tujuan utama desain antarmuka adalah:

- Memudahkan mahasiswa membangun profil profesional.
- Mempermudah administrator melakukan proses verifikasi.
- Menampilkan data secara informatif.
- Memberikan pengalaman gamification yang menarik.
- Menampilkan leaderboard yang mudah dipahami.
- Memberikan pengalaman pengguna yang cepat dan intuitif.

---

# 3. Target Users

## Administrator

Karakteristik:

- Staff Kemahasiswaan
- Dosen
- Admin Fakultas

Kebutuhan:

- Dashboard informatif
- Data mudah dicari
- Verifikasi cepat
- Statistik lengkap

---

## Mahasiswa

Karakteristik:

- Umur 18–25 Tahun
- Aktif menggunakan smartphone
- Familiar dengan media sosial

Kebutuhan:

- UI sederhana
- Navigasi mudah
- Cepat mengunggah data
- Mengetahui perkembangan profil

---

# 4. Design Principles

## Simple

Informasi yang ditampilkan hanya yang benar-benar diperlukan.

---

## Consistent

Komponen memiliki bentuk yang konsisten di seluruh aplikasi.

---

## Accessible

Menggunakan kontras warna yang nyaman dibaca.

---

## Responsive

Seluruh halaman dapat digunakan pada Desktop, Tablet, dan Smartphone.

---

## Feedback

Setiap aksi pengguna harus memberikan respon visual.

Contoh:

- Loading
- Success
- Error
- Empty State

---

# 5. Color System

Aplikasi menggunakan tema terang (Light Theme).

## Primary Color

| Name | Hex |
|------|------|
| Primary Blue | #2563EB |

Digunakan untuk:

- Button Primary
- Link
- Active Menu
- Badge

---

## Secondary Color

| Name | Hex |
|------|------|
| Emerald | #10B981 |

Digunakan untuk:

- Success
- Approved
- Achievement

---

## Accent Color

| Name | Hex |
|------|------|
| Orange | #F59E0B |

Digunakan untuk:

- Warning
- Pending
- Reward

---

## Danger

| Name | Hex |
|------|------|
| Red | #EF4444 |

Digunakan untuk:

- Delete
- Reject
- Error

---

## Background

| Name | Hex |
|------|------|
| White | #FFFFFF |
| Surface | #F8FAFC |

---

## Text

| Name | Hex |
|------|------|
| Primary | #111827 |
| Secondary | #6B7280 |

---

## Border

| Name | Hex |
|------|------|
| Border | #E5E7EB |

---

# 6. Typography

Font yang digunakan:

```
Inter
```

Alternatif:

```
Poppins
```

---

## Heading

```css
Font Weight : 700
```

---

## Sub Heading

```css
Font Weight : 600
```

---

## Body

```css
Font Weight : 400
```

---

## Caption

```css
Font Weight : 400
Font Size : 12px
```

---

# 7. Iconography

Menggunakan:

```
Lucide Icons
```

Alternatif:

- Heroicons
- Tabler Icons

---

Contoh:

Dashboard

```
LayoutDashboard
```

Skill

```
Code2
```

Portfolio

```
FolderGit2
```

Certificate

```
BadgeCheck
```

Leaderboard

```
Trophy
```

Reward

```
Gift
```

AI Recommendation

```
Sparkles
```

Profile

```
UserCircle
```

---

# 8. Spacing System

Menggunakan kelipatan 4.

| Token | Value |
|---------|--------|
| xs | 4px |
| sm | 8px |
| md | 16px |
| lg | 24px |
| xl | 32px |
| xxl | 48px |

---

# 9. Border Radius

| Component | Radius |
|------------|---------|
| Button | 12px |
| Card | 16px |
| Modal | 20px |
| Input | 12px |

---

# 10. Shadow System

Card

```css
0 4px 12px rgba(0,0,0,0.08)
```

Hover

```css
0 8px 24px rgba(0,0,0,0.12)
```

---

# 11. Grid System

Desktop

```
12 Columns
```

Tablet

```
8 Columns
```

Mobile

```
4 Columns
```

---

# 12. Responsive Breakpoints

| Device | Width |
|---------|---------|
| Mobile | <640px |
| Tablet | ≥640px |
| Laptop | ≥1024px |
| Desktop | ≥1280px |

---

# 13. Layout Structure

## Administrator

```
+------------------------------------+
| Navbar                             |
+------------------------------------+
| Sidebar | Content                  |
|         |                          |
|         | Dashboard                |
|         |                          |
+------------------------------------+
```

---

## Mahasiswa

```
+------------------------------------+
| Navbar                             |
+------------------------------------+
| Sidebar | Dashboard                |
|         |                          |
|         | Cards                    |
|         |                          |
+------------------------------------+
```

---

# 14. Navigation

## Administrator

```
Dashboard

Mahasiswa

Verification

Reward

Opportunity

Leaderboard

Profile
```

---

## Mahasiswa

```
Dashboard

Talent Profile

Skill

Certificate

Portfolio

Leaderboard

Reward

AI Recommendation

Profile
```

---

**End UI_UX.md — Part 1**

Selanjutnya (Part 2) akan berisi:
- Design System Components
- Button
- Input
- Card
- Table
- Modal
- Badge
- Progress Bar
- Leaderboard Card
- Reward Card
- AI Recommendation Card
- Empty State
- Loading State
- Toast Notification

# 15. Design System Components

Seluruh komponen antarmuka dirancang menggunakan prinsip **Reusable Component** sehingga konsisten pada seluruh halaman aplikasi.

---

# 15.1 Button

## Primary Button

Digunakan untuk aksi utama.

Contoh:

- Login
- Simpan
- Submit
- Approve
- Claim Reward

Style

| Property | Value |
|----------|-------|
| Background | #2563EB |
| Text | White |
| Radius | 12px |
| Height | 44px |

---

## Secondary Button

Digunakan untuk aksi pendukung.

Contoh

- Edit
- Preview
- Detail

Style

| Property | Value |
|----------|-------|
| Background | White |
| Border | Blue |
| Text | Blue |

---

## Success Button

Digunakan untuk:

- Approve
- Publish

Color

```
#10B981
```

---

## Warning Button

Digunakan untuk:

- Pending
- Reminder

Color

```
#F59E0B
```

---

## Danger Button

Digunakan untuk:

- Reject
- Delete

Color

```
#EF4444
```

---

# 15.2 Input Field

Seluruh form menggunakan desain yang sama.

Contoh:

```
+----------------------------+

Nama Skill

[__________________________]

+----------------------------+
```

---

Input terdiri dari:

- Label
- Placeholder
- Helper Text
- Validation

---

State

- Default
- Focus
- Disabled
- Error

---

# 15.3 Text Area

Digunakan untuk:

- Bio
- Deskripsi Portfolio
- Catatan Admin

Ukuran minimum

```
120px
```

---

# 15.4 Dropdown

Digunakan pada:

- Program Studi
- Angkatan
- Level Skill
- Kategori Sertifikat
- Jenis Portfolio

---

# 15.5 File Upload

Komponen upload mendukung:

- Drag & Drop
- Browse File

Format

- PDF
- PNG
- JPG
- JPEG

Preview akan ditampilkan setelah file dipilih.

---

# 15.6 Card Component

Card menjadi komponen utama aplikasi.

Digunakan pada:

- Dashboard
- Portfolio
- Reward
- AI Recommendation
- Leaderboard

---

Style

```
Background : White

Radius : 16px

Shadow : Soft

Padding : 24px
```

---

Contoh

```
+-----------------------------+

Total Point

⭐ 57 Point

+-----------------------------+
```

---

# 15.7 Statistic Card

Menampilkan data ringkas.

Contoh

```
+---------------------+

👨‍🎓

1.520

Mahasiswa

+---------------------+
```

---

# 15.8 Table

Administrator menggunakan tabel.

Kolom

- Nama
- Skill
- Point
- Status
- Action

---

Contoh

```
-----------------------------------------------------

Nama

Skill

Status

Action

-----------------------------------------------------

Ahmad

Laravel

Pending

Review

-----------------------------------------------------
```

---

# 15.9 Badge

Digunakan untuk status.

Approved

```
🟢 Approved
```

Pending

```
🟠 Pending
```

Rejected

```
🔴 Rejected
```

Draft

```
⚪ Draft
```

---

# 15.10 Progress Bar

Digunakan untuk:

- Profile Completion
- Upload Progress

Contoh

```
████████░░░░░░░░░

45%
```

---

# 15.11 Avatar

Avatar menampilkan:

- Foto Mahasiswa
- Foto Admin

Jika tidak ada foto:

```
AH
```

menggunakan inisial nama.

---

# 15.12 Search Box

Search digunakan pada:

- Mahasiswa
- Skill
- Reward
- Opportunity

Contoh

```
🔍 Cari mahasiswa...
```

---

# 15.13 Pagination

```
< Previous

1

2

3

Next >
```

---

# 15.14 Modal

Digunakan untuk:

- Konfirmasi Delete
- Approve
- Reject
- Claim Reward

Ukuran

```
Medium

600px
```

---

# 15.15 Toast Notification

Success

```
✅ Data berhasil disimpan
```

Error

```
❌ Terjadi kesalahan
```

Warning

```
⚠ Lengkapi data terlebih dahulu
```

Info

```
ℹ Menunggu verifikasi administrator
```

---

# 16. Dashboard Design

## Administrator Dashboard

Dashboard administrator menggunakan layout statistik agar proses monitoring lebih cepat.

Layout

```text
------------------------------------------------------

Navbar

------------------------------------------------------

Sidebar

Dashboard

Mahasiswa

Verification

Reward

Opportunity

Leaderboard

------------------------------------------------------

Statistic Cards

------------------------------------------------------

📚 Total Skill

👨‍🎓 Total Mahasiswa

📂 Portfolio

🏅 Sertifikat

------------------------------------------------------

Chart

------------------------------------------------------

Verification Chart

Leaderboard

Recent Activity

------------------------------------------------------
```

---

## Mahasiswa Dashboard

Layout

```text
------------------------------------------------------

Navbar

------------------------------------------------------

Sidebar

Dashboard

Profile

Skill

Portfolio

Reward

Leaderboard

------------------------------------------------------

Profile Completion

Point

Ranking

------------------------------------------------------

Pending Verification

AI Recommendation

------------------------------------------------------

Portfolio

Recent Activity

------------------------------------------------------
```

---

# 17. Leaderboard UI

Konsep leaderboard dibuat seperti aplikasi Duolingo agar menarik dan kompetitif.

Contoh

```text
🥇 Ahmad

120 Point

⭐⭐⭐⭐⭐

----------------------

🥈 Budi

110 Point

⭐⭐⭐⭐

----------------------

🥉 Citra

100 Point

⭐⭐⭐⭐
```

---

Filter

- Mingguan
- Bulanan
- Semester
- Semua

---

# 18. Reward UI

Reward ditampilkan dalam bentuk card.

```text
+--------------------------+

🎁

Voucher Kantin

10 Point

[ Claim ]

+--------------------------+
```

Jika point tidak cukup

```text
Button

Disabled
```

---

# 19. AI Recommendation Card

```text
✨ AI Recommendation

Skill Anda:

Laravel

PHP

MySQL

Kami menyarankan:

✔ Docker

✔ REST API

✔ Redis

[ Pelajari Sekarang ]
```

---

# 20. Empty State

Jika data kosong.

Portfolio

```text
📂

Belum ada portfolio

Tambah Portfolio
```

---

Skill

```text
💻

Belum ada skill

Tambah Skill
```

---

Reward

```text
🎁

Belum ada reward tersedia.
```

---

# 21. Loading State

Menggunakan Skeleton Loading.

Contoh

```
██████████████

████████

██████████████████
```

---

# 22. Error State

Contoh

```
⚠

Terjadi Kesalahan

Silakan coba kembali.

[ Refresh ]
```

---

# 23. Success State

```
🎉

Selamat!

Portfolio berhasil diverifikasi.

+8 Point
```

---

# 24. Interaction Design

Hover

- Shadow bertambah
- Cursor Pointer

---

Button

Hover

- Warna sedikit lebih gelap
- Scale 1.02

---

Card

Hover

- Shadow meningkat
- Sedikit naik (translateY -2px)

---

Input

Focus

- Border Biru
- Shadow Biru tipis

---

# 25. Animation

Durasi

```
200ms
```

Animasi

- Fade
- Slide
- Scale

Tidak menggunakan animasi berlebihan agar tetap profesional.

---

# 26. Accessibility

Standar yang digunakan mengacu pada WCAG.

Implementasi:

- Kontras warna yang cukup
- Font minimal 14px
- Semua tombol memiliki label
- Keyboard Navigation
- Focus Indicator
- Alt Text pada gambar

---

# 27. Responsive Design

## Desktop

Sidebar tampil permanen.

---

## Tablet

Sidebar dapat disembunyikan.

---

## Mobile

Sidebar berubah menjadi Drawer.

Bottom Navigation digunakan untuk halaman utama.

```text
🏠

🏆

🎁

👤
```

---

# 28. Design Consistency Checklist

| Item | Status |
|-------|--------|
| Light Theme | ✅ |
| Responsive Layout | ✅ |
| Reusable Components | ✅ |
| Typography Consistent | ✅ |
| Color Palette Consistent | ✅ |
| Icon Consistent | ✅ |
| Accessible | ✅ |
| Mobile Friendly | ✅ |

---

# 29. UI/UX Summary

University Talent Hub menggunakan pendekatan **Modern Academic Dashboard** yang mengutamakan kemudahan penggunaan, konsistensi desain, dan pengalaman pengguna yang menyenangkan. Seluruh antarmuka mengadopsi tema terang dengan dominasi warna putih, dipadukan aksen biru sebagai identitas utama aplikasi.

Elemen gamification seperti **leaderboard**, **reward**, **progress profile**, dan **AI Recommendation Card** dirancang agar mahasiswa lebih termotivasi untuk terus mengembangkan kompetensinya. Di sisi administrator, dashboard difokuskan pada efisiensi proses verifikasi, monitoring statistik, dan pencarian talenta mahasiswa.

Dokumentasi UI/UX ini menjadi acuan utama dalam proses implementasi antarmuka sehingga setiap halaman memiliki tampilan yang konsisten, profesional, responsif, dan mudah digunakan.

---

**End of UI_UX.md**