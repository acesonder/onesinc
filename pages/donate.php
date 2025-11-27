<?php
/**
 * OUTSSINC Platform - Donate Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Donate';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Donate</span>
    </nav>
    <h1>Support Our Mission</h1>
    <p>Your donation helps us provide peer support to those who need it most.</p>
</div>

<section class="section bg-white">
    <div class="container" style="max-width: 1000px;">
        <div class="grid grid-2" style="gap: var(--spacing-3xl); align-items: start;">
            
            <div>
                <h2 style="margin-bottom: var(--spacing-lg);">Every Dollar Makes a Difference</h2>
                <p style="font-size: 1.1rem; line-height: 1.8; color: var(--color-gray);">
                    OUTSSINC is a community-driven organization that relies on the generosity of donors like you. 
                    Your support helps us provide free peer support services to individuals facing housing insecurity, 
                    mental health challenges, addiction, and other life obstacles.
                </p>
                
                <div style="margin: var(--spacing-2xl) 0;">
                    <h3 style="margin-bottom: var(--spacing-lg);">Your Impact</h3>
                    
                    <div style="display: flex; gap: var(--spacing-md); align-items: center; padding: var(--spacing-md) 0; border-bottom: 1px solid var(--color-light);">
                        <div style="width: 60px; height: 60px; background: var(--color-light); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center;">
                            <span style="font-size: 1.5rem; font-weight: 700; color: var(--color-primary);">$25</span>
                        </div>
                        <p style="margin: 0;">Provides an emergency transit pass to help a client get to appointments</p>
                    </div>
                    
                    <div style="display: flex; gap: var(--spacing-md); align-items: center; padding: var(--spacing-md) 0; border-bottom: 1px solid var(--color-light);">
                        <div style="width: 60px; height: 60px; background: var(--color-light); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center;">
                            <span style="font-size: 1.5rem; font-weight: 700; color: var(--color-primary);">$50</span>
                        </div>
                        <p style="margin: 0;">Covers the cost of obtaining ID documents for someone rebuilding their life</p>
                    </div>
                    
                    <div style="display: flex; gap: var(--spacing-md); align-items: center; padding: var(--spacing-md) 0; border-bottom: 1px solid var(--color-light);">
                        <div style="width: 60px; height: 60px; background: var(--color-light); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center;">
                            <span style="font-size: 1.5rem; font-weight: 700; color: var(--color-primary);">$100</span>
                        </div>
                        <p style="margin: 0;">Funds a week of peer support sessions for someone in crisis</p>
                    </div>
                    
                    <div style="display: flex; gap: var(--spacing-md); align-items: center; padding: var(--spacing-md) 0;">
                        <div style="width: 60px; height: 60px; background: var(--color-light); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center;">
                            <span style="font-size: 1.5rem; font-weight: 700; color: var(--color-primary);">$500</span>
                        </div>
                        <p style="margin: 0;">Supports training for a new volunteer peer support worker</p>
                    </div>
                </div>
            </div>
            
            <div class="card-3d" style="padding: var(--spacing-2xl);">
                <h3 style="text-align: center; margin-bottom: var(--spacing-xl);"><i class="fas fa-heart text-primary"></i> Make a Donation</h3>
                
                <form id="donation-form">
                    <div class="form-group">
                        <label style="font-weight: 600; margin-bottom: var(--spacing-md); display: block;">Select Amount</label>
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--spacing-sm);">
                            <label style="display: block; text-align: center; padding: var(--spacing-md); background: var(--color-light); border-radius: var(--border-radius); cursor: pointer; transition: all 0.2s;">
                                <input type="radio" name="amount" value="25" style="display: none;">
                                <span style="font-size: 1.25rem; font-weight: 600;">$25</span>
                            </label>
                            <label style="display: block; text-align: center; padding: var(--spacing-md); background: var(--color-light); border-radius: var(--border-radius); cursor: pointer; transition: all 0.2s;">
                                <input type="radio" name="amount" value="50" style="display: none;">
                                <span style="font-size: 1.25rem; font-weight: 600;">$50</span>
                            </label>
                            <label style="display: block; text-align: center; padding: var(--spacing-md); background: var(--color-light); border-radius: var(--border-radius); cursor: pointer; transition: all 0.2s;">
                                <input type="radio" name="amount" value="100" checked style="display: none;">
                                <span style="font-size: 1.25rem; font-weight: 600;">$100</span>
                            </label>
                            <label style="display: block; text-align: center; padding: var(--spacing-md); background: var(--color-light); border-radius: var(--border-radius); cursor: pointer; transition: all 0.2s;">
                                <input type="radio" name="amount" value="250" style="display: none;">
                                <span style="font-size: 1.25rem; font-weight: 600;">$250</span>
                            </label>
                            <label style="display: block; text-align: center; padding: var(--spacing-md); background: var(--color-light); border-radius: var(--border-radius); cursor: pointer; transition: all 0.2s;">
                                <input type="radio" name="amount" value="500" style="display: none;">
                                <span style="font-size: 1.25rem; font-weight: 600;">$500</span>
                            </label>
                            <label style="display: block; text-align: center; padding: var(--spacing-md); background: var(--color-light); border-radius: var(--border-radius); cursor: pointer; transition: all 0.2s;">
                                <input type="radio" name="amount" value="other" style="display: none;">
                                <span style="font-size: 1.25rem; font-weight: 600;">Other</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group" id="custom-amount-group" style="display: none;">
                        <label for="custom-amount">Custom Amount ($)</label>
                        <input type="number" id="custom-amount" name="custom_amount" class="form-control" min="1" placeholder="Enter amount">
                    </div>
                    
                    <div class="form-group">
                        <label style="display: flex; align-items: center; gap: var(--spacing-sm); cursor: pointer;">
                            <input type="checkbox" name="monthly">
                            <span>Make this a monthly donation</span>
                        </label>
                    </div>
                    
                    <hr style="margin: var(--spacing-xl) 0;">
                    
                    <div class="form-group">
                        <label for="donor-name">Your Name</label>
                        <input type="text" id="donor-name" name="name" class="form-control" placeholder="Full name">
                    </div>
                    
                    <div class="form-group">
                        <label for="donor-email">Email Address</label>
                        <input type="email" id="donor-email" name="email" class="form-control" placeholder="you@email.com">
                    </div>
                    
                    <div class="form-group">
                        <label style="display: flex; align-items: center; gap: var(--spacing-sm); cursor: pointer;">
                            <input type="checkbox" name="anonymous">
                            <span>Make this donation anonymous</span>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        <i class="fas fa-heart"></i> Donate Now
                    </button>
                    
                    <p style="text-align: center; margin-top: var(--spacing-md); font-size: 0.85rem; color: var(--color-gray);">
                        <i class="fas fa-lock"></i> Secure payment processing
                    </p>
                </form>
            </div>
            
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container" style="text-align: center; max-width: 800px;">
        <h2>Other Ways to Give</h2>
        <p class="text-muted" style="margin-bottom: var(--spacing-2xl);">Financial donations aren't the only way to support our mission.</p>
        
        <div class="grid grid-3" style="gap: var(--spacing-lg);">
            <div class="card" style="text-align: center; padding: var(--spacing-xl);">
                <i class="fas fa-hand-holding-heart fa-2x text-primary" style="margin-bottom: var(--spacing-md);"></i>
                <h4>Volunteer</h4>
                <p class="text-muted">Share your time and skills to help others.</p>
                <a href="/pages/volunteer.php" class="btn btn-sm btn-outline">Learn More</a>
            </div>
            
            <div class="card" style="text-align: center; padding: var(--spacing-xl);">
                <i class="fas fa-box fa-2x text-primary" style="margin-bottom: var(--spacing-md);"></i>
                <h4>In-Kind Donations</h4>
                <p class="text-muted">Donate supplies, clothing, or gift cards.</p>
                <a href="/pages/contact.php" class="btn btn-sm btn-outline">Contact Us</a>
            </div>
            
            <div class="card" style="text-align: center; padding: var(--spacing-xl);">
                <i class="fas fa-building fa-2x text-primary" style="margin-bottom: var(--spacing-md);"></i>
                <h4>Corporate Sponsorship</h4>
                <p class="text-muted">Partner with us as a business.</p>
                <a href="/pages/contact.php" class="btn btn-sm btn-outline">Get in Touch</a>
            </div>
        </div>
    </div>
</section>

<script>
// Handle donation amount selection
document.querySelectorAll('input[name="amount"]').forEach(function(input) {
    input.addEventListener('change', function() {
        var customGroup = document.getElementById('custom-amount-group');
        if (this.value === 'other') {
            customGroup.style.display = 'block';
        } else {
            customGroup.style.display = 'none';
        }
        
        // Update visual selection
        document.querySelectorAll('input[name="amount"]').forEach(function(i) {
            i.parentElement.style.background = 'var(--color-light)';
            i.parentElement.style.borderColor = 'transparent';
        });
        this.parentElement.style.background = 'white';
        this.parentElement.style.border = '2px solid var(--color-primary)';
    });
});

// Initialize selection
document.querySelector('input[name="amount"]:checked').parentElement.style.border = '2px solid var(--color-primary)';
document.querySelector('input[name="amount"]:checked').parentElement.style.background = 'white';

// Form submission
document.getElementById('donation-form').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Thank you for your generosity! In a live system, you would be redirected to a secure payment processor.');
});
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
