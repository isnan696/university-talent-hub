# API_SPEC.md

**Project:** University Talent Hub

**Version:** 2.0

**Status:** Final

**Framework:** Laravel 12

**Architecture:** REST API

---

# 1. Overview

Dokumen ini menjelaskan spesifikasi REST API yang digunakan pada sistem **University Talent Hub**.

Seluruh komunikasi antara Frontend dan Backend menggunakan format **JSON**.

Karakteristik API:

- RESTful
- JSON Response
- Stateless
- Secure
- Consistent
- Versionable

Base URL

```text
/api/v1
```

---

# 2. API Architecture

```text
Frontend (Blade)

↓

HTTP Request

↓

Laravel Route

↓

Controller

↓

Service

↓

Repository

↓

Database

↓

JSON Response
```

---

# 3. Authentication

Authentication menggunakan Laravel Session Authentication.

Endpoint yang membutuhkan login akan menggunakan middleware:

```php
auth
```

Endpoint Admin menggunakan:

```php
auth
admin
```

---

# 4. Standard Response

## Success

```json
{
    "success": true,
    "message": "Success",
    "data": {}
}
```

---

## Error

```json
{
    "success": false,
    "message": "Validation Failed",
    "errors": {}
}
```

---

# 5. HTTP Status Code

| Code | Meaning |
|------|---------|
| 200 | OK |
| 201 | Created |
| 204 | No Content |
| 400 | Bad Request |
| 401 | Unauthorized |
| 403 | Forbidden |
| 404 | Not Found |
| 422 | Validation Error |
| 500 | Internal Server Error |

---

# 6. API Module

## Authentication

- Login
- Logout

---

## Student

- Dashboard
- Profile

---

## Skill

- CRUD Skill

---

## Certificate

- CRUD Certificate

---

## Portfolio

- CRUD Portfolio

---

## Verification

- Verification Status

---

## Point

- Point History

---

## Reward

- Reward
- Reward Claim

---

## Opportunity

- Opportunity

---

## AI Recommendation

- Recommendation

---

## Admin

- Dashboard
- Verification
- Reward
- Opportunity

---

# 7. API Naming Convention

Menggunakan pola RESTful.

Contoh:

```text
GET

POST

PUT

PATCH

DELETE
```

URL menggunakan:

```text
kebab-case
```

Contoh

```text
student-profile

reward-claim

point-history
```

---

# 8. API Versioning

Seluruh endpoint menggunakan versi.

```text
/api/v1/
```

Apabila terjadi breaking change.

```text
/api/v2/
```

---

# 9. Security

Seluruh request menggunakan:

- CSRF Protection
- Validation
- Authorization
- Middleware
- HTTPS
- Rate Limiting

---

# 10. Authentication Flow

```text
Login

↓

Session Created

↓

Access Protected Route

↓

Logout

↓

Session Destroyed
```

---

# End of Part 1
# 11. Authentication API

Base Endpoint

```text
/api/v1/auth
```

---

## 11.1 Login

### Endpoint

```http
POST /api/v1/auth/login
```

---

### Request Body

```json
{
    "email": "student@amikom.ac.id",
    "password": "password"
}
```

---

### Success Response

```json
{
    "success": true,
    "message": "Login successful",
    "data": {
        "id": "uuid",
        "name": "Ahmad Isnan Wahyudi",
        "email": "student@amikom.ac.id",
        "role": "student"
    }
}
```

---

### Validation

| Field | Rule |
|---------|------|
| email | required, email |
| password | required |

---

## 11.2 Logout

### Endpoint

```http
POST /api/v1/auth/logout
```

---

### Response

```json
{
    "success": true,
    "message": "Logout successful"
}
```

---

# 12. Dashboard API

Base Endpoint

```text
/api/v1/dashboard
```

---

## 12.1 Student Dashboard

### Endpoint

```http
GET /api/v1/dashboard
```

---

### Response

```json
{
    "success": true,
    "data": {
        "student": {},
        "points": {},
        "skills": [],
        "certificates": [],
        "portfolios": [],
        "recommendations": []
    }
}
```

---

# 13. Student Profile API

Base Endpoint

