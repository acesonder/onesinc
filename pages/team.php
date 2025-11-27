<?php
/**
 * OUTSSINC Platform - Meet the Team Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Meet the Team';
require_once dirname(__DIR__) . '/includes/header.php';

// Demo team data
$team = [
    [
        'name' => 'Sarah Williams',
        'role' => 'Executive Director',
        'bio' => 'Sarah has over 15 years of experience in community outreach and peer support. Her own journey through recovery drives her passion for helping others.',
        'initials' => 'SW',
        'color' => '#d80032'
    ],
    [
        'name' => 'Michael Chen',
        'role' => 'Lead Peer Support Worker',
        'bio' => 'Michael brings lived experience with homelessness and mental health challenges. He now leads our peer support team with empathy and understanding.',
        'initials' => 'MC',
        'color' => '#6f42c1'
    ],
    [
        'name' => 'Jennifer Davis',
        'role' => 'Program Coordinator',
        'bio' => 'Jennifer coordinates our programs and partnerships, ensuring that every client gets connected to the right resources at the right time.',
        'initials' => 'JD',
        'color' => '#28a745'
    ],
    [
        'name' => 'David Thompson',
        'role' => 'Community Outreach Specialist',
        'bio' => 'David is out in the community every day, meeting people where they are and building relationships that lead to lasting change.',
        'initials' => 'DT',
        'color' => '#17a2b8'
    ],
    [
        'name' => 'Lisa Martinez',
        'role' => 'Peer Support Worker',
        'bio' => 'Lisa specializes in supporting individuals dealing with substance use challenges. Her own recovery story inspires hope in others.',
        'initials' => 'LM',
        'color' => '#e83e8c'
    ],
    [
        'name' => 'Robert Wilson',
        'role' => 'Housing Navigator',
        'bio' => 'Robert helps clients navigate the complex housing system, from emergency shelters to permanent housing solutions.',
        'initials' => 'RW',
        'color' => '#fd7e14'
    ]
];
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <a href="/pages/about.php">About</a>
        <span>/</span>
        <span>Meet the Team</span>
    </nav>
    <h1>Meet Our Team</h1>
    <p>Our team is made up of people with lived experience who understand what you're going through.</p>
</div>

<section class="section bg-white">
    <div class="container">
        <div class="section-header">
            <h2>Peer Support Workers</h2>
            <p>Every member of our team has walked a similar path. We use our experiences to help guide others.</p>
        </div>
        
        <div class="grid grid-3" style="max-width: 1200px; margin: 0 auto;">
            <?php foreach ($team as $member): ?>
            <div class="card-3d" style="text-align: center; padding: var(--spacing-xl);">
                <div style="width: 100px; height: 100px; border-radius: 50%; background: <?php echo $member['color']; ?>; color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 700; margin: 0 auto var(--spacing-lg);">
                    <?php echo htmlspecialchars($member['initials']); ?>
                </div>
                <h3 style="margin-bottom: var(--spacing-xs);"><?php echo htmlspecialchars($member['name']); ?></h3>
                <p style="color: var(--color-primary); font-weight: 500; margin-bottom: var(--spacing-md);"><?php echo htmlspecialchars($member['role']); ?></p>
                <p class="text-muted" style="font-size: 0.95rem; line-height: 1.7;"><?php echo htmlspecialchars($member['bio']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="section-header">
            <h2>Join Our Team</h2>
            <p>Do you have lived experience and a passion for helping others? We're always looking for dedicated individuals to join our mission.</p>
        </div>
        
        <div class="text-center">
            <a href="/pages/volunteer.php" class="btn btn-primary btn-lg">
                <i class="fas fa-hand-holding-heart"></i> Volunteer With Us
            </a>
            <a href="/pages/contact.php" class="btn btn-outline btn-lg" style="margin-left: var(--spacing-md);">
                <i class="fas fa-envelope"></i> Contact Us
            </a>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
