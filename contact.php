<?php
$pageTitle = 'Contact Us - Crystal Crown Mobile Detailing';
$pageDescription = 'Get in touch with Crystal Crown Mobile Detailing. We\'re here to answer your questions.';
$activePage = 'contact';
$navType = 'public';
include 'header.php';
?>
<?php use Core\FH; ?>

    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Contact Us</h1>
            <p class="page-subtitle">We're here to help. Get in touch with our team.</p>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
            <div class="contact-layout">
                <div class="contact-info">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <h3>Service Area</h3>
                        <p>We serve the greater metropolitan area and surrounding communities. Mobile service brings us to your location.</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </div>
                        <h3>Phone</h3>
                        <p><a href="tel:+15551234567">+1 (555) 123-4567</a></p>
                        <p class="contact-hours">Mon - Sun: 8:00 AM - 8:00 PM</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </div>
                        <h3>Email</h3>
                        <p><a href="mailto:info@crystalcrown.com">info@crystalcrown.com</a></p>
                        <p class="contact-hours">We respond within 24 hours</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                        </div>
                        <h3>Business Hours</h3>
                        <p>Monday - Sunday</p>
                        <p class="contact-hours">8:00 AM - 8:00 PM</p>
                        <p class="contact-note">Flexible scheduling available</p>
                    </div>
                </div>

                <div class="contact-form-container">
                    <div class="form-card">
                        <h2 class="form-title">Send Us a Message</h2>
                        <p class="form-description">Have a question or special request? Fill out the form below and we'll get back to you shortly.</p>

                        <div class="contact-form" id="contactForm">
                            <?= FH::csrfInput() ?>
                            <div class="form-grid">
                                <?= FH::inputBlock('text', 'Full Name', 'contactName', '', ['class'=>'form-input','placeholder'=>'John Doe','required'=>'required'], ['class'=>'form-group'], []) ?>
                                <?= FH::inputBlock('tel', 'Phone Number', 'contactPhone', '', ['class'=>'form-input','placeholder'=>'(555) 123-4567','required'=>'required'], ['class'=>'form-group'], []) ?>
                            </div>

                            <?= FH::inputBlock('email', 'Email Address', 'contactEmail', '', ['class'=>'form-input','placeholder'=>'your@email.com','required'=>'required'], ['class'=>'form-group'], []) ?>

                            <?= FH::selectBlock('Inquiry Type', 'inquiryType', '', ['' => 'Select inquiry type', 'general' => 'General Question', 'quote' => 'Request a Quote', 'booking' => 'Booking Inquiry', 'feedback' => 'Feedback', 'partnership' => 'Partnership Opportunity', 'other' => 'Other'], ['class'=>'form-select','required'=>'required'], ['class'=>'form-group'], []) ?>

                            <?= FH::textareaBlock('Message', 'contactMessage', '', ['class'=>'form-textarea','rows'=>'6','placeholder'=>'Tell us how we can help you...','required'=>'required'], ['class'=>'form-group'], []) ?>

                            <button type="submit" class="btn btn-primary btn-submit">Send Message</button>
                        </div>

                        <div class="form-success" id="formSuccess">
                            <div class="success-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                            </div>
                            <h3>Message Sent Successfully!</h3>
                            <p>Thank you for contacting us. We'll get back to you within 24 hours.</p>
                            <button type="button" class="btn btn-secondary" id="sendAnother">Send Another Message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Frequently Asked Questions</h2>
            </div>
            <div class="faq-grid">
                <div class="faq-item">
                    <button class="faq-question">
                        <span>How long does a typical detail take?</span>
                        <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p>Service times vary based on the package selected. An exterior detail typically takes 2-3 hours, interior detail 2-3 hours, and a full detail package 4-6 hours. We'll provide an accurate time estimate when you book.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Do you provide water and electricity?</span>
                        <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p>We are completely self-contained and bring our own water and power supply. All we need is access to your vehicle and a safe place to park our service vehicle.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>What payment methods do you accept?</span>
                        <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p>We accept cash, all major credit cards, debit cards, and digital payment methods including Venmo, PayPal, and Zelle. Payment is collected after service completion.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Do I need to be present during the service?</span>
                        <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p>You don't need to be present the entire time, but we do need you at the beginning to hand over keys and at the end for payment and vehicle inspection. Many clients drop keys and go about their day.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>What if I need to cancel or reschedule?</span>
                        <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p>We understand plans change. Please give us at least 24 hours notice for cancellations or rescheduling. Same-day cancellations may incur a service fee.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Are your products safe for all vehicle types?</span>
                        <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p>Yes! We use professional-grade products that are safe for all paint types, finishes, and interior materials. We also offer eco-friendly product options upon request.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Ready to Get Started?</h2>
                <p class="cta-subtitle">Book your appointment online or give us a call</p>
                <div class="cta-buttons">
                    <a href="bookings.php" class="btn btn-primary btn-large">Book Online</a>
                    <a href="tel:+15551234567" class="btn btn-secondary btn-large">Call Us</a>
                </div>
            </div>
        </div>
    </section>

<?php include 'footer.php'; ?>
