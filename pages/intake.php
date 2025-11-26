<?php
/**
 * OUTSSINC Platform - Smart Intake Assessment
 * 
 * Multi-step assessment form with conditional logic and auto-save.
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Smart Intake Assessment';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<style>
/* Intake-specific styles */
.intake-container {
    max-width: 800px;
    margin: 0 auto;
    padding: var(--spacing-2xl) var(--spacing-lg);
}

.intake-progress {
    margin-bottom: var(--spacing-2xl);
}

.progress-bar {
    height: 8px;
    background: var(--color-light);
    border-radius: var(--border-radius-pill);
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    transition: width 0.5s ease;
}

.progress-steps {
    display: flex;
    justify-content: space-between;
    margin-top: var(--spacing-md);
}

.progress-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex: 1;
}

.step-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: var(--color-light);
    border: 2px solid var(--color-gray-light);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.85rem;
    transition: all var(--transition-base);
}

.progress-step.active .step-circle,
.progress-step.completed .step-circle {
    background: var(--color-primary);
    border-color: var(--color-primary);
    color: white;
}

.progress-step.completed .step-circle::before {
    content: '\f00c';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
}

.step-label {
    font-size: 0.75rem;
    color: var(--color-gray);
    margin-top: var(--spacing-xs);
    text-align: center;
}

.progress-step.active .step-label {
    color: var(--color-primary);
    font-weight: 600;
}

/* Form Sections */
.intake-section {
    display: none;
    animation: fadeIn 0.3s ease;
}

.intake-section.active {
    display: block;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.section-header {
    text-align: left;
    margin-bottom: var(--spacing-xl);
}

.section-header h2 {
    font-size: 1.75rem;
    margin-bottom: var(--spacing-sm);
}

.section-header p {
    color: var(--color-gray);
}

/* Question Groups */
.question-group {
    margin-bottom: var(--spacing-xl);
    padding: var(--spacing-lg);
    background: var(--color-white);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-sm);
}

.question-group.urgent-highlight {
    border-left: 4px solid var(--color-danger);
    background: #fff5f5;
}

.question-label {
    display: block;
    font-weight: 500;
    margin-bottom: var(--spacing-md);
    font-size: 1.1rem;
}

.question-help {
    display: block;
    font-size: 0.85rem;
    color: var(--color-gray);
    margin-top: var(--spacing-xs);
    margin-bottom: var(--spacing-md);
}

/* Radio/Checkbox Options */
.option-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--spacing-sm);
}

.option-item {
    position: relative;
}

.option-item input {
    position: absolute;
    opacity: 0;
}

.option-item label {
    display: flex;
    align-items: center;
    padding: var(--spacing-md);
    background: var(--color-light);
    border: 2px solid transparent;
    border-radius: var(--border-radius-sm);
    cursor: pointer;
    transition: all var(--transition-fast);
}

.option-item label:hover {
    background: var(--color-white);
    border-color: var(--color-gray-light);
}

.option-item input:checked + label {
    background: white;
    border-color: var(--color-primary);
    box-shadow: var(--shadow-sm);
}

.option-item label i {
    margin-right: var(--spacing-sm);
    color: var(--color-gray);
}

.option-item input:checked + label i {
    color: var(--color-primary);
}

/* Urgency Slider */
.urgency-slider {
    padding: var(--spacing-md) 0;
}

.urgency-slider input[type="range"] {
    width: 100%;
    -webkit-appearance: none;
    height: 8px;
    border-radius: var(--border-radius-pill);
    background: linear-gradient(90deg, var(--color-success), var(--color-warning), var(--color-danger));
}

.urgency-slider input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: white;
    border: 3px solid var(--color-primary);
    cursor: pointer;
    box-shadow: var(--shadow-md);
}

.urgency-labels {
    display: flex;
    justify-content: space-between;
    margin-top: var(--spacing-sm);
    font-size: 0.85rem;
    color: var(--color-gray);
}