```text
/api/v1/profile
```

---

## 13.1 Get Profile

```http
GET /api/v1/profile
```

---

## Response

```json
{
    "success": true,
    "data": {
        "id": "uuid",
        "name": "Ahmad Isnan Wahyudi",
        "nim": "23.11.1234",
        "study_program": "D3 Teknik Informatika",
        "batch": 2023,
        "phone": "08123456789",
        "bio": "Backend Developer"
    }
}
```

---

## 13.2 Update Profile

```http
PUT /api/v1/profile
```

---

### Request

```json
{
    "phone": "08123456789",
    "bio": "Backend Developer",
    "github": "https://github.com/username",
    "linkedin": "https://linkedin.com/in/username"
}
```

---

### Response

```json
{
    "success": true,
    "message": "Profile updated successfully"
}
```

---

# 14. Skill API

Base Endpoint

```text
/api/v1/skills
```

---

## 14.1 Get All Skills

```http
GET /api/v1/skills
```

---

## Response

```json
{
    "success": true,
    "data": []
}
```

---

## 14.2 Create Skill

```http
POST /api/v1/skills
```

---

### Request

```json
{
    "skill_category_id": "uuid",
    "skill_name": "Laravel",
    "level": "Intermediate",
    "description": "Framework PHP untuk pengembangan web."
}
```

---

### Response

```json
{
    "success": true,
    "message": "Skill created successfully"
}
```

---

## 14.3 Get Detail Skill

```http
GET /api/v1/skills/{id}
```

---

## 14.4 Update Skill

```http
PUT /api/v1/skills/{id}
```

---

## 14.5 Delete Skill

```http
DELETE /api/v1/skills/{id}
```

---

# 15. Certificate API

Base Endpoint

```text
/api/v1/certificates
```

---

## Endpoint

| Method | Endpoint | Description |
|---------|----------|-------------|
| GET | /certificates | Get All Certificates |
| POST | /certificates | Create Certificate |
| GET | /certificates/{id} | Detail Certificate |
| PUT | /certificates/{id} | Update Certificate |
| DELETE | /certificates/{id} | Delete Certificate |

---

## Create Certificate

```http
POST /api/v1/certificates
```

---

### Request

```json
{
    "certificate_name": "Laravel Fundamental",
    "organizer": "Dicoding",
    "issue_date": "2026-06-01",
    "expired_date": null,
    "credential_url": "https://example.com",
    "certificate_path": "certificate.pdf"
}
```

---

### Response

```json
{
    "success": true,
    "message": "Certificate uploaded successfully"
}
```

---

# 16. Portfolio API

Base Endpoint

```text
/api/v1/portfolios
```

---

## Endpoint

| Method | Endpoint |
|---------|----------|
| GET | /portfolios |
| POST | /portfolios |
| GET | /portfolios/{id} |
| PUT | /portfolios/{id} |
| DELETE | /portfolios/{id} |

---

## Create Portfolio

```http
POST /api/v1/portfolios
```

---

### Request

```json
{
    "project_title": "University Talent Hub",
    "description": "Aplikasi manajemen talenta mahasiswa.",
    "github_url": "https://github.com/user/project",
    "demo_url": "https://demo.example.com",
    "portfolio_image": "portfolio.jpg"
}
```

---

### Response

```json
{
    "success": true,
    "message": "Portfolio created successfully"
}
```

---

# End of Part 2
# 17. Verification API

Base Endpoint

```text
/api/v1/verifications
```

---

## 17.1 Get Verification Status

```http
GET /api/v1/verifications
```

---

### Response

```json
{
    "success": true,
    "data": [
        {
            "id": "uuid",
            "type": "certificate",
            "status": "approved",
            "verified_by": "Administrator",
            "verified_at": "2026-07-01 10:00:00",
            "notes": "Certificate is valid."
        }
    ]
}
```

---

## Verification Status

| Status | Description |
|----------|-------------|
| pending | Waiting for verification |
| approved | Verified |
| rejected | Verification rejected |

---

# 18. Point API

Base Endpoint

```text
/api/v1/points
```

---

## 18.1 Get Current Point

```http
GET /api/v1/points
```

