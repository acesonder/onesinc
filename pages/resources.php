<?php
/**
 * OUTSSINC Platform - Resources Directory
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Find Resources';

// Get filter from query string
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';

// Demo resources data
$resources = [
    [
        'name' => 'Cobourg Food Bank',
        'category' => 'food',
        'address' => '123 King St W, Cobourg',
        'phone' => '905-555-0123',
        'description' => 'Provides free food hampers to individuals and families in need.',
        'emergency' => false,
        'rating' => 4.8
    ],
    [
        'name' => 'Transition House - Women\'s Shelter',
        'category' => 'housing',
        'address' => 'Confidential Location',
        'phone' => '1-800-555-0199',
        'description' => 'Emergency shelter and support for women and children fleeing violence.',
        'emergency' => true,
        'rating' => 4.9,
        'hide_address' => true
    ],
    [
        'name' => 'Canadian Mental Health Association',
        'category' => 'mental-health',
        'address' => '456 Division St, Cobourg',
        'phone' => '905-555-0145',
        'description' => 'Mental health support services, counseling, and crisis intervention.',
        'emergency' => false,
        'rating' => 4.7
    ],
    [
        'name' => 'Ontario Works - Northumberland',
        'category' => 'financial',
        'address' => '600 William St, Cobourg',
        'phone' => '905-555-0167',
        'description' => 'Financial and employment assistance for eligible residents.',
        'emergency' => false,
        'rating' => 4.2
    ],
    [
        'name' => 'Northumberland Hills Hospital',
        'category' => 'health',
        'address' => '1000 DePalma Dr, Cobourg',
        'phone' => '905-555-0111',
        'description' => 'Full-service hospital with emergency department.',
        'emergency' => true,
        'rating' => 4.5
    ],
    [
        'name' => 'Community Legal Centre',
        'category' => 'legal',
        'address' => '789 King St E, Cobourg',
        'phone' => '905-555-0188',
        'description' => 'Free legal advice and representation for low-income individuals.',
        'emergency' => false,
        'rating' => 4.6
    ]
];

// Filter resources if category is specified
if ($categoryFilter) {
    $resources = array_filter($resources, function($r) use ($categoryFilter) {
        return $r['category'] === $categoryFilter;
    });
}

require_once dirname(__DIR__) . '/includes/header.php';
?>

<style>
.resources-container {
    max-width: var(--container-max);
    margin: 0 auto;
    padding: var(--spacing-2xl) var(--spacing-lg);
}

.resources-layout {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: var(--spacing-xl);
}

@media (max-width: 992px) {
    .resources-layout {
        grid-template-columns: 1fr;
    }
}

/* Filters Sidebar */
.filters-sidebar {
    background: white;
    padding: var(--spacing-lg);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-sm);
    height: fit-content;
    position: sticky;
    top: calc(var(--nav-height) + var(--spacing-lg));
}

.filters-sidebar h3 {
    font-size: 1rem;
    margin-bottom: var(--spacing-lg);
    padding-bottom: var(--spacing-md);
    border-bottom: 1px solid var(--color-light);
}

.filter-group {
    margin-bottom: var(--spacing-lg);
}

.filter-group label {
    display: block;
    font-weight: 500;
    margin-bottom: var(--spacing-sm);
    font-size: 0.9rem;
}

.filter-options {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-xs);
}

.filter-option {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    padding: var(--spacing-sm);
    border-radius: var(--border-radius-sm);
    cursor: pointer;
    transition: all var(--transition-fast);
}

.filter-option:hover {
    background: var(--color-light);
}

.filter-option.active {
    background: rgba(216, 0, 50, 0.1);
    color: var(--color-primary);
}

.filter-option input {
    accent-color: var(--color-primary);
}

/* Search Bar */
.search-bar {
    display: flex;
    gap: var(--spacing-sm);
    margin-bottom: var(--spacing-xl);
}

.search-bar input {
    flex: 1;
    padding: var(--spacing-md) var(--spacing-lg);
    border: 2px solid var(--color-gray-light);
    border-radius: var(--border-radius-pill);
    font-size: 1rem;
}

.search-bar input:focus {
    border-color: var(--color-primary);
    outline: none;
}

