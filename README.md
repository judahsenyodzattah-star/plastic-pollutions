# PlasticPollutions Web Application

An interactive, secure, and responsive web application for the PlasticPollutions environmental action group at Pentecost University.

## 🌍 Project Overview

PlasticPollutions is dedicated to reducing plastic waste and preventing harm to oceans, wildlife, and the environment. This web application supports their activities through user engagement, donation management, awareness campaigns, and real-time information delivery.

## 🛠️ Technologies Used

- **Backend:** PHP 7.4+
- **Database:** MySQL 5.7+ / MariaDB
- **Frontend:** HTML5, CSS3, JavaScript (ES6+)
- **Security:** PDO Prepared Statements, bcrypt Password Hashing, Input Sanitization
- **Architecture:** MVC-inspired modular structure

## 📁 Project Structure

```
plasticpollutions/
├── css/
│   └── style.css              # Main stylesheet (responsive, modern design)
├── js/
│   └── main.js                # Client-side functionality
├── includes/
│   ├── config.php             # Configuration constants
│   ├── db.php                 # Database connection (Singleton PDO)
│   ├── functions.php          # Core business logic functions
│   ├── header.php             # Shared header/navigation
│   └── footer.php             # Shared footer/cookie banner/signup modal
├── pages/
│   ├── login.php              # User login with lockout mechanism
│   ├── register.php           # AJAX user registration endpoint
│   ├── logout.php             # Session destruction
│   ├── dashboard.php          # User dashboard (CRUD operations)
│   ├── donate.php             # Donation page
│   ├── process-donation.php   # AJAX donation processing
│   ├── contact.php            # Contact form
│   ├── what-to-do.php         # Plastic information & petition
│   ├── sign-petition.php      # AJAX petition endpoint
│   ├── latest.php             # Blog/news (dynamic from DB)
│   ├── strategy.php           # Organization strategy
│   ├── campaigns.php          # Campaign details & impact
│   ├── how-to-help.php        # Volunteering, pledges, donations
│   ├── submit-pledge.php      # AJAX pledge endpoint
│   └── developers.php         # Team profiles
├── index.php                  # Home page
├── database.sql               # Database schema & seed data
├── REPORT.md                  # 500-word reflective report
└── README.md                  # This file
```

## 🚀 Setup Instructions

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7+ or MariaDB
- Apache/Nginx web server (or XAMPP/WAMP/MAMP)

### Installation

1. **Clone/Copy** the `plasticpollutions` folder to your web server's document root:
   ```bash
   # For XAMPP
   cp -r plasticpollutions/ /opt/lampp/htdocs/
   # For WAMP
   cp -r plasticpollutions/ C:/wamp64/www/
   ```

2. **Create the Database:** Import the SQL schema:
   ```bash
   mysql -u root -p < plasticpollutions/database.sql
   ```
   Or open phpMyAdmin and import `database.sql`.

3. **Configure Database Connection:** Edit `includes/config.php`:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'plasticpollutions');
   define('DB_USER', 'root');
   define('DB_PASS', '');         // Your MySQL password
   define('SITE_URL', 'http://localhost/plasticpollutions');
   ```

4. **Access the Application:** Open your browser and navigate to:
   ```
   http://localhost/plasticpollutions/
   ```

## ✅ Features Implemented

### Task 2 — Login & Registration System (15 marks)
- ✅ Secure registration with bcrypt password hashing (cost 12)
- ✅ Input validation (client-side + server-side)
- ✅ Login with lockout after 3 failed attempts
- ✅ Automatic unlock after 3 minutes
- ✅ Session-based authentication
- ✅ SQL injection prevention (PDO prepared statements)
- ✅ XSS prevention (htmlspecialchars sanitization)

### Task 3 — Donation System (15 marks)
- ✅ Donation form with amount presets and custom input
- ✅ Campaign selection for targeted giving
- ✅ Transaction reference generation
- ✅ Complete donation history with search
- ✅ Individual and global donation statistics
- ✅ AJAX-based submission with real-time feedback

### Task 4 — Additional Features (20 marks)
- ✅ Fully responsive design (mobile, tablet, desktop)
- ✅ Sign-up pop-up modal with validation
- ✅ Social media buttons and links
- ✅ Cookie notification (accept/learn more)
- ✅ Image slider with auto-play and controls
- ✅ Accessible multimedia content (ARIA labels, captions)
- ✅ Visitor counter (database-tracked)
- ✅ Dynamic user feedback (alerts, animations)
- ✅ Animated statistics counters
- ✅ Simulated Twitter feed
- ✅ Password strength meter

### Task 5 — CRUD Operations (15 marks)
- ✅ **Create:** User registration, donations, pledges, contacts
- ✅ **Read:** Dashboard overview, donation history, user profile
- ✅ **Update:** Profile editing, password change
- ✅ **Delete:** Account deletion with email confirmation
- ✅ Search/filter functionality for donations

### Task 6 — Visitor ID Generator (10 marks)
- ✅ Format: "PU" prefix + 6 digits (e.g., PU482937)
- ✅ Regex validation: `/^PU\d{6}$/`
- ✅ Database uniqueness guarantee
- ✅ Displayed on dashboard and profile

### Task 7 — Reflective Report (15 marks)
- ✅ 500+ word report in REPORT.md
- ✅ Covers: learnings, challenges, solutions, improvements

## 🔐 Security Features

- bcrypt password hashing (cost factor 12)
- PDO prepared statements (SQL injection prevention)
- Input sanitization with htmlspecialchars (XSS prevention)
- Login attempt tracking with automatic lockout
- Session-based authentication
- Email validation with filter_var

## ♿ Accessibility Features

- Skip-to-content link
- ARIA labels and roles throughout
- Keyboard navigable interface
- Screen reader-friendly structure
- Semantic HTML5 elements
- Focus-visible outlines
- Alt text and descriptions for visual content

## 📱 Responsive Design

- Mobile-first CSS approach
- CSS Grid and Flexbox layouts
- Hamburger navigation for mobile
- Adaptive dashboard layout
- Scrollable tables on small screens
- Touch-friendly interactive elements

## 👥 Team

- Kwame Asante — Lead Developer & Project Manager
- Ama Mensah — Frontend Developer & UI/UX Designer
- Kofi Boateng — Backend Developer & Database Admin
- Efua Darko — Content Creator & Research Lead

---

*Built with 💚 for a cleaner planet — PlasticPollutions @ Pentecost University*