---

### Response

```json
{
    "success": true,
    "data": {
        "total_points": 280
    }
}
```

---

## 18.2 Point History

```http
GET /api/v1/points/history
```

---

### Response

```json
{
    "success": true,
    "data": [
        {
            "activity": "Certificate Approved",
            "point": 50,
            "created_at": "2026-07-01"
        },
        {
            "activity": "Portfolio Approved",
            "point": 100,
            "created_at": "2026-06-25"
        }
    ]
}
```

---

# 19. Reward API

Base Endpoint

```text
/api/v1/rewards
```

---

## 19.1 Get Rewards

```http
GET /api/v1/rewards
```

---

### Response

```json
{
    "success": true,
    "data": []
}
```

---

## 19.2 Reward Detail

```http
GET /api/v1/rewards/{id}
```

---

## 19.3 Reward Claim

```http
POST /api/v1/rewards/{id}/claim
```

---

### Response

```json
{
    "success": true,
    "message": "Reward claimed successfully"
}
```

---

## Reward Claim Validation

| Validation | Rule |
|------------|------|
| User Login | Required |
| Point Enough | Required |
| Reward Stock | Must Be Available |

---

# 20. Reward Claim History

Base Endpoint

```text
/api/v1/reward-claims
```

---

## Endpoint

```http
GET /api/v1/reward-claims
```

---

### Response

```json
{
    "success": true,
    "data": []
}
```

---

# 21. Opportunity API

Base Endpoint

```text
/api/v1/opportunities
```

---

## 21.1 Get Opportunities

```http
GET /api/v1/opportunities
```

---

## 21.2 Detail Opportunity

```http
GET /api/v1/opportunities/{id}
```

---

### Response

```json
{
    "success": true,
    "data": {
        "title": "Hackathon Nasional",
        "category": "Competition",
        "deadline": "2026-08-01",
        "registration_url": "https://example.com"
    }
}
```

---

# 22. AI Recommendation API

Base Endpoint

```text
/api/v1/recommendations
```

---

## 22.1 Get Recommendation

```http
GET /api/v1/recommendations
```

---

### Response

```json
{
    "success": true,
    "data": [
        {
            "priority": 1,
            "title": "Lengkapi Sertifikat",
            "description": "Tambahkan sertifikat agar profil lebih kompetitif."
        },
        {
            "priority": 2,
            "title": "Tambahkan Portofolio",
            "description": "Unggah hasil proyek terbaru."
        }
    ]
}
```

---

## Recommendation Priority

| Priority | Meaning |
|----------|---------|
| 1 | Highest |
| 2 | High |
| 3 | Medium |
| 4 | Low |

---

# 23. Activity Log API

Base Endpoint

```text
/api/v1/activity-logs
```

---

## Endpoint

```http
GET /api/v1/activity-logs
```

---

### Response

```json
{
    "success": true,
    "data": [
        {
            "activity": "LOGIN",
            "description": "User login successfully",
            "created_at": "2026-07-01 08:30:00"
        },
        {
            "activity": "UPLOAD_SKILL",
            "description": "Added Laravel Skill",
            "created_at": "2026-07-01 08:45:00"
        }
    ]
}
```

---

# End of Part 3
# 24. Admin Dashboard API

Base Endpoint

```text
/api/v1/admin/dashboard
```

Middleware

```text
auth
admin
```

---

## 24.1 Dashboard Summary

```http
GET /api/v1/admin/dashboard
```

---

### Response

```json
{
    "success": true,
    "data": {
        "total_students": 250,
        "total_skills": 820,
        "total_certificates": 640,
        "total_portfolios": 380,
        "pending_verifications": 42,
        "reward_claims": 28,
        "active_opportunities": 15
    }
}
```

---

# 25. Admin Verification API

Base Endpoint

```text
/api/v1/admin/verifications
```

---

## 25.1 Get Pending Verification

```http
GET /api/v1/admin/verifications
```

---

## 25.2 Verification Detail

```http
GET /api/v1/admin/verifications/{id}
```

---

## 25.3 Approve Verification

```http
PATCH /api/v1/admin/verifications/{id}/approve
```

---

