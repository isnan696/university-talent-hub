# TESTING.md

**Project:** University Talent Hub  
**Version:** 2.0  
**Status:** Final  
**Framework:** Laravel 12  

---

# 1. Overview

Dokumen ini menjelaskan strategi pengujian (testing strategy) untuk sistem **University Talent Hub**.

Tujuan testing:

- Menjamin sistem berjalan sesuai requirement
- Memastikan tidak ada bug kritikal
- Validasi API
- Validasi business logic
- Validasi security

---

# 2. Testing Strategy

Sistem menggunakan beberapa jenis testing:

| Type | Description |
|------|-------------|
| Unit Test | Testing fungsi kecil |
| Feature Test | Testing fitur end-to-end |
| Integration Test | Testing antar modul |
| UAT | User Acceptance Test |

---

# 3. Testing Stack

| Tool | Purpose |
|------|--------|
| PHPUnit | Unit testing Laravel |
| Laravel Test Case | Feature testing |
| Postman | API testing manual |
| Browser DevTools | UI debugging |

---

# 4. Unit Testing

Unit test digunakan untuk:

- Service Layer
- Helper Function
- Business Logic

Contoh:

```php
public function test_point_calculation()
{
    $result = calculatePoint(3, 2, 1);

    $this->assertEquals(100, $result);
}
```

---

# 5. Feature Testing

Feature testing mencakup:

- Authentication
- Skill CRUD
- Certificate Upload
- Portfolio Management
- Reward Claim
- Verification Flow

Contoh:

```php
public function test_user_can_login()
{
    $response = $this->post('/api/v1/auth/login', [
        'email' => 'student@amikom.ac.id',
        'password' => 'password'
    ]);

    $response->assertStatus(200);
}
```

---

# 6. Integration Testing

Integration test mencakup:

- User → Skill → Verification → Point
- Admin → Verification → Reward
- Student → Recommendation Engine

Flow contoh:

```text
Skill Created
   ↓
Submitted
   ↓
Verified by Admin
   ↓
Point Added
```

---

# 7. API Testing

API diuji menggunakan Postman.

Endpoint yang diuji:

- Auth API
- Profile API
- Skill API
- Certificate API
- Portfolio API
- Reward API
- Opportunity API

---

# 8. Test Case Matrix

## Authentication

| Test Case | Expected |
|-----------|----------|
| Valid Login | Success |
| Invalid Login | Error |
| Empty Input | Validation Error |

---

## Skill Module

| Test Case | Expected |
|-----------|----------|
| Create Skill | Success |
| Update Skill | Success |
| Delete Skill | Success |
| Invalid Data | Error |

---

## Verification Module

| Test Case | Expected |
|-----------|----------|
| Submit Skill | Pending Status |
| Admin Approve | Point Added |
| Admin Reject | No Point |

---

## Reward Module

| Test Case | Expected |
|-----------|----------|
| Claim Reward | Success |
| Insufficient Point | Error |
| Out of Stock | Error |

---

# 9. Performance Testing

Target performa:

| Metric | Target |
|--------|--------|
| API Response | < 300ms |
| Dashboard Load | < 1s |
| DB Query | Optimized |

---

Testing fokus:

- Leaderboard query
- Recommendation engine
- Dashboard aggregation

---

# 10. Security Testing

Diuji terhadap:

- SQL Injection
- XSS Attack
- CSRF Attack
- Unauthorized Access
- File Upload Exploit

---

# 11. User Acceptance Test (UAT)

UAT dilakukan oleh:

- Admin
- Student

Scenario:

- Login system
- Upload skill
- Verifikasi admin
- Claim reward
- View recommendation

---

# 12. Test Environment

## Development

- Localhost
- Laravel Serve
- PostgreSQL local

## Staging

- VPS / Cloud
- Production-like environment

---

# 13. Test Data

Contoh data:

```text
Student:
- name: Ahmad
- email: student@amikom.ac.id

Skill:
- Laravel
- Python
- UI/UX
```

---

# 14. Automation Testing Strategy

Automation diterapkan pada:

- Authentication
- Skill CRUD
- Reward system
- Verification flow

Tools:

- PHPUnit
- Laravel Feature Test

---

# 15. Continuous Testing (Future)

Rencana ke depan:

- GitHub Actions
- CI/CD Pipeline
- Automated Test on Push

---

# 16. Bug Handling Strategy

Flow:

```text
Bug Found
   ↓
Report Issue
   ↓
Fix in Feature Branch
   ↓
Retest
   ↓
Merge to Main
```

---

# 17. Test Coverage Target

| Module | Coverage |
|--------|----------|
| Auth | 90% |
| Skill | 85% |
| Certificate | 85% |
| Reward | 85% |
| Verification | 90% |

---

# 18. Final Checklist

| Item | Status |
|------|--------|
| Unit Test | ✅ |
| Feature Test | ✅ |
| Integration Test | ✅ |
| API Test | ✅ |
| Security Test | ✅ |
| Performance Test | ✅ |
| UAT | ✅ |

---

# End of TESTING.md

**Version:** 2.0  
**Status:** Final  
**Framework:** Laravel 12  