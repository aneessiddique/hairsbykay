document.addEventListener('DOMContentLoaded', function() {
    // Helper function to show error messages
    function showError(input, message) {
        const formGroup = input.closest('.form-group');
        formGroup.classList.add('error');
        const errorDiv = formGroup.querySelector('.error-message');
        errorDiv.textContent = message;
        errorDiv.style.display = 'block';
    }

    // Helper function to clear error
    function clearError(input) {
        const formGroup = input.closest('.form-group');
        formGroup.classList.remove('error');
        const errorDiv = formGroup.querySelector('.error-message');
        errorDiv.textContent = '';
        errorDiv.style.display = 'none';
    }

    // Validation functions
    function validateName(input) {
        const value = input.value.trim();
        if (!value) {
            showError(input, 'Name is required');
            return false;
        }
        if (!/^[a-zA-Z\s]{2,50}$/.test(value)) {
            showError(input, 'Name must contain (2-50 characters)');
            return false;
        }
        clearError(input);
        return true;
    }

    function validateEmail(input) {
        const value = input.value.trim();
        if (!value) {
            showError(input, 'Email is required');
            return false;
        }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
            showError(input, 'Please enter a valid email address');
            return false;
        }
        clearError(input);
        return true;
    }

    function validatePhone(phone) {
        // Ensure phone is a string
        const phoneStr = String(phone);
        
        // Remove + and - for length check
        const digitsOnly = phoneStr.replace(/[+\-]/g, '');
        
        // Check if it contains only allowed characters
        if (!/^[+\-\d]+$/.test(phoneStr)) {
            return { valid: false, message: 'Phone number can only contain digits' };
        }
        
        // Check the length of digits only
        if (digitsOnly.length > 12) {
            return { valid: false, message: 'Phone number cannot exceed 12 digits' };
        }
        return { valid: true };
    }

    function validateMessage(input) {
        const value = input.value.trim();
        if (!value) {
            showError(input, 'Message is required');
            return false;
        }
        if (value.length < 10) {
            showError(input, 'Message should be at least 10 characters long');
            return false;
        }
        clearError(input);
        return true;
    }

    // Contact form validation
    const contactForm = document.querySelector('.contact-form form');
    if (contactForm) {
        const name = contactForm.querySelector('input[name="name"]');
        const email = contactForm.querySelector('input[name="email"]');
        const phone = contactForm.querySelector('input[name="phone"]');
        const message = contactForm.querySelector('textarea[name="message"]');

        // Add real-time validation
        name.addEventListener('input', () => validateName(name));
        email.addEventListener('input', () => validateEmail(email));
        phone.addEventListener('input', () => validatePhone(phone));
        message.addEventListener('input', () => validateMessage(message));

        // Form submission
        contactForm.addEventListener('submit', function(e) {
            const isValid = validateName(name) && 
                          validateEmail(email) && 
                          validatePhone(phone) && 
                          validateMessage(message);
            if (!isValid) {
                e.preventDefault();
            }
        });
    }

    // Appointment form validation
    const appointmentForm = document.querySelector('.booking-form form');
    if (appointmentForm) {
        const name = appointmentForm.querySelector('input[name="name"]');
        const email = appointmentForm.querySelector('input[name="email"]');
        const phone = appointmentForm.querySelector('input[name="phone"]');
        const service = appointmentForm.querySelector('select[name="service"]');
        const date = appointmentForm.querySelector('input[name="date"]');
        const time = appointmentForm.querySelector('input[name="time"]');

        // Add real-time validation
        name.addEventListener('input', () => validateName(name));
        email.addEventListener('input', () => validateEmail(email));
        phone.addEventListener('input', () => validatePhone(phone));

        // Form submission
        appointmentForm.addEventListener('submit', function(e) {
            const isValid = validateName(name) && 
                          validateEmail(email) && 
                          validatePhone(phone);
            if (!isValid) {
                e.preventDefault();
            }
        });
    }

    // Form validation
    const form = document.querySelector('form');
    if (!form) return;

    // Add input event listener for phone number
    const phoneInput = form.querySelector('input[type="tel"]');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            // Remove any characters except digits, + and -
            this.value = this.value.replace(/[^\d+\-]/g, '');
            
            // Count only digits
            const digitsOnly = this.value.replace(/[+\-]/g, '');
            if (digitsOnly.length > 12) {
                // If digits exceed 12, remove the last digit
                const lastDigitIndex = this.value.lastIndexOf(digitsOnly[digitsOnly.length - 1]);
                this.value = this.value.slice(0, lastDigitIndex);
            }

            // Validate on input
            const errorDiv = this.nextElementSibling;
            if (errorDiv && errorDiv.classList.contains('error-message')) {
                const validation = validatePhone(this.value);
                if (!validation.valid) {
                    errorDiv.textContent = validation.message;
                    this.classList.add('error');
                } else {
                    errorDiv.textContent = '';
                    this.classList.remove('error');
                }
            }
        });
    }

    form.addEventListener('submit', function(e) {
        let isValid = true;
        const inputs = form.querySelectorAll('input, select, textarea');

        inputs.forEach(input => {
            const errorDiv = input.nextElementSibling;
            if (!errorDiv || !errorDiv.classList.contains('error-message')) return;

            // Clear previous error
            errorDiv.textContent = '';
            input.classList.remove('error');

            // Validate required fields
            if (input.hasAttribute('required') && !input.value.trim()) {
                errorDiv.textContent = 'This field is required';
                input.classList.add('error');
                isValid = false;
            }

            // Phone number validation
            if (input.type === 'tel') {
                const validation = validatePhone(input.value);
                if (!validation.valid) {
                    errorDiv.textContent = validation.message;
                    input.classList.add('error');
                    isValid = false;
                }
            }

            // Email validation
            if (input.type === 'email' && input.value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(input.value)) {
                    errorDiv.textContent = 'Please enter a valid email address';
                    input.classList.add('error');
                    isValid = false;
                }
            }
        });

        if (!isValid) {
            e.preventDefault();
        }
    });
}); 