### Request

```json
{
    "notes": "Data telah diverifikasi."
}
```

---

### Response

```json
{
    "success": true,
    "message": "Verification approved successfully."
}
```

---

## 25.4 Reject Verification

```http
PATCH /api/v1/admin/verifications/{id}/reject
```

---

### Request

```json
{
    "notes": "Dokumen tidak valid."
}
```

---

### Response

```json
{
    "success": true,
    "message": "Verification rejected successfully."
}
```

---

# 26. Admin Reward API

Base Endpoint

```text
/api/v1/admin/rewards
```

---

## Endpoint

| Method | Endpoint | Description |
|---------|----------|-------------|
| GET | /admin/rewards | List Reward |
| POST | /admin/rewards | Create Reward |
| GET | /admin/rewards/{id} | Detail Reward |
| PUT | /admin/rewards/{id} | Update Reward |
| DELETE | /admin/rewards/{id} | Delete Reward |

---

## Create Reward

```http
POST /api/v1/admin/rewards
```

---

### Request

```json
{
    "reward_category_id": "uuid",
    "reward_name": "Voucher Tokopedia",
    "required_points": 300,
    "stock": 50,
    "reward_image": "voucher.png"
}
```

---

### Response

```json
{
    "success": true,
    "message": "Reward created successfully."
}
```

---

# 27. Admin Opportunity API

Base Endpoint

```text
/api/v1/admin/opportunities
```

---

## Endpoint

| Method | Endpoint |
|---------|----------|
| GET | /admin/opportunities |
| POST | /admin/opportunities |
| GET | /admin/opportunities/{id} |
| PUT | /admin/opportunities/{id} |
| DELETE | /admin/opportunities/{id} |

---

## Create Opportunity

```http
POST /api/v1/admin/opportunities
```

---

### Request

```json
{
    "opportunity_category_id": "uuid",
    "title": "Hackathon Nasional 2026",
    "description": "Kompetisi pengembangan aplikasi.",
    "location": "Yogyakarta",
    "deadline": "2026-08-01",
    "registration_url": "https://example.com"
}
```

---

### Response

```json
{
    "success": true,
    "message": "Opportunity created successfully."
}
```

---

# 28. Upload API

Semua upload menggunakan

```text
multipart/form-data
```

---

## Supported File

| Type | Extension |
|------|-----------|
| Image | JPG |
| Image | JPEG |
| Image | PNG |
| Document | PDF |

---

## Maximum File Size

```text
5 MB
```

---

# 29. Pagination Standard

Endpoint yang mengembalikan banyak data menggunakan pagination.

Contoh

```http
GET /api/v1/skills?page=1
```

---

### Response

```json
{
    "success": true,
    "data": [],
    "pagination": {
        "current_page": 1,
        "last_page": 5,
        "per_page": 10,
        "total": 48
    }
}
```

---

# 30. Search API

Parameter

```text
?search=
```

Contoh

```http
GET /api/v1/skills?search=Laravel
```

---

# 31. Filter API

Contoh

```http
GET /api/v1/opportunities?category=competition
```

---

## Multiple Filter

```http
GET /api/v1/rewards?category=voucher&stock=available
```

---

# 32. Sorting API

Ascending

```http
GET /api/v1/skills?sort=name
```

Descending

```http
GET /api/v1/skills?sort=-created_at
```

---

# 33. Validation Rules

## User

| Field | Rule |
|---------|------|
| name | required |
| email | required,email |
| password | required,min:8 |

---

## Skill

| Field | Rule |
|---------|------|
| skill_name | required |
| skill_category_id | required |
| level | required |

---

## Certificate

| Field | Rule |
|---------|------|
| certificate_name | required |
| organizer | required |

---

## Portfolio

| Field | Rule |
|---------|------|
| project_title | required |
| description | required |

---

## Reward

| Field | Rule |
|---------|------|
| reward_name | required |
| required_points | integer |
| stock | integer |

---

# End of Part 4
# 34. Error Handling Standard

Seluruh API menggunakan format error yang konsisten.

---

## 34.1 Validation Error

```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "email": ["Email is required"],
        "password": ["Password must be at least 8 characters"]
    }
}
```

