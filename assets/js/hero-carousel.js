document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('.hero-carousel');
    const slides = document.querySelectorAll('.hero-slide');
    const prevBtn = document.querySelector('.carousel-arrow.prev');
    const nextBtn = document.querySelector('.carousel-arrow.next');

    let currentSlide = 0;
    let isAnimating = false;
    let autoPlayInterval;
    const autoPlayDelay = 5000; // 5 seconds between slides

    // Initialize carousel
    function initCarousel() {
        if (slides.length === 0) {
            console.warn("Carousel elements not found. Slides are empty. Auto-play and navigation will be disabled.");
            return; // Exit if no slides are found
        }
        startAutoPlay();
    }

    // Show slide
    function showSlide(index) {
        if (isAnimating) return;
        isAnimating = true;

        // Safely remove active class from current slide
        if (slides[currentSlide]) {
            slides[currentSlide].classList.remove('active');
        }

        // Update current slide index
        currentSlide = index;
        if (currentSlide >= slides.length) {
            currentSlide = 0;
        }
        if (currentSlide < 0) {
            currentSlide = slides.length - 1;
        }

        // Safely add active class to new slide
        if (slides[currentSlide]) {
            slides[currentSlide].classList.add('active');
        } else {
            console.error("Error: slides[currentSlide] is undefined after index calculation.", { currentSlide, slidesLength: slides.length });
        }

        // Reset animation flag after transition
        setTimeout(() => {
            isAnimating = false;
        }, 500);
    }

    // Next slide
    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    // Previous slide
    function prevSlide() {
        showSlide(currentSlide - 1);
    }

    // Start auto play
    function startAutoPlay() {
        stopAutoPlay();
        autoPlayInterval = setInterval(nextSlide, autoPlayDelay);
    }

    // Stop auto play
    function stopAutoPlay() {
        if (autoPlayInterval) {
            clearInterval(autoPlayInterval);
        }
    }

    // Event Listeners
    prevBtn.addEventListener('click', () => {
        prevSlide();
        startAutoPlay();
    });

    nextBtn.addEventListener('click', () => {
        nextSlide();
        startAutoPlay();
    });

    // Pause on hover
    carousel.addEventListener('mouseenter', stopAutoPlay);
    carousel.addEventListener('mouseleave', startAutoPlay);

    // Touch events for mobile
    let touchStartX = 0;
    let touchEndX = 0;

    carousel.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
        stopAutoPlay();
    });

    carousel.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
        startAutoPlay();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        if (touchEndX < touchStartX - swipeThreshold) {
            nextSlide();
        } else if (touchEndX > touchStartX + swipeThreshold) {
            prevSlide();
        }
    }

    // Initialize carousel
    initCarousel();
}); 