# Quadro - 4-Member Group Portfolio WordPress Theme

[![WordPress](https://img.shields.io/badge/WordPress-6.0%2B-blue.svg)](https://wordpress.org)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-purple.svg)](https://php.net)
[![LocalWP](https://img.shields.io/badge/LocalWP-Ready-brightgreen.svg)](https://localwp.com/)
[![License: GPL v2+](https://img.shields.io/badge/License-GPL%20v2%2B-green.svg)](http://www.gnu.org/licenses/gpl-2.0.html)

A premier, high-performance, dark-themed **WordPress Group Portfolio Theme** built specifically for a 4-member BSIT Cloud Computing engineering collective covering Software Programming, Data Analysis, Agile Project Management, and Technical Writing.

Developed and optimized for **LocalWP** (Local by Flywheel) development environment with complete support for Nginx 1.26+, PHP 8.2+, MySQL 8.4+, and one-click database management via Adminer.

---

## 🌐 Live Production & Repository Links
* **Live Website URL:** [https://quadro.gvaluminumandglassworks.com/](https://quadro.gvaluminumandglassworks.com/)
* **Official GitHub Repository:** [https://github.com/occmansilaomikechristopher-byte/wordpress-portfolio](https://github.com/occmansilaomikechristopher-byte/wordpress-portfolio)
* **Instant HTML Offline Preview:** Double-click **`preview.html`** in this folder to test responsiveness offline.

---

## 👥 The 4 Team Member Roles & Profiles

The theme natively accommodates the four distinct BSIT engineering disciplines:

1. **Niel Kenneth De jesus — Data Analyst**
   * *Core Stack:* Data Analysis, Python, SQL, Statistics, Excel, Tableau, PowerBI
   * *Specialization:* Quantitative telemetry analysis, statistical forecasting, database normalization, predictive data modeling, and interactive executive KPI dashboards.
   * *Direct Email:* `nielkenneth.dejesus@gmail.com`

2. **Ariel Caharian — Project Manager**
   * *Core Stack:* Agile/Scrum, Project Roadmapping, Resource Allocation, JIRA, Confluence, QA Leadership
   * *Specialization:* Cross-functional sprint governance, milestone delivery tracking, velocity optimization, risk matrix auditing, and quality assurance benchmarks.
   * *Direct Email:* `ariel.caharian@gmail.com`

3. **Lorence Mar Bigtasin — Technical Writer**
   * *Core Stack:* Technical Documentation, REST API Specifications, OpenAPI/Swagger, Markdown, System Architecture Writing, SOP Manuals
   * *Specialization:* Comprehensive developer API references, software architecture blueprints, standard operating procedures (SOPs), and end-user onboarding manuals.
   * *Direct Email:* `lorence.bigtasin@gmail.com`

4. **Mike Christopher Mansilao — PROGRAMMER**
   * *Core Stack:* PHP 8.x, JavaScript (ES6+), MySQL, WordPress Theme & Core APIs, Python, REST APIs
   * *Specialization:* Custom WordPress theme engineering, object-oriented PHP backend logic, relational database normalization in MySQL, algorithm optimization, and dynamic web applications.
   * *Direct Email:* `occmansilaomikechristopher@gmail.com`
   * *GitHub Profile:* [occmansilaomikechristopher-byte](https://github.com/occmansilaomikechristopher-byte)

> **Note:** All member details, roles, skills, profile photos, and social links are **100% editable and synchronized** via the WordPress Admin dashboard under **Team Members**.

---

## 🚀 The 6 Aligned Showcase Projects

1. **Cloud Database & Web Platform System** *(Category: Programming)*
   * *Lead Specialist:* Mike Christopher Mansilao (Programmer)
   * *Tech Stack:* PHP, JavaScript, MySQL, WordPress, REST API, HTML5/CSS3
   * *Overview:* Dynamic custom web platform engineered with modular PHP object-oriented architecture, secure MySQL database handling, and reactive front-end modules.

2. **Comprehensive REST API & System Architecture Documentation** *(Category: Technical Writing)*
   * *Lead Specialist:* Lorence Mar Bigtasin (Technical Writer)
   * *Tech Stack:* Markdown, Swagger/OpenAPI, GitBook, Docusaurus, Postman
   * *Overview:* Exhaustive technical documentation suite detailing 60+ API endpoints, software architecture diagrams, deployment SOPs, and user onboarding manuals.

3. **Agile Sprint Workflow & Milestone Delivery Framework** *(Category: Project Management)*
   * *Lead Specialist:* Ariel Caharian (Project Manager)
   * *Tech Stack:* Agile/Scrum, JIRA, Trello, Confluence, Gantt Charts, QA Matrix
   * *Overview:* Strategic project delivery framework managing cross-functional development sprints, risk mitigation protocols, and on-time milestone deployments.

4. **Predictive Sales & Customer Telemetry Analytics** *(Category: Data Analysis)*
   * *Lead Specialist:* Niel Kenneth De jesus (Data Analyst)
   * *Tech Stack:* Python, SQL, Tableau, Pandas, Excel, PowerBI
   * *Overview:* End-to-end data pipeline analyzing 500,000+ transaction records, forecasting demand trends with predictive statistical models and interactive BI dashboards.

5. **Cloud Resource & Infrastructure Monitoring Portal** *(Category: Cloud Computing)*
   * *Lead Specialist:* Collaborative Group Project (BSIT 4th Year Cloud Computing)
   * *Tech Stack:* Cloud Computing, PHP, Python, MySQL, Linux, Apache
   * *Overview:* A collaborative cloud computing platform combining real-time telemetry analytics, agile project governance, technical system documentation, and modular programming.

6. **Custom Responsive WordPress Portfolio Architecture** *(Category: Programming)*
   * *Lead Specialist:* The 4-Member Group
   * *Tech Stack:* WordPress, PHP 8.x, MySQL, JavaScript, CSS Grid
   * *Overview:* Modern dark-themed bespoke WordPress portfolio featuring custom post types, AJAX contact forms, dynamic category filters, and mobile-first responsiveness.

---

## 📁 Theme Architecture & File Map

```
c:\Users\MANSILAO FAMILY\Desktop\PORTFOLIO\
├── style.css                      # Theme metadata, root CSS variables & reset
├── functions.php                  # Theme bootstrap, enqueues, support hooks
├── index.php                      # Fallback index template with pagination
├── header.php                     # Glassmorphic navbar, brand logo, mobile drawer
├── footer.php                     # Modern footer, status pill, social links
├── front-page.php                 # Home Page: Hero, metrics, preview cards, CTA
├── page-about.php                 # About Us: Mission, vision, 4-phase philosophy
├── page-team.php                  # Team Page: 4 Member cards & collective skills
├── single-team_member.php         # Dedicated individual member profile & projects
├── page-projects.php              # Projects Grid: Dynamic category filtering
├── single-portfolio_project.php   # Project Case Study & detailed specifications
├── page-contact.php               # Secure AJAX-powered Contact Form
├── 404.php                        # Branded 404 error page
├── screenshot.png                 # WordPress dashboard theme preview (1200x900)
├── preview.html                   # Instant interactive HTML preview
├── deploy-to-localwp.bat          # 1-Click batch sync script to LocalWP
├── deploy-to-localwp.ps1          # 1-Click PowerShell sync script to LocalWP
├── deploy-to-xampp.bat            # 1-Click batch sync script to XAMPP (Alternative)
├── deploy-to-xampp.ps1            # 1-Click PowerShell sync script to XAMPP (Alternative)
├── inc/
│   ├── custom-post-types.php      # Registers CPTs: team_member & portfolio_project
│   ├── meta-boxes.php             # Native custom meta fields (roles, skills, URLs)
│   ├── ajax-contact.php           # Secure contact form handler with CSRF nonces
│   ├── demo-data-seeder.php       # One-click generator for the 4 members & projects
│   └── template-tags.php          # Reusable helper functions & output formatters
├── assets/
│   ├── audio/
│   │   ├── welcome.mp3            # 54KB studio AI voice ("Welcome to the Quadro.dev Portfolio.")
│   │   └── welcome.ogg            # 17KB lightweight Vorbis audio fallback
│   ├── css/
│   │   ├── welcome-intro.css      # Futuristic glassmorphism welcome screen styles
│   │   ├── main.css               # Core layout, hero, team grid, project grid
│   │   ├── components.css         # Glass cards, buttons, badges, forms, modals
│   │   └── responsive.css         # Mobile-first breakpoints (320px to 4K)
│   └── js/
│       ├── welcome-intro.js       # Autoplay-compliant intro controller & audio handler
│       ├── main.js                # Sticky nav, drawer toggle, smooth scrolling
│       ├── project-filter.js      # Real-time category filtering (All, Frontend, Backend...)
│       └── contact-ajax.js        # Nonce-protected AJAX submission with live feedback
└── template-parts/
    ├── welcome-intro.php          # Full-screen futuristic welcome intro overlay
    ├── member-card.php            # Reusable card component for team members
    └── project-card.php           # Reusable card component for portfolio projects
```

---

## 🛠️ Local Development Setup with LocalWP (Recommended)

Our primary development environment is **LocalWP** (Local by Flywheel). It provides isolated sandboxes with modern Nginx, PHP 8.2+, and MySQL 8.4+ without needing third-party stacks like XAMPP.

### Step 1: Install & Set Up LocalWP
1. Download and install **LocalWP** from [localwp.com](https://localwp.com/).
2. In LocalWP, click **+ (Create a new site)**:
   * **Site name:** `Quadro Portfolio`
   * **Environment:** Preferred (PHP 8.2.x, Nginx 1.26.x, MySQL 8.4.x)
   * **WordPress Admin:** Set your preferred username, password, and email.
3. In **Preferences > Advanced**:
   * Set **Router Mode** to **`localhost`** (avoids Windows hosts permission issues and conflicts).

### Step 2: Deploy Theme to LocalWP
Run **`deploy-to-localwp.bat`** (or **`deploy-to-localwp.ps1`**) from this directory.
* It automatically deploys the complete theme into:
  `%USERPROFILE%\Local Sites\quadro-portfolio\app\public\wp-content\themes\quadro-portfolio`

### Step 3: Start Site & Activate Theme
1. In LocalWP, click **Start site** (top-right green button).
2. Open your browser and go to:
   👉 **`http://localhost:10004/wp-admin`** *(or your site's assigned port)*
3. Log in with your admin credentials.
4. Navigate to **Appearance > Themes** and click **Activate** on **Quadro - Group Portfolio Theme**.

### Step 4: One-Click Content Synchronization
* The theme features an automatic seeder (`demo-data-seeder.php`) that runs on activation and synchronizes:
  * All **4 Team Members** with updated roles (Data Analyst, Project Manager, Technical Writer, Programmer).
  * All **6 Aligned Showcase Projects**.
  * Core static pages (`Home`, `About Us`, `Our Team`, `Our Projects`, `Contact Us`).
  * The primary header navigation menu.

### Step 5: Database Management (Adminer)
* In LocalWP, click the **Database** tab.
* Click **Open Adminer** to view tables (`wp_posts`, `wp_postmeta`, `wp_options`, etc.), run SQL queries, and inspect raw records without needing phpMyAdmin.

---

## 🔄 Alternative Setup with XAMPP

If running on XAMPP:
1. Start **Apache** and **MySQL** in XAMPP Control Panel.
2. Run **`deploy-to-xampp.bat`** to copy files into `C:\xampp\htdocs\portfolio\wp-content\themes\quadro-portfolio`.
3. Open `http://localhost/portfolio/wp-admin` and activate the theme under **Appearance > Themes**.

---

## 🔒 Security & Code Quality Standards

* **Cross-Site Request Forgery (CSRF) Protection:** All form interactions and administrative settings are protected via `wp_nonce_field()`, `wp_verify_nonce()`, and `check_ajax_referer()`.
* **Input Sanitization:** User data is sanitized on intake using `sanitize_text_field()`, `sanitize_email()`, `sanitize_textarea_field()`, and `esc_url_raw()`.
* **Output Escaping:** Strict escaping (`esc_html()`, `esc_attr()`, `esc_url()`) across all templates prevents XSS vectors.
* **Separation of Concerns:** Business logic, post types, meta fields, and templates are isolated into modular files under `/inc`.
* **Zero Plugin Dependency:** Works out of the box using native WordPress APIs; does not require bloated third-party page builders or paid add-ons.

---

## 📝 Customization & Content Editing

### Adding or Editing Team Members
1. Go to **Team Members > All Team Members** in WP Admin.
2. Click on any member to edit their:
   * **Name & Biography** (Title and Content area)
   * **Role / Position Title** (Data Analyst, Project Manager, Technical Writer, Programmer)
   * **Technical Skills** (Comma-separated list)
   * **Social Profiles** (GitHub, LinkedIn, Twitter/X, Portfolio, Direct Email)
   * **Profile Picture** (Featured Image)

### Adding or Editing Projects
1. Go to **Projects > Add New Project** in WP Admin.
2. Provide project title, detailed case study content, and showcase screenshot.
3. In the **Project Specifications** box, specify:
   * **Technologies Used** (e.g. `PHP, MySQL, React, Tailwind`)
   * **Live Demo URL** and **GitHub Repository URL**
   * **Category** (Programming, Data Analysis, Project Management, Technical Writing, Cloud Computing)
   * **Lead Specialist** (Links the project to one of the 4 members)

---

## 📄 License
This theme is open-source software licensed under the [GNU General Public License v2 or later](http://www.gnu.org/licenses/gpl-2.0.html).
