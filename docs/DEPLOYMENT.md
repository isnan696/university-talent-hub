# DEPLOYMENT.md

**Project:** University Talent Hub  
**Version:** 2.0  
**Status:** Final  
**Framework:** Laravel 12  
**Environment:** Production Ready Deployment Guide  

---

# 1. Overview

Dokumen ini menjelaskan proses deployment aplikasi **University Talent Hub** ke server production.

Target deployment:

- VPS Ubuntu
- Nginx Web Server
- PHP-FPM
- PostgreSQL 17

---

# 2. Production Stack

| Component | Technology |
|----------|------------|
| OS | Ubuntu 24.04 LTS |
| Web Server | Nginx |
| Backend | Laravel 12 |
| Database | PostgreSQL 17 |
| PHP | 8.3+ |

---

# 3. Server Preparation

## 3.1 Update Server

```bash
sudo apt update && sudo apt upgrade -y
```

---

## 3.2 Install Required Packages

```bash
sudo apt install nginx php8.3 php8.3-fpm php8.3-pgsql php8.3-mbstring php8.3-xml php8.3-curl unzip git -y
```

---

## 3.3 Install PostgreSQL

```bash
sudo apt install postgresql postgresql-contrib -y
```

---

# 4. Project Deployment

## 4.1 Clone Repository

```bash
git clone https://github.com/username/university-talent-hub.git
cd university-talent-hub
```

---

## 4.2 Install Dependencies

```bash
composer install
```

```bash
npm install && npm run build
```

---

## 4.3 Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

---

Edit `.env`:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=talenthub
DB_USERNAME=postgres
DB_PASSWORD=password
```

---

# 5. Database Setup

## 5.1 Create Database

```bash
sudo -u postgres psql
```

```sql
CREATE DATABASE talenthub;
```

---

## 5.2 Run Migration

```bash
php artisan migrate --force
```

---

## 5.3 Seed Database

```bash
php artisan db:seed --force
```

---

# 6. Storage Setup

```bash
php artisan storage:link
```

Permission:

```bash
sudo chmod -R 775 storage bootstrap/cache
```

---

# 7. Nginx Configuration

## 7.1 Create Config

```bash
sudo nano /etc/nginx/sites-available/talenthub
```

---

## 7.2 Configuration

```nginx
server {
    listen 80;
    server_name your-domain.com;

    root /var/www/university-talent-hub/public;

    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

---

## 7.3 Enable Site

```bash
sudo ln -s /etc/nginx/sites-available/talenthub /etc/nginx/sites-enabled/
sudo systemctl restart nginx
```

---

# 8. Queue System (Optional Future)

```bash
php artisan queue:work
```

Supervisor config (future enhancement).

---

# 9. Optimization

## 9.1 Cache Config

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 9.2 Optimize Autoloader

```bash
composer install --optimize-autoloader --no-dev
```

---

# 10. Security Setup

## 10.1 Firewall

```bash
sudo ufw allow OpenSSH
sudo ufw allow 'Nginx Full'
sudo ufw enable
```

---

## 10.2 HTTPS (SSL)

Install Certbot:

```bash
sudo apt install certbot python3-certbot-nginx -y
```

Generate SSL:

```bash
sudo certbot --nginx -d your-domain.com
```

---

# 11. Monitoring

Basic monitoring:

- Nginx logs
- Laravel logs
- PostgreSQL logs

Log location:

```text
storage/logs/laravel.log
```

---

# 12. Backup Strategy

## Database Backup

```bash
pg_dump talenthub > backup.sql
```

---

## File Backup

```bash
tar -czf storage-backup.tar.gz storage/
```

---

# 13. Deployment Flow

```text
Code Push (GitHub)
        ↓
Pull Server
        ↓
Install Dependencies
        ↓
Run Migration
        ↓
Optimize Cache
        ↓
Restart Services
        ↓
Application Live
```

---

# 14. Performance Optimization

- OPcache enabled
- Database indexing
- Pagination enabled
- Eager loading relationships
- Cache leaderboard

---

# 15. Final Checklist

| Item | Status |
|------|--------|
| Server Setup | ✅ |
| Nginx Config | ✅ |
| PostgreSQL Setup | ✅ |
| Laravel Installed | ✅ |
| Migration Run | ✅ |
| Storage Linked | ✅ |
| SSL Enabled | ✅ |
| Optimization | ✅ |

---

# 16. Deployment Result

Aplikasi siap diakses melalui:

```text
https://your-domain.com
```

---

# End of DEPLOYMENT.md

**Version:** 2.0  
**Status:** Production Ready  
**Stack:** Laravel 12 + PostgreSQL 17 + Nginx + PHP-FPM  