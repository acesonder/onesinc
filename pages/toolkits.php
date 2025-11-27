<?php
/**
 * OUTSSINC Platform - Toolkits Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Toolkits';
require_once dirname(__DIR__) . '/includes/header.php';

// Demo toolkit data
$toolkits = [
    [
        'title' => 'Housing Search Toolkit',
        'description' => 'A step-by-step guide to finding housing in Northumberland County, including resources, tips for applications, and tenant rights.',
        'icon' => 'fa-home',
        'color' => '#28a745',
        'topics' => ['Rental search strategies', 'Application tips', 'Tenant rights', 'Local housing resources']
    ],
    [
        'title' => 'Mental Health Self-Care',
        'description' => 'Tools and techniques for managing your mental health day-to-day, including coping strategies, grounding exercises, and when to seek help.',
        'icon' => 'fa-brain',
        'color' => '#6f42c1',
        'topics' => ['Coping techniques', 'Grounding exercises', 'Crisis planning', 'Self-care routines']
    ],
    [
        'title' => 'Financial Basics',
        'description' => 'Practical tools for managing money, budgeting, dealing with debt, and accessing financial assistance programs.',
        'icon' => 'fa-dollar-sign',
        'color' => '#17a2b8',
        'topics' => ['Budgeting basics', 'Debt management', 'Ontario Works guide', 'Bill assistance programs']
    ],
    [
        'title' => 'Recovery Roadmap',
        'description' => 'Resources and tools for those on a recovery journey, including harm reduction, treatment options, and building a support network.',
        'icon' => 'fa-heart',
        'color' => '#d80032',
        'topics' => ['Harm reduction', 'Treatment options', 'SMART goals', 'Building support']
    ],
    [
        'title' => 'ID & Documents Guide',
        'description' => 'How to obtain or replace important documents like birth certificates, health cards, and government ID when you have limited resources.',
        'icon' => 'fa-id-card',
        'color' => '#fd7e14',
        'topics' => ['Birth certificate', 'Ontario Health Card', 'Photo ID', 'SIN replacement']
    ],
    [
        'title' => 'Employment Essentials',
        'description' => 'Everything you need to find work, including resume templates, interview tips, and job search resources.',
        'icon' => 'fa-briefcase',
        'color' => '#007bff',
        'topics' => ['Resume writing', 'Cover letters', 'Interview prep', 'Job boards']
    ]
];
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Toolkits</span>
    </nav>
    <h1>Resource Toolkits</h1>
    <p>Free downloadable guides and resources to help you navigate life's challenges.</p>
</div>

<section class="section bg-light">
    <div class="container" style="max-width: 1200px;">
        
        <div class="grid grid-2" style="gap: var(--spacing-xl);">
            <?php foreach ($toolkits as $toolkit): ?>
            <div class="card" style="padding: var(--spacing-xl);">
                <div style="display: flex; gap: var(--spacing-lg); align-items: flex-start;">
                    <div style="width: 70px; height: 70px; background: <?php echo $toolkit['color']; ?>; border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <i class="fas <?php echo $toolkit['icon']; ?>" style="font-size: 1.75rem; color: white;"></i>
                    </div>
                    <div style="flex: 1;">
                        <h3 style="margin-bottom: var(--spacing-sm);"><?php echo htmlspecialchars($toolkit['title']); ?></h3>
                        <p class="text-muted" style="margin-bottom: var(--spacing-md);">
                            <?php echo htmlspecialchars($toolkit['description']); ?>
                        </p>
                        <div style="margin-bottom: var(--spacing-lg);">
                            <strong style="font-size: 0.9rem;">What's Inside:</strong>
                            <ul style="margin: var(--spacing-sm) 0 0 var(--spacing-lg); color: var(--color-gray);">
                                <?php foreach ($toolkit['topics'] as $topic): ?>
                                <li><?php echo htmlspecialchars($topic); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <button class="btn btn-outline btn-sm">
                            <i class="fas fa-download"></i> Download PDF
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>
</section>

<section class="section bg-white">
    <div class="container" style="max-width: 800px; text-align: center;">
        <h2><i class="fas fa-lightbulb text-primary"></i> Need Something Specific?</h2>
        <p class="text-muted" style="margin-bottom: var(--spacing-xl);">
            Don't see what you need? We're always creating new resources based on community needs. 
            Let us know what would help you.
        </p>
        <a href="/pages/feedback.php" class="btn btn-primary btn-lg">
            <i class="fas fa-comment"></i> Request a Toolkit
        </a>
    </div>
</section>

<section class="section bg-light">
    <div class="container" style="max-width: 1000px;">
        <div class="section-header">
            <h2>More Learning Resources</h2>
            <p>Explore our other educational content.</p>
        </div>
        
        <div class="grid grid-2" style="gap: var(--spacing-lg);">
            <a href="/pages/courses.php" class="card" style="text-decoration: none; color: inherit; padding: var(--spacing-xl); display: flex; align-items: center; gap: var(--spacing-lg);">
                <i class="fas fa-graduation-cap fa-2x text-primary"></i>
                <div>
                    <h4 style="margin-bottom: var(--spacing-xs);">Online Courses</h4>
                    <p class="text-muted" style="margin: 0;">Self-paced learning modules on various topics.</p>
                </div>
                <i class="fas fa-arrow-right text-primary" style="margin-left: auto;"></i>
            </a>
            
            <a href="/pages/webinars.php" class="card" style="text-decoration: none; color: inherit; padding: var(--spacing-xl); display: flex; align-items: center; gap: var(--spacing-lg);">
                <i class="fas fa-video fa-2x text-primary"></i>
                <div>
                    <h4 style="margin-bottom: var(--spacing-xs);">Webinars</h4>
                    <p class="text-muted" style="margin: 0;">Live and recorded educational sessions.</p>
                </div>
                <i class="fas fa-arrow-right text-primary" style="margin-left: auto;"></i>
            </a>
        </div>
    </div>
</section>

<script>
document.querySelectorAll('button[class*="btn-outline"]').forEach(function(btn) {
    btn.addEventListener('click', function() {
        alert('In a live system, this would download the PDF toolkit. Contact us for a copy!');
    });
});
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
