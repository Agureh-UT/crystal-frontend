<?php
$pageTitle = 'Crystal Crown Mobile Detailing - Premium Car Detailing Services';
$pageDescription = 'Professional mobile car detailing services. We bring luxury detailing to your doorstep.';
$activePage = 'home';
$navType = 'public';
include 'header.php';
?>

    <section class="hero">
        <div class="hero-video-container">
            <video autoplay muted loop playsinline class="hero-video">
                <source src="hero-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="hero-overlay"></div>
        </div>
        <div class="container hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    <span class="title-line">Premium Mobile</span>
                    <span class="title-line">Detailing Excellence</span>
                </h1>
                <p class="hero-subtitle">Where luxury meets convenience. Professional detailing delivered to your location.</p>
                <div class="hero-buttons">
                    <a href="bookings.php" class="btn btn-primary">Book Your Service</a>
                    <a href="#services" class="btn btn-secondary">Explore Services</a>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <span>Scroll</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <h3>Mobile Service</h3>
                    <p>We come to you - home, office, or anywhere convenient</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                    </div>
                    <h3>Premium Products</h3>
                    <p>Professional-grade products for exceptional results</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                        </svg>
                    </div>
                    <h3>Expert Technicians</h3>
                    <p>Trained professionals dedicated to perfection</p>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="services">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our Premium Services</h2>
                <p class="section-subtitle">Tailored detailing packages to restore and protect your vehicle's elegance</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-image">
                        <img src="placeholder.png" alt="Exterior Detailing" loading="lazy">
                        <div class="service-overlay">
                            <a href="bookings.php" class="service-btn">Book Now</a>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Exterior Detailing</h3>
                        <p class="service-description">Complete exterior restoration including hand wash, clay bar treatment, polish, and premium wax protection.</p>
                        <div class="service-features">
                            <span class="feature-tag">Hand Wash</span>
                            <span class="feature-tag">Clay Bar</span>
                            <span class="feature-tag">Polish & Wax</span>
                        </div>
                        <div class="service-price">From $149</div>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-image">
                        <img src="placeholder.png" alt="Interior Detailing" loading="lazy">
                        <div class="service-overlay">
                            <a href="bookings.php" class="service-btn">Book Now</a>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Interior Detailing</h3>
                        <p class="service-description">Deep interior cleaning with vacuum, steam cleaning, leather conditioning, and odor elimination.</p>
                        <div class="service-features">
                            <span class="feature-tag">Steam Clean</span>
                            <span class="feature-tag">Leather Care</span>
                            <span class="feature-tag">Odor Removal</span>
                        </div>
                        <div class="service-price">From $129</div>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-image">
                        <img src="placeholder.png" alt="Full Detail Package" loading="lazy">
                        <div class="service-overlay">
                            <a href="bookings.php" class="service-btn">Book Now</a>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Full Detail Package</h3>
                        <p class="service-description">Complete interior and exterior transformation. Our most comprehensive detailing service.</p>
                        <div class="service-features">
                            <span class="feature-tag">Complete Detail</span>
                            <span class="feature-tag">Paint Correction</span>
                            <span class="feature-tag">Protection</span>
                        </div>
                        <div class="service-price">From $249</div>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-image">
                        <img src="placeholder.png" alt="Ceramic Coating" loading="lazy">
                        <div class="service-overlay">
                            <a href="bookings.php" class="service-btn">Book Now</a>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Ceramic Coating</h3>
                        <p class="service-description">Long-lasting paint protection with enhanced gloss and hydrophobic properties.</p>
                        <div class="service-features">
                            <span class="feature-tag">5-Year Protection</span>
                            <span class="feature-tag">Hydrophobic</span>
                            <span class="feature-tag">UV Shield</span>
                        </div>
                        <div class="service-price">From $599</div>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-image">
                        <img src="placeholder.png" alt="Headlight Restoration" loading="lazy">
                        <div class="service-overlay">
                            <a href="bookings.php" class="service-btn">Book Now</a>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Headlight Restoration</h3>
                        <p class="service-description">Restore clarity and brightness to oxidized, yellowed headlights for improved safety and appearance.</p>
                        <div class="service-features">
                            <span class="feature-tag">UV Protection</span>
                            <span class="feature-tag">Clarity Restore</span>
                            <span class="feature-tag">Safety</span>
                        </div>
                        <div class="service-price">From $79</div>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-image">
                        <img src="placeholder.png" alt="Engine Bay Detailing" loading="lazy">
                        <div class="service-overlay">
                            <a href="bookings.php" class="service-btn">Book Now</a>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Engine Bay Detailing</h3>
                        <p class="service-description">Professional engine bay cleaning and dressing for a showroom-quality finish under the hood.</p>
                        <div class="service-features">
                            <span class="feature-tag">Degreasing</span>
                            <span class="feature-tag">Safe Cleaning</span>
                            <span class="feature-tag">Protection</span>
                        </div>
                        <div class="service-price">From $99</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">What Our Clients Say</h2>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-text">"Absolutely phenomenal service! My car looks better than the day I bought it. The mobile service is incredibly convenient."</p>
                    <div class="testimonial-author">- Marcus J.</div>
                </div>
                <div class="testimonial-card">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-text">"The attention to detail is unmatched. Crystal Crown transformed my interior completely. Highly recommend!"</p>
                    <div class="testimonial-author">- Sarah K.</div>
                </div>
                <div class="testimonial-card">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-text">"Professional, punctual, and the results are outstanding. The ceramic coating has kept my car looking pristine."</p>
                    <div class="testimonial-author">- David M.</div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Ready to Experience Premium Detailing?</h2>
                <p class="cta-subtitle">Book your appointment today and discover the Crystal Crown difference</p>
                <a href="bookings.php" class="btn btn-primary btn-large">Schedule Your Service</a>
            </div>
        </div>
    </section>

<?php include 'footer.php'; ?>
