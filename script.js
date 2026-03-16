// ========================================
// Navigation Scroll Effect
// ========================================

const navbar = document.querySelector('.navbar');
let lastScroll = 0;

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    
    if (currentScroll > 80) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
    
    lastScroll = currentScroll;
});

// ========================================
// Mobile Menu Toggle
// ========================================

const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
const navMenu = document.querySelector('.nav-menu');

if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener('click', () => {
        mobileMenuToggle.classList.toggle('active');
        navMenu.classList.toggle('active');
        document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
    });
    
    // Close menu when clicking nav links
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenuToggle.classList.remove('active');
            navMenu.classList.remove('active');
            document.body.style.overflow = '';
        });
    });
}

// ========================================
// Smooth Scroll for Anchor Links
// ========================================

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#') return;
        
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
            const offsetTop = target.offsetTop - 80;
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
        }
    });
});

// ========================================
// Multi-Step Booking Form
// ========================================

let currentStep = 1;
const totalSteps = 4;

const bookingData = {
    service: '',
    vehicleMake: '',
    vehicleModel: '',
    vehicleYear: '',
    vehicleColor: '',
    vehicleCondition: '',
    appointmentDate: '',
    appointmentTime: '',
    serviceAddress: '',
    city: '',
    zipCode: '',
    parkingNotes: '',
    firstName: '',
    lastName: '',
    email: '',
    phone: '',
    specialRequests: ''
};

const servicePrices = {
    exterior: 149,
    interior: 129,
    full: 249,
    ceramic: 599,
    headlight: 79,
    engine: 99
};

const serviceNames = {
    exterior: 'Exterior Detailing',
    interior: 'Interior Detailing',
    full: 'Full Detail Package',
    ceramic: 'Ceramic Coating',
    headlight: 'Headlight Restoration',
    engine: 'Engine Bay Detail'
};

function updateProgressBar(step) {
    const progressSteps = document.querySelectorAll('.progress-step');
    progressSteps.forEach((progressStep, index) => {
        if (index < step) {
            progressStep.classList.add('active');
        } else {
            progressStep.classList.remove('active');
        }
    });
}

