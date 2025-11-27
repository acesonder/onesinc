<?php
/**
 * OUTSSINC Platform - Intake Complete Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Thank You';
require_once dirname(__DIR__) . '/includes/header.php';

$type = isset($_GET['type']) ? $_GET['type'] : 'intake';
?>

<style>
.success-container {
    max-width: 600px;
    margin: 0 auto;
    padding: var(--spacing-3xl) var(--spacing-lg);
    text-align: center;
}

.success-icon {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, var(--color-success) 0%, #1e7b34 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto var(--spacing-xl);
    font-size: 3rem;
    color: white;
    animation: scaleIn 0.5s ease;
}

@keyframes scaleIn {
    0% { transform: scale(0); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

.confetti {
    position: fixed;
    width: 10px;
    height: 10px;
    top: -10px;
    animation: fall 3s linear forwards;
}

@keyframes fall {
    to {
        transform: translateY(100vh) rotate(720deg);
        opacity: 0;
    }
}

.next-steps {
    background: var(--color-light);
    border-radius: var(--border-radius);
    padding: var(--spacing-xl);
    margin: var(--spacing-2xl) 0;
    text-align: left;
}

.next-steps h3 {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    margin-bottom: var(--spacing-lg);
}

.step-list {
    list-style: none;
}

.step-list li {
    display: flex;
    gap: var(--spacing-md);
    padding: var(--spacing-md) 0;
    border-bottom: 1px solid var(--color-gray-light);
}

.step-list li:last-child {
    border-bottom: none;
}

.step-number {
    width: 30px;
    height: 30px;
    background: var(--color-primary);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    flex-shrink: 0;
}
</style>

<div class="success-container">
    <div class="success-icon">
        <i class="fas fa-check"></i>
    </div>
    
    <h1>Thank You!</h1>
    <p style="font-size: 1.25rem; color: var(--color-gray); margin-bottom: var(--spacing-xl);">
        <?php if ($type === 'referral'): ?>
        Your self-referral has been submitted successfully.
        <?php else: ?>
        Your assessment has been submitted successfully.
        <?php endif; ?>
    </p>
    
    <div class="next-steps">
        <h3><i class="fas fa-list-ol text-primary"></i> What Happens Next?</h3>
        <ul class="step-list">
            <li>
                <span class="step-number">1</span>
                <div>
                    <strong>We Review Your Submission</strong>
                    <p class="text-muted" style="margin: 0;">A peer support worker will review your information within 24 hours.</p>
                </div>
            </li>
            <li>
                <span class="step-number">2</span>
                <div>
                    <strong>We'll Reach Out</strong>
                    <p class="text-muted" style="margin: 0;">We'll contact you using your preferred method within 24-48 hours.</p>
                </div>
            </li>
            <li>
                <span class="step-number">3</span>
                <div>
                    <strong>Initial Conversation</strong>
                    <p class="text-muted" style="margin: 0;">We'll have a chat to better understand your needs and how we can help.</p>
                </div>
            </li>
            <li>
                <span class="step-number">4</span>
                <div>
                    <strong>Start Your Journey</strong>
                    <p class="text-muted" style="margin: 0;">You'll be connected with a peer support worker who understands your situation.</p>
                </div>
            </li>
        </ul>
    </div>
    
    <div class="alert alert-info" style="text-align: left;">
        <i class="fas fa-phone-alt"></i>
        <div>
            <strong>Need to talk sooner?</strong>
            <p style="margin: 0;">Call our 24/7 line: <a href="tel:<?php echo CRISIS_LINE; ?>"><?php echo CRISIS_LINE; ?></a></p>
        </div>
    </div>
    
    <div style="margin-top: var(--spacing-2xl);">
        <a href="/" class="btn btn-primary btn-lg">
            <i class="fas fa-home"></i> Return to Home
        </a>
        <a href="/pages/resources.php" class="btn btn-outline btn-lg" style="margin-left: var(--spacing-md);">
            <i class="fas fa-search"></i> Browse Resources
        </a>
    </div>
</div>

<script>
// Create confetti
function createConfetti() {
    var colors = ['#d80032', '#28a745', '#ffc107', '#17a2b8', '#6f42c1'];
    for (var i = 0; i < 50; i++) {
        setTimeout(function() {
            var confetti = document.createElement('div');
            confetti.className = 'confetti';
            confetti.style.left = Math.random() * 100 + 'vw';
            confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
            confetti.style.animationDelay = Math.random() * 2 + 's';
            document.body.appendChild(confetti);
            
            setTimeout(function() {
                confetti.remove();
            }, 5000);
        }, i * 50);
    }
}

// Run confetti on load
createConfetti();
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