/* Navigation Buttons */
.intake-nav {
    display: flex;
    justify-content: space-between;
    margin-top: var(--spacing-2xl);
    padding-top: var(--spacing-xl);
    border-top: 1px solid var(--color-light);
}

.btn-prev {
    background: transparent;
    color: var(--color-gray);
    border: 2px solid var(--color-gray-light);
}

.btn-prev:hover {
    background: var(--color-light);
    color: var(--color-dark);
}

/* Auto-save indicator */
.autosave-indicator {
    position: fixed;
    bottom: calc(var(--marquee-height) + 70px);
    left: 20px;
    background: var(--color-dark);
    color: white;
    padding: var(--spacing-sm) var(--spacing-md);
    border-radius: var(--border-radius-pill);
    font-size: 0.85rem;
    opacity: 0;
    transition: opacity var(--transition-base);
    z-index: 100;
}

.autosave-indicator.show {
    opacity: 1;
}

/* Conditional question animation */
.conditional-question {
    overflow: hidden;
    max-height: 0;
    opacity: 0;
    transition: all 0.3s ease;
}

.conditional-question.visible {
    max-height: 500px;
    opacity: 1;
    margin-top: var(--spacing-md);
}

/* Mobile adjustments */
@media (max-width: 576px) {
    .option-grid {
        grid-template-columns: 1fr;
    }
    
    .progress-steps {
        display: none;
    }
}
</style>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Smart Intake Assessment</span>
    </nav>
    <h1>Smart Intake Assessment</h1>
    <p>Tell us about your situation so we can connect you with the right support. All information is confidential.</p>
</div>

