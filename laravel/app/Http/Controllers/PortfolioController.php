<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // Route 1 → View 1: home.blade.php
    public function index()
    {
        return view('home');
    }

    // Route 2 → View 2: about.blade.php
    public function about()
    {
        $skills = [
            'Languages'  => ['PHP', 'JavaScript', 'TypeScript', 'Python', 'SQL'],
            'Frameworks' => ['Laravel', 'Vue.js', 'React', 'Tailwind CSS', 'Alpine.js'],
            'Tools'      => ['Git', 'Docker', 'MySQL', 'PostgreSQL', 'Redis'],
            'Cloud'      => ['AWS', 'DigitalOcean', 'Forge', 'CI/CD Pipelines'],
        ];

        return view('about', compact('skills'));
    }

    // Route 3 → View 3: projects/index.blade.php
    public function projects()
    {
        $projects = [
            [
                'slug'        => 'ecommerce-platform',
                'title'       => 'E-Commerce Platform',
                'description' => 'A full-featured online store built with Laravel & Vue.js, supporting multi-vendor, payments, and real-time inventory.',
                'tags'        => ['Laravel', 'Vue.js', 'Stripe', 'MySQL'],
                'year'        => '2024',
                'image'       => null,
            ],
            [
                'slug'        => 'task-management-app',
                'title'       => 'Task Management App',
                'description' => 'Kanban-style productivity tool with real-time updates via Laravel Echo & Pusher.',
                'tags'        => ['Laravel', 'Livewire', 'Tailwind', 'Redis'],
                'year'        => '2024',
                'image'       => null,
            ],
            [
                'slug'        => 'analytics-dashboard',
                'title'       => 'Analytics Dashboard',
                'description' => 'Data visualization dashboard with custom chart components and CSV export.',
                'tags'        => ['React', 'Chart.js', 'REST API', 'TypeScript'],
                'year'        => '2023',
                'image'       => null,
            ],
            [
                'slug'        => 'api-gateway',
                'title'       => 'RESTful API Gateway',
                'description' => 'Microservice API gateway with rate limiting, JWT auth, and full Swagger documentation.',
                'tags'        => ['Laravel', 'Sanctum', 'Docker', 'PostgreSQL'],
                'year'        => '2023',
                'image'       => null,
            ],
            [
                'slug'        => 'portfolio-cms',
                'title'       => 'Portfolio CMS',
                'description' => 'Headless CMS built from scratch for managing portfolio content with a clean admin panel.',
                'tags'        => ['Laravel', 'Blade', 'Alpine.js', 'SQLite'],
                'year'        => '2022',
                'image'       => null,
            ],
        ];

        return view('projects.index', compact('projects'));
    }

    // Route 4 → View 4: projects/show.blade.php
    public function projectShow(string $slug)
    {
        $projects = [
            'ecommerce-platform' => [
                'title'       => 'E-Commerce Platform',
                'description' => 'A full-featured online store built with Laravel & Vue.js.',
                'long_desc'   => 'This project involved building a complete multi-vendor marketplace with real-time inventory tracking, Stripe payment integration, order management, and a custom admin panel. The frontend was built in Vue.js with a Tailwind CSS design system.',
                'tags'        => ['Laravel', 'Vue.js', 'Stripe', 'MySQL'],
                'year'        => '2024',
                'github'      => 'https://github.com/benedictrosas',
                'live'        => '#',
                'challenges'  => 'Handling concurrent inventory updates and payment retries required careful queue management with Laravel Horizon.',
                'lessons'     => 'Deep-dived into event sourcing and CQRS patterns to ensure data integrity at scale.',
            ],
            'task-management-app' => [
                'title'       => 'Task Management App',
                'description' => 'Kanban-style productivity tool with real-time updates.',
                'long_desc'   => 'Built a full Kanban board with drag-and-drop, user assignments, deadlines, and real-time collaboration powered by Laravel Echo and Pusher WebSockets.',
                'tags'        => ['Laravel', 'Livewire', 'Tailwind', 'Redis'],
                'year'        => '2024',
                'github'      => 'https://github.com/benedictrosas',
                'live'        => '#',
                'challenges'  => 'Syncing drag-and-drop state across multiple users in real-time without conflicts.',
                'lessons'     => 'Learned optimistic UI updates and conflict resolution strategies.',
            ],
        ];

        $project = $projects[$slug] ?? $projects['ecommerce-platform'];
        $project['slug'] = $slug;

        return view('projects.show', compact('project'));
    }

    // Route 5 → View 5: skills.blade.php
    public function skills()
    {
        $skillGroups = [
            [
                'category' => 'Backend',
                'icon'     => '⚙️',
                'items'    => [
                    ['name' => 'PHP / Laravel', 'level' => 95],
                    ['name' => 'RESTful APIs',  'level' => 92],
                    ['name' => 'Python',         'level' => 75],
                    ['name' => 'Node.js',        'level' => 70],
                ],
            ],
            [
                'category' => 'Frontend',
                'icon'     => '🎨',
                'items'    => [
                    ['name' => 'Vue.js',         'level' => 90],
                    ['name' => 'React',          'level' => 82],
                    ['name' => 'Tailwind CSS',   'level' => 95],
                    ['name' => 'Alpine.js',      'level' => 88],
                ],
            ],
            [
                'category' => 'Database',
                'icon'     => '🗄️',
                'items'    => [
                    ['name' => 'MySQL',          'level' => 90],
                    ['name' => 'PostgreSQL',     'level' => 85],
                    ['name' => 'Redis',          'level' => 80],
                    ['name' => 'SQLite',         'level' => 88],
                ],
            ],
            [
                'category' => 'DevOps',
                'icon'     => '🚀',
                'items'    => [
                    ['name' => 'Docker',         'level' => 78],
                    ['name' => 'Git / GitHub',   'level' => 95],
                    ['name' => 'AWS / Cloud',    'level' => 72],
                    ['name' => 'CI/CD',          'level' => 75],
                ],
            ],
        ];

        return view('skills', compact('skillGroups'));
    }

    // Route 6 → View 6: experience.blade.php
    public function experience()
    {
        $experiences = [
            [
                'role'        => 'Senior Full Stack Developer',
                'company'     => 'TechForge Solutions',
                'period'      => '2022 – Present',
                'location'    => 'Manila, PH (Remote)',
                'description' => 'Lead developer on enterprise SaaS products serving 50,000+ users. Architected microservices with Laravel, managed a team of 4 developers, and drove 40% performance improvement across core APIs.',
                'highlights'  => ['Laravel Microservices', 'Team Lead', 'AWS Deployment', 'CI/CD Setup'],
            ],
            [
                'role'        => 'Web Developer',
                'company'     => 'Pixel Craft Agency',
                'period'      => '2020 – 2022',
                'location'    => 'Cavite, PH',
                'description' => 'Built client websites and web apps across e-commerce, healthcare, and education. Introduced Tailwind CSS and Livewire to the team\'s stack, cutting frontend development time by 30%.',
                'highlights'  => ['Laravel', 'Livewire', 'Vue.js', 'Client Delivery'],
            ],
            [
                'role'        => 'Junior PHP Developer',
                'company'     => 'StartupHub PH',
                'period'      => '2018 – 2020',
                'location'    => 'Cavite, PH',
                'description' => 'Maintained and extended legacy PHP codebases, gradually migrating them to Laravel. Gained strong foundations in MVC, database design, and RESTful API development.',
                'highlights'  => ['PHP', 'MySQL', 'REST APIs', 'Laravel Migration'],
            ],
        ];

        $education = [
            [
                'degree'  => 'Bachelor of Science in Information Technology',
                'school'  => 'Cavite State University',
                'period'  => '2014 – 2018',
                'honors'  => 'Cum Laude',
            ],
        ];

        return view('experience', compact('experiences', 'education'));
    }

    // Route 7 → View 7: blog/index.blade.php
    public function blog()
    {
        $posts = [
            [
                'slug'      => 'laravel-performance-tips',
                'title'     => 'Laravel Performance Tips I Use Every Day',
                'excerpt'   => 'From query optimization to caching strategies — practical techniques that actually make a measurable difference in production apps.',
                'date'      => 'April 20, 2025',
                'tags'      => ['Laravel', 'Performance', 'PHP'],
                'read_time' => '6 min read',
            ],
            [
                'slug'      => 'vue-vs-react-in-2025',
                'title'     => 'Vue vs React in 2025: A Laravel Dev\'s Perspective',
                'excerpt'   => 'After building projects with both, here\'s my honest take on which one pairs better with Laravel backends.',
                'date'      => 'March 10, 2025',
                'tags'      => ['Vue.js', 'React', 'Frontend'],
                'read_time' => '8 min read',
            ],
            [
                'slug'      => 'tailwind-tips',
                'title'     => 'Tailwind CSS Patterns That Clean Up Your Blade Files',
                'excerpt'   => 'Reusable component patterns and @apply strategies that keep your Blade templates lean and maintainable.',
                'date'      => 'January 28, 2025',
                'tags'      => ['Tailwind', 'Blade', 'CSS'],
                'read_time' => '5 min read',
            ],
        ];

        return view('blog.index', compact('posts'));
    }

    // Route 8 → View 8: blog/show.blade.php
    public function blogShow(string $slug)
    {
        $post = [
            'title'     => 'Laravel Performance Tips I Use Every Day',
            'slug'      => $slug,
            'date'      => 'April 20, 2025',
            'tags'      => ['Laravel', 'Performance', 'PHP'],
            'read_time' => '6 min read',
            'content'   => "
                <h2>1. Eager Load Relationships</h2>
                <p>The N+1 query problem is the #1 performance killer in Laravel. Always use <code>with()</code> when accessing related models in a loop.</p>
                <pre><code>// Bad\n\$users = User::all();\nforeach (\$users as \$user) { echo \$user->profile->bio; }\n\n// Good\n\$users = User::with('profile')->get();</code></pre>

                <h2>2. Use Select to Limit Columns</h2>
                <p>Never pull columns you don't need. Using <code>select()</code> reduces memory usage and query time significantly on large tables.</p>
                <pre><code>\$users = User::select('id', 'name', 'email')->get();</code></pre>

                <h2>3. Cache Expensive Queries</h2>
                <p>Use Laravel's built-in cache for data that doesn't change frequently. Even a 60-second cache on a heavy report query can save thousands of DB hits per hour.</p>
                <pre><code>\$stats = Cache::remember('dashboard_stats', 60, fn() => Stats::compute());</code></pre>

                <h2>4. Index Your Database Columns</h2>
                <p>Add indexes on every column used in <code>WHERE</code>, <code>ORDER BY</code>, or <code>JOIN</code> clauses. A single missing index on a million-row table can make a query 100x slower.</p>

                <h2>5. Queue Long-Running Tasks</h2>
                <p>Never process emails, PDFs, or API calls synchronously in a request. Push them to a queue with Laravel Horizon and return a fast response to the user.</p>
            ",
        ];

        return view('blog.show', compact('post'));
    }

    // Route 9 → contact.blade.php (shared with GET)
    public function contact()
    {
        return view('contact');
    }

    // Route 10: Handle Contact Form POST
    public function contactSend(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|min:10',
        ]);

        // Mail::to('benedict@example.com')->send(new ContactMail($request->all()));

        return redirect()->route('contact')->with('success', 'Thanks for reaching out! I\'ll get back to you within 24 hours.');
    }
}