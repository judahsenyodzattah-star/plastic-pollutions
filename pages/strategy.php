<?php
$pageTitle = 'Our Strategy';
require_once __DIR__ . '/../includes/header.php';
?>

<main id="main-content">
    <div class="page-header">
        <h1>Our Strategy</h1>
        <p>Our comprehensive approach to tackling plastic pollution</p>
        <div class="breadcrumb">
            <a href="<?php echo SITE_URL; ?>/index.php">Home</a>
            <span>›</span>
            <span>Strategy</span>
        </div>
    </div>

    <!-- Vision & Mission -->
    <section class="section">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 40px;">
                <div class="info-card" style="border-left: 4px solid var(--primary);">
                    <h2 style="color: var(--primary); margin-bottom: 15px;"> Our Vision</h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--gray-700);">
                        A world where plastic pollution no longer threatens our oceans, wildlife, and communities. We envision a sustainable future where responsible production, consumption, and disposal of plastics are the norm, not the exception.
                    </p>
                </div>
                <div class="info-card" style="border-left: 4px solid var(--secondary);">
                    <h2 style="color: var(--secondary); margin-bottom: 15px;"> Our Mission</h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--gray-700);">
                        To reduce plastic waste and prevent harm to oceans, wildlife, and the environment through education, advocacy, community action, and collaboration with manufacturers, retailers, and governments.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Strategic Pillars -->
    <section class="section section-light" aria-label="Strategic pillars">
        <div class="container">
            <div class="section-header">
                <h2>Our Strategic Pillars</h2>
                <p>Four key areas guide our approach to combating plastic pollution</p>
                <div class="line"></div>
            </div>

            <!-- Strategy Diagram -->
            <div style="display: flex; justify-content: center; margin-bottom: 40px;">
                <svg viewBox="0 0 600 400" style="max-width: 600px; width: 100%;" role="img" aria-label="Strategy diagram showing four interconnected pillars">
                    <title>PlasticPollutions Strategy Framework</title>
                    <!-- Center circle -->
                    <circle cx="300" cy="200" r="60" fill="#0d7c3f" opacity="0.9"/>
                    <text x="300" y="195" text-anchor="middle" fill="white" font-size="12" font-weight="bold">PLASTIC</text>
                    <text x="300" y="212" text-anchor="middle" fill="white" font-size="12" font-weight="bold">POLLUTIONS</text>
                    
                    <!-- Top - Education -->
                    <circle cx="300" cy="60" r="50" fill="#1565c0" opacity="0.9"/>
                    <text x="300" y="55" text-anchor="middle" fill="white" font-size="11" font-weight="bold"></text>
                    <text x="300" y="72" text-anchor="middle" fill="white" font-size="10" font-weight="bold">Education</text>
                    <line x1="300" y1="110" x2="300" y2="140" stroke="#1565c0" stroke-width="2" stroke-dasharray="5,5"/>
                    
                    <!-- Right - Advocacy -->
                    <circle cx="480" cy="200" r="50" fill="#ff6f00" opacity="0.9"/>
                    <text x="480" y="195" text-anchor="middle" fill="white" font-size="11" font-weight="bold"></text>
                    <text x="480" y="212" text-anchor="middle" fill="white" font-size="10" font-weight="bold">Advocacy</text>
                    <line x1="430" y1="200" x2="360" y2="200" stroke="#ff6f00" stroke-width="2" stroke-dasharray="5,5"/>
                    
                    <!-- Bottom - Action -->
                    <circle cx="300" cy="340" r="50" fill="#2e7d32" opacity="0.9"/>
                    <text x="300" y="335" text-anchor="middle" fill="white" font-size="11" font-weight="bold"></text>
                    <text x="300" y="352" text-anchor="middle" fill="white" font-size="10" font-weight="bold">Action</text>
                    <line x1="300" y1="290" x2="300" y2="260" stroke="#2e7d32" stroke-width="2" stroke-dasharray="5,5"/>
                    
                    <!-- Left - Research -->
                    <circle cx="120" cy="200" r="50" fill="#6a1b9a" opacity="0.9"/>
                    <text x="120" y="195" text-anchor="middle" fill="white" font-size="11" font-weight="bold"></text>
                    <text x="120" y="212" text-anchor="middle" fill="white" font-size="10" font-weight="bold">Research</text>
                    <line x1="170" y1="200" x2="240" y2="200" stroke="#6a1b9a" stroke-width="2" stroke-dasharray="5,5"/>
                </svg>
            </div>

            <div class="card-grid">
                <div class="card">
                    <div class="card-body" style="border-top: 4px solid #1565c0;">
                        <h3 style="color: #1565c0;">Education & Awareness</h3>
                        <p>Empowering communities with knowledge about plastic pollution through workshops, seminars, and digital content. We believe informed citizens make better choices.</p>
                        <ul style="margin-top: 15px; display: flex; flex-direction: column; gap: 8px;">
                            <li>• Campus awareness programs</li>
                            <li>• Community workshops</li>
                            <li>• Social media campaigns</li>
                            <li>• School outreach programs</li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" style="border-top: 4px solid #ff6f00;">
                        <h3 style="color: #ff6f00;">Policy Advocacy</h3>
                        <p>Working with government bodies and institutions to develop and implement policies that reduce plastic production and promote sustainable alternatives.</p>
                        <ul style="margin-top: 15px; display: flex; flex-direction: column; gap: 8px;">
                            <li>• Petition campaigns</li>
                            <li>• Government engagement</li>
                            <li>• Industry collaboration</li>
                            <li>• Policy recommendations</li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" style="border-top: 4px solid #2e7d32;">
                        <h3 style="color: #2e7d32;">Community Action</h3>
                        <p>Organizing cleanups, recycling drives, and volunteer activities that directly reduce plastic waste in our environment.</p>
                        <ul style="margin-top: 15px; display: flex; flex-direction: column; gap: 8px;">
                            <li>• Beach & river cleanups</li>
                            <li>• Recycling partnerships</li>
                            <li>• Volunteer mobilization</li>
                            <li>• Campus zero-waste zones</li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" style="border-top: 4px solid #6a1b9a;">
                        <h3 style="color: #6a1b9a;">Research & Innovation</h3>
                        <p>Supporting research into sustainable materials, recycling technologies, and the environmental impact of plastic pollution.</p>
                        <ul style="margin-top: 15px; display: flex; flex-direction: column; gap: 8px;">
                            <li>• Environmental studies</li>
                            <li>• Alternative materials research</li>
                            <li>• Impact measurement</li>
                            <li>• Data-driven decisions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Goals & Timeline -->
    <section class="section" aria-label="Goals and timeline">
        <div class="container">
            <div class="section-header">
                <h2>Our Goals</h2>
                <p>Measurable targets we're working towards</p>
                <div class="line"></div>
            </div>
            <div style="max-width: 700px; margin: 0 auto;">
                <div class="info-card mb-2" style="display: flex; gap: 20px; align-items: start;">
                    <div style="width: 60px; height: 60px; background: var(--primary-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; color: var(--primary); flex-shrink: 0;">2025</div>
                    <div>
                        <h3>Short-Term Goals</h3>
                        <ul style="margin-top: 10px; color: var(--gray-700); display: flex; flex-direction: column; gap: 8px;">
                            <li>Establish recycling points across Pentecost University campus</li>
                            <li>Reach 1,000 active members and supporters</li>
                            <li>Organize monthly cleanup events</li>
                            <li>Reduce campus single-use plastic by 30%</li>
                        </ul>
                    </div>
                </div>
                <div class="info-card mb-2" style="display: flex; gap: 20px; align-items: start;">
                    <div style="width: 60px; height: 60px; background: var(--secondary-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; color: var(--secondary); flex-shrink: 0;">2027</div>
                    <div>
                        <h3>Medium-Term Goals</h3>
                        <ul style="margin-top: 10px; color: var(--gray-700); display: flex; flex-direction: column; gap: 8px;">
                            <li>Increase local recycling rate from 5% to 20%</li>
                            <li>Partner with 10+ organizations and manufacturers</li>
                            <li>Influence university policy on plastic usage</li>
                            <li>Launch nationwide awareness campaign</li>
                        </ul>
                    </div>
                </div>
                <div class="info-card" style="display: flex; gap: 20px; align-items: start;">
                    <div style="width: 60px; height: 60px; background: #fff3e0; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; color: var(--accent); flex-shrink: 0;">2030</div>
                    <div>
                        <h3>Long-Term Vision</h3>
                        <ul style="margin-top: 10px; color: var(--gray-700); display: flex; flex-direction: column; gap: 8px;">
                            <li>Achieve 50% reduction in plastic waste in our community</li>
                            <li>Establish a self-sustaining recycling ecosystem</li>
                            <li>Contribute to national plastic policy reform</li>
                            <li>Become a model for university environmental action groups</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
