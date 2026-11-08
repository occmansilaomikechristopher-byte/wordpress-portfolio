<?php
/**
 * One-Click Demo Content Seeder & Auto-Synchronization
 * Instantly populates and synchronizes the 4 team members, showcase projects, and core pages.
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add Admin Menu to trigger seeder
 */
function quadro_add_seeder_menu() {
    add_theme_page(
        __('Seed Portfolio Demo Data', 'quadro'),
        __('Portfolio Demo Setup', 'quadro'),
        'manage_options',
        'quadro-demo-seeder',
        'quadro_render_seeder_page'
    );
}
add_action('admin_menu', 'quadro_add_seeder_menu');

/**
 * Render Seeder Admin Page
 */
function quadro_render_seeder_page() {
    if (isset($_POST['quadro_run_seeder']) && check_admin_referer('quadro_run_seeder_nonce')) {
        quadro_execute_demo_seeder();
        echo '<div class="notice notice-success is-dismissible"><p><strong>' . esc_html__('Success! 4 Team Members, 6 Portfolio Projects, Navigation Menu, and Core Pages have been synchronized successfully!', 'quadro') . '</strong></p></div>';
    }
    ?>
    <div class="wrap">
        <h1><?php _e('Quadro Group Portfolio - Data & Content Synchronizer', 'quadro'); ?></h1>
        <p><?php _e('Click the button below to update and synchronize all 4 team members with their updated roles (Data Analyst, Project Manager, Technical Writer, PROGRAMMER) and 6 projects.', 'quadro'); ?></p>
        
        <div style="background: #fff; padding: 25px; border-radius: 8px; max-width: 650px; border: 1px solid #ccd0d4; margin-top: 20px;">
            <h3><?php _e('What will be synchronized:', 'quadro'); ?></h3>
            <ul style="list-style: disc; padding-left: 20px; line-height: 1.8;">
                <li><strong>4 Team Members:</strong> Niel Kenneth De jesus (Data Analyst), Ariel Caharian (Project Manager), Lorence Mar Bigtasin (Technical Writer), Mike Christopher Mansilao (PROGRAMMER).</li>
                <li><strong>6 Showcase Projects:</strong> Cloud Database & Web Platform System, REST API Documentation, Agile Sprint Framework, Sales & Telemetry Analytics, Infrastructure Monitoring Portal, and Custom WordPress Portfolio.</li>
                <li><strong>Broken Link Sanitation:</strong> Strips fictional placeholder domains (e.g. member-two.dev) and points repositories directly to the official GitHub repository.</li>
            </ul>

            <form method="post" style="margin-top: 25px;">
                <?php wp_nonce_field('quadro_run_seeder_nonce'); ?>
                <input type="submit" name="quadro_run_seeder" class="button button-primary button-hero" value="<?php esc_attr_e('Sync Portfolio Content Now', 'quadro'); ?>" />
            </form>
        </div>
    </div>
    <?php
}

/**
 * Automatic Synchronizer Hook
 * Executes automatically when any WordPress page loads to ensure roles, bios, and links are updated.
 */
function quadro_auto_sync_roles_and_bios() {
    $current_version = '2026.11.08.v7';
    if (get_option('quadro_data_sync_version') !== $current_version || isset($_GET['force_quadro_sync'])) {
        quadro_execute_demo_seeder();
        update_option('quadro_data_sync_version', $current_version);
    }
}
add_action('init', 'quadro_auto_sync_roles_and_bios');

/**
 * Execute Seeding and Synchronization Logic
 */