<div class="intake-container">
    <!-- Progress Bar -->
    <div class="intake-progress" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5">
        <div class="progress-bar">
            <div class="progress-fill" style="width: 20%;"></div>
        </div>
        <div class="progress-steps">
            <div class="progress-step active" data-step="1">
                <div class="step-circle">1</div>
                <span class="step-label">About You</span>
            </div>
            <div class="progress-step" data-step="2">
                <div class="step-circle">2</div>
                <span class="step-label">Current Needs</span>
            </div>
            <div class="progress-step" data-step="3">
                <div class="step-circle">3</div>
                <span class="step-label">Housing & Safety</span>
            </div>
            <div class="progress-step" data-step="4">
                <div class="step-circle">4</div>
                <span class="step-label">Health & Wellness</span>
            </div>
            <div class="progress-step" data-step="5">
                <div class="step-circle">5</div>
                <span class="step-label">Review</span>
            </div>
        </div>
    </div>
    
    <form id="intake-form" data-autosave method="POST" action="/api/intake.php">
        <input type="hidden" name="csrf_token" value="<?php echo bin2hex(random_bytes(32)); ?>">
        
        <!-- Section 1: About You -->
        <div class="intake-section active" data-section="1">
            <div class="section-header">
                <h2><i class="fas fa-user"></i> About You</h2>
                <p>Let's start with some basic information. All fields are optional.</p>
            </div>
            
            <div class="question-group">
                <label class="question-label">What name would you like us to use?</label>
                <input type="text" name="preferred_name" class="form-control" placeholder="Your preferred name">
            </div>
            
            <div class="question-group">
                <label class="question-label">What are your preferred pronouns?</label>
                <div class="option-grid">
                    <div class="option-item">
                        <input type="radio" name="pronouns" id="pronouns-he" value="he/him">
                        <label for="pronouns-he">He/Him</label>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="pronouns" id="pronouns-she" value="she/her">
                        <label for="pronouns-she">She/Her</label>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="pronouns" id="pronouns-they" value="they/them">
                        <label for="pronouns-they">They/Them</label>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="pronouns" id="pronouns-other" value="other">
                        <label for="pronouns-other">Other/Prefer to specify</label>
                    </div>
                </div>
            </div>
            
            <div class="question-group">
                <label class="question-label">How old are you?</label>
                <select name="age_range" class="form-control">
                    <option value="">Select age range</option>
                    <option value="under-18">Under 18</option>
                    <option value="18-24">18-24</option>
                    <option value="25-34">25-34</option>
                    <option value="35-44">35-44</option>
                    <option value="45-54">45-54</option>
                    <option value="55-64">55-64</option>
                    <option value="65+">65 or older</option>
                </select>
            </div>
            
            <div class="question-group">
                <label class="question-label">What area do you live in?</label>
                <input type="text" name="city" class="form-control" placeholder="City or town (e.g., Cobourg)">
            </div>
        </div>
        
        <!-- Section 2: Current Needs -->
        <div class="intake-section" data-section="2">
            <div class="section-header">
                <h2><i class="fas fa-hands-helping"></i> Current Needs</h2>
                <p>What areas of your life could use some support right now? Select all that apply.</p>
            </div>
            
            <div class="question-group">
                <label class="question-label">What brings you here today?</label>
                <span class="question-help">Select all the areas where you'd like help</span>
                <div class="option-grid">
                    <div class="option-item">
                        <input type="checkbox" name="needs[]" id="need-housing" value="housing">
                        <label for="need-housing"><i class="fas fa-home"></i> Housing</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="needs[]" id="need-food" value="food">
                        <label for="need-food"><i class="fas fa-utensils"></i> Food</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="needs[]" id="need-financial" value="financial">
                        <label for="need-financial"><i class="fas fa-dollar-sign"></i> Financial</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="needs[]" id="need-mental-health" value="mental-health">
                        <label for="need-mental-health"><i class="fas fa-brain"></i> Mental Health</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="needs[]" id="need-addiction" value="addiction">
                        <label for="need-addiction"><i class="fas fa-heartbeat"></i> Substance Use</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="needs[]" id="need-health" value="health">
                        <label for="need-health"><i class="fas fa-stethoscope"></i> Physical Health</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="needs[]" id="need-employment" value="employment">
                        <label for="need-employment"><i class="fas fa-briefcase"></i> Employment</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="needs[]" id="need-legal" value="legal">
                        <label for="need-legal"><i class="fas fa-balance-scale"></i> Legal Issues</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="needs[]" id="need-family" value="family">
                        <label for="need-family"><i class="fas fa-users"></i> Family</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="needs[]" id="need-id" value="identification">
                        <label for="need-id"><i class="fas fa-id-card"></i> ID Documents</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="needs[]" id="need-transportation" value="transportation">
                        <label for="need-transportation"><i class="fas fa-bus"></i> Transportation</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="needs[]" id="need-other" value="other">
                        <label for="need-other"><i class="fas fa-ellipsis-h"></i> Other</label>
                    </div>
                </div>
            </div>
            
            <div class="question-group">
                <label class="question-label">How urgent is your situation?</label>
                <div class="urgency-slider">
                    <input type="range" name="urgency" min="1" max="5" value="3" id="urgency-slider">
                    <div class="urgency-labels">
                        <span>I'm doing okay, just exploring</span>
                        <span>I need help soon</span>
                        <span>This is urgent</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Section 3: Housing & Safety -->
        <div class="intake-section" data-section="3">
            <div class="section-header">
                <h2><i class="fas fa-home"></i> Housing & Safety</h2>
                <p>Understanding your living situation helps us connect you with the right resources.</p>
            </div>
            
            <div class="question-group">
                <label class="question-label">What is your current housing situation?</label>
                <div class="option-grid">
                    <div class="option-item">
                        <input type="radio" name="housing_status" id="housing-stable" value="stable">
                        <label for="housing-stable"><i class="fas fa-check-circle"></i> Stable housing</label>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="housing_status" id="housing-staying" value="temporary">
                        <label for="housing-staying"><i class="fas fa-couch"></i> Staying with friends/family</label>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="housing_status" id="housing-risk" value="at-risk">
                        <label for="housing-risk"><i class="fas fa-exclamation-triangle"></i> At risk of losing housing</label>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="housing_status" id="housing-shelter" value="shelter">
                        <label for="housing-shelter"><i class="fas fa-bed"></i> In a shelter</label>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="housing_status" id="housing-homeless" value="homeless">
                        <label for="housing-homeless"><i class="fas fa-moon"></i> Homeless/Sleeping rough</label>
                    </div>
                </div>
            </div>
            
            <div class="question-group urgent-highlight" id="homeless-tonight-question" style="display: none;">
                <label class="question-label"><i class="fas fa-exclamation-circle text-danger"></i> Do you have a safe place to sleep tonight?</label>
                <div class="option-grid">
                    <div class="option-item">
                        <input type="radio" name="safe_tonight" id="safe-yes" value="yes">
                        <label for="safe-yes"><i class="fas fa-check"></i> Yes</label>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="safe_tonight" id="safe-no" value="no">
                        <label for="safe-no"><i class="fas fa-times"></i> No</label>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="safe_tonight" id="safe-unsure" value="unsure">
                        <label for="safe-unsure"><i class="fas fa-question"></i> Unsure</label>
                    </div>
                </div>
            </div>
            
            <div class="question-group">
                <label class="question-label">Do you feel safe where you're currently staying?</label>
                <div class="option-grid">
                    <div class="option-item">
                        <input type="radio" name="feels_safe" id="feels-safe-yes" value="yes">
                        <label for="feels-safe-yes"><i class="fas fa-shield-alt"></i> Yes, I feel safe</label>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="feels_safe" id="feels-safe-sometimes" value="sometimes">
                        <label for="feels-safe-sometimes"><i class="fas fa-exclamation"></i> Sometimes</label>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="feels_safe" id="feels-safe-no" value="no">
                        <label for="feels-safe-no"><i class="fas fa-times-circle"></i> No, I don't feel safe</label>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Section 4: Health & Wellness -->
        <div class="intake-section" data-section="4">
            <div class="section-header">
                <h2><i class="fas fa-heartbeat"></i> Health & Wellness</h2>
                <p>Your wellbeing matters to us. This helps us provide appropriate support.</p>
            </div>
            
            <div class="question-group">
                <label class="question-label">How would you describe your overall wellbeing right now?</label>
                <div class="option-grid">
                    <div class="option-item">
                        <input type="radio" name="wellbeing" id="wellbeing-good" value="good">
                        <label for="wellbeing-good"><i class="fas fa-smile"></i> Good</label>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="wellbeing" id="wellbeing-okay" value="okay">
                        <label for="wellbeing-okay"><i class="fas fa-meh"></i> Okay</label>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="wellbeing" id="wellbeing-struggling" value="struggling">
                        <label for="wellbeing-struggling"><i class="fas fa-frown"></i> Struggling</label>
                    </div>
                    <div class="option-item">
                        <input type="radio" name="wellbeing" id="wellbeing-crisis" value="crisis">
                        <label for="wellbeing-crisis"><i class="fas fa-sad-tear"></i> In Crisis</label>
                    </div>
                </div>
            </div>
            
            <div class="question-group">
                <label class="question-label">Would you like to share any current health concerns?</label>
                <span class="question-help">This information is confidential and helps us connect you with appropriate services</span>
                <textarea name="health_concerns" class="form-control" rows="4" 
                    data-crisis-detect
                    placeholder="Optional: Share any physical or mental health concerns..."></textarea>
            </div>
            
            <div class="question-group">
                <label class="question-label">What type of support would be most helpful?</label>
                <div class="option-grid">
                    <div class="option-item">
                        <input type="checkbox" name="support_type[]" id="support-peer" value="peer">
                        <label for="support-peer"><i class="fas fa-hands-helping"></i> Peer Support</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="support_type[]" id="support-counseling" value="counseling">
                        <label for="support-counseling"><i class="fas fa-comments"></i> Counseling</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="support_type[]" id="support-resources" value="resources">
                        <label for="support-resources"><i class="fas fa-list"></i> Resource Information</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="support_type[]" id="support-navigation" value="navigation">
                        <label for="support-navigation"><i class="fas fa-compass"></i> System Navigation</label>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Section 5: Review -->
        <div class="intake-section" data-section="5">
            <div class="section-header">
                <h2><i class="fas fa-clipboard-check"></i> Review & Submit</h2>
                <p>Please review your responses before submitting.</p>
            </div>
            
            <div class="question-group">
                <div id="review-summary">
                    <!-- Populated by JavaScript -->
                </div>
            </div>
            
            <div class="question-group">
                <label class="question-label">How would you like us to contact you?</label>
                <div class="option-grid">
                    <div class="option-item">
                        <input type="checkbox" name="contact_method[]" id="contact-phone" value="phone">
                        <label for="contact-phone"><i class="fas fa-phone"></i> Phone Call</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="contact_method[]" id="contact-text" value="text">
                        <label for="contact-text"><i class="fas fa-sms"></i> Text Message</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="contact_method[]" id="contact-email" value="email">
                        <label for="contact-email"><i class="fas fa-envelope"></i> Email</label>
                    </div>
                    <div class="option-item">
                        <input type="checkbox" name="contact_method[]" id="contact-app" value="app">
                        <label for="contact-app"><i class="fas fa-mobile-alt"></i> In-App Message</label>
                    </div>
                </div>
            </div>
            
            <div class="question-group">
                <div class="form-group checkbox">
                    <input type="checkbox" id="consent-contact" name="consent_contact" required>
                    <label for="consent-contact">I consent to being contacted by OUTSSINC staff regarding my assessment.</label>
                </div>
                <div class="form-group checkbox">
                    <input type="checkbox" id="consent-agencies" name="consent_agencies">
                    <label for="consent-agencies">I consent to having my information shared with relevant partner agencies to help connect me with services.</label>
                </div>
            </div>
            
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                <div>
                    <strong>What happens next?</strong>
                    <p>After you submit, a peer support worker will review your assessment and reach out within 24-48 hours. If you selected urgent needs, we'll prioritize your case.</p>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <div class="intake-nav">
            <button type="button" class="btn btn-prev" id="btn-prev" style="visibility: hidden;">
                <i class="fas fa-arrow-left"></i> Previous
            </button>
            <button type="button" class="btn btn-primary" id="btn-next">
                Next <i class="fas fa-arrow-right"></i>
            </button>
            <button type="submit" class="btn btn-primary btn-lg" id="btn-submit" style="display: none;">
                <i class="fas fa-paper-plane"></i> Submit Assessment
            </button>
        </div>
    </form>
