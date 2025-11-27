<?php
/**
 * OUTSSINC Platform - Terms of Service Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Terms of Service';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Terms of Service</span>
    </nav>
    <h1>Terms of Service</h1>
    <p>Please read these terms carefully before using our services.</p>
</div>

<section class="section bg-white">
    <div class="container" style="max-width: 800px;">
        
        <p style="color: var(--color-gray); font-style: italic;">Last updated: <?php echo date('F j, Y'); ?></p>
        
        <h2>Agreement to Terms</h2>
        <p>By accessing or using the OUTSSINC platform, you agree to be bound by these Terms of Service. If you do not agree to these terms, please do not use our services.</p>
        
        <h2 style="margin-top: var(--spacing-2xl);">Our Services</h2>
        <p>OUTSSINC provides peer support services to individuals facing life challenges. Our services include:</p>
        <ul style="margin-left: var(--spacing-xl);">
            <li>Peer support and counseling from individuals with lived experience</li>
            <li>Resource directory and referral services</li>
            <li>Online tools for goal tracking and support</li>
            <li>Educational content and workshops</li>
        </ul>
        
        <div class="alert alert-warning" style="margin: var(--spacing-xl) 0;">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Important Notice:</strong> OUTSSINC is a peer support organization, not a medical or mental health provider. Our services do not replace professional medical, psychiatric, or legal advice. If you are in crisis, please call <?php echo CRISIS_LINE; ?> or 911.
            </div>
        </div>
        
        <h2 style="margin-top: var(--spacing-2xl);">User Accounts</h2>
        <p>When you create an account, you agree to:</p>
        <ul style="margin-left: var(--spacing-xl);">
            <li>Provide accurate and complete information</li>
            <li>Keep your login credentials secure and not share them</li>
            <li>Notify us immediately of any unauthorized access</li>
            <li>Be responsible for all activity under your account</li>
        </ul>
        
        <h2 style="margin-top: var(--spacing-2xl);">Acceptable Use</h2>
        <p>You agree NOT to use our platform to:</p>
        <ul style="margin-left: var(--spacing-xl);">
            <li>Harass, threaten, or harm other users or staff</li>
            <li>Share false or misleading information</li>
            <li>Violate any laws or regulations</li>
            <li>Attempt to access systems or data you're not authorized to access</li>
            <li>Interfere with the proper functioning of the platform</li>
            <li>Collect personal information about other users without consent</li>
        </ul>
        
        <h2 style="margin-top: var(--spacing-2xl);">Content and Communications</h2>
        <p>When you share information through our platform:</p>
        <ul style="margin-left: var(--spacing-xl);">
            <li>You retain ownership of your personal information and stories</li>
            <li>You grant us permission to use information as needed to provide services</li>
            <li>You understand that peer support conversations may be documented for care continuity</li>
            <li>You agree not to share confidential information about other users</li>
        </ul>
        
        <h2 style="margin-top: var(--spacing-2xl);">Confidentiality</h2>
        <p>We treat all client information as confidential. However, we may need to break confidentiality if:</p>
        <ul style="margin-left: var(--spacing-xl);">
            <li>There is an immediate risk to your life or safety</li>
            <li>There is an immediate risk to the life or safety of others</li>
            <li>We are legally required to disclose information</li>
            <li>You provide written consent for disclosure</li>
        </ul>
        
        <h2 style="margin-top: var(--spacing-2xl);">Limitation of Liability</h2>
        <p>OUTSSINC and its staff, volunteers, and partners are not liable for:</p>
        <ul style="margin-left: var(--spacing-xl);">
            <li>Decisions you make based on peer support conversations</li>
            <li>Outcomes of referrals to external organizations</li>
            <li>Technical issues or service interruptions</li>
            <li>Actions of other users on the platform</li>
        </ul>
        <p>Our services are provided "as is" without warranties of any kind.</p>
        
        <h2 style="margin-top: var(--spacing-2xl);">Termination</h2>
        <p>We may suspend or terminate your access if you violate these terms. You may also close your account at any time by contacting us. Termination does not affect your rights under our Privacy Policy.</p>
        
        <h2 style="margin-top: var(--spacing-2xl);">Changes to Terms</h2>
        <p>We may update these terms from time to time. Continued use of our services after changes constitutes acceptance of the new terms. We will notify users of significant changes.</p>
        
        <h2 style="margin-top: var(--spacing-2xl);">Governing Law</h2>
        <p>These terms are governed by the laws of the Province of Ontario, Canada. Any disputes will be resolved in the courts of Ontario.</p>
        
        <h2 style="margin-top: var(--spacing-2xl);">Contact</h2>
        <p>Questions about these terms? Contact us:</p>
        <div class="card" style="padding: var(--spacing-lg); margin-top: var(--spacing-md);">
            <p><strong>Email:</strong> <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a></p>
            <p style="margin: 0;"><strong>Phone:</strong> <?php echo SITE_PHONE; ?></p>
        </div>
        
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
