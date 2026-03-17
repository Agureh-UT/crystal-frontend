<?php
use Core\FH;
$customer = $this->customer;
$this->start('body');
?>

<section class="page-hero" aria-labelledby="booking-title">
    <div class="container">
        <nav class="page-hero__breadcrumb" aria-label="Breadcrumb">
            <a href="<?= SITE_ROOT ?>shop/index">Home</a>
            <span class="page-hero__breadcrumb-sep">›</span>
            <span aria-current="page">Book Now</span>
        </nav>
        <div class="section-label reveal section-label--center">Quick &amp; Easy</div>
        <h1 class="section-title reveal delay-100" id="booking-title">Book Your <span>Appointment</span></h1>
        <p class="section-subtitle reveal delay-200 mx-auto u-text-center">
            Fill in the form below and we'll confirm your booking within 1 hour.
        </p>
    </div>
</section>

<section class="section--sm">
    <div class="container">
        <div class="page-grid page-grid--form">

            <!-- Booking Form -->
            <div class="reveal">
                <div class="card card--padded">
                    <h2 class="card-title">Your Booking Details</h2>

                    <form action="<?= SITE_ROOT ?>customerbookings/submit" method="post" novalidate>
                        <?= FH::csrfInput() ?>

                        <!-- Customer Details -->
                        <div class="form-grid form-mb">
                            <?= FH::inputBlock('text', 'First Name *', 'first_name', htmlspecialchars($customer->first_name ?? '', ENT_QUOTES),
                                ['class' => 'form-input', 'required' => 'required', 'placeholder' => 'e.g. Amina', 'autocomplete' => 'given-name'],
                                ['class' => 'form-group'],
                                []) ?>

                            <?= FH::inputBlock('text', 'Last Name *', 'last_name', htmlspecialchars($customer->last_name ?? '', ENT_QUOTES),
                                ['class' => 'form-input', 'required' => 'required', 'placeholder' => 'e.g. Karimi', 'autocomplete' => 'family-name'],
                                ['class' => 'form-group'],
                                []) ?>
                        </div>

                        <div class="form-grid form-mb">
                            <?= FH::inputBlock('email', 'Email Address *', 'email', htmlspecialchars($customer->email ?? '', ENT_QUOTES),
                                ['class' => 'form-input', 'required' => 'required', 'placeholder' => 'you@example.com', 'autocomplete' => 'email'],
                                ['class' => 'form-group'],
                                []) ?>

                            <?= FH::inputBlock('tel', 'Phone Number *', 'phone', htmlspecialchars($customer->phone ?? '', ENT_QUOTES),
                                ['class' => 'form-input', 'required' => 'required', 'placeholder' => '+254 7XX XXX XXX', 'autocomplete' => 'tel'],
                                ['class' => 'form-group'],
                                []) ?>
                        </div>

                        <!-- Service Selection (data-* attributes on options require raw HTML) -->
                        <div class="form-group form-mb">
                            <label class="form-label" for="package_id">Service Package</label>
                            <select class="form-select" id="package_id" name="package_id">
                                <option value="">— Select a package —</option>
                                <?php foreach ($this->packages as $pkg): ?>
                                <option value="<?= $pkg->id ?>"
                                        data-price="<?= $pkg->package_price ?>"
                                        data-name="<?= $pkg->name ?>"
                                        <?= isset($_GET['package_id']) && $_GET['package_id'] == $pkg->id ? 'selected' : '' ?>>
                                    <?= $pkg->name ?> — KES <?= number_format($pkg->package_price, 0) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <?php if (!empty($this->items)): ?>
                        <div class="form-group form-mb">
                            <label class="form-label" for="item_id">Or Individual Add-on</label>
                            <select class="form-select" id="item_id" name="item_id">
                                <option value="">— Select an add-on (optional) —</option>
                                <?php foreach ($this->items as $item): ?>
                                <option value="<?= $item->id ?>"
                                        data-price="<?= $item->unit_cost ?>"
                                        data-name="<?= $item->name ?>"
                                        <?= isset($_GET['item_id']) && $_GET['item_id'] == $item->id ? 'selected' : '' ?>>
                                    <?= $item->name ?> — KES <?= number_format($item->unit_cost, 0) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php endif; ?>

                        <!-- Date & Time -->
                        <div class="form-grid form-mb">
                            <?= FH::inputBlock('date', 'Preferred Date *', 'booking_date', '',
                                ['class' => 'form-input', 'required' => 'required', 'min' => date('Y-m-d')],
                                ['class' => 'form-group'],
                                []) ?>

                            <?= FH::selectBlock('Preferred Time', 'booking_time', '',
                                ['' => 'Select time…', '07:00' => '7:00 AM', '08:00' => '8:00 AM', '09:00' => '9:00 AM', '10:00' => '10:00 AM', '11:00' => '11:00 AM', '12:00' => '12:00 PM', '13:00' => '1:00 PM', '14:00' => '2:00 PM', '15:00' => '3:00 PM', '16:00' => '4:00 PM', '17:00' => '5:00 PM'],
                                ['class' => 'form-select'],
                                ['class' => 'form-group'],
                                []) ?>
                        </div>

                        <!-- Vehicle Type -->
                        <?= FH::selectBlock('Vehicle Type', 'vehicle_type', '',
                            ['' => 'Select vehicle type…', 'hatchback' => 'Hatchback', 'sedan' => 'Sedan', 'suv' => 'SUV / 4x4', 'van' => 'Van / Minibus', 'truck' => 'Truck / Pickup', 'trailer' => 'Trailer / Lorry'],
                            ['class' => 'form-select'],
                            ['class' => 'form-group form-mb'],
                            []) ?>

                        <!-- Location -->
                        <?= FH::inputBlock('text', 'Service Location / Address', 'location', '',
                            ['class' => 'form-input', 'placeholder' => 'e.g. Westlands, Nairobi'],
                            ['class' => 'form-group form-mb'],
                            []) ?>

                        <!-- Notes -->
                        <?= FH::textareaBlock('Additional Notes', 'notes', '',
                            ['class' => 'form-textarea', 'placeholder' => 'Any special requirements, vehicle details, access instructions…'],
                            ['class' => 'form-group form-mb-lg'],
                            []) ?>

                        <button type="submit" class="btn btn--primary btn--lg btn--block">
                            Send Booking Request
                        </button>
                        <p class="form-hint mt-3 u-text-center">
                            We'll confirm your booking within 1 hour during business hours
                        </p>
                    </form>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="d-flex flex-col gap-6">

                <!-- Summary Card -->
                <div class="card booking-summary reveal delay-200 p-6">
                    <h3 class="card-title--sm">Booking Summary</h3>
                    <div class="d-flex flex-col gap-3">
                        <div class="summary-row">
                            <span>Package</span>
                            <span id="summary-service" class="summary-value">—</span>
                        </div>
                        <div id="summary-addon-wrapper" hidden>
                            <div class="divider m-0 mb-3"></div>
                            <div class="summary-row">
                                <span>Add-on</span>
                                <span id="summary-addon" class="summary-value">—</span>
                            </div>
                        </div>
                        <div class="divider m-0"></div>
                        <div class="summary-row">
                            <span>Price</span>
                            <span id="summary-price" class="summary-price">—</span>
                        </div>
                        <div class="divider m-0"></div>
                        <div class="summary-row">
                            <span>Date</span>
                            <span id="summary-date" class="summary-value">—</span>
                        </div>
                        <div class="divider m-0"></div>
                        <div class="summary-row">
                            <span>Time</span>
                            <span id="summary-time" class="summary-value">—</span>
                        </div>
                        <div class="divider m-0"></div>
                        <div class="summary-row">
                            <span>Vehicle</span>
                            <span id="summary-vehicle" class="summary-value">—</span>
                        </div>
                        <div class="divider m-0"></div>
                        <div class="summary-row">
                            <span>Location</span>
                            <span id="summary-location" class="summary-value">—</span>
                        </div>
                    </div>
                    <div class="summary-hint">
                        <p>Final pricing confirmed after reviewing your booking details.</p>
                    </div>
                </div>

                <!-- Login CTA for guests -->
                <?php if (!$customer): ?>
                <div class="card reveal delay-300 guest-cta">
                    <div class="guest-cta__icon">👤</div>
                    <h3 class="guest-cta__title">Have an Account?</h3>
                    <p class="guest-cta__desc">Login to track your bookings and get faster service.</p>
                    <a href="<?= SITE_ROOT ?>customerauth/index" class="btn btn--outline btn--sm btn--block">Login / Register</a>
                </div>
                <?php endif; ?>

                <!-- Guarantees -->
                <div class="card reveal delay-400 p-6">
                    <h3 class="card-subtitle">Our Promise</h3>
                    <div class="d-flex flex-col gap-3">
                        <div class="promise-item"><span class="promise-check">✓</span> Confirmed within 1 hour</div>
                        <div class="promise-item"><span class="promise-check">✓</span> On-time arrival guaranteed</div>
                        <div class="promise-item"><span class="promise-check">✓</span> 100% satisfaction or we redo it</div>
                        <div class="promise-item"><span class="promise-check">✓</span> No hidden fees</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