function showStep(step) {
    const formSteps = document.querySelectorAll('.form-step');
    formSteps.forEach((formStep, index) => {
        if (index + 1 === step) {
            formStep.classList.add('active');
        } else {
            formStep.classList.remove('active');
        }
    });
    
    updateProgressBar(step);
    currentStep = step;
    
    // Scroll to top of form
    const formCard = document.querySelector('.form-card');
    if (formCard) {
        formCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

function validateStep(step) {
    const currentFormStep = document.querySelector(`.form-step[data-step="${step}"]`);
    if (!currentFormStep) return true;
    
    const requiredInputs = currentFormStep.querySelectorAll('[required]');
    let isValid = true;
    
    requiredInputs.forEach(input => {
        if (input.type === 'radio') {
            const radioGroup = currentFormStep.querySelectorAll(`[name="${input.name}"]`);
            const isChecked = Array.from(radioGroup).some(radio => radio.checked);
            if (!isChecked) {
                isValid = false;
            }
        } else if (!input.value.trim()) {
            isValid = false;
            input.style.borderColor = '#ef4444';
            setTimeout(() => {
                input.style.borderColor = '';
            }, 2000);
        }
    });
    
    if (!isValid) {
        alert('Please fill in all required fields before continuing.');
    }
    
    return isValid;
}

function updateSummary() {
    // Update service
    const serviceRadio = document.querySelector('input[name="service"]:checked');
    if (serviceRadio) {
        bookingData.service = serviceRadio.value;
        document.getElementById('summaryService').textContent = serviceNames[serviceRadio.value];
        document.getElementById('summaryPrice').textContent = `$${servicePrices[serviceRadio.value]}`;
    }
    
    // Update vehicle
    const make = document.getElementById('vehicleMake');
    const model = document.getElementById('vehicleModel');
    const year = document.getElementById('vehicleYear');
    if (make && model && year && make.value && model.value && year.value) {
        bookingData.vehicleMake = make.value;
        bookingData.vehicleModel = model.value;
        bookingData.vehicleYear = year.value;
        document.getElementById('summaryVehicle').textContent = `${year.value} ${make.value} ${model.value}`;
    }
    
    // Update date
    const date = document.getElementById('appointmentDate');
    if (date && date.value) {
        bookingData.appointmentDate = date.value;
        const dateObj = new Date(date.value);
        const formattedDate = dateObj.toLocaleDateString('en-US', { 
            weekday: 'short', 
            year: 'numeric', 
            month: 'short', 
            day: 'numeric' 
        });
        document.getElementById('summaryDate').textContent = formattedDate;
    }
    
    // Update time
    const time = document.getElementById('appointmentTime');
    if (time && time.value) {
        bookingData.appointmentTime = time.value;
        document.getElementById('summaryTime').textContent = time.options[time.selectedIndex].text;
    }
    
    // Update location
    const address = document.getElementById('serviceAddress');
    const city = document.getElementById('city');
    if (address && city && address.value && city.value) {
        bookingData.serviceAddress = address.value;
        bookingData.city = city.value;
        document.getElementById('summaryLocation').textContent = `${city.value}`;
    }
}

// Next button handlers
const nextButtons = document.querySelectorAll('.btn-next');
nextButtons.forEach(button => {
    button.addEventListener('click', () => {
        if (validateStep(currentStep)) {
            updateSummary();
            if (currentStep < totalSteps) {
                showStep(currentStep + 1);
            }
        }
    });
});

// Previous button handlers
const prevButtons = document.querySelectorAll('.btn-prev');
prevButtons.forEach(button => {
    button.addEventListener('click', () => {
        if (currentStep > 1) {
            showStep(currentStep - 1);
        }
    });
});

// Submit button handler
const submitButton = document.querySelector('.btn-submit');
if (submitButton) {
    submitButton.addEventListener('click', (e) => {
        e.preventDefault();
        
        if (validateStep(currentStep)) {
            // Collect all form data
            const formInputs = document.querySelectorAll('#bookingForm input, #bookingForm select, #bookingForm textarea');
            formInputs.forEach(input => {
                if (input.name && input.value) {
                    bookingData[input.name] = input.value;
                }
            });
            
            // In a real application, this would submit to a server
            console.log('Booking submitted:', bookingData);
            
            // Show success message
            alert('Thank you for your booking! We will contact you shortly to confirm your appointment.');
            
            // Reset form
            window.location.href = 'index.html';
        }
    });
}

// Set minimum date for appointment to today
const appointmentDate = document.getElementById('appointmentDate');
if (appointmentDate) {
    const today = new Date().toISOString().split('T')[0];
    appointmentDate.setAttribute('min', today);
}

// ========================================
// Contact Form
// ========================================

const contactForm = document.querySelector('#contactForm');
const formSuccess = document.getElementById('formSuccess');
const sendAnotherButton = document.getElementById('sendAnother');

if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        // Validate form
        const requiredFields = contactForm.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.style.borderColor = '#ef4444';
                setTimeout(() => {
                    field.style.borderColor = '';
                }, 2000);
            }
        });
        
        if (isValid) {
            // In a real application, this would submit to a server
            const formData = new FormData(contactForm);
            const data = Object.fromEntries(formData);
            console.log('Contact form submitted:', data);
            
            // Show success message
            contactForm.style.display = 'none';
            formSuccess.classList.add('active');
        } else {
            alert('Please fill in all required fields.');
        }
    });
}

if (sendAnotherButton) {
    sendAnotherButton.addEventListener('click', () => {
        contactForm.reset();
        contactForm.style.display = 'block';
        formSuccess.classList.remove('active');
    });
}

// ========================================
// FAQ Accordion
// ========================================

const faqQuestions = document.querySelectorAll('.faq-question');

faqQuestions.forEach(question => {
    question.addEventListener('click', () => {
        const faqItem = question.parentElement;
        const isActive = faqItem.classList.contains('active');
        
        // Close all FAQ items
        document.querySelectorAll('.faq-item').forEach(item => {
            item.classList.remove('active');
        });
        
        // Toggle current item
        if (!isActive) {
            faqItem.classList.add('active');
        }
    });
});

// ========================================
// Form Input Animations
// ========================================

const formInputs = document.querySelectorAll('input, select, textarea');

formInputs.forEach(input => {
    input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'translateY(-2px)';
    });
    
    input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'translateY(0)';
    });
});

// ========================================
// Service Card Hover Effect
// ========================================

