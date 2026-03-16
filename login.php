<?php
$pageTitle = 'Login - Crystal Crown Mobile Detailing';
$pageDescription = 'Login to your Crystal Crown Mobile Detailing account to manage bookings and preferences.';
$activePage = 'login';
$navType = 'auth';
include 'header.php';
?>

    <section class="auth-section">
        <div class="container">
            <div class="auth-layout">
                <div class="auth-content">
                    <div class="auth-header">
                        <h1 class="auth-title">Welcome Back</h1>
                        <p class="auth-subtitle">Login to manage your bookings and preferences</p>
                    </div>

                    <div class="auth-card">
                        <div class="login-form" id="loginForm">
                            <div class="form-group">
                                <label for="loginEmail">Email Address</label>
                                <input type="email" id="loginEmail" name="email" placeholder="your@email.com" required>
                            </div>

                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <div class="password-input-wrapper">
                                    <input type="password" id="loginPassword" name="password" placeholder="Enter your password" required>
                                    <button type="button" class="password-toggle" aria-label="Toggle password visibility">
                                        <svg class="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="form-options">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="rememberMe">
                                    <span>Remember me</span>
                                </label>
                                <a href="#" class="forgot-password">Forgot Password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary btn-full">Login</button>

                            <div class="auth-divider">
                                <span>or continue with</span>
                            </div>

                            <div class="social-login">
                                <button type="button" class="btn-social btn-google">
                                    <svg viewBox="0 0 24 24" width="20" height="20">
                                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                    </svg>
                                    Google
                                </button>
                                <button type="button" class="btn-social btn-facebook">
                                    <svg viewBox="0 0 24 24" width="20" height="20" fill="#1877F2">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                    Facebook
                                </button>
                            </div>
                        </div>

                        <div class="auth-footer">
                            <p>Don't have an account? <a href="register.php" class="auth-link">Sign up now</a></p>
                        </div>
                    </div>
                </div>

                <div class="auth-image">
                    <div class="auth-image-content">
                        <img src="logo.webp" alt="Crystal Crown Logo" class="auth-logo">
                        <h2>Premium Detailing Excellence</h2>
                        <p>Join thousands of satisfied customers who trust Crystal Crown for their vehicle care needs.</p>
                        <div class="auth-stats">
                            <div class="stat-item">
                                <div class="stat-number">5,000+</div>
                                <div class="stat-label">Happy Customers</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">4.9★</div>
                                <div class="stat-label">Average Rating</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">10+</div>
                                <div class="stat-label">Years Experience</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'footer.php'; ?>
