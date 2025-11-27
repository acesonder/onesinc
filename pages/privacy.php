<?php
/**
 * OUTSSINC Platform - Privacy Policy Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Privacy Policy';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Privacy Policy</span>
    </nav>
    <h1>Privacy Policy</h1>
    <p>How we collect, use, and protect your information.</p>
</div>

<section class="section bg-white">
    <div class="container" style="max-width: 800px;">
        
        <p style="color: var(--color-gray); font-style: italic;">Last updated: <?php echo date('F j, Y'); ?></p>
        
        <h2>Our Commitment to Your Privacy</h2>
        <p>At OUTSSINC, we understand that privacy is especially important for the people we serve. Many of our clients are in vulnerable situations, and protecting your personal information is a core part of our mission. This policy explains how we handle your data.</p>
        
        <h2 style="margin-top: var(--spacing-2xl);">Information We Collect</h2>
        
        <h3>Information You Provide</h3>
        <ul style="margin-left: var(--spacing-xl);">
            <li><strong>Contact information:</strong> Name, email, phone number, address</li>
            <li><strong>Intake information:</strong> Details about your situation and needs that you share with us</li>
            <li><strong>Account information:</strong> Username, password (encrypted), preferences</li>
            <li><strong>Communication records:</strong> Messages and chat history with our team</li>
        </ul>
        
        <h3>Information Collected Automatically</h3>
        <ul style="margin-left: var(--spacing-xl);">
            <li><strong>Usage data:</strong> How you interact with our website (pages visited, features used)</li>
            <li><strong>Device information:</strong> Browser type, device type, operating system</li>
            <li><strong>Log data:</strong> IP address, access times, error logs (for security and troubleshooting)</li>
        </ul>
        
        <h2 style="margin-top: var(--spacing-2xl);">How We Use Your Information</h2>
        <p>We use your information to:</p>
        <ul style="margin-left: var(--spacing-xl);">
            <li>Provide peer support services and connect you with resources</li>
            <li>Communicate with you about your care and appointments</li>
            <li>Improve our services based on usage patterns</li>
            <li>Ensure the security and integrity of our platform</li>
            <li>Comply with legal obligations</li>
        </ul>
        
        <h2 style="margin-top: var(--spacing-2xl);">Information Sharing</h2>
        <p>We do <strong>NOT</strong> sell your personal information. We may share information only in these circumstances:</p>
        <ul style="margin-left: var(--spacing-xl);">
            <li><strong>With your consent:</strong> When you give us explicit permission to share with partner agencies</li>
            <li><strong>For safety:</strong> If there is an immediate risk to your life or the life of others</li>
            <li><strong>Legal requirements:</strong> When required by law or court order</li>
            <li><strong>Service providers:</strong> With trusted partners who help us operate (e.g., hosting providers), under strict confidentiality agreements</li>
        </ul>
        
        <h2 style="margin-top: var(--spacing-2xl);">Data Security</h2>
        <p>We take extensive measures to protect your information:</p>
        <ul style="margin-left: var(--spacing-xl);">
            <li>Encryption of data in transit and at rest</li>
            <li>Secure authentication and access controls</li>
            <li>Regular security audits and updates</li>
            <li>Staff training on confidentiality and data protection</li>
            <li>Limited access on a need-to-know basis</li>
        </ul>
        
        <h2 style="margin-top: var(--spacing-2xl);">Your Rights</h2>
        <p>You have the right to:</p>
        <ul style="margin-left: var(--spacing-xl);">
            <li><strong>Access:</strong> Request a copy of your personal data</li>
            <li><strong>Correction:</strong> Update or correct inaccurate information</li>
            <li><strong>Deletion:</strong> Request deletion of your data (subject to legal retention requirements)</li>
            <li><strong>Portability:</strong> Receive your data in a portable format</li>
            <li><strong>Withdraw consent:</strong> Change your mind about information sharing at any time</li>
        </ul>
        
        <h2 style="margin-top: var(--spacing-2xl);">Data Retention</h2>
        <p>We retain your information only as long as necessary to provide services and comply with legal requirements. When you request deletion, we will remove your data within <?php echo DELETION_COOLING_PERIOD; ?> days, unless required by law to retain it longer.</p>
        
        <h2 style="margin-top: var(--spacing-2xl);">Cookies and Tracking</h2>
        <p>We use essential cookies to operate our website (such as keeping you logged in). We do not use advertising or tracking cookies. You can control cookies through your browser settings.</p>
        
        <h2 style="margin-top: var(--spacing-2xl);">Quick Exit Feature</h2>
        <p>Our website includes a "Quick Exit" button for your safety. Clicking it will immediately redirect you to a neutral website. This feature does not clear your browser history—please clear your history manually if needed.</p>
        
        <h2 style="margin-top: var(--spacing-2xl);">Contact Us</h2>
        <p>For privacy questions or to exercise your rights, contact us at:</p>
        <div class="card" style="padding: var(--spacing-lg); margin-top: var(--spacing-md);">
            <p><strong>Email:</strong> <a href="mailto:privacy@outssinc.org">privacy@outssinc.org</a></p>
            <p><strong>Phone:</strong> <?php echo SITE_PHONE; ?></p>
            <p style="margin: 0;"><strong>Mail:</strong> Privacy Officer, OUTSSINC, Cobourg, Ontario, Canada</p>
        </div>
        
        <h2 style="margin-top: var(--spacing-2xl);">Changes to This Policy</h2>
        <p>We may update this policy from time to time. Significant changes will be announced on our website. The "Last updated" date at the top indicates when this policy was last revised.</p>
        
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
