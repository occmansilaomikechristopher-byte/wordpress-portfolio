<?php
/**
 * One-Click Demo Content Seeder
 * Instantly populates the 4 team members, showcase projects, and core pages.
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
        echo '<div class="notice notice-success is-dismissible"><p><strong>' . esc_html__('Success! 4 Team Members, 6 Portfolio Projects, Navigation Menu, and Core Pages have been created successfully!', 'quadro') . '</strong></p></div>';
    }
    ?>
    <div class="wrap">
        <h1><?php _e('Quadro Group Portfolio - Demo Content Generator', 'quadro'); ?></h1>
        <p><?php _e('Click the button below to automatically generate all 4 placeholder team members, 6 showcase projects, and standard pages configured with the dark modern theme.', 'quadro'); ?></p>
        
        <div style="background: #fff; padding: 25px; border-radius: 8px; max-width: 650px; border: 1px solid #ccd0d4; margin-top: 20px;">
            <h3><?php _e('What will be created:', 'quadro'); ?></h3>
            <ul style="list-style: disc; padding-left: 20px; line-height: 1.8;">
                <li><strong>4 Team Members:</strong> Member One (Frontend), Member Two (Backend), Member Three (UI/UX), Member Four (Full-Stack).</li>
                <li><strong>6 Showcase Projects:</strong> Enterprise Cloud Portal, Design System, REST API Gateway, Analytics Dashboard, Headless E-Commerce, Interactive Mobile App.</li>
                <li><strong>Core Pages:</strong> Home, About Us, Our Team, Our Projects, Contact Us.</li>
                <li><strong>Navigation Menu:</strong> Automatically registered and assigned to header.</li>
            </ul>

            <form method="post" style="margin-top: 25px;">
                <?php wp_nonce_field('quadro_run_seeder_nonce'); ?>
                <input type="submit" name="quadro_run_seeder" class="button button-primary button-hero" value="<?php esc_attr_e('Seed Demo Portfolio Content Now', 'quadro'); ?>" />
            </form>
        </div>
    </div>
    <?php
}

/**
 * Execute Seeding Logic
 */
