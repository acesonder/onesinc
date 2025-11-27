<?php
/**
 * OUTSSINC Platform - Our History Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Our History';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <a href="/pages/about.php">About</a>
        <span>/</span>
        <span>Our History</span>
    </nav>
    <h1>Our History</h1>
    <p>The journey of OUTSSINC from grassroots beginnings to community impact.</p>
</div>

<section class="section bg-white">
    <div class="container" style="max-width: 900px;">
        <div class="section-header" style="text-align: left; margin-bottom: var(--spacing-3xl);">
            <h2>How It All Began</h2>
            <p>OUTSSINC—Outreach Someone In Need of Change—started with a simple belief: those who have walked through life's hardest moments are best positioned to help others on similar journeys.</p>
        </div>
        
        <!-- Timeline -->
        <div style="position: relative; padding-left: 30px; border-left: 3px solid var(--color-primary);">
            
            <div style="position: relative; padding-bottom: var(--spacing-2xl);">
                <div style="position: absolute; left: -41px; width: 20px; height: 20px; background: var(--color-primary); border-radius: 50%; border: 4px solid white; box-shadow: 0 0 0 3px var(--color-primary);"></div>
                <div class="card" style="padding: var(--spacing-xl);">
                    <span class="badge badge-primary" style="margin-bottom: var(--spacing-sm);">2018</span>
                    <h3>The Beginning</h3>
                    <p class="text-muted">Founded by a small group of individuals with lived experience of homelessness, addiction, and mental health challenges. Starting with just three volunteers working out of a local church basement in Cobourg, Ontario.</p>
                </div>
            </div>
            
            <div style="position: relative; padding-bottom: var(--spacing-2xl);">
                <div style="position: absolute; left: -41px; width: 20px; height: 20px; background: var(--color-primary); border-radius: 50%; border: 4px solid white; box-shadow: 0 0 0 3px var(--color-primary);"></div>
                <div class="card" style="padding: var(--spacing-xl);">
                    <span class="badge badge-primary" style="margin-bottom: var(--spacing-sm);">2019</span>
                    <h3>First Official Office</h3>
                    <p class="text-muted">Secured our first dedicated space and expanded to five peer support workers. Launched our first structured intake process and began tracking outcomes.</p>
                </div>
            </div>
            
            <div style="position: relative; padding-bottom: var(--spacing-2xl);">
                <div style="position: absolute; left: -41px; width: 20px; height: 20px; background: var(--color-primary); border-radius: 50%; border: 4px solid white; box-shadow: 0 0 0 3px var(--color-primary);"></div>
                <div class="card" style="padding: var(--spacing-xl);">
                    <span class="badge badge-primary" style="margin-bottom: var(--spacing-sm);">2020</span>
                    <h3>Pandemic Response</h3>
                    <p class="text-muted">When COVID-19 hit, demand for our services surged. We quickly adapted to virtual support while maintaining essential in-person outreach for those most in need. Helped over 200 individuals access emergency resources.</p>
                </div>
            </div>
            
            <div style="position: relative; padding-bottom: var(--spacing-2xl);">
                <div style="position: absolute; left: -41px; width: 20px; height: 20px; background: var(--color-primary); border-radius: 50%; border: 4px solid white; box-shadow: 0 0 0 3px var(--color-primary);"></div>
                <div class="card" style="padding: var(--spacing-xl);">
                    <span class="badge badge-primary" style="margin-bottom: var(--spacing-sm);">2022</span>
                    <h3>Community Partnerships</h3>
                    <p class="text-muted">Formed official partnerships with local hospitals, shelters, and social service agencies. Became a recognized referral source for peer support in Northumberland County.</p>
                </div>
            </div>
            
            <div style="position: relative; padding-bottom: var(--spacing-2xl);">
                <div style="position: absolute; left: -41px; width: 20px; height: 20px; background: var(--color-primary); border-radius: 50%; border: 4px solid white; box-shadow: 0 0 0 3px var(--color-primary);"></div>
                <div class="card" style="padding: var(--spacing-xl);">
                    <span class="badge badge-primary" style="margin-bottom: var(--spacing-sm);">2024</span>
                    <h3>Digital Platform Launch</h3>
                    <p class="text-muted">Launched our comprehensive digital platform, making it easier than ever for people to access support, find resources, and connect with peer workers.</p>
                </div>
            </div>
            
            <div style="position: relative;">
                <div style="position: absolute; left: -41px; width: 20px; height: 20px; background: var(--color-success); border-radius: 50%; border: 4px solid white; box-shadow: 0 0 0 3px var(--color-success);"></div>
                <div class="card" style="padding: var(--spacing-xl); background: linear-gradient(135deg, var(--color-success) 0%, #1e7b34 100%); color: white;">
                    <span class="badge" style="background: white; color: var(--color-success); margin-bottom: var(--spacing-sm);">Today</span>
                    <h3 style="color: white;">Growing Impact</h3>
                    <p style="opacity: 0.9;">Now with 12 staff members and dozens of volunteers, we've helped over 500 individuals in our community. Our peer support model has become a blueprint for other organizations.</p>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="grid grid-3" style="max-width: 1000px; margin: 0 auto; text-align: center;">
            <div class="card-3d" style="padding: var(--spacing-xl);">
                <div style="font-size: 3rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--spacing-sm);">500+</div>
                <p class="text-muted">People Helped</p>
            </div>
            <div class="card-3d" style="padding: var(--spacing-xl);">
                <div style="font-size: 3rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--spacing-sm);">50+</div>
                <p class="text-muted">Partner Organizations</p>
            </div>
            <div class="card-3d" style="padding: var(--spacing-xl);">
                <div style="font-size: 3rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--spacing-sm);">6</div>
                <p class="text-muted">Years of Service</p>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="cta-content">
        <h2>Be Part of Our Future</h2>
        <p>Whether you need support or want to help others, there's a place for you in our story.</p>
        <div class="cta-buttons">
            <a href="/pages/intake.php" class="btn btn-lg btn-white">
                <i class="fas fa-hands-helping"></i> Get Support
            </a>
            <a href="/pages/volunteer.php" class="btn btn-lg btn-outline-white">
                <i class="fas fa-heart"></i> Volunteer
            </a>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
