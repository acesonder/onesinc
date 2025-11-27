<?php
/**
 * OUTSSINC Platform - Courses Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Online Courses';
require_once dirname(__DIR__) . '/includes/header.php';

// Demo course data
$courses = [
    [
        'title' => 'Understanding Mental Health',
        'description' => 'Learn about common mental health challenges, how to recognize them, and strategies for self-care and getting help.',
        'duration' => '2 hours',
        'modules' => 5,
        'level' => 'Beginner',
        'icon' => 'fa-brain',
        'color' => '#6f42c1'
    ],
    [
        'title' => 'Navigating the Housing System',
        'description' => 'A practical guide to finding and keeping housing, understanding tenant rights, and accessing housing support.',
        'duration' => '1.5 hours',
        'modules' => 4,
        'level' => 'Beginner',
        'icon' => 'fa-home',
        'color' => '#28a745'
    ],
    [
        'title' => 'Recovery Fundamentals',
        'description' => 'An introduction to recovery concepts, harm reduction, and building a life beyond addiction.',
        'duration' => '3 hours',
        'modules' => 6,
        'level' => 'Beginner',
        'icon' => 'fa-heart',
        'color' => '#d80032'
    ],
    [
        'title' => 'Financial Literacy Basics',
        'description' => 'Learn budgeting, managing debt, understanding credit, and accessing financial assistance programs.',
        'duration' => '2 hours',
        'modules' => 5,
        'level' => 'Beginner',
        'icon' => 'fa-dollar-sign',
        'color' => '#17a2b8'
    ],
    [
        'title' => 'Peer Support Training',
        'description' => 'Foundation training for those interested in becoming peer support workers. Learn core skills and principles.',
        'duration' => '10 hours',
        'modules' => 12,
        'level' => 'Intermediate',
        'icon' => 'fa-hands-helping',
        'color' => '#fd7e14'
    ],
    [
        'title' => 'Stress Management & Coping',
        'description' => 'Practical techniques for managing stress, anxiety, and difficult emotions in daily life.',
        'duration' => '1.5 hours',
        'modules' => 4,
        'level' => 'Beginner',
        'icon' => 'fa-spa',
        'color' => '#e83e8c'
    ]
];
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Courses</span>
    </nav>
    <h1>Online Learning</h1>
    <p>Free self-paced courses to help you learn new skills and understand resources.</p>
</div>

<section class="section bg-light">
    <div class="container" style="max-width: 1200px;">
        
        <div class="alert alert-info" style="margin-bottom: var(--spacing-2xl);">
            <i class="fas fa-graduation-cap"></i>
            <div>
                <strong>All courses are free and self-paced.</strong>
                <p style="margin: 0;">Create an account to track your progress and earn certificates.</p>
            </div>
        </div>
        
        <div class="grid grid-3" style="gap: var(--spacing-xl);">
            <?php foreach ($courses as $course): ?>
            <div class="card" style="padding: 0; overflow: hidden;">
                <div style="background: <?php echo $course['color']; ?>; padding: var(--spacing-xl); text-align: center; color: white;">
                    <i class="fas <?php echo $course['icon']; ?>" style="font-size: 3rem;"></i>
                </div>
                <div style="padding: var(--spacing-xl);">
                    <h3 style="margin-bottom: var(--spacing-sm);"><?php echo htmlspecialchars($course['title']); ?></h3>
                    <p class="text-muted" style="margin-bottom: var(--spacing-lg); font-size: 0.95rem;">
                        <?php echo htmlspecialchars($course['description']); ?>
                    </p>
                    
                    <div style="display: flex; flex-wrap: wrap; gap: var(--spacing-sm); margin-bottom: var(--spacing-lg);">
                        <span class="badge badge-light"><i class="fas fa-clock"></i> <?php echo $course['duration']; ?></span>
                        <span class="badge badge-light"><i class="fas fa-book"></i> <?php echo $course['modules']; ?> Modules</span>
                        <span class="badge badge-light"><i class="fas fa-signal"></i> <?php echo $course['level']; ?></span>
                    </div>
                    
                    <button class="btn btn-primary btn-block">
                        <i class="fas fa-play"></i> Start Course
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>
</section>

<section class="section bg-white">
    <div class="container" style="max-width: 900px;">
        <div class="section-header">
            <h2>How It Works</h2>
            <p>Our courses are designed to be accessible and helpful for everyone.</p>
        </div>
        
        <div class="grid grid-4" style="gap: var(--spacing-lg); text-align: center;">
            <div>
                <div style="width: 60px; height: 60px; background: var(--color-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-md); font-size: 1.5rem; font-weight: 700; color: var(--color-primary);">1</div>
                <h4>Choose a Course</h4>
                <p class="text-muted" style="font-size: 0.9rem;">Pick a topic that interests you or addresses a current need.</p>
            </div>
            
            <div>
                <div style="width: 60px; height: 60px; background: var(--color-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-md); font-size: 1.5rem; font-weight: 700; color: var(--color-primary);">2</div>
                <h4>Learn at Your Pace</h4>
                <p class="text-muted" style="font-size: 0.9rem;">Complete modules whenever it works for you. Save your progress.</p>
            </div>
            
            <div>
                <div style="width: 60px; height: 60px; background: var(--color-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-md); font-size: 1.5rem; font-weight: 700; color: var(--color-primary);">3</div>
                <h4>Practice Skills</h4>
                <p class="text-muted" style="font-size: 0.9rem;">Each course includes activities and reflection exercises.</p>
            </div>
            
            <div>
                <div style="width: 60px; height: 60px; background: var(--color-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-md); font-size: 1.5rem; font-weight: 700; color: var(--color-primary);">4</div>
                <h4>Get Certified</h4>
                <p class="text-muted" style="font-size: 0.9rem;">Earn a certificate when you complete a course.</p>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="cta-content">
        <h2>Want to Create a Course?</h2>
        <p>If you're an expert or have valuable lived experience to share, we'd love to collaborate.</p>
        <a href="/pages/contact.php" class="btn btn-lg btn-white">
            <i class="fas fa-envelope"></i> Get in Touch
        </a>
    </div>
</section>

<script>
document.querySelectorAll('.btn-primary').forEach(function(btn) {
    if (btn.textContent.includes('Start Course')) {
        btn.addEventListener('click', function() {
            alert('To track your progress, please create an account or log in. Course content will be available soon!');
        });
    }
});
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