function quadro_execute_demo_seeder() {
    // 1. Seed 4 Team Members
    $members_data = array(
        array(
            'title'       => 'Member One',
            'role'        => 'Frontend Developer',
            'skills'      => 'HTML, CSS, JavaScript, WordPress, Tailwind CSS, React',
            'experience'  => '4+ Years',
            'email'       => 'member.one@quadro-dev.com',
            'github'      => 'https://github.com/member-one',
            'linkedin'    => 'https://linkedin.com/in/member-one',
            'twitter'     => 'https://twitter.com/member_one',
            'portfolio'   => 'https://member-one.dev',
            'excerpt'     => 'Specializes in crafting pixel-perfect, accessible, and high-performance user interfaces with modern CSS and JavaScript.',
            'content'     => 'Member One is an accomplished Frontend Developer passionate about building intuitive user experiences. With over 4 years of experience mastering modern JavaScript architectures, CSS animations, and headless CMS integrations, Member One bridges design concepts and technical execution with elegance and precision.'
        ),
        array(
            'title'       => 'Member Two',
            'role'        => 'Backend Developer',
            'skills'      => 'PHP, MySQL, WordPress, REST APIs, Python, Docker',
            'experience'  => '5+ Years',
            'email'       => 'member.two@quadro-dev.com',
            'github'      => 'https://github.com/member-two',
            'linkedin'    => 'https://linkedin.com/in/member-two',
            'twitter'     => 'https://twitter.com/member_two',
            'portfolio'   => 'https://member-two.dev',
            'excerpt'     => 'Architects secure, scalable server-side systems, optimized relational databases, and high-throughput REST APIs.',
            'content'     => 'Member Two is a seasoned Backend Developer focused on distributed architectures, database optimization, and rock-solid API development. Experienced in handling high-load infrastructure, custom WordPress plugin development, and microservices integration.'
        ),
        array(
            'title'       => 'Member Three',
            'role'        => 'UI/UX Designer',
            'skills'      => 'Figma, UI Design, CSS, Design Systems, Prototyping, Wireframing',
            'experience'  => '4+ Years',
            'email'       => 'member.three@quadro-dev.com',
            'github'      => 'https://github.com/member-three',
            'linkedin'    => 'https://linkedin.com/in/member-three',
            'twitter'     => 'https://twitter.com/member_three',
            'portfolio'   => 'https://member-three.design',
            'excerpt'     => 'Shapes cohesive digital design systems, user journeys, wireframes, and interactive prototypes tailored to modern web standards.',
            'content'     => 'Member Three translates complex workflows into clean, human-centered digital products. Specializing in responsive design systems, micro-interactions, and usability testing in Figma, ensuring every interface is both visually striking and delightful to use.'
        ),
        array(
            'title'       => 'Member Four',
            'role'        => 'Full-Stack Developer',
            'skills'      => 'PHP, JavaScript, MySQL, WordPress, Node.js, GraphQL',
            'experience'  => '5+ Years',
            'email'       => 'member.four@quadro-dev.com',
            'github'      => 'https://github.com/member-four',
            'linkedin'    => 'https://linkedin.com/in/member-four',
            'twitter'     => 'https://twitter.com/member_four',
            'portfolio'   => 'https://member-four.dev',
            'excerpt'     => 'Connects frontend elegance with backend resilience, managing the full software development lifecycle from concept to cloud deployment.',
            'content'     => 'Member Four is a versatile Full-Stack Engineer with extensive experience across modern web stacks. From designing relational database schemas in MySQL and creating modular PHP backends, to engineering reactive interfaces in JavaScript, Member Four delivers cohesive end-to-end solutions.'
        ),
    );

    $inserted_members = array();
    foreach ($members_data as $m) {
        $existing = get_page_by_title($m['title'], OBJECT, 'team_member');
        if (!$existing) {
            $member_id = wp_insert_post(array(
                'post_title'   => $m['title'],
                'post_content' => $m['content'],
                'post_excerpt' => $m['excerpt'],
                'post_status'  => 'publish',
                'post_type'    => 'team_member',
            ));

            if ($member_id && !is_wp_error($member_id)) {
                update_post_meta($member_id, '_member_role_title', $m['role']);
                update_post_meta($member_id, '_member_skills', $m['skills']);
                update_post_meta($member_id, '_member_experience', $m['experience']);
                update_post_meta($member_id, '_member_email', $m['email']);
                update_post_meta($member_id, '_member_github', $m['github']);
                update_post_meta($member_id, '_member_linkedin', $m['linkedin']);
                update_post_meta($member_id, '_member_twitter', $m['twitter']);
                update_post_meta($member_id, '_member_portfolio', $m['portfolio']);
                update_post_meta($member_id, '_member_featured', '1');
                $inserted_members[$m['title']] = $member_id;
            }
        } else {
            $inserted_members[$m['title']] = $existing->ID;
        }
    }

    // 2. Seed 6 Portfolio Projects
    $projects_data = array(
        array(
            'title'       => 'Enterprise Cloud SaaS Platform',
            'category'    => 'Full-Stack',
            'tech_stack'  => 'PHP, MySQL, React, REST API, Tailwind CSS',
            'demo'        => 'https://demo.quadro-dev.com/saas-cloud',
            'github'      => 'https://github.com/quadro-dev/saas-cloud-platform',
            'client'      => 'TechCorp Global',
            'year'        => '2026',
            'excerpt'     => 'A high-concurrency cloud dashboard featuring real-time telemetry, automated reporting, and role-based access management.',
            'content'     => 'Designed and delivered as a collaborative group initiative. Built on an asynchronous PHP backend with an optimized MySQL cluster and an ultra-responsive frontend interface.',
            'featured'    => '1'
        ),
        array(
            'title'       => 'Modern Design System & Component Library',
            'category'    => 'UI/UX',
            'tech_stack'  => 'Figma, CSS3, Design Tokens, HTML5',
            'demo'        => 'https://figma.com/@quadro-design-system',
            'github'      => 'https://github.com/quadro-dev/design-system-tokens',
            'client'      => 'FinTech Innovations',
            'year'        => '2026',
            'excerpt'     => 'Comprehensive multi-brand design tokens, 40+ accessible Figma UI components, dark-mode color matrices, and micro-interactions.',
            'content'     => 'Engineered to standardize digital brand identity across cross-platform products with strict adherence to WCAG 2.1 AA accessibility guidelines.',
            'featured'    => '1'
        ),
        array(
            'title'       => 'High-Throughput RESTful API Engine',
            'category'    => 'Backend',
            'tech_stack'  => 'PHP, MySQL, Redis, REST APIs, Docker',
            'demo'        => 'https://api.quadro-dev.com/v1/health',
            'github'      => 'https://github.com/quadro-dev/high-throughput-api',
            'client'      => 'Logistics Scale Inc.',
            'year'        => '2025',
            'excerpt'     => 'Microservice architecture providing authenticated data endpoints capable of sustaining 12,000 requests per minute with sub-50ms latency.',
            'content'     => 'Engineered with prepared database queries, redis caching layers, and token-based rate limiting to prevent DDoS vectors.',
            'featured'    => '1'
        ),
        array(
            'title'       => 'Interactive Telemetry & Analytics Dashboard',
            'category'    => 'Frontend',
            'tech_stack'  => 'HTML5, CSS3, JavaScript (ES6+), Chart.js',
            'demo'        => 'https://demo.quadro-dev.com/analytics-dashboard',
            'github'      => 'https://github.com/quadro-dev/analytics-dashboard',
            'client'      => 'MediaSphere Networks',
            'year'        => '2025',
            'excerpt'     => 'Real-time telemetry monitoring interface with interactive time-series charts, live WebSocket feeds, and dark/light mode toggles.',
            'content'     => 'Constructed with vanilla modern JavaScript and CSS custom properties for near-instant rendering speeds and minimal bundle overhead.',
            'featured'    => '1'
        ),
        array(
            'title'       => 'Headless WordPress E-Commerce Experience',
            'category'    => 'Full-Stack',
            'tech_stack'  => 'WordPress REST API, JavaScript, MySQL, PHP',
            'demo'        => 'https://demo.quadro-dev.com/headless-store',
            'github'      => 'https://github.com/quadro-dev/headless-store',
            'client'      => 'Artisan Goods Co.',
            'year'        => '2025',
            'excerpt'     => 'Decoupled storefront integrating WordPress as the content and inventory engine with an instant-checkout dynamic cart experience.',
            'content'     => 'Showcases how WordPress functions as an enterprise headless CMS with instant hydration and seamless cart persistence.',
            'featured'    => '0'
        ),
        array(
            'title'       => 'Responsive Developer Portfolio Portal',
            'category'    => 'Frontend',
            'tech_stack'  => 'WordPress, CSS3, JavaScript, PHP',
            'demo'        => 'https://quadro-dev.com',
            'github'      => 'https://github.com/quadro-dev/portfolio-theme',
            'client'      => 'Quadro Collective',
            'year'        => '2026',
            'excerpt'     => 'Modern dark-themed agency portfolio showcasing 4 engineering roles with custom post types and dynamic AJAX contact interactions.',
            'content'     => 'The flagship group portfolio website developed using WordPress best practices, mobile-first design, and clean modular PHP code.',
            'featured'    => '0'
        ),
    );

    foreach ($projects_data as $p) {
        $existing = get_page_by_title($p['title'], OBJECT, 'portfolio_project');
        if (!$existing) {
            $project_id = wp_insert_post(array(
                'post_title'   => $p['title'],
                'post_content' => $p['content'],
                'post_excerpt' => $p['excerpt'],
                'post_status'  => 'publish',
                'post_type'    => 'portfolio_project',
            ));

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

