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
