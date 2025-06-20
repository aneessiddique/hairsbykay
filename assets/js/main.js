document.addEventListener('DOMContentLoaded', function () {
    // Navbar scroll effect
    const header = document.querySelector('.main-header');
    let lastScroll = 0;

    window.addEventListener('scroll', function () {
        const currentScroll = window.pageYOffset;
        if (currentScroll > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        lastScroll = currentScroll;
    });

    // Mobile menu toggle
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');

    if (hamburger && navLinks) {
        hamburger.addEventListener('click', function (e) {
            e.stopPropagation();
            this.classList.toggle('active');
            navLinks.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function (e) {
            if (navLinks.classList.contains('active') &&
                !hamburger.contains(e.target) &&
                !navLinks.contains(e.target)) {
                hamburger.classList.remove('active');
                navLinks.classList.remove('active');
                document.body.classList.remove('menu-open');
            }
        });

        // Close menu when clicking on a link
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navLinks.classList.remove('active');
                document.body.classList.remove('menu-open');
            });
        });
    }

    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Form submission handling
    const contactForm = document.getElementById('appointment-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const formObject = {};
            formData.forEach((value, key) => {
                formObject[key] = value;
            });
            console.log('Form submitted:', formObject);
            alert('Thank you for your message! We will get back to you soon.');
            this.reset();
        });
    }

    // Animate elements on scroll
    const animateOnScroll = function () {
        const elements = document.querySelectorAll('.service-card, .about-content, .gallery-item, .testimonial');
        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const screenPosition = window.innerHeight;
            if (elementPosition < screenPosition) {
                element.classList.add('animate');
            }
        });
    };

    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Initial check

    // Google Reviews Slider
    // const reviews = [
    //     {
    //         name: "Vedanti Thaker",
    //         image: "assets/images/Vedanti-haker.png",
    //         stars: 5,
    //         text: "Can't recommend this salon enough. A hidden gem for sure. The hairstylist Kay is so sweet and friendly and she would definitely make you feel comfortable. She gave me the exact haircut that I showed her based on my hair type and . . . .",
    //         reviewLink: "https://g.co/kgs/YrFsDt3"
    //     },
    //     {
    //         name: "Zunaira Faiz",
    //         image: "assets/images/Zunaira-Faiz.png",
    //         stars: 5,
    //         text: "I've always been passionate about hair color, and given the nature of my job, staying updated with fresh looks is a must for me. When I found out that Kaynaat Owais, was visiting Pakistan, I knew this was my chance! . . . .",
    //         reviewLink: "https://g.co/kgs/XgzfBwc"
    //     },
    //     {
    //         name: "drashti jogani",
    //         image: "assets/images/drashti-jogani.png",
    //         stars: 5,
    //         text: "It was my first time visit for this salon,  i was welcomed very nicely, Kaynaat did a wonderful job with my haircut. She asked about my preferences beforehand and followed them  . She is an amazing hairstylist. Highly . . . .",
    //         reviewLink: "https://g.co/kgs/wYu3A3w"
    //     },
    //     {
    //         name: "Bharathi Vineet Rao",
    //         image: "assets/images/Bharathi-Vineet-Rao.png",
    //         stars: 5,
    //         text: "This place is a hidden gem. My daughter wanted a haircut and this place showed up when we searched for a hair salon nearby. Since the reviews were good, we decided to go there and was pleasantly surprised by the warm . . . .",
    //         reviewLink: "https://g.co/kgs/6EdUtpy"
    //     },
    //     {
    //         name: "Tahreem Qarni",
    //         image: "assets/images/Tahreem-Qarni.png",
    //         stars: 4,
    //         text: "Kay is amazing hair stylist , I've been going here for many years and would never go elsewhere. Always quick to book in, excellent hair care   with very talented stylist.Kay  provide high quality services without . . . .",
    //         reviewLink: "https://g.co/kgs/hik7M99"
    //     },
    //     {
    //         name: "Nisha Paleri Veliyaveetil",
    //         image: "assets/images/Nisha-Paleri-Veliyaveetil.png",
    //         stars: 5,
    //         text: "I have been looking for a good hair stylist for the last 3 years here in Mississauga. I didn't find a single stylist who actually heard what I needed and gave me what I needed. I have tried from new age . . . .",
    //         reviewLink: "https://g.co/kgs/kGyhNkg"
    //     },
    //     {
    //         name: "Shareen Rauf",
    //         image: "assets/images/Shareen-Rauf.png",
    //         stars: 5,
    //         text: "I recently had hair botox done by Kay and honestly, I couldn't be happier with the results. From the moment I walked in, she made me feel comfortable and taken care of. She explained the whole process . . . .",
    //         reviewLink: "https://g.co/kgs/LCMH6M7"
    //     },
    //     {
    //         name: "Simra Khan",
    //         image: "assets/images/Simra-Khan.png",
    //         stars: 5,
    //         text: "I had an amazing experience with Kay at The Stylist ! She is incredibly talented, professional, and really listens to what you want. She transformed my hair beautifully, and I couldn't be happier with the results. Not only . . . .",
    //         reviewLink: "https://g.co/kgs/y5R3CAV"
    //     }
    // ];

    const reviewsSlider = document.querySelector('.reviews-slider');
    const prevArrow = document.querySelector('.reviews-slider-wrapper .slider-arrow.prev');
    const nextArrow = document.querySelector('.reviews-slider-wrapper .slider-arrow.next');

    let currentIndex = 0;
    let cardsPerPage = getCardsPerPage();

    function getCardsPerPage() {
        if (window.innerWidth <= 576) return 1;
        if (window.innerWidth <= 992) return 2;
            return 3;
    }

    function createReviewCardHTML(review) {
        const starsHTML = Array(review.stars).fill('<i class="fas fa-star"></i>').join('') +
                          Array(5 - review.stars).fill('<i class="far fa-star"></i>').join('');
        
        return `
            <div class="review-card">
                <a href="${review.reviewLink}" target="_blank" class="reviewer-link">
                    <div class="reviewer-top">
                        <img src="${review.image}" alt="${review.name}" class="reviewer-image">
                        <div class="reviewer-details">
                            <div class="reviewer-name">
                                ${review.name} <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="stars">${starsHTML}</div>
                <p class="review-text">${review.text}</p>
            </div>
        `;
    }

    function renderReviews() {
        if (!reviewsSlider) return;
        reviewsSlider.innerHTML = reviews.map(review => createReviewCardHTML(review)).join('');
    }

    function updateSliderPosition() {
        if (!reviewsSlider) return;
        const firstCard = reviewsSlider.children[0];
        if (!firstCard) return;

        const cardWidth = firstCard.offsetWidth + 20;
        const moveX = currentIndex * cardWidth;
        reviewsSlider.style.transform = `translateX(-${moveX}px)`;
        updateArrows();
    }

    function updateArrows() {
        if (!prevArrow || !nextArrow) return;
        prevArrow.style.opacity = currentIndex === 0 ? '0.5' : '1';
        nextArrow.style.opacity = currentIndex >= reviews.length - cardsPerPage ? '0.5' : '1';
        prevArrow.style.pointerEvents = currentIndex === 0 ? 'none' : 'auto';
        nextArrow.style.pointerEvents = currentIndex >= reviews.length - cardsPerPage ? 'none' : 'auto';
    }

    // Initialize the reviews slider
    if (reviewsSlider && prevArrow && nextArrow) {
        renderReviews();
        updateSliderPosition();

        prevArrow.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex = Math.max(0, currentIndex - cardsPerPage);
                updateSliderPosition();
            }
        });

        nextArrow.addEventListener('click', () => {
            if (currentIndex < reviews.length - cardsPerPage) {
                currentIndex = Math.min(reviews.length - cardsPerPage, currentIndex + cardsPerPage);
                updateSliderPosition();
            }
        });

        // Touch support for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        reviewsSlider.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });

        reviewsSlider.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            const swipeThreshold = 50;
            if (touchEndX < touchStartX - swipeThreshold) {
                if (currentIndex < reviews.length - cardsPerPage) {
                    currentIndex = Math.min(reviews.length - cardsPerPage, currentIndex + cardsPerPage);
                    updateSliderPosition();
                }
            } else if (touchEndX > touchStartX + swipeThreshold) {
                if (currentIndex > 0) {
                    currentIndex = Math.max(0, currentIndex - cardsPerPage);
                    updateSliderPosition();
                }
            }
        }

        window.addEventListener('resize', () => {
            cardsPerPage = getCardsPerPage();
            currentIndex = Math.min(currentIndex, reviews.length - cardsPerPage);
            updateSliderPosition();
        });
    }

    // Handle services link click
    const servicesLink = document.querySelector('.services-link');
    if (servicesLink) {
        servicesLink.addEventListener('click', function(e) {
            if (!window.location.pathname.endsWith('index.php')) return;
            
            e.preventDefault();
            const servicesSection = document.getElementById('services');
            if (servicesSection) {
                const headerOffset = 100;
                const elementPosition = servicesSection.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    }

    // Handle hash in URL when page loads
    if (window.location.hash === '#services') {
        const servicesSection = document.getElementById('services');
        if (servicesSection) {
            setTimeout(() => {
                const headerOffset = 90;
                const elementPosition = servicesSection.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }, 100);
        }
    }

    // Gallery Preview Functionality
    const galleryItems = document.querySelectorAll('.gallery-item:not(.video-item)');
    const body = document.body;

    // Create preview modal
    const previewModal = document.createElement('div');
    previewModal.className = 'preview-modal';
    previewModal.innerHTML = `
        <div class="preview-content">
            <span class="preview-close">&times;</span>
            <img src="" alt="Preview">
            <div class="preview-nav">
                <button class="prev-btn"><i class="fas fa-chevron-left"></i></button>
                <button class="next-btn"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    `;
    body.appendChild(previewModal);

    let currentImageIndex = 0;
    const images = Array.from(galleryItems);

    // Open preview
    galleryItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            currentImageIndex = index;
            updatePreview();
            previewModal.classList.add('active');
            body.style.overflow = 'hidden';
        });
    });

    // Close preview
    previewModal.querySelector('.preview-close').addEventListener('click', () => {
        previewModal.classList.remove('active');
        body.style.overflow = '';
    });

    // Navigation
    previewModal.querySelector('.prev-btn').addEventListener('click', () => {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        updatePreview();
    });

    previewModal.querySelector('.next-btn').addEventListener('click', () => {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        updatePreview();
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (!previewModal.classList.contains('active')) return;
        
        if (e.key === 'Escape') {
            previewModal.classList.remove('active');
            body.style.overflow = '';
        } else if (e.key === 'ArrowLeft') {
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            updatePreview();
        } else if (e.key === 'ArrowRight') {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            updatePreview();
        }
    });

    function updatePreview() {
        const img = previewModal.querySelector('img');
        img.src = images[currentImageIndex].querySelector('img').src;
    }

    // Close preview when clicking outside
    previewModal.addEventListener('click', (e) => {
        if (e.target === previewModal) {
            previewModal.classList.remove('active');
            body.style.overflow = '';
        }
    });

    // Pricing Search Functionality
    const serviceSearch = document.getElementById('serviceSearch');
    if (serviceSearch) {
        serviceSearch.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            const categories = document.querySelectorAll('.pricing-category');
            let hasResults = false;

            categories.forEach(category => {
                const items = category.querySelectorAll('.pricing-list-item');
                let categoryHasResults = false;

                items.forEach(item => {
                    const serviceName = item.querySelector('.service-name').textContent.toLowerCase();
                    const servicePrice = item.querySelector('.service-price').textContent.toLowerCase();
                    
                    if (serviceName.includes(searchTerm) || servicePrice.includes(searchTerm)) {
                        item.style.display = '';
                        categoryHasResults = true;
                        hasResults = true;

                        // Highlight matching text
                        const nameElement = item.querySelector('.service-name');
                        const priceElement = item.querySelector('.service-price');
                        
                        if (searchTerm) {
                            const nameText = nameElement.textContent;
                            const priceText = priceElement.textContent;
                            
                            const highlightedName = nameText.replace(
                                new RegExp(searchTerm, 'gi'),
                                match => `<mark class="highlight">${match}</mark>`
                            );
                            
                            const highlightedPrice = priceText.replace(
                                new RegExp(searchTerm, 'gi'),
                                match => `<mark class="highlight">${match}</mark>`
                            );
                            
                            nameElement.innerHTML = highlightedName;
                            priceElement.innerHTML = highlightedPrice;
                        } else {
                            nameElement.textContent = nameElement.textContent;
                            priceElement.textContent = priceElement.textContent;
                        }
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Show/hide category based on results
                category.style.display = categoryHasResults ? '' : 'none';
            });

            // Show/hide no results message
            let noResultsMessage = document.querySelector('.no-results-message');
            if (!noResultsMessage) {
                noResultsMessage = document.createElement('div');
                noResultsMessage.className = 'no-results-message';
                noResultsMessage.innerHTML = `
                    <i class="fas fa-search"></i>
                    <p>No services found matching "${this.value}"</p>
                    <p class="suggestion">Try searching with different keywords</p>
                `;
                document.querySelector('.pricing-section .container').appendChild(noResultsMessage);
            } else {
                noResultsMessage.querySelector('p').textContent = `No services found matching "${this.value}"`;
            }

            if (!hasResults && searchTerm) {
                noResultsMessage.style.display = 'block';
            } else {
                noResultsMessage.style.display = 'none';
            }
        });
    }
}); 


