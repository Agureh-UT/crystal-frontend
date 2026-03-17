<?php
$pageTitle = 'Book Your Service - Crystal Crown Mobile Detailing';
$pageDescription = 'Book your premium mobile car detailing service online. Fast, convenient scheduling.';
$activePage = 'bookings';
$navType = 'public';
include 'header.php';
?>
<?php use Core\FH; ?>

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
                            <?= FH::csrfInput() ?>
                            <div class="form-step active" data-step="1">
                                <h3 class="step-title">Select Your Service</h3>
                                <?= FH::selectBlock('Service Type', 'service', '', ['' => '-- Choose a service --', 'exterior' => 'Exterior Detailing - From $149', 'interior' => 'Interior Detailing - From $129', 'full' => 'Full Detail Package - From $249', 'ceramic' => 'Ceramic Coating - From $599', 'headlight' => 'Headlight Restoration - From $79', 'engine' => 'Engine Bay Detail - From $99'], ['class' => 'form-select', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                <button type="button" class="btn btn-primary btn-next">Continue</button>
                            </div>

                            <div class="form-step" data-step="2">
                                <h3 class="step-title">Vehicle Information</h3>
                                <div class="form-grid">
                                    <?= FH::inputBlock('text', 'Make', 'vehicleMake', '', ['class' => 'form-input', 'placeholder' => 'e.g., Toyota', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                    <?= FH::inputBlock('text', 'Model', 'vehicleModel', '', ['class' => 'form-input', 'placeholder' => 'e.g., Camry', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                    <?= FH::selectBlock('Year', 'vehicleYear', '', ['' => 'Select year'] + array_combine(range(2025, 1980), range(2025, 1980)), ['class' => 'form-select', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                    <?= FH::inputBlock('text', 'Color', 'vehicleColor', '', ['class' => 'form-input', 'placeholder' => 'e.g., Black', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                </div>
                                <?= FH::selectBlock('Current Condition', 'vehicleCondition', '', ['' => 'Select condition', 'excellent' => 'Excellent - Regular maintenance', 'good' => 'Good - Minor dirt/dust', 'fair' => 'Fair - Moderate cleaning needed', 'poor' => 'Poor - Heavy cleaning required'], ['class' => 'form-select', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                <div class="form-buttons">
                                    <button type="button" class="btn btn-secondary btn-prev">Back</button>
                                    <button type="button" class="btn btn-primary btn-next">Continue</button>
                                </div>
                            </div>

                            <div class="form-step" data-step="3">
                                <h3 class="step-title">Schedule & Location</h3>
                                <div class="form-grid">
                                    <?= FH::inputBlock('date', 'Preferred Date', 'appointmentDate', '', ['class' => 'form-input', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                    <?= FH::selectBlock('Preferred Time', 'appointmentTime', '', ['' => 'Select time', '08:00' => '8:00 AM', '09:00' => '9:00 AM', '10:00' => '10:00 AM', '11:00' => '11:00 AM', '12:00' => '12:00 PM', '13:00' => '1:00 PM', '14:00' => '2:00 PM', '15:00' => '3:00 PM', '16:00' => '4:00 PM', '17:00' => '5:00 PM'], ['class' => 'form-select', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                </div>
                                <?= FH::inputBlock('text', 'Service Address', 'serviceAddress', '', ['class' => 'form-input', 'placeholder' => 'Street Address', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                <div class="form-grid">
                                    <?= FH::inputBlock('text', 'City', 'city', '', ['class' => 'form-input', 'placeholder' => 'City', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                    <?= FH::inputBlock('text', 'ZIP Code', 'zipCode', '', ['class' => 'form-input', 'placeholder' => 'ZIP Code', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                </div>
                                <?= FH::textareaBlock('Parking Instructions (Optional)', 'parkingNotes', '', ['class' => 'form-textarea', 'rows' => '3', 'placeholder' => 'Any special parking instructions or gate codes?'], ['class' => 'form-group'], []) ?>
                                <div class="form-buttons">
                                    <button type="button" class="btn btn-secondary btn-prev">Back</button>
                                    <button type="button" class="btn btn-primary btn-next">Continue</button>
                                </div>
                            </div>

                            <div class="form-step" data-step="4">
                                <h3 class="step-title">Contact Information</h3>
                                <div class="form-grid">
                                    <?= FH::inputBlock('text', 'First Name', 'firstName', '', ['class' => 'form-input', 'placeholder' => 'First Name', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                    <?= FH::inputBlock('text', 'Last Name', 'lastName', '', ['class' => 'form-input', 'placeholder' => 'Last Name', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                </div>
                                <?= FH::inputBlock('email', 'Email Address', 'email', '', ['class' => 'form-input', 'placeholder' => 'your@email.com', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                <?= FH::inputBlock('tel', 'Phone Number', 'phone', '', ['class' => 'form-input', 'placeholder' => '(555) 123-4567', 'required' => 'required'], ['class' => 'form-group'], []) ?>
                                <?= FH::textareaBlock('Special Requests (Optional)', 'specialRequests', '', ['class' => 'form-textarea', 'rows' => '3', 'placeholder' => 'Any special requests or concerns we should know about?'], ['class' => 'form-group'], []) ?>
                                <?= FH::checkboxBlock('I agree to the terms and conditions', 'terms', false, ['required' => 'required'], ['class' => 'form-group checkbox-group'], []) ?>
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
