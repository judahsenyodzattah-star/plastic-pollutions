/**
 * PlasticPollutions - Main JavaScript
 * Modern Interactive Enhancement
 */
document.addEventListener('DOMContentLoaded', function () {
    initNavbar();
    initCookieBanner();
    initAnimatedCounters();
    initImageSlider();
    initParticles();
    initScrollAnimations();
    initBackToTop();
    initModalAccessibility();
    initSmoothScrolling();
    initInteractiveCards();
    initPledgeSystem();
    initPasswordToggles();
});

/* ============================================
   Navigation
   ============================================= */
function initNavbar() {
    const toggle   = document.querySelector('.nav-toggle');
    const menu     = document.querySelector('.nav-menu');
    const overlay  = document.getElementById('navOverlay');
    const navbar   = document.querySelector('.navbar');

    if (toggle && menu) {
        function openMenu() {
            toggle.classList.add('active');
            menu.classList.add('active');
            if (overlay) overlay.classList.add('active');
            toggle.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
        }

        function closeMenu() {
            toggle.classList.remove('active');
            menu.classList.remove('active');
            if (overlay) overlay.classList.remove('active');
            toggle.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        }

        toggle.addEventListener('click', () => {
            toggle.classList.contains('active') ? closeMenu() : openMenu();
        });

        toggle.addEventListener('keydown', e => {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); toggle.click(); }
        });

        if (overlay) overlay.addEventListener('click', closeMenu);

        menu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => closeMenu());
        });

        document.querySelectorAll('.nav-item').forEach(item => {
            const link     = item.querySelector('.nav-link');
            const dropdown = item.querySelector('.dropdown-menu');
            if (dropdown && window.innerWidth <= 992) {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    dropdown.classList.toggle('show');
                });
            }
        });
    }

    window.addEventListener('scroll', () => {
        if (navbar) navbar.classList.toggle('scrolled', window.scrollY > 50);
    }, { passive: true });
}

/* ============================================
   Cookie Banner
   ============================================= */
function initCookieBanner() {
    const banner    = document.getElementById('cookieBanner');
    if (!banner) return;

    if (!localStorage.getItem('cookiesAccepted')) {
        setTimeout(() => banner.classList.add('show'), 1200);
    }

    const acceptBtn = document.getElementById('acceptCookies');
    const learnBtn  = document.getElementById('learnCookies');

    if (acceptBtn) {
        acceptBtn.addEventListener('click', () => {
            localStorage.setItem('cookiesAccepted', 'true');
            banner.classList.remove('show');
        });
    }

    if (learnBtn) {
        learnBtn.addEventListener('click', () => {
            showAlert('We use cookies to improve your experience on our website. Cookies help us understand how you interact with our site, remember your preferences, and provide relevant content.', 'info');
        });
    }
}

/* ============================================
   Animated Counters
   ============================================= */
function initAnimatedCounters() {
    const counters = document.querySelectorAll('[data-count]');
    if (!counters.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));
}

function animateCounter(element) {
    const target    = parseInt(element.dataset.count);
    const suffix    = element.dataset.suffix || '';
    const prefix    = element.dataset.prefix || '';
    const duration  = 2000;
    const startTime = performance.now();

    function update(currentTime) {
        const elapsed  = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const eased    = 1 - Math.pow(1 - progress, 3);
        const current  = Math.floor(target * eased);

        element.textContent = prefix + current.toLocaleString() + suffix;

        if (progress < 1) requestAnimationFrame(update);
    }

    requestAnimationFrame(update);
}

/* ============================================
   Image Slider
   ============================================= */
