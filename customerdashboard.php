<?php
$pageTitle = 'Dashboard - Crystal Crown Mobile Detailing';
$pageDescription = 'Manage your bookings, view service history, and access exclusive member benefits.';
$activePage = 'dashboard';
$navType = 'dashboard';
include 'header.php';
?>

    <section class="dashboard-header">
        <div class="container">
            <div class="welcome-section">
                <h1 class="dashboard-title">Welcome back, <span class="user-name">John</span></h1>
                <p class="dashboard-subtitle">Manage your appointments and track your vehicle's detailing history</p>
            </div>
        </div>
    </section>

    <section class="dashboard-section">
        <div class="container">
            <div class="dashboard-grid">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <div class="stat-number">3</div>
                            <div class="stat-label">Upcoming Bookings</div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <div class="stat-number">12</div>
                            <div class="stat-label">Completed Services</div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="8" r="7"/>
                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <div class="stat-number">Gold</div>
                            <div class="stat-label">Member Status</div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="12" y1="1" x2="12" y2="23"/>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <div class="stat-number">$150</div>
                            <div class="stat-label">Loyalty Points</div>
                        </div>
                    </div>
                </div>

                <div class="dashboard-content">
                    <div class="content-card">
                        <div class="card-header">
                            <h2 class="card-title">Upcoming Appointments</h2>
                            <a href="bookings.php" class="btn btn-secondary btn-small">Book New Service</a>
                        </div>
                        <div class="appointments-list">
                            <div class="appointment-item">
                                <div class="appointment-date">
                                    <div class="date-day">15</div>
                                    <div class="date-month">Mar</div>
                                </div>
                                <div class="appointment-info">
                                    <h3 class="appointment-title">Full Detail Package</h3>
                                    <div class="appointment-details">
                                        <span class="detail-item">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                                                <circle cx="12" cy="12" r="10"/>
                                                <polyline points="12 6 12 12 16 14"/>
                                            </svg>
                                            10:00 AM - 2:00 PM
                                        </span>
                                        <span class="detail-item">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                                <circle cx="12" cy="10" r="3"/>
                                            </svg>
                                            123 Main St, Your City
                                        </span>
                                        <span class="detail-item vehicle-info">2020 Tesla Model 3</span>
                                    </div>
                                </div>
                                <div class="appointment-actions">
                                    <span class="appointment-status status-confirmed">Confirmed</span>
                                    <div class="action-buttons">
                                        <button class="btn-icon" title="Reschedule">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                                <line x1="16" y1="2" x2="16" y2="6"/>
                                                <line x1="8" y1="2" x2="8" y2="6"/>
                                                <line x1="3" y1="10" x2="21" y2="10"/>
                                            </svg>
                                        </button>
                                        <button class="btn-icon" title="Cancel">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="12" cy="12" r="10"/>
                                                <line x1="15" y1="9" x2="9" y2="15"/>
                                                <line x1="9" y1="9" x2="15" y2="15"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="appointment-item">
                                <div class="appointment-date">
                                    <div class="date-day">22</div>
                                    <div class="date-month">Mar</div>
                                </div>
                                <div class="appointment-info">
                                    <h3 class="appointment-title">Ceramic Coating</h3>
                                    <div class="appointment-details">
                                        <span class="detail-item">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                                                <circle cx="12" cy="12" r="10"/>
                                                <polyline points="12 6 12 12 16 14"/>
                                            </svg>
                                            9:00 AM - 4:00 PM
                                        </span>
                                        <span class="detail-item">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                                <circle cx="12" cy="10" r="3"/>
                                            </svg>
                                            Office Parking Lot
                                        </span>
                                        <span class="detail-item vehicle-info">2019 BMW M4</span>
                                    </div>
                                </div>
                                <div class="appointment-actions">
                                    <span class="appointment-status status-pending">Pending</span>
                                    <div class="action-buttons">
                                        <button class="btn-icon" title="Reschedule">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                                <line x1="16" y1="2" x2="16" y2="6"/>
                                                <line x1="8" y1="2" x2="8" y2="6"/>
                                                <line x1="3" y1="10" x2="21" y2="10"/>
                                            </svg>
                                        </button>
                                        <button class="btn-icon" title="Cancel">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="12" cy="12" r="10"/>
                                                <line x1="15" y1="9" x2="9" y2="15"/>
                                                <line x1="9" y1="9" x2="15" y2="15"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="appointment-item">
                                <div class="appointment-date">
                                    <div class="date-day">05</div>
                                    <div class="date-month">Apr</div>
                                </div>
                                <div class="appointment-info">
                                    <h3 class="appointment-title">Interior Detailing</h3>
                                    <div class="appointment-details">
                                        <span class="detail-item">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                                                <circle cx="12" cy="12" r="10"/>
                                                <polyline points="12 6 12 12 16 14"/>
                                            </svg>
                                            2:00 PM - 4:00 PM
                                        </span>
                                        <span class="detail-item">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                                <circle cx="12" cy="10" r="3"/>
                                            </svg>
                                            Home Driveway
                                        </span>
                                        <span class="detail-item vehicle-info">2020 Tesla Model 3</span>
                                    </div>
                                </div>
                                <div class="appointment-actions">
                                    <span class="appointment-status status-confirmed">Confirmed</span>
                                    <div class="action-buttons">
                                        <button class="btn-icon" title="Reschedule">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                                <line x1="16" y1="2" x2="16" y2="6"/>
                                                <line x1="8" y1="2" x2="8" y2="6"/>
                                                <line x1="3" y1="10" x2="21" y2="10"/>
                                            </svg>
                                        </button>
                                        <button class="btn-icon" title="Cancel">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="12" cy="12" r="10"/>
                                                <line x1="15" y1="9" x2="9" y2="15"/>
                                                <line x1="9" y1="9" x2="15" y2="15"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-cards">
                        <div class="content-card">
                            <div class="card-header">
                                <h2 class="card-title">My Vehicles</h2>
                                <button class="btn-text">+ Add Vehicle</button>
                            </div>
                            <div class="vehicles-list">
                                <div class="vehicle-item">
                                    <div class="vehicle-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M5 17h2v2H5zM17 17h2v2h-2z"/>
                                            <path d="M1 12l1-5h4l2 2h8l2-2h4l1 5v6H1z"/>
                                            <circle cx="7" cy="17" r="2"/>
                                            <circle cx="17" cy="17" r="2"/>
                                        </svg>
                                    </div>
                                    <div class="vehicle-info-text">
                                        <div class="vehicle-name">2020 Tesla Model 3</div>
                                        <div class="vehicle-meta">Black • Performance</div>
                                    </div>
                                </div>
                                <div class="vehicle-item">
                                    <div class="vehicle-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M5 17h2v2H5zM17 17h2v2h-2z"/>
                                            <path d="M1 12l1-5h4l2 2h8l2-2h4l1 5v6H1z"/>
                                            <circle cx="7" cy="17" r="2"/>
                                            <circle cx="17" cy="17" r="2"/>
                                        </svg>
                                    </div>
                                    <div class="vehicle-info-text">
                                        <div class="vehicle-name">2019 BMW M4</div>
                                        <div class="vehicle-meta">White • Coupe</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content-card promo-card">
                            <div class="promo-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="8" r="7"/>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
                                </svg>
                            </div>
                            <h3 class="promo-title">Loyalty Rewards</h3>
                            <p class="promo-text">You have <strong>$150</strong> in reward points!</p>
                            <p class="promo-subtext">Use them on your next booking</p>
                            <button class="btn btn-secondary btn-small btn-full">Redeem Now</button>
                        </div>

                        <div class="content-card">
                            <div class="card-header">
                                <h2 class="card-title">Quick Actions</h2>
                            </div>
                            <div class="quick-actions">
                                <a href="bookings.php" class="action-link">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                        <line x1="16" y1="2" x2="16" y2="6"/>
                                        <line x1="8" y1="2" x2="8" y2="6"/>
                                        <line x1="3" y1="10" x2="21" y2="10"/>
                                    </svg>
                                    <span>Book New Service</span>
                                </a>
                                <a href="profile.php" class="action-link">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                        <circle cx="12" cy="7" r="4"/>
                                    </svg>
                                    <span>Edit Profile</span>
                                </a>
                                <a href="contact.php" class="action-link">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                    </svg>
                                    <span>Contact Support</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-card recent-history">
                    <div class="card-header">
                        <h2 class="card-title">Recent Service History</h2>
                        <button class="btn-text">View All</button>
                    </div>
                    <div class="history-list">
                        <div class="history-item">
                            <div class="history-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                            </div>
                            <div class="history-info">
                                <div class="history-title">Exterior Detail</div>
                                <div class="history-date">Feb 28, 2024 • Tesla Model 3</div>
                            </div>
                            <div class="history-price">$149</div>
                        </div>
                        <div class="history-item">
                            <div class="history-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                            </div>
                            <div class="history-info">
                                <div class="history-title">Full Detail Package</div>
                                <div class="history-date">Jan 15, 2024 • BMW M4</div>
                            </div>
                            <div class="history-price">$249</div>
                        </div>
                        <div class="history-item">
                            <div class="history-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                            </div>
                            <div class="history-info">
                                <div class="history-title">Headlight Restoration</div>
                                <div class="history-date">Dec 10, 2023 • Tesla Model 3</div>
                            </div>
                            <div class="history-price">$79</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'footer.php'; ?>
