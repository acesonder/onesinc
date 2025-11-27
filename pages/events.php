<?php
/**
 * OUTSSINC Platform - Events Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Events';
require_once dirname(__DIR__) . '/includes/header.php';

// Demo events data
$upcomingEvents = [
    [
        'title' => 'Peer Support Coffee Hour',
        'date' => date('Y-m-d', strtotime('+3 days')),
        'time' => '10:00 AM - 12:00 PM',
        'location' => 'Community Centre, Cobourg',
        'description' => 'Drop in for coffee and casual conversation with our peer support team. No appointment needed.',
        'category' => 'Drop-in',
        'color' => '#28a745'
    ],
    [
        'title' => 'Mental Health Awareness Workshop',
        'date' => date('Y-m-d', strtotime('+7 days')),
        'time' => '2:00 PM - 4:00 PM',
        'location' => 'Cobourg Public Library',
        'description' => 'Learn about mental health resources available in our community. Free and open to all.',
        'category' => 'Workshop',
        'color' => '#6f42c1'
    ],
    [
        'title' => 'Community Resource Fair',
        'date' => date('Y-m-d', strtotime('+14 days')),
        'time' => '11:00 AM - 3:00 PM',
        'location' => 'Victoria Park, Cobourg',
        'description' => 'Meet local service providers, access resources, and connect with community support.',
        'category' => 'Community',
        'color' => '#d80032'
    ],
    [
        'title' => 'Recovery Support Group',
        'date' => date('Y-m-d', strtotime('+2 days')),
        'time' => '6:00 PM - 7:30 PM',
        'location' => 'OUTSSINC Office',
        'description' => 'Weekly peer-led support group for those in recovery. Confidential and judgment-free.',
        'category' => 'Support Group',
        'color' => '#17a2b8'
    ]
];

function formatEventDate($date) {
    return date('l, F j, Y', strtotime($date));
}
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Events</span>
    </nav>
    <h1>Upcoming Events</h1>
    <p>Join us at community events, workshops, and support groups.</p>
</div>

<section class="section bg-light">
    <div class="container" style="max-width: 1000px;">
        
        <div class="alert alert-info" style="margin-bottom: var(--spacing-2xl);">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>All events are free and open to the community.</strong>
                <p style="margin: 0;">No registration required unless noted. Just show up and you're welcome!</p>
            </div>
        </div>
        
        <?php foreach ($upcomingEvents as $event): ?>
        <div class="card" style="padding: var(--spacing-xl); margin-bottom: var(--spacing-lg); display: grid; grid-template-columns: 100px 1fr auto; gap: var(--spacing-xl); align-items: start;">
            <div style="text-align: center; background: var(--color-light); padding: var(--spacing-md); border-radius: var(--border-radius); border-top: 4px solid <?php echo $event['color']; ?>;">
                <div style="font-size: 2rem; font-weight: 700; line-height: 1;"><?php echo date('d', strtotime($event['date'])); ?></div>
                <div style="font-size: 0.9rem; color: var(--color-gray); text-transform: uppercase;"><?php echo date('M', strtotime($event['date'])); ?></div>
            </div>
            
            <div>
                <span class="badge" style="background: <?php echo $event['color']; ?>; color: white; margin-bottom: var(--spacing-sm);">
                    <?php echo htmlspecialchars($event['category']); ?>
                </span>
                <h3 style="margin-bottom: var(--spacing-sm);"><?php echo htmlspecialchars($event['title']); ?></h3>
                <p style="color: var(--color-gray); margin-bottom: var(--spacing-md);">
                    <?php echo htmlspecialchars($event['description']); ?>
                </p>
                <div style="display: flex; gap: var(--spacing-lg); flex-wrap: wrap; font-size: 0.9rem; color: var(--color-gray);">
                    <span><i class="fas fa-calendar"></i> <?php echo formatEventDate($event['date']); ?></span>
                    <span><i class="fas fa-clock"></i> <?php echo htmlspecialchars($event['time']); ?></span>
                    <span><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($event['location']); ?></span>
                </div>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: var(--spacing-sm);">
                <button class="btn btn-outline btn-sm"><i class="fas fa-calendar-plus"></i> Add to Calendar</button>
                <button class="btn btn-sm" style="background: var(--color-light);"><i class="fas fa-share"></i> Share</button>
            </div>
        </div>
        <?php endforeach; ?>
        
    </div>
</section>

<section class="section bg-white">
    <div class="container" style="max-width: 800px;">
        <div class="section-header">
            <h2>Recurring Programs</h2>
            <p>These programs run regularly throughout the year.</p>
        </div>
        
        <div class="grid grid-2" style="gap: var(--spacing-lg);">
            <div class="card" style="padding: var(--spacing-xl);">
                <h4><i class="fas fa-coffee text-primary"></i> Coffee Hour</h4>
                <p class="text-muted">Every Monday & Wednesday, 10 AM - 12 PM</p>
                <p>Drop-in for peer support and community connection.</p>
            </div>
            
            <div class="card" style="padding: var(--spacing-xl);">
                <h4><i class="fas fa-heart text-primary"></i> Recovery Group</h4>
                <p class="text-muted">Every Thursday, 6 PM - 7:30 PM</p>
                <p>Peer-led support for those on a recovery journey.</p>
            </div>
            
            <div class="card" style="padding: var(--spacing-xl);">
                <h4><i class="fas fa-users text-primary"></i> Family Support</h4>
                <p class="text-muted">First Tuesday of each month, 7 PM</p>
                <p>For family members supporting someone with challenges.</p>
            </div>
            
            <div class="card" style="padding: var(--spacing-xl);">
                <h4><i class="fas fa-briefcase text-primary"></i> Job Club</h4>
                <p class="text-muted">Every Friday, 1 PM - 3 PM</p>
                <p>Resume help, job search support, and interview prep.</p>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="cta-content">
        <h2>Want to Host an Event?</h2>
        <p>Partner with us to bring community support events to your organization or neighborhood.</p>
        <a href="/pages/contact.php" class="btn btn-lg btn-white">
            <i class="fas fa-envelope"></i> Contact Us
        </a>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
