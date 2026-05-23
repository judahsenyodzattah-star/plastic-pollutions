<?php
$pageTitle = 'What to Do About Plastic';
require_once __DIR__ . '/../includes/header.php';
?>

<main id="main-content">
    <div class="page-header">
        <h1>What to Do About Plastic</h1>
        <p>Understanding plastic types, their impact, and how to recycle effectively</p>
        <div class="breadcrumb">
            <a href="<?php echo SITE_URL; ?>/index.php">Home</a>
            <span>›</span>
            <span>What to Do About Plastic</span>
        </div>
    </div>

    <!-- Types of Plastics -->
    <section class="section" aria-label="Types of plastics">
        <div class="container">
            <div class="section-header">
                <h2>Types of Plastics</h2>
                <p>Understanding the different types helps you recycle correctly</p>
                <div class="line"></div>
            </div>
            <div class="card-grid">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                            <div style="width: 50px; height: 50px; background: #e3f2fd; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700; color: #1565c0;">1</div>
                            <div>
                                <h3 style="margin-bottom: 0;">PET (PETE)</h3>
                                <small style="color: var(--gray-500);">Polyethylene Terephthalate</small>
                            </div>
                        </div>
                        <p><strong>Common uses:</strong> Water bottles, soft drink bottles, food containers</p>
                        <p style="margin-top: 10px;"><strong>Recyclable:</strong> <span class="badge badge-success">Yes ✓</span></p>
                        <p style="margin-top: 10px; font-size: 0.9rem; color: var(--gray-700);">One of the most commonly recycled plastics. Can be turned into polyester fiber, carpeting, and new containers.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                            <div style="width: 50px; height: 50px; background: #e8f5e9; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700; color: #2e7d32;">2</div>
                            <div>
                                <h3 style="margin-bottom: 0;">HDPE</h3>
                                <small style="color: var(--gray-500);">High-Density Polyethylene</small>
                            </div>
                        </div>
                        <p><strong>Common uses:</strong> Milk jugs, detergent bottles, shampoo bottles</p>
                        <p style="margin-top: 10px;"><strong>Recyclable:</strong> <span class="badge badge-success">Yes ✓</span></p>
                        <p style="margin-top: 10px; font-size: 0.9rem; color: var(--gray-700);">Very durable and versatile. Can be recycled into pens, recycling bins, plastic lumber, and playground equipment.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                            <div style="width: 50px; height: 50px; background: #fff3e0; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700; color: #e65100;">3</div>
                            <div>
                                <h3 style="margin-bottom: 0;">PVC</h3>
                                <small style="color: var(--gray-500);">Polyvinyl Chloride</small>
                            </div>
                        </div>
                        <p><strong>Common uses:</strong> Pipes, window frames, food wrap, medical equipment</p>
                        <p style="margin-top: 10px;"><strong>Recyclable:</strong> <span class="badge badge-warning">Rarely</span></p>
                        <p style="margin-top: 10px; font-size: 0.9rem; color: var(--gray-700);">Contains chlorine and can release harmful chemicals. Difficult to recycle and should be avoided where possible.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                            <div style="width: 50px; height: 50px; background: #fce4ec; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700; color: #c62828;">4</div>
                            <div>
                                <h3 style="margin-bottom: 0;">LDPE</h3>
                                <small style="color: var(--gray-500);">Low-Density Polyethylene</small>
                            </div>
                        </div>
                        <p><strong>Common uses:</strong> Plastic bags, squeeze bottles, bread bags</p>
                        <p style="margin-top: 10px;"><strong>Recyclable:</strong> <span class="badge badge-warning">Sometimes</span></p>
                        <p style="margin-top: 10px; font-size: 0.9rem; color: var(--gray-700);">Not commonly recycled through curbside programs, but many grocery stores accept LDPE bags for recycling.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                            <div style="width: 50px; height: 50px; background: #e8eaf6; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700; color: #283593;">5</div>
                            <div>
                                <h3 style="margin-bottom: 0;">PP</h3>
                                <small style="color: var(--gray-500);">Polypropylene</small>
                            </div>
                        </div>
                        <p><strong>Common uses:</strong> Yogurt containers, bottle caps, straws, food containers</p>
                        <p style="margin-top: 10px;"><strong>Recyclable:</strong> <span class="badge badge-success">Yes ✓</span></p>
                        <p style="margin-top: 10px; font-size: 0.9rem; color: var(--gray-700);">Increasingly accepted in recycling programs. Can be recycled into brooms, auto battery cases, and signal lights.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                            <div style="width: 50px; height: 50px; background: #f3e5f5; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700; color: #6a1b9a;">6-7</div>
                            <div>
                                <h3 style="margin-bottom: 0;">PS & Other</h3>
                                <small style="color: var(--gray-500);">Polystyrene & Mixed</small>
                            </div>
                        </div>
                        <p><strong>Common uses:</strong> Styrofoam, disposable cups, CD cases, baby bottles</p>
                        <p style="margin-top: 10px;"><strong>Recyclable:</strong> <span class="badge badge-warning">Rarely</span></p>
                        <p style="margin-top: 10px; font-size: 0.9rem; color: var(--gray-700);">Very difficult to recycle. PS (Styrofoam) is especially harmful to the environment and should be avoided entirely.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Environmental Impact Video Section -->
    <section class="section section-light" aria-label="Environmental impact multimedia">
        <div class="container">
            <div class="section-header">
                <h2>The Environmental Impact</h2>
                <p>Watch and learn about the devastating effects of plastic pollution</p>
                <div class="line"></div>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
                <div>
                    <!-- Accessible video with captions placeholder -->
                    <!-- YouTube Embed -->