const serviceCards = document.querySelectorAll('.service-card');

serviceCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.zIndex = '10';
    });
    
    card.addEventListener('mouseleave', function() {
        this.style.zIndex = '1';
    });
});

// ========================================
// Page Load Animation
// ========================================

window.addEventListener('load', () => {
    document.body.style.opacity = '0';
    setTimeout(() => {
        document.body.style.transition = 'opacity 0.5s ease';
        document.body.style.opacity = '1';
    }, 100);
});

// ========================================
// Intersection Observer for Fade In Effects
// ========================================

const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe service cards, feature cards, and testimonials
document.querySelectorAll('.service-card, .feature-card, .testimonial-card').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});

// ========================================
// Authentication Pages
// ========================================

// Password Toggle Functionality
const passwordToggles = document.querySelectorAll('.password-toggle');

passwordToggles.forEach(toggle => {
    toggle.addEventListener('click', function() {
        const input = this.previousElementSibling;
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        
        // Toggle eye icon
        this.classList.toggle('active');
    });
});

// Login Form Submission
const loginForm = document.querySelector('#loginForm');
if (loginForm) {
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const email = document.getElementById('loginEmail').value;
        const password = document.getElementById('loginPassword').value;
        
        if (email && password) {
            // In a real application, this would authenticate with a server
            console.log('Login attempt:', { email });
            
            // Simulate successful login
            alert('Login successful! Redirecting to dashboard...');
            window.location.href = 'customerdashboard.html';
        }
    });
}

// Register Form Submission
const registerForm = document.querySelector('#registerForm');
if (registerForm) {
    // Password Strength Checker
    const registerPassword = document.getElementById('registerPassword');
    const strengthFill = document.getElementById('strengthFill');
    const strengthText = document.getElementById('strengthText');
    
    if (registerPassword && strengthFill && strengthText) {
        registerPassword.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            if (password.length >= 8) strength += 25;
            if (password.match(/[a-z]/)) strength += 25;
            if (password.match(/[A-Z]/)) strength += 25;
            if (password.match(/[0-9]/)) strength += 25;
            
            strengthFill.style.width = strength + '%';
            
            if (strength === 0) {
                strengthText.textContent = 'Password strength';
                strengthFill.style.background = '#ef4444';
            } else if (strength <= 25) {
                strengthText.textContent = 'Weak password';
                strengthFill.style.background = '#ef4444';
            } else if (strength <= 50) {
                strengthText.textContent = 'Fair password';
                strengthFill.style.background = '#f59e0b';
            } else if (strength <= 75) {
                strengthText.textContent = 'Good password';
                strengthFill.style.background = '#3b82f6';
            } else {
                strengthText.textContent = 'Strong password';
                strengthFill.style.background = '#22c55e';
            }
        });
    }
    
    registerForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const password = document.getElementById('registerPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const termsCheckbox = document.querySelector('input[name="terms"]');
        
        if (password !== confirmPassword) {
            alert('Passwords do not match!');
            return;
        }
        
        if (!termsCheckbox.checked) {
            alert('Please accept the terms and conditions');
            return;
        }
        
        // In a real application, this would register with a server
        const formData = new FormData(registerForm);
        const data = Object.fromEntries(formData);
        console.log('Registration data:', data);
        
        alert('Registration successful! Redirecting to login...');
        window.location.href = 'login.html';
    });
}

// ========================================
// Profile Page Tabs
// ========================================

const menuItems = document.querySelectorAll('.menu-item');
const tabContents = document.querySelectorAll('.tab-content');

menuItems.forEach(item => {
    item.addEventListener('click', function() {
        const tabId = this.getAttribute('data-tab');
        
        // Remove active class from all menu items
        menuItems.forEach(menuItem => menuItem.classList.remove('active'));
        
        // Add active class to clicked menu item
        this.classList.add('active');
        
        // Hide all tab contents
        tabContents.forEach(content => content.classList.remove('active'));
        
        // Show selected tab content
        const selectedTab = document.getElementById(tabId);
        if (selectedTab) {
            selectedTab.classList.add('active');
        }
    });
});

// Profile Form Submissions
const profileForms = document.querySelectorAll('.profile-form');

