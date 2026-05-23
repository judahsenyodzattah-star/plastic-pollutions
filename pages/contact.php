Here is the updated code. To replace the raw text characters, I have introduced official **Font Awesome** SVG icons (or pure semantic SVGs) so they scale perfectly and display the real logos. I also fixed the social media `#` anchors to link out to legitimate platforms using standard URLs, fixed the broken Markdown-style placeholders inside your HTML fields (like `[your@email.com](...)`), and kept your PHP structure completely intact.

```php
<?php 
$pageTitle = 'Contact Us'; 
require_once __DIR__ . '/../includes/header.php'; 

$success = ''; 
$error = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $name = sanitize($_POST['name'] ?? ''); 
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL); 
    $subject = sanitize($_POST['subject'] ?? ''); 
    $message = sanitize($_POST['message'] ?? ''); 
    
    // Validation 
    if (empty($name) || strlen($name) < 2) { 
        $error = 'Please enter your full name (at least 2 characters).'; 
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $error = 'Please enter a valid email address.'; 
    } elseif (empty($subject) || strlen($subject) < 3) { 
        $error = 'Please enter a subject (at least 3 characters).'; 
    } elseif (empty($message) || strlen($message) < 10) { 
        $error = 'Please enter a message (at least 10 characters).'; 
    } else { 
        $db = getDB(); 
        $stmt = $db->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)"); 
        try { 
            $stmt->execute([$name, $email, $subject, $message]); 
            $success = 'Your message has been sent successfully! We will get back to you within 24-48 hours.'; 
        } catch (PDOException $e) { 
            $error = 'Failed to send message. Please try again later.'; 
        } 
    } 
} 
?> 

<!-- Custom Styles for Social SVGs and Layout Improvements -->
<style>
    .social-buttons {
        display: flex;
        gap: 12px;
        margin-top: 10px;
    }
    .social-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: var(--gray-100, #f3f4f6);
        color: var(--gray-700, #374151);
        transition: background-color 0.2s, color 0.2s;
    }
    .social-btn svg {
        width: 18px;
        height: 18px;
        fill: currentColor;
    }
    .social-btn:hover {
        background-color: var(--primary-color, #0066cc);
        color: #fff;
    }
    .contact-icon {
        width: 24px;
        height: 24px;
        fill: var(--primary-color, #0066cc);
        margin-top: 3px;
    }
</style>

<main id="main-content"> 
    <div class="page-header"> 
        <h1>Contact Us</h1> 
        <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p> 
        <div class="breadcrumb"> 
            <a href="<?php echo SITE_URL; ?>/index.php">Home</a> 
            <span>&rsaquo;</span> 
            <span>Contact Us</span> 
        </div> 
    </div> 
    <section class="section"> 
        <div class="container"> 
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 40px;"> 
                <!-- Contact Form --> 
                <div> 
                    <h2 style="margin-bottom: 5px;">Send Us a Message</h2> 
                    <p style="color: var(--gray-500); margin-bottom: 25px;">Fill out the form below and we'll get back to you.</p> 
                    <?php if ($success): ?> 
                        <div class="alert alert-success">&checkmark; <?php echo $success; ?></div> 
                    <?php endif; ?> 
                    <?php if ($error): ?> 
                        <div class="alert alert-error">&times; <?php echo $error; ?></div> 
                    <?php endif; ?> 
                    <form method="POST" action="" id="contactForm" novalidate> 
                        <div class="form-group"> 
                            <label for="contact_name">Full Name *</label> 
                            <input type="text" name="name" id="contact_name" class="form-control" required 
                                   value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" 
                                   placeholder="Your full name" aria-required="true"> 
                            <span class="form-error" role="alert"></span> 
                        </div> 
                        <div class="form-group"> 
                            <label for="contact_email">Email Address *</label> 
                            <input type="email" name="email" id="contact_email" class="form-control" required 
                                   value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" 
                                   placeholder="your@email.com" aria-required="true"> 
                            <span class="form-error" role="alert"></span> 
                        </div> 
                        <div class="form-group"> 
                            <label for="contact_subject">Subject *</label> 
                            <input type="text" name="subject" id="contact_subject" class="form-control" required 
                                   value="<?php echo htmlspecialchars($_POST['subject'] ?? ''); ?>" 
                                   placeholder="What is this about?" aria-required="true"> 
                            <span class="form-error" role="alert"></span> 
                        </div> 
                        <div class="form-group"> 
                            <label for="contact_message">Message *</label> 
                            <textarea name="message" id="contact_message" class="form-control" required 
                                      placeholder="Your message here..." aria-required="true" style="min-height: 150px;"><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea> 
                            <span class="form-error" role="alert"></span> 
                        </div> 
                        <button type="submit" class="btn btn-primary btn-lg">Send Message</button> 
                    </form> 
                </div> 

                <!-- Contact Information --> 
                <div> 
                    <h2 style="margin-bottom: 5px;">Get in Touch</h2> 
                    <p style="color: var(--gray-500); margin-bottom: 25px;">You can also reach us through the following channels.</p> 
                    <div style="display: flex; flex-direction: column; gap: 20px;"> 
                        
                        <!-- Location Card -->
                        <div class="info-card" style="display: flex; align-items: start; gap: 15px;"> 
                            <svg class="contact-icon" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            <div> 
                                <h4>Our Location</h4> 
                                <p style="color: var(--gray-700);">Pentecost University<br>P.O. Box 8287, Accra, Ghana</p> 
                            </div> 
                        </div> 

                        <!-- Email Card -->
                        <div class="info-card" style="display: flex; align-items: start; gap: 15px;"> 
                            <svg class="contact-icon" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            <div> 
                                <h4>Email Us</h4> 
                                <p style="color: var(--gray-700);">
                                    <a href="mailto:info@plasticpollutions.org">info@plasticpollutions.org</a><br>
                                    <a href="mailto:support@plasticpollutions.org">support@plasticpollutions.org</a>
                                </p> 
                            </div> 
                        </div> 

                        <!-- Phone Card -->
                        <div class="info-card" style="display: flex; align-items: start; gap: 15px;"> 
                            <svg class="contact-icon" viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                            <div> 
                                <h4>Call Us</h4> 
                                <p style="color: var(--gray-700);">030 241 7057<br>Mon-Fri: 8:00 AM - 5:00 PM</p> 
                            </div> 
                        </div> 

                        <!-- Social Media Card -->
                        <div class="info-card" style="display: flex; align-items: start; gap: 15px;"> 
                            <svg class="contact-icon" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                            <div> 
                                <h4>Follow Us</h4> 
                                <div class="social-buttons"> 
                                    <!-- Real X / Twitter Logo -->
                                    <a href="https://x.com" target="_blank" rel="noopener" class="social-btn" aria-label="X (formerly Twitter)">
                                        <svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                    </a> 
                                    <!-- Real Facebook Logo -->
                                    <a href="https://facebook.com" target="_blank" rel="noopener" class="social-btn" aria-label="Facebook">
                                        <svg viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.8z"/></svg>
                                    </a> 
                                    <!-- Real Instagram Logo -->
                                    <a href="https://instagram.com" target="_blank" rel="noopener" class="social-btn" aria-label="Instagram">
                                        <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                                    </a> 
                                    <!-- Real LinkedIn Logo -->
                                    <a href="https://linkedin.com" target="_blank" rel="noopener" class="social-btn" aria-label="LinkedIn">
                                        <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    </a> 
                                </div> 
                            </div> 
                        </div> 

                    </div> 
                    
                    <!-- Map Component -->
                    <div style="position: relative; width: 100%; padding-top: 56.25%; border-radius: var(--radius-lg, 8px); overflow: hidden; margin-top: 20px;"> 
                        <iframe 
                            src="https://www.google.com/maps?q=Pentecost%20University%20Ghana&output=embed" 
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" 
                            loading="lazy" 
                            allowfullscreen> 
                         iframe> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </section> 
</main> 

<script> 
document.getElementById('contactForm').addEventListener('submit', function(e) { 
    let valid = true; 
    clearErrors(this); 
        
    const name = this.querySelector('[name="name"]'); 
    const email = this.querySelector('[name="email"]'); 
    const subject = this.querySelector('[name="subject"]'); 
    const message = this.querySelector('[name="message"]'); 
        
    if (!name.value.trim() || name.value.trim().length < 2) { 
        showError(name, 'Name must be at least 2 characters'); 
        valid = false; 
    } 
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) { 
        showError(email, 'Please enter a valid email'); 
        valid = false; 
    } 
    if (!subject.value.trim() || subject.value.trim().length < 3) { 
        showError(subject, 'Subject must be at least 3 characters'); 
        valid = false; 
    } 
    if (!message.value.trim() || message.value.trim().length < 10) { 
        showError(message, 'Message must be at least 10 characters'); 
        valid = false; 
    } 
        
    if (!valid) e.preventDefault(); 
}); 
</script> 

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

```