</div>

<!-- Autosave Indicator -->
<div class="autosave-indicator" id="autosave-indicator">
    <i class="fas fa-save"></i> Progress saved
</div>

<script>
(function() {
    'use strict';
    
    const form = document.getElementById('intake-form');
    const sections = document.querySelectorAll('.intake-section');
    const progressFill = document.querySelector('.progress-fill');
    const progressSteps = document.querySelectorAll('.progress-step');
    const btnPrev = document.getElementById('btn-prev');
    const btnNext = document.getElementById('btn-next');
    const btnSubmit = document.getElementById('btn-submit');
    const autosaveIndicator = document.getElementById('autosave-indicator');
    
    let currentSection = 1;
    const totalSections = sections.length;
    
    // Initialize
    updateProgress();
    initConditionalQuestions();
    
    // Navigation
    btnNext.addEventListener('click', function() {
        if (currentSection < totalSections) {
            currentSection++;
            showSection(currentSection);
        }
    });
    
    btnPrev.addEventListener('click', function() {
        if (currentSection > 1) {
            currentSection--;
            showSection(currentSection);
        }
    });
    
    function showSection(num) {
        sections.forEach(function(section) {
            section.classList.remove('active');
        });
        
        const targetSection = document.querySelector('[data-section="' + num + '"]');
        if (targetSection) {
            targetSection.classList.add('active');
        }
        
        updateProgress();
        updateNavigation();
        window.scrollTo({ top: 0, behavior: 'smooth' });
        
        // Generate review on last section
        if (num === totalSections) {
            generateReview();
        }
    }
    
    function updateProgress() {
        const progress = (currentSection / totalSections) * 100;
        progressFill.style.width = progress + '%';
        
        progressSteps.forEach(function(step, index) {
            const stepNum = index + 1;
            step.classList.remove('active', 'completed');
            
            if (stepNum === currentSection) {
                step.classList.add('active');
            } else if (stepNum < currentSection) {
                step.classList.add('completed');
            }
        });
    }
    
    function updateNavigation() {
        btnPrev.style.visibility = currentSection > 1 ? 'visible' : 'hidden';
        
        if (currentSection === totalSections) {
            btnNext.style.display = 'none';
            btnSubmit.style.display = 'flex';
        } else {
            btnNext.style.display = 'flex';
            btnSubmit.style.display = 'none';
        }
    }
    
    // Conditional Questions
    function initConditionalQuestions() {
        const housingInputs = document.querySelectorAll('input[name="housing_status"]');
        const homelessQuestion = document.getElementById('homeless-tonight-question');
        
        housingInputs.forEach(function(input) {
            input.addEventListener('change', function() {
                if (this.value === 'homeless' || this.value === 'at-risk') {
                    homelessQuestion.style.display = 'block';
                } else {
                    homelessQuestion.style.display = 'none';
                }
            });
        });
    }
    
    // Generate Review Summary
    function generateReview() {
        const formData = new FormData(form);
        let summary = '<h4>Your Responses</h4><ul class="review-list" style="list-style: none; padding: 0;">';
        
        // Preferred name
        const name = formData.get('preferred_name');
        if (name) {
            summary += '<li><strong>Preferred Name:</strong> ' + escapeHtml(name) + '</li>';
        }
        
        // Needs
        const needs = formData.getAll('needs[]');
        if (needs.length > 0) {
            summary += '<li><strong>Areas of Need:</strong> ' + needs.map(function(n) { 
                return n.charAt(0).toUpperCase() + n.slice(1).replace('-', ' '); 
            }).join(', ') + '</li>';
        }
        
        // Urgency
        const urgency = formData.get('urgency');
        const urgencyLabels = ['', 'Low', 'Medium-Low', 'Medium', 'Medium-High', 'High'];
        if (urgency) {
            summary += '<li><strong>Urgency Level:</strong> ' + urgencyLabels[parseInt(urgency)] + '</li>';
        }
        
        // Housing
        const housing = formData.get('housing_status');
        if (housing) {
            summary += '<li><strong>Housing Status:</strong> ' + housing.charAt(0).toUpperCase() + housing.slice(1).replace('-', ' ') + '</li>';
        }
        
        summary += '</ul>';
        document.getElementById('review-summary').innerHTML = summary;
    }
    
    function escapeHtml(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }
    
    // Autosave
    let autosaveTimeout;
    form.addEventListener('input', function() {
        clearTimeout(autosaveTimeout);
        autosaveTimeout = setTimeout(function() {
            autosaveIndicator.classList.add('show');
            setTimeout(function() {
                autosaveIndicator.classList.remove('show');
            }, 2000);
        }, 1000);
    });
    
    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const consent = document.getElementById('consent-contact');
        if (!consent.checked) {
            alert('Please provide consent to be contacted.');
            return;
        }
        
        btnSubmit.disabled = true;
        btnSubmit.innerHTML = '<span class="spinner"></span> Submitting...';
        
        // Simulate submission (in production, this would be AJAX)
        setTimeout(function() {
            window.location.href = '/pages/intake-complete.php';
        }, 1500);
    });
})();
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
