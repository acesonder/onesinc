<?php
/**
 * OUTSSINC Platform - Success Stories Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Success Stories';
require_once dirname(__DIR__) . '/includes/header.php';

// Demo stories data
$stories = [
    [
        'name' => 'Maria',
        'initials' => 'M',
        'title' => 'From Homeless to Helping Others',
        'story' => 'After losing my job during the pandemic, I found myself sleeping in my car. I felt ashamed and didn\'t know where to turn. When I connected with OUTSSINC, they didn\'t judge me—they understood because they had been there too. Within three months, they helped me secure housing and now I volunteer to help others in similar situations.',
        'outcome' => 'Secured permanent housing and now volunteers as a peer mentor',
        'category' => 'Housing',
        'color' => '#28a745'
    ],
    [
        'name' => 'James',
        'initials' => 'J',
        'title' => 'Recovery is Possible',
        'story' => 'I struggled with addiction for over a decade. I\'d been to treatment multiple times but always relapsed. What made the difference was having a peer support worker who understood the journey. They didn\'t give up on me when I stumbled. Today, I\'m two years clean and working full-time.',
        'outcome' => 'Two years in recovery and gainfully employed',
        'category' => 'Recovery',
        'color' => '#6f42c1'
    ],
    [
        'name' => 'Sarah',
        'initials' => 'S',
        'title' => 'Finding My Voice Again',
        'story' => 'After leaving an abusive relationship, I had nothing—no ID, no bank account, no sense of self. OUTSSINC helped me with every step: getting my documents, finding safe housing, and connecting with counseling. But most importantly, they helped me believe in myself again.',
        'outcome' => 'Rebuilt her life with new housing and career',
        'category' => 'Fresh Start',
        'color' => '#e83e8c'
    ],
    [
        'name' => 'David',
        'initials' => 'D',
        'title' => 'Mental Health Matters',
        'story' => 'Living with bipolar disorder made it hard to keep a job or maintain relationships. I felt like I was always one step away from crisis. My peer support worker helped me navigate the mental health system and find the right medication and therapy. I finally feel stable.',
        'outcome' => 'Managing mental health and maintaining steady employment',
        'category' => 'Mental Health',
        'color' => '#17a2b8'
    ]
];
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <a href="/pages/about.php">About</a>
        <span>/</span>
        <span>Success Stories</span>
    </nav>
    <h1>Stories of Hope</h1>
    <p>Real stories from real people who have overcome challenges with our support.</p>
</div>

<section class="section bg-light">
    <div class="container">
        <div class="section-header">
            <h2>Every Journey is Unique</h2>
            <p>These stories represent just a few of the hundreds of people we've helped. Names have been changed to protect privacy, but the stories are real.</p>
        </div>
        
        <div style="max-width: 900px; margin: 0 auto;">
            <?php foreach ($stories as $index => $story): ?>
            <div class="card" style="margin-bottom: var(--spacing-xl); padding: var(--spacing-2xl);">
                <div style="display: flex; gap: var(--spacing-xl); align-items: flex-start;">
                    <div style="width: 80px; height: 80px; border-radius: 50%; background: <?php echo $story['color']; ?>; color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 700; flex-shrink: 0;">
                        <?php echo htmlspecialchars($story['initials']); ?>
                    </div>
                    <div style="flex: 1;">
                        <span class="badge" style="background: <?php echo $story['color']; ?>; color: white; margin-bottom: var(--spacing-sm);">
                            <?php echo htmlspecialchars($story['category']); ?>
                        </span>
                        <h3 style="margin-bottom: var(--spacing-md);"><?php echo htmlspecialchars($story['title']); ?></h3>
                        <p style="font-size: 1.1rem; line-height: 1.8; color: var(--color-dark); font-style: italic; margin-bottom: var(--spacing-lg);">
                            "<?php echo htmlspecialchars($story['story']); ?>"
                        </p>
                        <div style="padding: var(--spacing-md); background: var(--color-light); border-radius: var(--border-radius-sm); border-left: 4px solid <?php echo $story['color']; ?>;">
                            <strong><i class="fas fa-check-circle" style="color: <?php echo $story['color']; ?>;"></i> Outcome:</strong> <?php echo htmlspecialchars($story['outcome']); ?>
                        </div>
                        <p style="margin-top: var(--spacing-md); color: var(--color-gray); font-size: 0.9rem;">
                            — <?php echo htmlspecialchars($story['name']); ?>, Community Member
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="cta-content">
        <h2>Your Story Could Be Next</h2>
        <p>No matter where you are on your journey, we're here to help you write the next chapter.</p>
        <div class="cta-buttons">
            <a href="/pages/intake.php" class="btn btn-lg btn-white">
                <i class="fas fa-clipboard-list"></i> Start Your Journey
            </a>
            <a href="/pages/contact.php" class="btn btn-lg btn-outline-white">
                <i class="fas fa-envelope"></i> Get in Touch
            </a>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
