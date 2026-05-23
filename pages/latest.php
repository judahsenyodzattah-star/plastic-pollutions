<?php

$pageTitle = 'Latest on Plastic';

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';

/**
 * Convert stored image value into a usable URL.
 * Supports:
 * - full URL: https://...
 * - root-relative path: /assets/images/...
 * - filename only: post1.jpg  -> /assets/images/blog/post1.jpg
 */
function getPostImageUrl($imagePath)
{
    if (empty($imagePath)) {
        return '';
    }

    // Full external URL — trust it as-is
    if (strpos($imagePath, 'http://') === 0 || strpos($imagePath, 'https://') === 0) {
        return $imagePath;
    }

    // Root-relative path (e.g. /assets/images/blog/photo.jpg)
    if (strpos($imagePath, '/') === 0) {
        return SITE_URL . $imagePath;
    }

    // Filename only — build path to blog images folder
    return SITE_URL . '/assets/images/blog/' . ltrim($imagePath, '/');
}

/**
 * Safely get a post field with a fallback default value.
 * Handles NULL values from the database gracefully.
 */
function getPostField($post, $field, $default = '')
{
    return (!empty($post[$field])) ? $post[$field] : $default;
}

// Fetch blog posts from database
$posts = [];

try {
    $db = getDB();
    $stmt = $db->query("SELECT * FROM blog_posts WHERE published = 1 ORDER BY created_at DESC");
    $posts = $stmt->fetchAll();
} catch (Exception $e) {
    // Fallback data if DB not available
    $posts = [
        [
            'id' => 1,
            'title' => 'Ocean Plastic Crisis Reaches New Heights in 2025',
            'excerpt' => 'Recent studies show that over 14 million tons of plastic end up in the ocean every year.',
            'content' => '',
            'author' => 'PlasticPollutions Team',
            'category' => 'News',
            'image' => 'ocean-crisis.jpg',
            'created_at' => date('Y-m-d H:i:s')
        ],
        [
            'id' => 2,
            'title' => 'Community Beach Cleanup: 500kg of Plastic Collected',
            'excerpt' => 'Our recent community beach cleanup event was a massive success.',
            'content' => '',
            'author' => 'PlasticPollutions Team',
            'category' => 'Campaign',
            'image' => 'beach-cleanup.jpg',
            'created_at' => date('Y-m-d H:i:s', strtotime('-2 days'))
        ],
        [
            'id' => 3,
            'title' => 'New Partnership with Local Recycling Centers',
            'excerpt' => 'PlasticPollutions has established new partnerships with three local recycling centers.',
            'content' => '',
            'author' => 'PlasticPollutions Team',
            'category' => 'Partnership',
            'image' => 'recycling-partnership.jpg',
            'created_at' => date('Y-m-d H:i:s', strtotime('-5 days'))
        ],
        [
            'id' => 4,
            'title' => 'The Impact of Microplastics on Human Health',
            'excerpt' => 'New research reveals alarming findings about microplastics found in human blood.',
            'content' => '',
            'author' => 'PlasticPollutions Team',
            'category' => 'Research',
            'image' => 'microplastics-health.jpg',
            'created_at' => date('Y-m-d H:i:s', strtotime('-7 days'))
        ],
    ];
}

$featuredPost = !empty($posts) ? $posts[0] : null;
?>

<main id="main-content">
    <div class="page-header">
        <h1>Latest on Plastic</h1>
        <p>Stay informed with the latest news and updates on plastic pollution and our activities</p>
        <div class="breadcrumb">
            <a href="<?php echo SITE_URL; ?>/index.php">Home</a>
            <span>›</span>
            <span>Latest News</span>
        </div>
    </div>

    <section class="section">
        <div class="container">

            <?php if ($featuredPost): ?>
                <?php
                $featuredImage    = getPostImageUrl($featuredPost['image'] ?? '');
                $featuredTitle    = getPostField($featuredPost, 'title', 'Untitled Post');
                $featuredExcerpt  = getPostField($featuredPost, 'excerpt', 'No description available.');
                $featuredAuthor   = getPostField($featuredPost, 'author', 'PlasticPollutions Team');
                $featuredCategory = getPostField($featuredPost, 'category', 'News');
                $featuredDate     = getPostField($featuredPost, 'created_at', date('Y-m-d H:i:s'));
                ?>

                <!-- Featured Post -->
                <div class="info-card mb-3 latest-featured">
                    <div class="latest-featured-media">
                        <img
                            src="<?php echo htmlspecialchars($featuredImage); ?>"
                            alt="<?php echo htmlspecialchars($featuredTitle); ?>"
                            class="latest-featured-image"
                        >
                    </div>

                    <div>
                        <span class="badge badge-success mb-1" style="display: inline-block;">
                            <?php echo htmlspecialchars($featuredCategory); ?>
                        </span>

                        <h2 style="margin-bottom: 10px;">
                            <?php echo htmlspecialchars($featuredTitle); ?>
                        </h2>

                        <p style="color: var(--gray-700); margin-bottom: 15px; line-height: 1.8;">
                            <?php echo htmlspecialchars($featuredExcerpt); ?>
                        </p>

                        <div style="display: flex; align-items: center; gap: 15px; color: var(--gray-500); font-size: 0.9rem; flex-wrap: wrap;">
                            <span><?php echo htmlspecialchars($featuredAuthor); ?></span>
                            <span><?php echo date('M d, Y', strtotime($featuredDate)); ?></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Blog Posts Grid -->
            <div class="section-header">
                <h2>All Updates</h2>
                <div class="line"></div>
            </div>

            <div class="card-grid">
                <?php foreach ($posts as $post): ?>
                    <?php
                    $postImage    = getPostImageUrl($post['image'] ?? '');
                    $postTitle    = getPostField($post, 'title', 'Untitled Post');
                    $postExcerpt  = getPostField($post, 'excerpt', 'No description available.');
                    $postAuthor   = getPostField($post, 'author', 'PlasticPollutions Team');
                    $postCategory = getPostField($post, 'category', 'News');
                    $postDate     = getPostField($post, 'created_at', date('Y-m-d H:i:s'));
                    ?>

                    <article class="card">
                        <img
                            src="<?php echo htmlspecialchars($postImage); ?>"
                            alt="<?php echo htmlspecialchars($postTitle); ?>"
                            class="card-image"
                        >

                        <div class="card-body">
                            <span class="badge badge-success" style="margin-bottom: 10px; display: inline-block;">
                                <?php echo htmlspecialchars($postCategory); ?>
                            </span>

                            <h3><?php echo htmlspecialchars($postTitle); ?></h3>
                            <p><?php echo htmlspecialchars($postExcerpt); ?></p>

                            <div class="card-meta">
                                <span><?php echo htmlspecialchars($postAuthor); ?></span>
                                <span><?php echo date('M d, Y', strtotime($postDate)); ?></span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="alert alert-info mt-3" role="status">
                ℹ️ This page is dynamically updated with the latest news from our database. Check back regularly for new content and developments.
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