function initImageSlider() {
    const slider = document.querySelector('.slider');
    if (!slider) return;

    const slides  = slider.querySelectorAll('.slide');
    const dots    = document.querySelectorAll('.slider-dot');
    const prevBtn = document.querySelector('.slider-arrow.prev');
    const nextBtn = document.querySelector('.slider-arrow.next');
    let currentSlide = 0;
    let autoPlay;

    function goToSlide(index) {
        currentSlide = (index + slides.length) % slides.length;
        slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        dots.forEach((dot, i) => dot.classList.toggle('active', i === currentSlide));
    }

    function nextSlide() { goToSlide(currentSlide + 1); }
    function prevSlide() { goToSlide(currentSlide - 1); }

    function resetAutoPlay() {
        clearInterval(autoPlay);
        autoPlay = setInterval(nextSlide, 5000);
    }

    if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); resetAutoPlay(); });
    if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); resetAutoPlay(); });

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => { goToSlide(index); resetAutoPlay(); });
    });

    let touchStartX = 0;
    slider.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; }, { passive: true });
    slider.addEventListener('touchend', e => {
        const diff = touchStartX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 40) { diff > 0 ? nextSlide() : prevSlide(); resetAutoPlay(); }
    });

    const sliderSection = document.querySelector('.slider-section');
    if (sliderSection) {
        sliderSection.setAttribute('tabindex', '0');
        sliderSection.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft')  { prevSlide(); resetAutoPlay(); }
            if (e.key === 'ArrowRight') { nextSlide(); resetAutoPlay(); }
        });
    }

    autoPlay = setInterval(nextSlide, 5000);
    goToSlide(0);
}

/* ============================================
   Particles Background
   ============================================= */
function initParticles() {
    const container = document.querySelector('.particles');
    if (!container) return;

    const count = window.innerWidth < 600 ? 14 : 28;

    for (let i = 0; i < count; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        const size = Math.random() * 60 + 8;
        particle.style.left             = Math.random() * 100 + '%';
        particle.style.top              = Math.random() * 100 + '%';
        particle.style.width            = size + 'px';
        particle.style.height           = size + 'px';
        particle.style.animationDelay   = Math.random() * 15 + 's';
        particle.style.animationDuration = (Math.random() * 18 + 10) + 's';
        particle.style.background       = `rgba(255,255,255,${Math.random() * 0.06 + 0.02})`;
        container.appendChild(particle);
    }
}

/* ============================================
   Scroll Animations
   ============================================= */
function initScrollAnimations() {
    const elements = document.querySelectorAll('.animate-on-scroll');
    if (elements.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        elements.forEach(el => observer.observe(el));
    }

    const reveals = document.querySelectorAll('.reveal');
    if (reveals.length) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        reveals.forEach(el => revealObserver.observe(el));
    }

    const progressBars = document.querySelectorAll('.progress-fill[data-width]');
    if (progressBars.length) {
        const progressObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.width = entry.target.dataset.width;
                    progressObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.4 });
        progressBars.forEach(bar => progressObserver.observe(bar));
    }
}

/* ============================================
   Smooth Scrolling
   ============================================= */
function initSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

/* ============================================
   Interactive Cards (Donation options only)
   ============================================= */
function initInteractiveCards() {
    // Donation option cards — only one can be selected at a time
    document.querySelectorAll('.donation-option').forEach(opt => {
        opt.addEventListener('click', function() {
            document.querySelectorAll('.donation-option').forEach(o => o.classList.remove('selected'));
            this.classList.add('selected');
            const input = document.getElementById('donationAmount');
            if (input) input.value = this.dataset.amount;
        });
    });
}

/* ============================================
   Pledge System (select one or multiple)
   ============================================= */
function initPledgeSystem() {
    var pledgeCards = document.querySelectorAll('.pledge-card');
    if (!pledgeCards.length) return;

    pledgeCards.forEach(function(card) {
        // Remove any inline onclick to avoid double-firing
        card.removeAttribute('onclick');

        card.addEventListener('click', function(e) {
            // Don't interfere with links or buttons inside the card
            if (e.target.tagName === 'A' || e.target.tagName === 'BUTTON') return;

            this.classList.toggle('selected');

            // Update aria for accessibility
            var isSelected = this.classList.contains('selected');
            this.setAttribute('aria-checked', isSelected ? 'true' : 'false');

            // Update counter
            updatePledgeCount();
        });

        // Keyboard support
        card.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });

    function updatePledgeCount() {
        var count = document.querySelectorAll('.pledge-card.selected').length;
        var el = document.getElementById('pledgeCount');
        if (!el) return;

        if (count === 0) {
            el.textContent = '';
        } else {
            el.textContent = '✓ ' + count + (count === 1 ? ' pledge' : ' pledges') + ' selected';
            el.style.color = '#0a7c3e';
        }
    }
}