/* Resources Grid */
.resources-grid {
    display: grid;
    gap: var(--spacing-lg);
}

.resource-card {
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-sm);
    padding: var(--spacing-lg);
    display: grid;
    grid-template-columns: 1fr auto;
    gap: var(--spacing-lg);
    transition: all var(--transition-base);
}

.resource-card:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
}

.resource-card.emergency {
    border-left: 4px solid var(--color-danger);
}

.resource-info h3 {
    font-size: 1.25rem;
    margin-bottom: var(--spacing-sm);
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
}

.resource-info h3 .badge {
    font-size: 0.7rem;
}

.resource-meta {
    display: flex;
    flex-wrap: wrap;
    gap: var(--spacing-md);
    margin-bottom: var(--spacing-md);
    font-size: 0.9rem;
    color: var(--color-gray);
}

.resource-meta span {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
}

.resource-description {
    color: var(--color-gray);
    margin-bottom: var(--spacing-md);
}

.resource-rating {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
    color: var(--color-warning);
}

.resource-actions {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-sm);
    justify-content: center;
}

@media (max-width: 768px) {
    .resource-card {
        grid-template-columns: 1fr;
    }
    
    .resource-actions {
        flex-direction: row;
        flex-wrap: wrap;
    }
}

/* Category Tags */
.category-tag {
    display: inline-flex;
    align-items: center;
    gap: var(--spacing-xs);
    padding: var(--spacing-xs) var(--spacing-sm);
    background: var(--color-light);
    border-radius: var(--border-radius-sm);
    font-size: 0.8rem;
    text-transform: capitalize;
}