---

## 34.2 Authentication Error

```json
{
    "success": false,
    "message": "Unauthenticated"
}
```

---

## 34.3 Authorization Error

```json
{
    "success": false,
    "message": "Forbidden access"
}
```

---

## 34.4 Not Found Error

```json
{
    "success": false,
    "message": "Data not found"
}
```

---

## 34.5 Server Error

```json
{
    "success": false,
    "message": "Internal server error"
}
```

---

# 35. Middleware Layer

Middleware yang digunakan dalam sistem:

| Middleware | Function |
|------------|----------|
| auth | Authentication check |
| admin | Admin access only |
| throttle | Rate limiting |
| verified | Email verification |

---

## Middleware Flow

```text
Request
  ↓
Middleware Check
  ↓
Controller
  ↓
Response
```

---

# 36. Rate Limiting

Default limit API:

```text
60 requests / minute
```

Admin API:

```text
120 requests / minute
```

Login endpoint:

```text
10 requests / minute
```

---

# 37. Caching Strategy

Caching digunakan untuk meningkatkan performa.

## Cached Data

- Dashboard statistics
- Leaderboard points
- Opportunity list
- Recommendation result

---

## Cache Duration

| Data | Duration |
|------|----------|
| Dashboard | 5 minutes |
| Leaderboard | 10 minutes |
| Recommendation | 15 minutes |

---

## Cache Driver

```text
Redis (future)
File (default)
```

---

# 38. Notification API (Future Ready)

## 38.1 Notification List

```http
GET /api/v1/notifications
```

---

## 38.2 Mark as Read

```http
PATCH /api/v1/notifications/{id}/read
```

---

## Notification Types

- verification
- reward
- opportunity
- system

---

# 39. Audit Trail API

## 39.1 Get Logs

```http
GET /api/v1/audit-logs
```

---

## Response

```json
{
    "success": true,
    "data": [
        {
            "user_id": "uuid",
            "action": "LOGIN",
            "module": "AUTH",
            "timestamp": "2026-07-01 10:00:00"
        }
    ]
}
```

---

# 40. File Management API

## 40.1 Upload File

```http
POST /api/v1/upload
```

---

### Request

```text
multipart/form-data
```

---

### Response

```json
{
    "success": true,
    "data": {
        "file_name": "certificate.pdf",
        "file_path": "uploads/certificate.pdf",
        "file_size": "1.2MB"
    }
}
```

---

# 41. Data Consistency Rules

- Semua ID menggunakan UUID
- Semua timestamp menggunakan UTC
- Semua response harus JSON
- Tidak ada direct DB access dari frontend
- Semua request melalui API layer

---

# 42. Performance Rules

- Gunakan pagination untuk list data
- Hindari N+1 query
- Gunakan eager loading
- Cache data berat
- Index pada foreign key

---

# 43. API Security Rules

- HTTPS wajib
- CSRF protection aktif
- Input validation wajib
- SQL injection protection (ORM only)
- Rate limiting aktif

---

# 44. API Versioning Strategy

```text
/api/v1/   → current version
/api/v2/   → future upgrade
```

Backward compatibility harus dijaga.

---

# 45. Testing API

Tools:

- Postman
- Laravel Feature Test
- PHPUnit

---

## Test Coverage Target

| Module | Coverage |
|--------|----------|
| Auth | 90% |
| Skill | 85% |
| Reward | 85% |
| Opportunity | 85% |
| Verification | 90% |

---

# 46. Deployment Notes

API siap untuk:

- Nginx
- Apache
- Docker (optional future)
- VPS Ubuntu

---

# 47. Final API Checklist

| Item | Status |
|------|--------|
| Authentication | ✅ |
| CRUD Modules | ✅ |
| Admin API | ✅ |
| Validation | ✅ |
| Error Handling | ✅ |
| Pagination | ✅ |
| Filtering | ✅ |
| Security | ✅ |
| Caching | ✅ |
| Versioning | ✅ |

---

# End of API_SPEC.md

**Version:** 2.0

**Status:** Final

**Architecture:** REST API Laravel 12

**Database:** PostgreSQL 17