<?php
$pageTitle = 'Book Your Service - Crystal Crown Mobile Detailing';
$pageDescription = 'Book your premium mobile car detailing service online. Fast, convenient scheduling.';
$activePage = 'bookings';
$navType = 'public';
include 'header.php';
?>

    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Book Your Service</h1>
            <p class="page-subtitle">Schedule your premium detailing appointment in minutes</p>
        </div>
    </section>

    <section class="booking-section">
        <div class="container">
            <div class="booking-layout">
                <div class="booking-form-container">
                    <div class="form-card">
                        <div class="progress-bar">
                            <div class="progress-step active" data-step="1">
                                <div class="step-number">1</div>
                                <span>Service</span>
                            </div>
                            <div class="progress-line"></div>
                            <div class="progress-step" data-step="2">
                                <div class="step-number">2</div>
                                <span>Vehicle</span>
                            </div>
                            <div class="progress-line"></div>
                            <div class="progress-step" data-step="3">
                                <div class="step-number">3</div>
                                <span>Schedule</span>
                            </div>
                            <div class="progress-line"></div>
                            <div class="progress-step" data-step="4">
                                <div class="step-number">4</div>
                                <span>Contact</span>
                            </div>
                        </div>

                        <div class="booking-form" id="bookingForm">
                            <div class="form-step active" data-step="1">
                                <h3 class="step-title">Select Your Service</h3>
                                <div class="service-options">
                                    <label class="service-option">
                                        <input type="radio" name="service" value="exterior" required>
                                        <div class="option-card">
                                            <h4>Exterior Detailing</h4>
                                            <p>Hand wash, clay bar, polish & wax</p>
                                            <span class="option-price">From $149</span>
                                        </div>
                                    </label>
                                    <label class="service-option">
                                        <input type="radio" name="service" value="interior" required>
                                        <div class="option-card">
                                            <h4>Interior Detailing</h4>
                                            <p>Deep clean, steam, conditioning</p>
                                            <span class="option-price">From $129</span>
                                        </div>
                                    </label>
                                    <label class="service-option">
                                        <input type="radio" name="service" value="full" required>
                                        <div class="option-card">
                                            <h4>Full Detail Package</h4>
                                            <p>Complete interior & exterior</p>
                                            <span class="option-price">From $249</span>
                                        </div>
                                    </label>
                                    <label class="service-option">
                                        <input type="radio" name="service" value="ceramic" required>
                                        <div class="option-card">
                                            <h4>Ceramic Coating</h4>
                                            <p>5-year paint protection</p>
                                            <span class="option-price">From $599</span>
                                        </div>
                                    </label>
                                    <label class="service-option">
                                        <input type="radio" name="service" value="headlight" required>
                                        <div class="option-card">
                                            <h4>Headlight Restoration</h4>
                                            <p>Clarity & UV protection</p>
                                            <span class="option-price">From $79</span>
                                        </div>
                                    </label>
                                    <label class="service-option">
                                        <input type="radio" name="service" value="engine" required>
                                        <div class="option-card">
                                            <h4>Engine Bay Detail</h4>
                                            <p>Professional degreasing & dressing</p>
                                            <span class="option-price">From $99</span>
                                        </div>
                                    </label>
                                </div>
                                <button type="button" class="btn btn-primary btn-next">Continue</button>
                            </div>

                            <div class="form-step" data-step="2">
                                <h3 class="step-title">Vehicle Information</h3>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label for="vehicleMake">Make</label>
                                        <input type="text" id="vehicleMake" name="vehicleMake" placeholder="e.g., Toyota" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="vehicleModel">Model</label>
                                        <input type="text" id="vehicleModel" name="vehicleModel" placeholder="e.g., Camry" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="vehicleYear">Year</label>
                                        <input type="number" id="vehicleYear" name="vehicleYear" placeholder="e.g., 2020" min="1980" max="2025" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="vehicleColor">Color</label>
                                        <input type="text" id="vehicleColor" name="vehicleColor" placeholder="e.g., Black" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="vehicleCondition">Current Condition</label>
                                    <select id="vehicleCondition" name="vehicleCondition" required>
                                        <option value="">Select condition</option>
                                        <option value="excellent">Excellent - Regular maintenance</option>
                                        <option value="good">Good - Minor dirt/dust</option>
                                        <option value="fair">Fair - Moderate cleaning needed</option>
                                        <option value="poor">Poor - Heavy cleaning required</option>
                                    </select>
                                </div>
                                <div class="form-buttons">
                                    <button type="button" class="btn btn-secondary btn-prev">Back</button>
                                    <button type="button" class="btn btn-primary btn-next">Continue</button>
                                </div>
                            </div>

                            <div class="form-step" data-step="3">
                                <h3 class="step-title">Schedule & Location</h3>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label for="appointmentDate">Preferred Date</label>
                                        <input type="date" id="appointmentDate" name="appointmentDate" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="appointmentTime">Preferred Time</label>
                                        <select id="appointmentTime" name="appointmentTime" required>
                                            <option value="">Select time</option>
                                            <option value="08:00">8:00 AM</option>
                                            <option value="09:00">9:00 AM</option>
                                            <option value="10:00">10:00 AM</option>
                                            <option value="11:00">11:00 AM</option>
                                            <option value="12:00">12:00 PM</option>
                                            <option value="13:00">1:00 PM</option>
                                            <option value="14:00">2:00 PM</option>
                                            <option value="15:00">3:00 PM</option>
                                            <option value="16:00">4:00 PM</option>
                                            <option value="17:00">5:00 PM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="serviceAddress">Service Address</label>
                                    <input type="text" id="serviceAddress" name="serviceAddress" placeholder="Street Address" required>
                                </div>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" id="city" name="city" placeholder="City" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="zipCode">ZIP Code</label>
                                        <input type="text" id="zipCode" name="zipCode" placeholder="ZIP Code" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="parkingNotes">Parking Instructions (Optional)</label>
                                    <textarea id="parkingNotes" name="parkingNotes" rows="3" placeholder="Any special parking instructions or gate codes?"></textarea>
                                </div>
                                <div class="form-buttons">
                                    <button type="button" class="btn btn-secondary btn-prev">Back</button>
                                    <button type="button" class="btn btn-primary btn-next">Continue</button>
                                </div>
                            </div>

                            <div class="form-step" data-step="4">
                                <h3 class="step-title">Contact Information</h3>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" placeholder="your@email.com" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" placeholder="(555) 123-4567" required>
                                </div>
                                <div class="form-group">
                                    <label for="specialRequests">Special Requests (Optional)</label>
                                    <textarea id="specialRequests" name="specialRequests" rows="3" placeholder="Any special requests or concerns we should know about?"></textarea>
                                </div>
                                <div class="form-group checkbox-group">
                                    <label>
                                        <input type="checkbox" name="terms" required>
                                        <span>I agree to the terms and conditions</span>
                                    </label>
                                </div>
                                <div class="form-buttons">
                                    <button type="button" class="btn btn-secondary btn-prev">Back</button>
                                    <button type="submit" class="btn btn-primary btn-submit">Complete Booking</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="booking-summary">
                    <div class="summary-card">
                        <h3 class="summary-title">Booking Summary</h3>
                        <div class="summary-content">
                            <div class="summary-item">
                                <span class="summary-label">Service:</span>
                                <span class="summary-value" id="summaryService">Not selected</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Vehicle:</span>
                                <span class="summary-value" id="summaryVehicle">Not provided</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Date:</span>
                                <span class="summary-value" id="summaryDate">Not selected</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Time:</span>
                                <span class="summary-value" id="summaryTime">Not selected</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Location:</span>
                                <span class="summary-value" id="summaryLocation">Not provided</span>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <div class="summary-total">
                                <span>Estimated Price:</span>
                                <span class="total-price" id="summaryPrice">$0</span>
                            </div>
                            <p class="summary-note">Final price will be confirmed based on vehicle size and condition</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <h4>Why Choose Us?</h4>
                        <ul class="info-list">
                            <li>100% Mobile Service</li>
                            <li>Premium Products</li>
                            <li>Satisfaction Guaranteed</li>
                            <li>Insured & Licensed</li>
                            <li>Eco-Friendly Solutions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'footer.php'; ?>
