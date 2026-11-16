# Makeup & Beauty Services — PHP + MySQL Booking System

A responsive starter application for a makeup artist business. Customers can register/login and submit appointments. The admin can view bookings and customer details, then update booking status.

## Requirements
- PHP 8.0+ with PDO MySQL extension
- MySQL 5.7+ or MariaDB 10.4+
- XAMPP / WAMP / LAMP (Apache + PHP + MySQL)

## Install with XAMPP (Windows)
1. Extract `Sister_Makeup_Booking_System` into `C:\xampp\htdocs\`.
2. Start **Apache** and **MySQL** from XAMPP Control Panel.
3. Open `http://localhost/phpmyadmin`.
4. Choose **Import**, select this project's `database.sql`, and click **Import**. The script creates `makeup_beauty_db` and starter services.
5. Edit `config/config.php` if your MySQL username/password differs. Default XAMPP is usually user `root` with an empty password.
6. Visit `http://localhost/Sister_Makeup_Booking_System/setup_admin.php` and create the first admin account. Use a strong password (12+ characters).
7. **Immediately delete `setup_admin.php`** after the admin account is created.
8. Open `http://localhost/Sister_Makeup_Booking_System/`.

## Admin login
Open the website, click Login, select **Administrator**, then use the email/password created in step 6. Do not use a hard-coded default admin password.

## Customer flow
Register → Login → Book Appointment → enter service, event date, preferred time, city/area and full venue address → submit. The customer can see their booking status under My Bookings.

## Admin features
- Dashboard counts for bookings, pending requests, customers and confirmed bookings
- View all bookings with customer name, phone, email, selected service, event date/time, city/area, full address and notes
- Update status: Pending, Confirmed, Rejected, Completed or Cancelled
- View registered customers and their booking counts
- Activate/hide services

## Customise before going live
- Replace the business name and WhatsApp number in `config/config.php`.
- Update the service list/descriptions/prices in the `services` table using phpMyAdmin.
- Add the actual business phone, location, portfolio photos and social links.
- Set a strong MySQL password and use HTTPS on hosting.
- Remove `setup_admin.php` once the admin is created.
- Back up the database regularly.

## Project structure
```
Sister_Makeup_Booking_System/
  admin/       dashboard, bookings, customers, services
  assets/      responsive CSS
  config/      database connection and helper functions
  customer/    customer dashboard and booking form
  includes/    shared header/footer
  database.sql MySQL schema and starter services
  index.php    public homepage
  login.php    customer/admin login
  register.php customer registration
  logout.php   session logout
  setup_admin.php one-time secure admin creation (delete after use)
```

## Security notes
Uses PDO prepared statements, password hashing (`password_hash` / `password_verify`), session ID regeneration after login, output escaping, and CSRF tokens on POST forms. This is a practical starter project, not a substitute for a production security audit. Before taking real customer data, add HTTPS, rate limiting, email/phone verification, privacy/consent text, secure backups, and tested hosting configuration.
