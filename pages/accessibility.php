<?php
/**
 * OUTSSINC Platform - Accessibility Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Accessibility';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Accessibility</span>
    </nav>
    <h1>Accessibility Statement</h1>
    <p>We are committed to ensuring our platform is accessible to everyone.</p>
</div>

<section class="section bg-white">
    <div class="container" style="max-width: 800px;">
        
        <h2>Our Commitment</h2>
        <p>OUTSSINC is committed to providing a website that is accessible to the widest possible audience, regardless of ability or technology. We are actively working to increase the accessibility and usability of our platform.</p>
        
        <h2 style="margin-top: var(--spacing-2xl);">Accessibility Features</h2>
        <p>Our website includes the following accessibility features:</p>
        
        <div class="grid grid-2" style="gap: var(--spacing-lg); margin: var(--spacing-xl) 0;">
            <div class="card" style="padding: var(--spacing-lg);">
                <h4><i class="fas fa-font text-primary"></i> Adjustable Text Size</h4>
                <p class="text-muted">Use the A+ and A- buttons in the navigation to increase or decrease text size for easier reading.</p>
            </div>
            
            <div class="card" style="padding: var(--spacing-lg);">
                <h4><i class="fas fa-adjust text-primary"></i> High Contrast Mode</h4>
                <p class="text-muted">Toggle high contrast mode for improved visibility using the contrast button in the navigation.</p>
            </div>
            
            <div class="card" style="padding: var(--spacing-lg);">
                <h4><i class="fas fa-keyboard text-primary"></i> Keyboard Navigation</h4>
                <p class="text-muted">All interactive elements can be accessed using a keyboard. Use Tab to navigate and Enter to activate.</p>
            </div>
            
            <div class="card" style="padding: var(--spacing-lg);">
                <h4><i class="fas fa-volume-up text-primary"></i> Screen Reader Support</h4>
                <p class="text-muted">Our site is designed to work with screen readers and other assistive technologies.</p>
            </div>
            
            <div class="card" style="padding: var(--spacing-lg);">
                <h4><i class="fas fa-running text-primary"></i> Quick Exit</h4>
                <p class="text-muted">A safety feature that allows you to quickly leave the site if needed. The red button in the corner redirects to a neutral website.</p>
            </div>
            
            <div class="card" style="padding: var(--spacing-lg);">
                <h4><i class="fas fa-mobile-alt text-primary"></i> Responsive Design</h4>
                <p class="text-muted">Our website works on all devices and screen sizes, including mobile phones and tablets.</p>
            </div>
        </div>
        
        <h2 style="margin-top: var(--spacing-2xl);">Standards & Guidelines</h2>
        <p>We strive to conform to the Web Content Accessibility Guidelines (WCAG) 2.1 Level AA standards. These guidelines explain how to make web content more accessible for people with disabilities.</p>
        
        <h3 style="margin-top: var(--spacing-xl);">Ongoing Efforts</h3>
        <p>We are continuously working to improve the accessibility of our website. Our efforts include:</p>
        <ul style="margin-left: var(--spacing-xl); margin-bottom: var(--spacing-xl);">
            <li>Regular testing with assistive technologies</li>
            <li>Staff training on accessibility best practices</li>
            <li>Reviewing and updating content for clarity and accessibility</li>
            <li>Incorporating user feedback into improvements</li>
        </ul>
        
        <h2 style="margin-top: var(--spacing-2xl);">Need Help?</h2>
        <p>If you experience any difficulty accessing our website or have suggestions for improvement, please contact us:</p>
        
        <div class="card" style="padding: var(--spacing-xl); margin-top: var(--spacing-lg);">
            <p><strong>Email:</strong> <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a></p>
            <p><strong>Phone:</strong> <a href="tel:<?php echo SITE_PHONE; ?>"><?php echo SITE_PHONE; ?></a></p>
            <p style="margin-bottom: 0;"><strong>Response Time:</strong> We aim to respond to accessibility inquiries within 2 business days.</p>
        </div>
        
        <h2 style="margin-top: var(--spacing-2xl);">Alternative Formats</h2>
        <p>If you need information from our website in an alternative format (such as large print, audio, or easy-read), please contact us and we will do our best to accommodate your needs.</p>
        
        <p style="margin-top: var(--spacing-2xl); color: var(--color-gray); font-size: 0.9rem;">
            <em>This accessibility statement was last updated on <?php echo date('F j, Y'); ?>.</em>
        </p>
        
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