function quadro_execute_demo_seeder() {
    $official_github = 'https://github.com/occmansilaomikechristopher-byte/wordpress-portfolio';

    // 1. Seed & Sync 4 Team Members
    $members_data = array(
        array(
            'match_titles'=> array('Niel Kenneth De jesus', 'Member One', 'Frontend Developer'),
            'title'       => 'Niel Kenneth De jesus',
            'role'        => 'Data Analyst',
            'skills'      => 'Data Analysis, Python, SQL, Statistics, Excel, Tableau',
            'experience'  => '4+ Years',
            'email'       => 'nielkenneth.dejesus@gmail.com',
            'github'      => $official_github,
            'linkedin'    => '',
            'twitter'     => '',
            'portfolio'   => '',
            'excerpt'     => 'Specializes in quantitative data analysis, data storytelling, statistical reporting, and predictive data modeling.',
            'content'     => 'Niel Kenneth De jesus is an analytical specialist dedicated to transforming complex raw datasets into actionable intelligence and strategic business insights. Proficient in Python, SQL, Tableau, and statistical forecasting.'
        ),
        array(
            'match_titles'=> array('Ariel Caharian', 'Member Two', 'Backend Developer'),
            'title'       => 'Ariel Caharian',
            'role'        => 'Project Manager',
            'skills'      => 'Agile/Scrum, Project Roadmapping, Resource Allocation, JIRA, QA Leadership',
            'experience'  => '5+ Years',
            'email'       => 'ariel.caharian@gmail.com',
            'github'      => $official_github,
            'linkedin'    => '',
            'twitter'     => '',
            'portfolio'   => '',
            'excerpt'     => 'Orchestrates software delivery workflows, aligns team objectives, manages sprint deadlines, and ensures quality assurance.',
            'content'     => 'Ariel Caharian provides leadership across the entire software delivery lifecycle, facilitating cross-functional communication, Agile/Scrum execution, risk management, and milestone roadmaps.'
        ),
        array(
            'match_titles'=> array('Lorence Mar Bigtasin', 'Member Three', 'UI/UX Designer'),
            'title'       => 'Lorence Mar Bigtasin',
            'role'        => 'Technical Writer',
            'skills'      => 'Technical Documentation, API Specifications, Software Architecture Writing, Markdown, User Manuals',
            'experience'  => '4+ Years',
            'email'       => 'lorence.bigtasin@gmail.com',
            'github'      => $official_github,
            'linkedin'    => '',
            'twitter'     => '',
            'portfolio'   => '',
            'excerpt'     => 'Crafts thorough technical documentation, developer API guides, system architectures, and end-user guides.',
            'content'     => 'Lorence Mar Bigtasin bridges engineering specifications and user clarity, producing comprehensive API documentation, system architecture blueprints, and standard operating procedures.'
        ),
        array(
            'match_titles'=> array('Mike Christopher Mansilao', 'Member Four', 'Full-Stack Developer'),
            'title'       => 'Mike Christopher Mansilao',
            'role'        => 'PROGRAMMER',
            'skills'      => 'PHP, JavaScript, MySQL, WordPress, Python, Web Applications',
            'experience'  => '5+ Years',
            'email'       => 'occmansilaomikechristopher@gmail.com',
            'github'      => 'https://github.com/occmansilaomikechristopher-byte',
            'linkedin'    => '',
            'twitter'     => '',
            'portfolio'   => '',
            'excerpt'     => 'Engineers robust software algorithms, database systems, dynamic web applications, and custom WordPress systems.',
            'content'     => 'Mike Christopher Mansilao is a dedicated software programmer proficient in building resilient backend logic, relational database queries in MySQL, REST APIs, and scalable web solutions.'
        ),
    );

    $inserted_members = array();
    foreach ($members_data as $m) {
        $existing = null;
        foreach ($m['match_titles'] as $possible_title) {
            $found = get_page_by_title($possible_title, OBJECT, 'team_member');
            if ($found) {
                $existing = $found;
                break;
            }
        }

        if ($existing) {
            $member_id = $existing->ID;
            wp_update_post(array(
                'ID'           => $member_id,
                'post_title'   => $m['title'],
                'post_content' => $m['content'],
                'post_excerpt' => $m['excerpt'],
                'post_status'  => 'publish',
            ));
        } else {
            $member_id = wp_insert_post(array(
                'post_title'   => $m['title'],
                'post_content' => $m['content'],
                'post_excerpt' => $m['excerpt'],
                'post_status'  => 'publish',
                'post_type'    => 'team_member',
            ));
        }

        if ($member_id && !is_wp_error($member_id)) {
            update_post_meta($member_id, '_member_role_title', $m['role']);
            update_post_meta($member_id, '_member_skills', $m['skills']);
            update_post_meta($member_id, '_member_experience', $m['experience']);
            update_post_meta($member_id, '_member_email', $m['email']);
            update_post_meta($member_id, '_member_github', $m['github']);
            update_post_meta($member_id, '_member_linkedin', $m['linkedin']);
            update_post_meta($member_id, '_member_twitter', $m['twitter']);
            update_post_meta($member_id, '_member_portfolio', $m['portfolio']); // Clears any member-two.dev!
            update_post_meta($member_id, '_member_featured', '1');
            $inserted_members[$m['title']] = $member_id;
        }
    }

    // 2. Seed & Sync 6 Portfolio Projects
    $projects_data = array(
        array(
            'match_titles'=> array('Cloud Database & Web Platform System', 'Enterprise Cloud Infrastructure Portal'),
            'title'       => 'Cloud Database & Web Platform System',
            'category'    => 'Programming',
            'tech_stack'  => 'PHP, JavaScript, MySQL, WordPress, REST API, HTML5/CSS3',
            'demo'        => $official_github,
            'github'      => $official_github,
            'client'      => 'Nexus Digital Systems',
            'year'        => '2026',
            'excerpt'     => 'Dynamic custom web platform engineered with modular PHP object-oriented architecture, secure MySQL database handling, and reactive front-end modules.',
            'content'     => 'Engineered and programmed by Mike Christopher Mansilao. Developed custom backend routing, normalized relational databases in MySQL, integrated CSRF nonce security layers, and crafted custom WordPress components with zero plugin bloat.',
            'featured'    => '1'
        ),
        array(
            'match_titles'=> array('Comprehensive REST API & System Architecture Documentation', 'High-Throughput RESTful API Gateway'),
            'title'       => 'Comprehensive REST API & System Architecture Documentation',
            'category'    => 'Technical Writing',
            'tech_stack'  => 'Markdown, Swagger/OpenAPI, GitBook, Docusaurus, Postman',
            'demo'        => $official_github,
            'github'      => $official_github,
            'client'      => 'FinTech Enterprise Protocol',
            'year'        => '2026',
            'excerpt'     => 'Exhaustive technical documentation suite detailing 60+ API endpoints, software architecture diagrams, deployment SOPs, and user onboarding manuals.',
            'content'     => 'Authored by Technical Writer Lorence Mar Bigtasin. Standardized technical communication between software engineers and enterprise clients with structured API endpoint documentation, error handling guides, and interactive code samples.',
            'featured'    => '1'
        ),
        array(
            'match_titles'=> array('Agile Sprint Workflow & Milestone Delivery Framework', 'Universal Design System & Component Library'),
            'title'       => 'Agile Sprint Workflow & Milestone Delivery Framework',
            'category'    => 'Project Management',
            'tech_stack'  => 'Agile/Scrum, JIRA, Trello, Confluence, Gantt Charts, QA Matrix',
            'demo'        => $official_github,
            'github'      => $official_github,
            'client'      => 'Apex Global Solutions',
            'year'        => '2026',
            'excerpt'     => 'Strategic project delivery framework managing cross-functional development sprints, risk mitigation protocols, and on-time milestone deployments.',
            'content'     => 'Directed by Project Manager Ariel Caharian. Formulated comprehensive sprint backlogs, managed team velocity across 14 release iterations, and instituted quality assurance benchmarks that reduced deployment bottlenecks by 40%.',
            'featured'    => '1'
        ),
        array(
            'match_titles'=> array('Predictive Sales & Customer Telemetry Analytics', 'Real-Time Telemetry & Analytics Dashboard'),
            'title'       => 'Predictive Sales & Customer Telemetry Analytics',
            'category'    => 'Data Analysis',
            'tech_stack'  => 'Python, SQL, Tableau, Pandas, Excel, PowerBI',
            'demo'        => $official_github,
            'github'      => $official_github,
            'client'      => 'RetailSphere Analytics',
            'year'        => '2026',
            'excerpt'     => 'End-to-end data pipeline analyzing 500,000+ transaction records, forecasting demand trends with predictive statistical models and interactive BI dashboards.',
            'content'     => 'Spearheaded by Data Analyst Niel Kenneth De jesus. Engineered automated data cleaning pipelines, normalized relational data schemas in MySQL/SQL, and visualized key performance indicators with real-time analytics.',
            'featured'    => '1'
        ),
        array(
            'match_titles'=> array('Cloud Resource & Infrastructure Monitoring Portal', 'Headless E-Commerce Architecture'),
            'title'       => 'Cloud Resource & Infrastructure Monitoring Portal',
            'category'    => 'Cloud Computing',
            'tech_stack'  => 'Cloud Computing, PHP, Python, MySQL, Linux, Apache',
            'demo'        => $official_github,
            'github'      => $official_github,
            'client'      => 'BSIT 4th Year Cloud Computing Project',
            'year'        => '2026',
            'excerpt'     => 'A collaborative cloud computing platform combining real-time telemetry analytics, agile project governance, technical system documentation, and modular programming.',
            'content'     => 'Collaborative final project for Cloud Computing subject developed by Niel Kenneth De jesus (Data Analyst), Ariel Caharian (Project Manager), Lorence Mar Bigtasin (Technical Writer), and Mike Christopher Mansilao (Programmer).',
            'featured'    => '0'
        ),
        array(
            'match_titles'=> array('Custom Responsive WordPress Portfolio Architecture', 'Cross-Platform Mobile Application'),
            'title'       => 'Custom Responsive WordPress Portfolio Architecture',
            'category'    => 'Programming',
            'tech_stack'  => 'WordPress, PHP 8.x, MySQL, JavaScript, CSS Grid',
            'demo'        => $official_github,
            'github'      => $official_github,
            'client'      => 'Quadro Engineering Collective',
            'year'        => '2026',
            'excerpt'     => 'Modern dark-themed bespoke WordPress portfolio featuring custom post types, AJAX contact forms, dynamic category filters, and mobile-first responsiveness.',
            'content'     => 'The official group portfolio website designed and deployed by the four-member BSIT team, showcasing seamless integration across programming, documentation, data analysis, and project management.',
            'featured'    => '0'
        ),
    );

    foreach ($projects_data as $p) {
        $existing = null;
        if (!empty($p['match_titles'])) {
            foreach ($p['match_titles'] as $pt) {
                $found = get_page_by_title($pt, OBJECT, 'portfolio_project');
                if ($found) {
                    $existing = $found;
                    break;
                }
            }
        }
        if (!$existing) {
            $existing = get_page_by_title($p['title'], OBJECT, 'portfolio_project');
        }

        if ($existing) {
            $project_id = $existing->ID;
            wp_update_post(array(
                'ID'           => $project_id,
                'post_title'   => $p['title'],
                'post_content' => $p['content'],
                'post_excerpt' => $p['excerpt'],
                'post_status'  => 'publish',
            ));
        } else {
            $project_id = wp_insert_post(array(
                'post_title'   => $p['title'],
                'post_content' => $p['content'],
                'post_excerpt' => $p['excerpt'],
                'post_status'  => 'publish',
                'post_type'    => 'portfolio_project',
            ));
        }

        if ($project_id && !is_wp_error($project_id)) {
            update_post_meta($project_id, '_project_tech_stack', $p['tech_stack']);
            update_post_meta($project_id, '_project_live_demo', $p['demo']);
            update_post_meta($project_id, '_project_github_url', $p['github']);
            update_post_meta($project_id, '_project_client', $p['client']);
            update_post_meta($project_id, '_project_year', $p['year']);
            update_post_meta($project_id, '_project_featured', $p['featured']);

            // Assign category taxonomy
            wp_set_object_terms($project_id, $p['category'], 'project_category');
        }
    }

    // 3. Seed Core Pages
    $pages = array(
        'Home' => array(
            'template' => 'front-page.php',
            'content'  => 'Welcome to Quadro - The 4-Member Engineering Collective.'
        ),
        'About Us' => array(
            'template' => 'page-about.php',
            'content'  => 'We are a cohesive team of 4 software engineers and designers dedicated to building modern digital solutions.'
        ),
        'Our Team' => array(
            'template' => 'page-team.php',
            'content'  => 'Meet our multidisciplinary team of developers and designers.'
        ),
        'Our Projects' => array(
            'template' => 'page-projects.php',
            'content'  => 'Explore our portfolio of enterprise web applications, APIs, design systems, and software projects.'
        ),
        'Contact Us' => array(
            'template' => 'page-contact.php',
            'content'  => 'Get in touch with our team for collaborations, contract projects, and inquiries.'
        ),
    );

    $page_ids = array();
    foreach ($pages as $title => $data) {
        $existing = get_page_by_title($title);
        if (!$existing) {
            $page_id = wp_insert_post(array(
                'post_title'   => $title,
                'post_content' => $data['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ));
            if ($page_id) {
                if (!empty($data['template'])) {
                    update_post_meta($page_id, '_wp_page_template', $data['template']);
                }
                $page_ids[$title] = $page_id;
            }
        } else {
            $page_ids[$title] = $existing->ID;
        }
    }

    // Set Front Page
    if (isset($page_ids['Home'])) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $page_ids['Home']);
    }

    // 4. Create Navigation Menu
    $menu_name = 'Quadro Primary Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        if ($menu_id && !is_wp_error($menu_id)) {
            $menu_order = 1;
            foreach ($pages as $title => $data) {
                if (isset($page_ids[$title])) {
                    wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title'     => $title,
                        'menu-item-object-id' => $page_ids[$title],
                        'menu-item-object'    => 'page',
                        'menu-item-status'    => 'publish',
                        'menu-item-type'      => 'post_type',
                        'menu-item-position'  => $menu_order++,
                    ));
                }
            }
            // Assign to primary-menu location
            $locations = get_theme_mod('nav_menu_locations');
            $locations['primary-menu'] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }
    }
}