/* ============================================
   Submit Pledges
   ============================================= */
function submitPledges() {
    var selected = document.querySelectorAll('.pledge-card.selected');
    var resultEl = document.getElementById('pledgeResult');

    if (selected.length === 0) {
        resultEl.innerHTML = '<div class="alert alert-warning">⚠ Please select at least one pledge.</div>';
        return;
    }

    var pledges = [];
    selected.forEach(function(card) {
        pledges.push(card.getAttribute('data-pledge'));
    });

    fetch(window.SITE_URL ? window.SITE_URL + '/pages/submit-pledge.php' : '/pages/submit-pledge.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ pledges: pledges })
    })
    .then(function(res) { return res.json(); })
    .then(function(data) {
        resultEl.innerHTML =
            '<div class="alert alert-' + (data.success ? 'success' : 'error') + '">' +
            (data.success ? '✓' : '✕') + ' ' + data.message + '</div>';
    })
    .catch(function() {
        resultEl.innerHTML = '<div class="alert alert-error">✕ An error occurred.</div>';
    });
}

/* ============================================
   Sign Up Modal
   ============================================= */
function openSignupModal() {
    const modal = document.getElementById('signupModal');
    if (!modal) return;

    modal.classList.add('active');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
}

function closeSignupModal() {
    const modal = document.getElementById('signupModal');
    if (!modal) return;

    modal.classList.remove('active');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
}

/* ============================================
   Modal Accessibility
   ============================================= */
function initModalAccessibility() {
    const modal = document.getElementById('signupModal');
    if (!modal) return;

    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeSignupModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeSignupModal();
        }
    });
}

/* ============================================
   Form Validation
   ============================================= */
function validateSignupForm(form) {
    let isValid = true;
    clearErrors(form);

    const firstName = form.querySelector('[name="first_name"]');
    const lastName  = form.querySelector('[name="last_name"]');
    const email     = form.querySelector('[name="email"]');
    const password  = form.querySelector('[name="password"]');

    if (!firstName.value.trim() || firstName.value.trim().length < 2) {
        showError(firstName, 'First name must be at least 2 characters');
        isValid = false;
    }

    if (!lastName.value.trim() || lastName.value.trim().length < 2) {
        showError(lastName, 'Last name must be at least 2 characters');
        isValid = false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value.trim())) {
        showError(email, 'Please enter a valid email address');
        isValid = false;
    }

    if (password.value.length < 8) {
        showError(password, 'Password must be at least 8 characters');
        isValid = false;
    } else if (!/[A-Z]/.test(password.value)) {
        showError(password, 'Password must contain at least one uppercase letter');
        isValid = false;
    } else if (!/[0-9]/.test(password.value)) {
        showError(password, 'Password must contain at least one number');
        isValid = false;
    }

    return isValid;
}

function showError(input, message) {
    input.classList.add('error');
    const errorEl = input.parentElement.querySelector('.form-error');
    if (errorEl) {
        errorEl.textContent = message;
        errorEl.classList.add('show');
    }
}

function clearErrors(form) {
    form.querySelectorAll('.form-control').forEach(input => input.classList.remove('error'));
    form.querySelectorAll('.form-error').forEach(error => {
        error.classList.remove('show');
        error.textContent = '';
    });
}

/* ============================================
   AJAX Form Submission
   ============================================= */
function submitForm(form, url, callback) {
    const formData   = new FormData(form);
    const submitBtn  = form.querySelector('[type="submit"]');
    const originalText = submitBtn ? submitBtn.textContent : '';

    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner" style="width:18px;height:18px;border-width:2px;margin:0;"></span> Processing...';
    }

    fetch(url, { method: 'POST', body: formData })
        .then(response => response.json())
        .then(data => { if (callback) callback(data); })
        .catch(error => {
            console.error('Error:', error);
            showAlert('An error occurred. Please try again.', 'error');
        })
        .finally(() => {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }
        });
}

/* ============================================
   Alert System
   ============================================= */
