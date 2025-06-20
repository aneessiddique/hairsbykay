document.addEventListener('DOMContentLoaded', function() {
    // Get all filter buttons and gallery items
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    const previewModal = document.querySelector('.preview-modal');
    const previewImage = previewModal.querySelector('img');
    const closeBtn = previewModal.querySelector('.preview-close');
    const prevBtn = previewModal.querySelector('.prev-btn');
    const nextBtn = previewModal.querySelector('.next-btn');
    const body = document.body;

    let currentImageIndex = 0;
    const images = Array.from(galleryItems);

    // Add click event listeners to filter buttons
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            button.classList.add('active');

            const filterValue = button.getAttribute('data-filter');

            // Filter gallery items
            galleryItems.forEach(item => {
                if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 10);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

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
    closeBtn.addEventListener('click', () => {
        previewModal.classList.remove('active');
        body.style.overflow = '';
    });

    // Navigation
    prevBtn.addEventListener('click', () => {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        updatePreview();
    });

    nextBtn.addEventListener('click', () => {
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
        const img = images[currentImageIndex].querySelector('img');
        previewImage.src = img.src;
        previewImage.alt = img.alt;
    }

    // Close preview when clicking outside
    previewModal.addEventListener('click', (e) => {
        if (e.target === previewModal) {
            previewModal.classList.remove('active');
            body.style.overflow = '';
        }
    });
}); 