.category-tag.housing { background: #d4edda; color: #155724; }
.category-tag.food { background: #fff3cd; color: #856404; }
.category-tag.mental-health { background: #e2d5f1; color: #553098; }
.category-tag.financial { background: #d1ecf1; color: #0c5460; }
.category-tag.health { background: #f8d7da; color: #721c24; }
.category-tag.legal { background: #cce5ff; color: #004085; }
</style>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Find Resources</span>
    </nav>
    <h1>Find Local Resources</h1>
    <p>Discover services and support in Cobourg and the surrounding area.</p>
</div>

<div class="resources-container">
    <div class="resources-layout">
        <!-- Filters Sidebar -->
        <aside class="filters-sidebar">
            <h3><i class="fas fa-filter"></i> Filter Resources</h3>
            
            <div class="filter-group">
                <label>Category</label>
                <div class="filter-options">
                    <label class="filter-option <?php echo !$categoryFilter ? 'active' : ''; ?>">
                        <input type="radio" name="category" value="" <?php echo !$categoryFilter ? 'checked' : ''; ?>>
                        All Categories
                    </label>
                    <label class="filter-option <?php echo $categoryFilter === 'housing' ? 'active' : ''; ?>">
                        <input type="radio" name="category" value="housing" <?php echo $categoryFilter === 'housing' ? 'checked' : ''; ?>>
                        <i class="fas fa-home"></i> Housing
                    </label>
                    <label class="filter-option <?php echo $categoryFilter === 'food' ? 'active' : ''; ?>">
                        <input type="radio" name="category" value="food" <?php echo $categoryFilter === 'food' ? 'checked' : ''; ?>>
                        <i class="fas fa-utensils"></i> Food
                    </label>
                    <label class="filter-option <?php echo $categoryFilter === 'mental-health' ? 'active' : ''; ?>">
                        <input type="radio" name="category" value="mental-health" <?php echo $categoryFilter === 'mental-health' ? 'checked' : ''; ?>>
                        <i class="fas fa-brain"></i> Mental Health
                    </label>
                    <label class="filter-option <?php echo $categoryFilter === 'financial' ? 'active' : ''; ?>">
                        <input type="radio" name="category" value="financial" <?php echo $categoryFilter === 'financial' ? 'checked' : ''; ?>>
                        <i class="fas fa-dollar-sign"></i> Financial
                    </label>
                    <label class="filter-option <?php echo $categoryFilter === 'health' ? 'active' : ''; ?>">
                        <input type="radio" name="category" value="health" <?php echo $categoryFilter === 'health' ? 'checked' : ''; ?>>
                        <i class="fas fa-stethoscope"></i> Health
                    </label>
                    <label class="filter-option <?php echo $categoryFilter === 'legal' ? 'active' : ''; ?>">
                        <input type="radio" name="category" value="legal" <?php echo $categoryFilter === 'legal' ? 'checked' : ''; ?>>
                        <i class="fas fa-balance-scale"></i> Legal
                    </label>
                </div>
            </div>
            
            <div class="filter-group">
                <label>Options</label>
                <div class="filter-options">
                    <label class="filter-option">
                        <input type="checkbox" name="emergency">
                        <i class="fas fa-exclamation-circle text-danger"></i> Emergency Services Only
                    </label>
                    <label class="filter-option">
                        <input type="checkbox" name="open_now">
                        <i class="fas fa-clock"></i> Open Now
                    </label>
                </div>
            </div>
            
            <button class="btn btn-outline btn-block" onclick="location.href='/pages/resources.php'">
                <i class="fas fa-redo"></i> Reset Filters
            </button>
        </aside>
        
        <!-- Main Content -->
        <main>
            <!-- Search Bar -->
            <div class="search-bar">
                <input type="text" placeholder="Search resources by name, service, or keyword..." id="search-input">
                <button class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
            </div>
            
            <!-- Results Count -->
            <p class="text-muted mb-2" style="margin-bottom: var(--spacing-lg);">
                Showing <?php echo count($resources); ?> resources
                <?php if ($categoryFilter): ?>
                    in <strong><?php echo ucwords(str_replace('-', ' ', $categoryFilter)); ?></strong>
                <?php endif; ?>
            </p>
            
            <!-- Resources Grid -->
            <div class="resources-grid">
                <?php foreach ($resources as $resource): ?>
                <div class="resource-card <?php echo $resource['emergency'] ? 'emergency' : ''; ?>">
                    <div class="resource-info">
                        <h3>
                            <?php echo htmlspecialchars($resource['name']); ?>
                            <?php if ($resource['emergency']): ?>
                                <span class="badge badge-danger">Emergency</span>
                            <?php endif; ?>
                        </h3>
                        
                        <div class="resource-meta">
                            <span class="category-tag <?php echo $resource['category']; ?>">
                                <?php echo ucwords(str_replace('-', ' ', $resource['category'])); ?>
                            </span>
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo isset($resource['hide_address']) && $resource['hide_address'] ? 'Confidential Location' : htmlspecialchars($resource['address']); ?>
                            </span>
                            <span>
                                <i class="fas fa-phone"></i>
                                <?php echo htmlspecialchars($resource['phone']); ?>
                            </span>
                        </div>
                        
                        <p class="resource-description"><?php echo htmlspecialchars($resource['description']); ?></p>
                        
                        <div class="resource-rating">
                            <i class="fas fa-star"></i>
                            <span><?php echo $resource['rating']; ?></span>
                            <span class="text-muted" style="margin-left: var(--spacing-sm);">(Community Rating)</span>
                        </div>
                    </div>
                    
                    <div class="resource-actions">
                        <a href="tel:<?php echo htmlspecialchars($resource['phone']); ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-phone"></i> Call
                        </a>
                        <?php if (!isset($resource['hide_address']) || !$resource['hide_address']): ?>
                        <button class="btn btn-outline btn-sm">
                            <i class="fas fa-directions"></i> Directions
                        </button>
                        <?php endif; ?>
                        <button class="btn btn-outline btn-sm">
                            <i class="fas fa-bookmark"></i> Save
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <?php if (empty($resources)): ?>
            <div class="card text-center" style="padding: var(--spacing-3xl);">
                <i class="fas fa-search fa-3x text-muted mb-2"></i>
                <h3>No resources found</h3>
                <p class="text-muted">Try adjusting your filters or search terms.</p>
                <a href="/pages/resources.php" class="btn btn-primary">View All Resources</a>
            </div>
            <?php endif; ?>
        </main>
    </div>
</div>

<script>
// Filter radio buttons
document.querySelectorAll('input[name="category"]').forEach(function(input) {
    input.addEventListener('change', function() {
        var category = this.value;
        window.location.href = '/pages/resources.php' + (category ? '?category=' + category : '');
    });
});
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