function showAlert(message, type = 'success', container = null) {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type}`;

    const icons = {
        success: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>',
        error: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>',
        warning: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
        info: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>'
    };
    
    alertDiv.innerHTML = `${icons[type] || ''} <span>${message}</span>`;

    const target = container
        || document.querySelector('.alert-container')
        || document.querySelector('.modal.active')
        || document.body;

    target.querySelectorAll('.alert').forEach(a => a.remove());

    target.firstChild
        ? target.insertBefore(alertDiv, target.firstChild)
        : target.appendChild(alertDiv);

    setTimeout(() => {
        alertDiv.style.opacity = '0';
        alertDiv.style.transform = 'translateY(-8px)';
        setTimeout(() => alertDiv.remove(), 300);
    }, 5000);
}

/* ============================================
   Donation Amount Selector
   ============================================= */
function selectDonationAmount(amount, button = null) {
    document.querySelectorAll('.donation-option').forEach(function(option) {
        option.classList.remove('selected');
    });

    if (button) {
        button.classList.add('selected');
    }

    const donatePageInput = document.getElementById('donateAmount');
    const generalDonationInput = document.getElementById('donationAmount');

    if (donatePageInput) {
        donatePageInput.value = amount;
        donatePageInput.focus();
    }

    if (generalDonationInput) {
        generalDonationInput.value = amount;
        generalDonationInput.focus();
    }
}

/* ============================================
   Password Strength Meter
   ============================================= */
function checkPasswordStrength(password) {
    let strength = 0;
    if (password.length >= 8)           strength++;
    if (password.length >= 12)          strength++;
    if (/[A-Z]/.test(password))         strength++;
    if (/[a-z]/.test(password))         strength++;
    if (/[0-9]/.test(password))         strength++;
    if (/[^A-Za-z0-9]/.test(password))  strength++;

    const meter = document.getElementById('passwordStrength');
    if (!meter) return;

    const levels = ['Very Weak', 'Weak', 'Fair', 'Good', 'Strong', 'Very Strong'];
    const colors = ['#c0392b',   '#e07b00', '#d4c60a', '#0d9e50', '#0a7c3e', '#065c2e'];
    const widths = ['16%', '33%', '50%', '66%', '83%', '100%'];

    const index = Math.min(strength, levels.length - 1);
    const fill  = meter.querySelector('.progress-fill');
    const text  = meter.querySelector('.strength-text');

    meter.style.display = password.length ? 'block' : 'none';

    if (fill) { fill.style.width = widths[index]; fill.style.background = colors[index]; }
    if (text) { text.textContent = levels[index]; text.style.color = colors[index]; }
}

/* ============================================
   Back to Top Button
   ============================================= */
function initBackToTop() {
    const btn = document.createElement('button');
    btn.id = 'backToTop';
    btn.setAttribute('aria-label', 'Back to top');
    btn.innerHTML = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"/></svg>`;
    btn.style.cssText = `
        position:fixed; bottom:24px; right:24px; z-index:900;
        width:44px; height:44px; border-radius:50%; border:none;
        background:var(--primary); color:#fff; cursor:pointer;
        display:flex; align-items:center; justify-content:center;
        box-shadow:0 4px 16px rgba(10,124,62,0.35);
        opacity:0; transform:translateY(12px) scale(0.9);
        transition:opacity 0.3s, transform 0.3s;
        pointer-events:none;
    `;
    document.body.appendChild(btn);

    window.addEventListener('scroll', () => {
        const show = window.scrollY > 400;
        btn.style.opacity       = show ? '1' : '0';
        btn.style.transform     = show ? 'translateY(0) scale(1)' : 'translateY(12px) scale(0.9)';
        btn.style.pointerEvents = show ? 'auto' : 'none';
    }, { passive: true });

    btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
}

/* ============================================
   Theme Toggle (Dark/Light)
   ============================================= */
function toggleTheme() {
    const html = document.documentElement;
    const currentTheme = html.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    html.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
}

document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        document.documentElement.setAttribute('data-theme', savedTheme);
    }
});

function initPasswordToggles() {
    document.querySelectorAll('.password-toggle').forEach(function(button) {
        button.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);

            if (!input) return;

            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            this.textContent = isHidden ? 'Hide' : 'Show';
            this.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
            this.setAttribute('aria-pressed', isHidden ? 'true' : 'false');
        });
    });
}