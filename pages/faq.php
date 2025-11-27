<?php
/**
 * OUTSSINC Platform - FAQ Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Frequently Asked Questions';
require_once dirname(__DIR__) . '/includes/header.php';

// FAQ data organized by category
$faqs = [
    'Getting Started' => [
        [
            'question' => 'What is OUTSSINC?',
            'answer' => 'OUTSSINC (Outreach Someone In Need of Change) is a peer support organization based in Cobourg, Ontario. We provide support from people with lived experience who understand the challenges you may be facing—whether that\'s housing insecurity, mental health struggles, addiction, or other life obstacles.'
        ],
        [
            'question' => 'Is your service free?',
            'answer' => 'Yes, all of our peer support services are completely free. We are funded by donations and grants, and we never charge clients for our support.'
        ],
        [
            'question' => 'How do I get help?',
            'answer' => 'You can reach out to us in several ways: complete our online intake assessment, call our phone line, drop into one of our community events, or chat with us online. We meet you where you\'re at.'
        ],
        [
            'question' => 'Do I need a referral?',
            'answer' => 'No referral is needed. You can self-refer at any time. We also accept referrals from hospitals, shelters, social workers, and other agencies if that\'s how you prefer to connect.'
        ]
    ],
    'About Peer Support' => [
        [
            'question' => 'What is a peer support worker?',
            'answer' => 'A peer support worker is someone who has their own lived experience with challenges like mental health issues, addiction, homelessness, or other difficulties. They use their experience to connect with and support others going through similar situations. They are not therapists or counselors, but rather allies who have walked a similar path.'
        ],
        [
            'question' => 'Is my information confidential?',
            'answer' => 'Yes, your information is kept strictly confidential. We only share information with your explicit consent, unless there is an immediate risk to your safety or the safety of others. We take privacy very seriously.'
        ],
        [
            'question' => 'What kind of help can I get?',
            'answer' => 'We can help with a wide range of challenges including: housing (finding housing, eviction prevention), mental health support, substance use support, food security, financial assistance, help obtaining ID documents, employment support, navigating social services, and much more.'
        ]
    ],
    'Using Our Services' => [
        [
            'question' => 'How often can I meet with a peer support worker?',
            'answer' => 'Meeting frequency depends on your needs and preferences. Some clients meet weekly, others as needed. We work with you to create a schedule that works for your situation.'
        ],
        [
            'question' => 'Can I get help remotely?',
            'answer' => 'Yes! We offer both in-person and virtual support. You can meet with a peer support worker via video call, phone, or chat based on what\'s most comfortable for you.'
        ],
        [
            'question' => 'What if I\'m in crisis right now?',
            'answer' => 'If you\'re in immediate crisis, please call our 24/7 crisis line at ' . CRISIS_LINE . ' or call 911. Our crisis line is staffed around the clock and can connect you with immediate support.'
        ],
        [
            'question' => 'Can you help my family member?',
            'answer' => 'We primarily work directly with individuals, but we understand that families are affected too. We can provide resources for family members and offer guidance on how to support your loved one.'
        ]
    ],
    'Technical Questions' => [
        [
            'question' => 'How do I create an account?',
            'answer' => 'Click the "Client Portal" button in the navigation and select "Create an account." You\'ll need an email address and phone number for verification. Your account lets you track your goals, message your support worker, and access resources.'
        ],
        [
            'question' => 'I forgot my password. What do I do?',
            'answer' => 'On the login page, click "Forgot password?" and enter your email address. We\'ll send you a link to reset your password. If you don\'t receive the email, check your spam folder or contact us for help.'
        ],
        [
            'question' => 'What is the "Quick Exit" button?',
            'answer' => 'The red button in the corner of the screen is a safety feature. If you need to quickly leave the site for any reason (for example, if someone is looking over your shoulder), clicking it will immediately take you to a weather website. Your privacy and safety are our priority.'
        ]
    ]
];
?>

<style>
.faq-container {
    max-width: 900px;
    margin: 0 auto;
    padding: var(--spacing-xl);
}

.faq-category {
    margin-bottom: var(--spacing-2xl);
}

.faq-category h2 {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    margin-bottom: var(--spacing-lg);
    color: var(--color-primary);
}

.faq-item {
    background: white;
    border-radius: var(--border-radius);
    margin-bottom: var(--spacing-md);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
}

.faq-question {
    width: 100%;
    background: none;
    border: none;
    padding: var(--spacing-lg);
    text-align: left;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: var(--spacing-md);
    transition: background 0.2s;
}

.faq-question:hover {
    background: var(--color-light);
}

.faq-question i {
    color: var(--color-primary);
    transition: transform 0.3s;
}

.faq-item.open .faq-question i {
    transform: rotate(180deg);
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
}

.faq-item.open .faq-answer {
    max-height: 500px;
}

.faq-answer-content {
    padding: 0 var(--spacing-lg) var(--spacing-lg);
    color: var(--color-gray);
    line-height: 1.8;
}
</style>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>FAQ</span>
    </nav>
    <h1>Frequently Asked Questions</h1>
    <p>Find answers to common questions about our services and how we can help.</p>
</div>

<div class="faq-container">
    
    <?php foreach ($faqs as $category => $questions): ?>
    <div class="faq-category">
        <h2><i class="fas fa-folder-open"></i> <?php echo htmlspecialchars($category); ?></h2>
        
        <?php foreach ($questions as $faq): ?>
        <div class="faq-item">
            <button class="faq-question">
                <span><?php echo htmlspecialchars($faq['question']); ?></span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="faq-answer">
                <div class="faq-answer-content">
                    <?php echo htmlspecialchars($faq['answer']); ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
    
    <div class="card" style="text-align: center; padding: var(--spacing-2xl); margin-top: var(--spacing-2xl);">
        <h3><i class="fas fa-question-circle text-primary"></i> Still Have Questions?</h3>
        <p class="text-muted" style="margin-bottom: var(--spacing-lg);">Can't find what you're looking for? We're here to help.</p>
        <div style="display: flex; gap: var(--spacing-md); justify-content: center; flex-wrap: wrap;">
            <a href="/pages/contact.php" class="btn btn-primary">
                <i class="fas fa-envelope"></i> Contact Us
            </a>
            <a href="/pages/chat.php" class="btn btn-outline">
                <i class="fas fa-comments"></i> Chat Now
            </a>
        </div>
    </div>
    
</div>

<script>
document.querySelectorAll('.faq-question').forEach(function(button) {
    button.addEventListener('click', function() {
        var item = this.parentElement;
        var wasOpen = item.classList.contains('open');
        
        // Close all items
        document.querySelectorAll('.faq-item').forEach(function(i) {
            i.classList.remove('open');
        });
        
        // Open clicked item if it wasn't already open
        if (!wasOpen) {
            item.classList.add('open');
        }
    });
});
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