<iframe 
    style="width: 100%; max-width: 800px; margin: 0 auto; display: block; aspect-ratio: 16/9; border-radius: var(--radius-lg); border: none;"
    src="https://www.youtube.com/embed/xRW8Z-cPd2E?cc_load_policy=1" 
    title="YouTube Video Player" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
    allowfullscreen>
</iframe>
                    <div class="info-card">
                        <h3 style="margin-bottom: 20px;"> Key Facts</h3>
                        <ul style="display: flex; flex-direction: column; gap: 15px;">
                            <li style="display: flex; gap: 15px; align-items: start;">
                                <span style="font-size: 1.5rem;"></span>
                                <div>
                                    <strong>8 Million Tons</strong>
                                    <p style="font-size: 0.9rem; color: var(--gray-700);">of plastic enter our oceans every year — equivalent to dumping a garbage truck of plastic every minute.</p>
                                </div>
                            </li>
                            <li style="display: flex; gap: 15px; align-items: start;">
                                <span style="font-size: 1.5rem;"></span>
                                <div>
                                    <strong>1 in 3 Fish</strong>
                                    <p style="font-size: 0.9rem; color: var(--gray-700);">caught for human consumption contains plastic. Microplastics have been found in 77% of human blood samples.</p>
                                </div>
                            </li>
                            <li style="display: flex; gap: 15px; align-items: start;">
                                <span style="font-size: 1.5rem;"></span>
                                <div>
                                    <strong>450+ Years</strong>
                                    <p style="font-size: 0.9rem; color: var(--gray-700);">for a single plastic bottle to decompose. Some plastics may never fully break down.</p>
                                </div>
                            </li>
                            <li style="display: flex; gap: 15px; align-items: start;">
                                <span style="font-size: 1.5rem;"></span>
                                <div>
                                    <strong>100,000+ Animals</strong>
                                    <p style="font-size: 0.9rem; color: var(--gray-700);">die from plastic entanglement and ingestion each year, including sea turtles, dolphins, and seabirds.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recycling Guide -->
    <section class="section" aria-label="Recycling guide">
        <div class="container">
            <div class="section-header">
                <h2>How to Recycle Properly</h2>
                <p>Follow these steps to ensure your recycling actually gets recycled</p>
                <div class="line"></div>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
                <div class="info-card" style="text-align: center; border-top: 4px solid var(--primary);">
                    <div style="font-size: 2.5rem; margin-bottom: 10px;">1️</div>
                    <h3>Check the Number</h3>
                    <p style="color: var(--gray-700); font-size: 0.95rem;">Look for the recycling symbol and number on the bottom of the plastic item. Numbers 1 and 2 are most widely recycled.</p>
                </div>
                <div class="info-card" style="text-align: center; border-top: 4px solid var(--secondary);">
                    <div style="font-size: 2.5rem; margin-bottom: 10px;">2️</div>
                    <h3>Clean & Dry</h3>
                    <p style="color: var(--gray-700); font-size: 0.95rem;">Rinse out food residue and let items dry before placing in recycling. Contaminated items can spoil entire batches.</p>
                </div>
                <div class="info-card" style="text-align: center; border-top: 4px solid var(--accent);">
                    <div style="font-size: 2.5rem; margin-bottom: 10px;">3️</div>
                    <h3>Remove Caps & Labels</h3>
                    <p style="color: var(--gray-700); font-size: 0.95rem;">Caps and labels are often made from different materials. Remove them and recycle separately where possible.</p>
                </div>
                <div class="info-card" style="text-align: center; border-top: 4px solid var(--success);">
                    <div style="font-size: 2.5rem; margin-bottom: 10px;">4️</div>
                    <h3>Sort Correctly</h3>
                    <p style="color: var(--gray-700); font-size: 0.95rem;">Separate plastics by type and follow your local recycling guidelines. When in doubt, check with your recycler.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Donate & Petition Section -->
