# Quadro - 4-Member Group Portfolio WordPress Theme

[![WordPress](https://img.shields.io/badge/WordPress-6.0%2B-blue.svg)](https://wordpress.org)
[![PHP](https://img.shields.io/badge/PHP-8.0%2B-purple.svg)](https://php.net)
[![License: GPL v2+](https://img.shields.io/badge/License-GPL%20v2%2B-green.svg)](http://www.gnu.org/licenses/gpl-2.0.html)

A premier, high-performance, dark-themed **WordPress Group Portfolio Theme** built specifically for a 4-member BSIT Cloud Computing engineering collective covering Software Programming, Data Analysis, Agile Project Management, and Technical Writing.

Engineered with a modern software agency aesthetic, the theme features responsive glassmorphism, native custom post types for team members and projects, and secure AJAX contact forms with WordPress security nonces.

---

## 🌐 Live Production Deployment
* **Live Website URL:** [https://quadro.gvaluminumandglassworks.com/](https://quadro.gvaluminumandglassworks.com/)
* **Official GitHub Repository:** [https://github.com/occmansilaomikechristopher-byte/wordpress-portfolio](https://github.com/occmansilaomikechristopher-byte/wordpress-portfolio)
* **Instant HTML Preview:** Double-click **`preview.html`** in this folder to test responsiveness offline.

---

## 👥 The 4 Team Member Roles & Profiles

The theme natively accommodates the four distinct BSIT engineering roles:

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
├── deploy-to-xampp.bat            # 1-Click batch sync script to C:\xampp\htdocs
├── deploy-to-xampp.ps1            # 1-Click PowerShell sync script to C:\xampp\htdocs
├── inc/
│   ├── custom-post-types.php      # Registers CPTs: team_member & portfolio_project
│   ├── meta-boxes.php             # Native custom meta fields (roles, skills, URLs)
│   ├── ajax-contact.php           # Secure contact form handler with CSRF nonces
│   ├── demo-data-seeder.php       # One-click generator for the 4 members & projects
│   └── template-tags.php          # Reusable helper functions & output formatters
├── assets/
│   ├── css/
│   │   ├── main.css               # Core layout, hero, team grid, project grid
│   │   ├── components.css         # Glass cards, buttons, badges, forms, modals
│   │   └── responsive.css         # Mobile-first breakpoints (320px to 4K)
│   └── js/
│       ├── main.js                # Sticky nav, drawer toggle, smooth scrolling
│       ├── project-filter.js      # Real-time category filtering (All, Frontend, Backend...)
│       └── contact-ajax.js        # Nonce-protected AJAX submission with live feedback
└── template-parts/
    ├── member-card.php            # Reusable card component for team members
    └── project-card.php           # Reusable card component for portfolio projects
```

---

## 🛠️ Local Development Setup with XAMPP

### Step 1: Start XAMPP Services
1. Open the **XAMPP Control Panel** (`C:\xampp\xampp-control.exe`).
2. Click **Start** for **Apache** and **MySQL**.

### Step 2: Set Up WordPress Core
If you haven't installed WordPress yet:
1. Download WordPress from [wordpress.org/download](https://wordpress.org/download/).
2. Extract the files into `C:\xampp\htdocs\portfolio`.
3. Open your browser and navigate to `http://localhost/phpmyadmin`.
4. Click **New** and create a database named `portfolio_db` (Collation: `utf8mb4_unicode_ci`).

### Step 3: Deploy the Theme
Run **`deploy-to-xampp.bat`** or **`deploy-to-xampp.ps1`** inside this folder.
* It automatically copies the complete theme into `C:\xampp\htdocs\portfolio\wp-content\themes\quadro-portfolio`.

### Step 4: Complete WordPress Installation
1. Visit `http://localhost/portfolio` in your browser.
2. Select your language and enter the database details:
   * **Database Name:** `portfolio_db`
   * **Username:** `root`
   * **Password:** *(leave blank)*
   * **Database Host:** `localhost`
   * **Table Prefix:** `wp_`
3. Complete the site title and create your admin account.

### Step 5: Activate Theme & Seed Demo Data
1. In the WordPress Admin dashboard, go to **Appearance > Themes**.
2. Hover over **Quadro - Group Portfolio Theme** and click **Activate**.
3. In the left admin sidebar, click **Portfolio Demo Setup**.
4. Click the blue button: **"Seed Demo Portfolio Content Now"**.
   * In 3 seconds, it generates all **4 team members**, **6 showcase projects**, **core pages**, and links the **navigation menu** automatically!

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
   * **Role / Position Title** (e.g. Lead Frontend Engineer)
   * **Technical Skills** (Comma-separated list)
   * **Social Profiles** (GitHub, LinkedIn, Twitter/X, Portfolio, Direct Email)
   * **Profile Picture** (Featured Image)

### Adding or Editing Projects
1. Go to **Projects > Add New Project** in WP Admin.
2. Provide project title, detailed case study content, and showcase screenshot.
3. In the **Project Specifications** box, specify:
   * **Technologies Used** (e.g. `PHP, MySQL, React, Tailwind`)
   * **Live Demo URL** and **GitHub Repository URL**
   * **Category** (Frontend, Backend, UI/UX, Full-Stack)
   * **Lead Specialist** (Links the project to one of the 4 members)

---

## 📄 License
This theme is open-source software licensed under the [GNU General Public License v2 or later](http://www.gnu.org/licenses/gpl-2.0.html).

