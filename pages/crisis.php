<?php
/**
 * OUTSSINC Platform - Crisis Lines Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Crisis Lines';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<style>
.crisis-card {
    background: white;
    border-radius: var(--border-radius);
    padding: var(--spacing-xl);
    margin-bottom: var(--spacing-lg);
    box-shadow: var(--shadow-md);
    border-left: 4px solid var(--color-danger);
}

.crisis-card.national {
    border-left-color: var(--color-primary);
}

.crisis-card.local {
    border-left-color: var(--color-success);
}

.crisis-card h3 {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    margin-bottom: var(--spacing-sm);
}

.crisis-number {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--color-primary);
    margin: var(--spacing-md) 0;
}

.crisis-number a {
    color: inherit;
    text-decoration: none;
}

.crisis-number a:hover {
    text-decoration: underline;
}
</style>

<div class="page-header" style="background: linear-gradient(135deg, var(--color-danger) 0%, #a71d2a 100%);">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/" style="color: rgba(255,255,255,0.8);">Home</a>
        <span>/</span>
        <span>Crisis Lines</span>
    </nav>
    <h1>Crisis Support Lines</h1>
    <p>You are not alone. Help is available 24/7. If you are in immediate danger, call 911.</p>
</div>

<section class="alert-crisis" style="margin-bottom: 0;">
    <div class="container">
        <p><strong><i class="fas fa-phone-alt"></i> Our 24/7 Crisis Line:</strong> 
        <a href="tel:<?php echo CRISIS_LINE; ?>" style="font-size: 1.5rem;"><?php echo CRISIS_LINE; ?></a> 
        | Text: <a href="sms:<?php echo CRISIS_TEXT; ?>"><?php echo CRISIS_TEXT; ?></a></p>
    </div>
</section>

<section class="section bg-light">
    <div class="container" style="max-width: 900px;">
        
        <div class="section-header" style="margin-bottom: var(--spacing-2xl);">
            <h2>Crisis Resources</h2>
            <p>These services are free, confidential, and available when you need them.</p>
        </div>
        
        <h3 style="color: var(--color-primary); margin-bottom: var(--spacing-lg);"><i class="fas fa-globe-americas"></i> National Crisis Lines (Canada)</h3>
        
        <div class="crisis-card national">
            <h3><i class="fas fa-phone-alt text-primary"></i> Talk Suicide Canada</h3>
            <p class="text-muted">24/7 suicide prevention and support</p>
            <div class="crisis-number">
                <a href="tel:1-833-456-4566">1-833-456-4566</a>
            </div>
            <p>Text: 45645 (4pm-12am ET)</p>
        </div>
        
        <div class="crisis-card national">
            <h3><i class="fas fa-comments text-primary"></i> Crisis Text Line</h3>
            <p class="text-muted">Text-based crisis support for anyone in crisis</p>
            <div class="crisis-number">
                Text HOME to <a href="sms:686868">686868</a>
            </div>
        </div>
        
        <div class="crisis-card national">
            <h3><i class="fas fa-child text-primary"></i> Kids Help Phone</h3>
            <p class="text-muted">For young people - available 24/7</p>
            <div class="crisis-number">
                <a href="tel:1-800-668-6868">1-800-668-6868</a>
            </div>
            <p>Text: CONNECT to 686868</p>
        </div>
        
        <div class="crisis-card national">
            <h3><i class="fas fa-heartbeat text-primary"></i> Drug & Alcohol Helpline</h3>
            <p class="text-muted">Support for substance use concerns</p>
            <div class="crisis-number">
                <a href="tel:1-800-565-8603">1-800-565-8603</a>
            </div>
        </div>
        
        <h3 style="color: var(--color-success); margin: var(--spacing-2xl) 0 var(--spacing-lg);"><i class="fas fa-map-marker-alt"></i> Local Resources (Northumberland County)</h3>
        
        <div class="crisis-card local">
            <h3><i class="fas fa-hospital text-success"></i> Northumberland Hills Hospital</h3>
            <p class="text-muted">Emergency Department - 24/7</p>
            <div class="crisis-number" style="color: var(--color-success);">
                <a href="tel:905-372-6811" style="color: inherit;">905-372-6811</a>
            </div>
            <p>1000 DePalma Drive, Cobourg, ON</p>
        </div>
        
        <div class="crisis-card local">
            <h3><i class="fas fa-brain text-success"></i> Four County Crisis</h3>
            <p class="text-muted">Mental health crisis services for our region</p>
            <div class="crisis-number" style="color: var(--color-success);">
                <a href="tel:1-866-995-9933" style="color: inherit;">1-866-995-9933</a>
            </div>
        </div>
        
        <div class="crisis-card local">
            <h3><i class="fas fa-home text-success"></i> Transition House</h3>
            <p class="text-muted">Women's shelter - confidential support for those fleeing violence</p>
            <div class="crisis-number" style="color: var(--color-success);">
                <a href="tel:1-800-263-3757" style="color: inherit;">1-800-263-3757</a>
            </div>
        </div>
        
    </div>
</section>

<section class="section bg-white">
    <div class="container" style="max-width: 800px;">
        <div class="card-3d" style="padding: var(--spacing-2xl); text-align: center;">
            <i class="fas fa-heart fa-3x text-primary" style="margin-bottom: var(--spacing-lg);"></i>
            <h2>You Matter</h2>
            <p style="font-size: 1.1rem; line-height: 1.8; max-width: 600px; margin: 0 auto var(--spacing-xl);">
                Whatever you're going through, there are people who want to help. Reaching out takes courage, and we're proud of you for being here.
            </p>
            <div style="display: flex; gap: var(--spacing-md); justify-content: center; flex-wrap: wrap;">
                <a href="/pages/intake.php" class="btn btn-primary btn-lg">
                    <i class="fas fa-hands-helping"></i> Get Support
                </a>
                <a href="/pages/chat.php" class="btn btn-outline btn-lg">
                    <i class="fas fa-comments"></i> Chat With Us
                </a>
            </div>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