<!-- Donate & Petition Section -->
<section class="section section-dark" id="petition" aria-label="Take action">        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 40px;">
                <div>
                    <h2 style="margin-bottom: 15px;">Donate to the Cause</h2>
                    <p style="opacity: 0.9; margin-bottom: 25px;">Your financial support helps fund research, cleanup operations, and educational programs. Every dollar makes a difference.</p>
                    <a href="<?php echo SITE_URL; ?>/pages/donate.php" class="btn btn-accent btn-lg">Make a Donation →</a>
                </div>
                <div>
                    <h2 style="margin-bottom: 15px;">Sign Our Petition</h2>
                    <p style="opacity: 0.9; margin-bottom: 25px;">Join thousands of supporters calling for stricter regulations on single-use plastics and better waste management policies.</p>
                    
                    <?php if (isLoggedIn()): ?>
                    <form id="petitionForm" onsubmit="handlePetition(event)" style="display: flex; flex-direction: column; gap: 15px;">
                        <input type="text" name="full_name" class="form-control" placeholder="Your full name" required 
                               value="<?php echo htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']); ?>">
                        <input type="email" name="email" class="form-control" placeholder="Your email" required
                               value="<?php echo htmlspecialchars($_SESSION['email']); ?>">
                        <textarea name="message" class="form-control" placeholder="Why do you support this cause?" style="min-height: 80px;"></textarea>
                        <button type="submit" class="btn btn-accent btn-lg">Sign Petition</button>
                    </form>
                    <div id="petitionAlert"></div>
                    <?php else: ?>
                    <p style="opacity: 0.8; margin-bottom: 15px;">Please log in to sign our petition.</p>
                    <a href="<?php echo SITE_URL; ?>/pages/login.php" class="btn btn-accent btn-lg">Login to Sign →</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
function handlePetition(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    
    fetch('<?php echo SITE_URL; ?>/pages/sign-petition.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        const container = document.getElementById('petitionAlert');
        if (data.success) {
            container.innerHTML = '<div class="alert alert-success mt-1">✓ ' + data.message + '</div>';
        } else {
            container.innerHTML = '<div class="alert alert-error mt-1">✕ ' + data.message + '</div>';
        }
    })
    .catch(() => {
        document.getElementById('petitionAlert').innerHTML = '<div class="alert alert-error mt-1">✕ An error occurred.</div>';
    });
}
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