function updateSummary() {
    const pkgSelect     = document.getElementById('package_id');
    const itemSelect    = document.getElementById('item_id');
    const dateInput     = document.getElementById('booking_date');
    const timeSelect    = document.getElementById('booking_time');
    const vehicleSelect = document.getElementById('vehicle_type');
    const locationInput = document.getElementById('location');

    const pkgOpt  = pkgSelect  && pkgSelect.value  ? pkgSelect.options[pkgSelect.selectedIndex]   : null;
    const itemOpt = itemSelect && itemSelect.value ? itemSelect.options[itemSelect.selectedIndex] : null;

    const pkgPrice  = pkgOpt  ? Number(pkgOpt.dataset.price)  : 0;
    const itemPrice = itemOpt ? Number(itemOpt.dataset.price) : 0;
    const total     = pkgPrice + itemPrice;

    // Package
    const svcEl = document.getElementById('summary-service');
    if (svcEl) svcEl.textContent = pkgOpt ? pkgOpt.dataset.name : '—';

    // Add-on row: only show when the item select exists in the DOM
    const addonWrapper = document.getElementById('summary-addon-wrapper');
    const addonEl      = document.getElementById('summary-addon');
    if (addonWrapper) {
        addonWrapper.hidden = !itemSelect;
        if (addonEl) addonEl.textContent = itemOpt ? itemOpt.dataset.name : '—';
    }

    // Price: package + add-on combined
    const priceEl = document.getElementById('summary-price');
    if (priceEl) priceEl.textContent = total > 0 ? 'KES ' + total.toLocaleString() : '—';

    // Date: parse as local time to avoid UTC midnight off-by-one in GMT+3
    const dateEl = document.getElementById('summary-date');
    if (dateEl) {
        dateEl.textContent = dateInput && dateInput.value
            ? new Date(dateInput.value + 'T00:00:00').toLocaleDateString('en-KE', {weekday:'short', day:'numeric', month:'long', year:'numeric'})
            : '—';
    }

    // Time
    const timeEl = document.getElementById('summary-time');
    if (timeEl) {
        timeEl.textContent = timeSelect && timeSelect.value
            ? timeSelect.options[timeSelect.selectedIndex].text
            : '—';
    }

    // Vehicle
    const vehicleEl = document.getElementById('summary-vehicle');
    if (vehicleEl) {
        vehicleEl.textContent = vehicleSelect && vehicleSelect.value
            ? vehicleSelect.options[vehicleSelect.selectedIndex].text
            : '—';
    }

    // Location
    const locationEl = document.getElementById('summary-location');
    if (locationEl) {
        locationEl.textContent = locationInput && locationInput.value.trim() ? locationInput.value.trim() : '—';
    }
}

['package_id', 'item_id', 'booking_date', 'booking_time', 'vehicle_type', 'location'].forEach(id => {
    const el = document.getElementById(id);
    if (el) el.addEventListener('change', updateSummary);
});
// Location: real-time update as the user types
const locInput = document.getElementById('location');
if (locInput) locInput.addEventListener('input', updateSummary);

updateSummary();
</script>

<?php $this->end(); ?>
