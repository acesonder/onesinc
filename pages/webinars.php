<?php
/**
 * OUTSSINC Platform - Webinars Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Webinars';
require_once dirname(__DIR__) . '/includes/header.php';

// Demo webinar data
$upcomingWebinars = [
    [
        'title' => 'Understanding Trauma & Recovery',
        'description' => 'Learn about the impact of trauma and evidence-based approaches to healing.',
        'date' => date('Y-m-d', strtotime('+5 days')),
        'time' => '2:00 PM - 3:30 PM EST',
        'presenter' => 'Dr. Sarah Mitchell',
        'presenter_title' => 'Trauma-Informed Care Specialist'
    ],
    [
        'title' => 'Navigating Ontario Works & ODSP',
        'description' => 'A practical guide to applying for and understanding social assistance programs.',
        'date' => date('Y-m-d', strtotime('+12 days')),
        'time' => '11:00 AM - 12:30 PM EST',
        'presenter' => 'Michael Chen',
        'presenter_title' => 'Benefits Navigator'
    ]
];

$pastWebinars = [
    [
        'title' => 'Peer Support 101',
        'description' => 'An introduction to peer support principles and practices.',
        'recorded_date' => date('Y-m-d', strtotime('-14 days')),
        'duration' => '1 hour 15 minutes',
        'views' => 234
    ],
    [
        'title' => 'Mental Health First Aid Basics',
        'description' => 'Learn to recognize and respond to signs of mental health challenges.',
        'recorded_date' => date('Y-m-d', strtotime('-30 days')),
        'duration' => '1 hour 30 minutes',
        'views' => 456
    ],
    [
        'title' => 'Finding Housing: Tips & Resources',
        'description' => 'Practical strategies for finding affordable housing in our community.',
        'recorded_date' => date('Y-m-d', strtotime('-45 days')),
        'duration' => '1 hour',
        'views' => 312
    ]
];

function formatWebinarDate($date) {
    return date('l, F j, Y', strtotime($date));
}
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Webinars</span>
    </nav>
    <h1>Webinars & Workshops</h1>
    <p>Join live sessions or watch recordings on topics that matter to you.</p>
</div>

<section class="section bg-white">
    <div class="container" style="max-width: 1000px;">
        <h2 style="margin-bottom: var(--spacing-xl);"><i class="fas fa-broadcast-tower text-primary"></i> Upcoming Live Sessions</h2>
        
        <?php if (count($upcomingWebinars) > 0): ?>
            <?php foreach ($upcomingWebinars as $webinar): ?>
            <div class="card" style="padding: var(--spacing-xl); margin-bottom: var(--spacing-lg);">
                <div style="display: flex; gap: var(--spacing-xl); flex-wrap: wrap;">
                    <div style="width: 120px; text-align: center; flex-shrink: 0;">
                        <div style="background: var(--color-primary); color: white; border-radius: var(--border-radius); padding: var(--spacing-lg);">
                            <div style="font-size: 2.5rem; font-weight: 700; line-height: 1;"><?php echo date('d', strtotime($webinar['date'])); ?></div>
                            <div style="font-size: 0.9rem; text-transform: uppercase;"><?php echo date('M', strtotime($webinar['date'])); ?></div>
                        </div>
                    </div>
                    
                    <div style="flex: 1; min-width: 200px;">
                        <span class="badge badge-success" style="margin-bottom: var(--spacing-sm);">Upcoming</span>
                        <h3 style="margin-bottom: var(--spacing-sm);"><?php echo htmlspecialchars($webinar['title']); ?></h3>
                        <p class="text-muted" style="margin-bottom: var(--spacing-md);">
                            <?php echo htmlspecialchars($webinar['description']); ?>
                        </p>
                        
                        <div style="display: flex; flex-wrap: wrap; gap: var(--spacing-lg); margin-bottom: var(--spacing-md); font-size: 0.9rem; color: var(--color-gray);">
                            <span><i class="fas fa-calendar"></i> <?php echo formatWebinarDate($webinar['date']); ?></span>
                            <span><i class="fas fa-clock"></i> <?php echo htmlspecialchars($webinar['time']); ?></span>
                        </div>
                        
                        <div style="background: var(--color-light); padding: var(--spacing-md); border-radius: var(--border-radius-sm); margin-bottom: var(--spacing-lg);">
                            <strong>Presenter:</strong> <?php echo htmlspecialchars($webinar['presenter']); ?>
                            <span class="text-muted"> — <?php echo htmlspecialchars($webinar['presenter_title']); ?></span>
                        </div>
                        
                        <button class="btn btn-primary">
                            <i class="fas fa-user-plus"></i> Register Free
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="card" style="padding: var(--spacing-2xl); text-align: center;">
                <i class="fas fa-calendar-times fa-3x text-muted" style="margin-bottom: var(--spacing-lg);"></i>
                <h3>No Upcoming Webinars</h3>
                <p class="text-muted">Check back soon for new sessions, or browse our recordings below.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="section bg-light">
    <div class="container" style="max-width: 1000px;">
        <h2 style="margin-bottom: var(--spacing-xl);"><i class="fas fa-play-circle text-primary"></i> Watch Past Sessions</h2>
        
        <div class="grid grid-1" style="gap: var(--spacing-lg);">
            <?php foreach ($pastWebinars as $webinar): ?>
            <div class="card" style="padding: var(--spacing-xl); display: flex; gap: var(--spacing-xl); align-items: center; flex-wrap: wrap;">
                <div style="width: 200px; height: 120px; background: var(--color-dark); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; flex-shrink: 0; position: relative;">
                    <i class="fas fa-play-circle" style="font-size: 3rem; color: white; opacity: 0.8;"></i>
                    <span style="position: absolute; bottom: 8px; right: 8px; background: rgba(0,0,0,0.8); color: white; padding: 2px 8px; border-radius: 4px; font-size: 0.8rem;">
                        <?php echo htmlspecialchars($webinar['duration']); ?>
                    </span>
                </div>
                
                <div style="flex: 1; min-width: 200px;">
                    <h3 style="margin-bottom: var(--spacing-sm);"><?php echo htmlspecialchars($webinar['title']); ?></h3>
                    <p class="text-muted" style="margin-bottom: var(--spacing-md);">
                        <?php echo htmlspecialchars($webinar['description']); ?>
                    </p>
                    <div style="display: flex; flex-wrap: wrap; gap: var(--spacing-lg); font-size: 0.85rem; color: var(--color-gray);">
                        <span><i class="fas fa-calendar"></i> Recorded <?php echo date('M j, Y', strtotime($webinar['recorded_date'])); ?></span>
                        <span><i class="fas fa-eye"></i> <?php echo number_format($webinar['views']); ?> views</span>
                    </div>
                </div>
                
                <button class="btn btn-outline">
                    <i class="fas fa-play"></i> Watch
                </button>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="cta-content">
        <h2>Get Notified About New Webinars</h2>
        <p>Subscribe to receive updates when new webinars are scheduled.</p>
        <form style="display: flex; gap: var(--spacing-sm); justify-content: center; max-width: 400px; margin: 0 auto;">
            <input type="email" placeholder="Your email address" style="flex: 1; padding: var(--spacing-md); border: none; border-radius: var(--border-radius);">
            <button type="submit" class="btn btn-white">Subscribe</button>
        </form>
    </div>
</section>

<script>
document.querySelectorAll('button').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        if (this.textContent.includes('Register') || this.textContent.includes('Watch')) {
            e.preventDefault();
            alert('Please create an account or log in to access webinars. This feature will be fully available soon!');
        }
    });
});
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
