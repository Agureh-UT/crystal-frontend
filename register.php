<?php
$pageTitle = 'Register - Crystal Crown Mobile Detailing';
$pageDescription = 'Create your Crystal Crown Mobile Detailing account for exclusive benefits and easy booking.';
$activePage = 'register';
$navType = 'auth';
include 'header.php';
?>
<?php use Core\FH; ?>

    <section class="auth-section">
        <div class="container">
            <div class="auth-layout">
                <div class="auth-content">
                    <div class="auth-header">
                        <h1 class="auth-title">Create Account</h1>
                        <p class="auth-subtitle">Join Crystal Crown for exclusive benefits and easy booking</p>
                    </div>

                    <div class="auth-card">
                        <div class="register-form" id="registerForm">
                            <?= FH::csrfInput() ?>
                            <div class="form-grid">
                                <?= FH::inputBlock('text', 'First Name', 'firstName', '', ['class'=>'form-input','placeholder'=>'John','required'=>'required'], ['class'=>'form-group'], []) ?>
                                <?= FH::inputBlock('text', 'Last Name', 'lastName', '', ['class'=>'form-input','placeholder'=>'Doe','required'=>'required'], ['class'=>'form-group'], []) ?>
                            </div>

                            <?= FH::inputBlock('email', 'Email Address', 'registerEmail', '', ['class'=>'form-input','placeholder'=>'your@email.com','required'=>'required'], ['class'=>'form-group'], []) ?>

                            <?= FH::inputBlock('tel', 'Phone Number', 'registerPhone', '', ['class'=>'form-input','placeholder'=>'(555) 123-4567','required'=>'required'], ['class'=>'form-group'], []) ?>

                            <?= FH::passwordBlock('password', 'Password', 'registerPassword', '', ['class'=>'form-input','placeholder'=>'Create a strong password','required'=>'required'], ['class'=>'password-toggle','type'=>'button','aria-label'=>'Toggle password visibility'], ['class'=>'password-input-wrapper'], ['class'=>'form-group'], []) ?>
                            <div class="password-strength">
                                <div class="strength-bar">
                                    <div class="strength-fill" id="strengthFill"></div>
                                </div>
                                <span class="strength-text" id="strengthText">Password strength</span>
                            </div>

                            <?= FH::passwordBlock('password', 'Confirm Password', 'confirmPassword', '', ['class'=>'form-input','placeholder'=>'Re-enter your password','required'=>'required'], ['class'=>'password-toggle','type'=>'button','aria-label'=>'Toggle password visibility'], ['class'=>'password-input-wrapper'], ['class'=>'form-group'], []) ?>

                            <?= FH::checkboxBlock('Send me exclusive offers and detailing tips', 'newsletter', false, [], ['class'=>'form-group checkbox-group'], []) ?>

                            <div class="form-group checkbox-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="terms" required>
                                    <span>I agree to the <a href="#" class="inline-link">Terms of Service</a> and <a href="#" class="inline-link">Privacy Policy</a></span>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary btn-full">Create Account</button>
                        </div>

                        <div class="auth-footer">
                            <p>Already have an account? <a href="login.php" class="auth-link">Login here</a></p>
                        </div>
                    </div>
                </div>

                <div class="auth-image">
                    <div class="auth-image-content">
                        <img src="logo.webp" alt="Crystal Crown Logo" class="auth-logo">
                        <h2>Join Our Premium Community</h2>
                        <p>Create an account and enjoy exclusive member benefits.</p>
                        <div class="benefits-list">
                            <div class="benefit-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="benefit-icon">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                                <div>
                                    <h4>Easy Booking</h4>
                                    <p>Schedule services in seconds</p>
                                </div>
                            </div>
                            <div class="benefit-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="benefit-icon">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                                <div>
                                    <h4>Exclusive Discounts</h4>
                                    <p>Member-only special offers</p>
                                </div>
                            </div>
                            <div class="benefit-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="benefit-icon">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                                <div>
                                    <h4>Booking History</h4>
                                    <p>Track all your appointments</p>
                                </div>
                            </div>
                            <div class="benefit-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="benefit-icon">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                                <div>
                                    <h4>Priority Support</h4>
                                    <p>Get help when you need it</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'footer.php'; ?>