profileForms.forEach(form => {
    const submitButton = form.querySelector('button[type="submit"], .btn-primary');
    if (submitButton) {
        submitButton.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Validate form
            const inputs = form.querySelectorAll('input[required]');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.style.borderColor = '#ef4444';
                    setTimeout(() => {
                        input.style.borderColor = '';
                    }, 2000);
                }
            });
            
            if (isValid) {
                // In a real application, this would update the server
                console.log('Form submitted successfully');
                alert('Changes saved successfully!');
            } else {
                alert('Please fill in all required fields');
            }
        });
    }
});

// ========================================
// Dashboard Interactions
// ========================================

// Cancel Appointment
const cancelButtons = document.querySelectorAll('.appointment-item .btn-icon:last-child');

cancelButtons.forEach(button => {
    button.addEventListener('click', function() {
        const appointmentItem = this.closest('.appointment-item');
        const appointmentTitle = appointmentItem.querySelector('.appointment-title').textContent;
        
        if (confirm(`Are you sure you want to cancel "${appointmentTitle}"?`)) {
            appointmentItem.style.opacity = '0';
            appointmentItem.style.transform = 'translateX(-20px)';
            setTimeout(() => {
                appointmentItem.remove();
            }, 300);
        }
    });
});

// Reschedule Appointment
const rescheduleButtons = document.querySelectorAll('.appointment-item .btn-icon:first-child');

rescheduleButtons.forEach(button => {
    button.addEventListener('click', function() {
        const appointmentItem = this.closest('.appointment-item');
        const appointmentTitle = appointmentItem.querySelector('.appointment-title').textContent;
        
        alert(`Rescheduling "${appointmentTitle}". You would be redirected to the booking page.`);
        // In a real application, this would redirect to booking page with pre-filled data
    });
});

// Toggle Switches
const toggleSwitches = document.querySelectorAll('.toggle-switch input');

toggleSwitches.forEach(toggle => {
    toggle.addEventListener('change', function() {
        const preferenceItem = this.closest('.preference-item, .security-option');
        const preferenceName = preferenceItem.querySelector('h4').textContent;
        
        if (this.checked) {
            console.log(`Enabled: ${preferenceName}`);
        } else {
            console.log(`Disabled: ${preferenceName}`);
        }
    });
});

// Add Vehicle Button
const addVehicleBtn = document.getElementById('addVehicleBtn');
if (addVehicleBtn) {
    addVehicleBtn.addEventListener('click', function() {
        alert('Add vehicle form would open here. This would allow you to add a new vehicle to your profile.');
    });
}

// Delete Vehicle
const deleteVehicleButtons = document.querySelectorAll('.vehicle-card .btn-icon:last-child');

deleteVehicleButtons.forEach(button => {
    button.addEventListener('click', function() {
        const vehicleCard = this.closest('.vehicle-card');
        const vehicleName = vehicleCard.querySelector('h3').textContent;
        
        if (confirm(`Are you sure you want to remove "${vehicleName}" from your vehicles?`)) {
            vehicleCard.style.opacity = '0';
            vehicleCard.style.transform = 'scale(0.9)';
            setTimeout(() => {
                vehicleCard.remove();
            }, 300);
        }
    });
});

// Social Login Buttons
const socialLoginButtons = document.querySelectorAll('.btn-social');

socialLoginButtons.forEach(button => {
    button.addEventListener('click', function() {
        const provider = this.textContent.trim();
        alert(`${provider} authentication would be handled here. In a real application, this would redirect to the ${provider} OAuth flow.`);
    });
});

// Forgot Password Link
const forgotPasswordLink = document.querySelector('.forgot-password');
if (forgotPasswordLink) {
    forgotPasswordLink.addEventListener('click', function(e) {
        e.preventDefault();
        const email = prompt('Enter your email address to reset your password:');
        if (email) {
            alert(`Password reset link has been sent to ${email}`);
        }
    });
}

// Delete Account Button
const deleteAccountBtn = document.querySelector('.btn-danger');
if (deleteAccountBtn) {
    deleteAccountBtn.addEventListener('click', function() {
        const confirmation = confirm('Are you sure you want to delete your account? This action cannot be undone.');
        if (confirmation) {
            const finalConfirmation = prompt('Type "DELETE" to confirm account deletion:');
            if (finalConfirmation === 'DELETE') {
                alert('Your account has been scheduled for deletion. You will be logged out.');
                window.location.href = 'index.html';
            }
        }
    });
}
