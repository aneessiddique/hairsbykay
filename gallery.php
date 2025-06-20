<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" href="assets/images/hair-salon.png">
</head>

<body>
    <?php include 'components/header.php'; ?>

    <!-- Gallery Hero Section -->
    
    <!-- Gallery Section -->
    <section class="gallery-page">
        <section class="gallery-hero">
                <h1>Our Gallery</h1>
                <p>Explore our collection of stunning hair transformations and styles</p>
           
        </section>
        <div class="container">
            <!-- Images Grid -->
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="assets/images/hair (1).jpg" alt="Hair Style 1" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="assets/images/hair (2).jpg" alt="Hair Style 2" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="assets/images/hair (3).jpg" alt="Hair Style 3" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="assets/images/hair (4).jpg" alt="Hair Style 4" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="assets/images/hair (5).jpg" alt="Hair Style 5" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="assets/images/hair (6).jpg" alt="Hair Style 6" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="assets/images/hair (7).jpg" alt="Hair Style 7" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="assets/images/hair (8).jpg" alt="Hair Style 8" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="assets/images/hair (9).jpg" alt="Hair Style 9" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="assets/images/hair (10).jpg" alt="Hair Style 10" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="assets/images/hair (11).jpg" alt="Hair Style 11" loading="lazy">
                </div>
            </div>

            <!-- Videos Grid -->
            <div class="video-grid">
                <div class="video-item">
                    <video src="assets/images/hair (1).mp4" controls preload="metadata" playsinline></video>
                </div>
                <div class="video-item">
                    <video src="assets/images/hair (2).mp4" controls preload="metadata" playsinline></video>
                </div>
                <div class="video-item">
                    <video src="assets/images/hair (3).mp4" controls preload="metadata" playsinline></video>
                </div>
                <div class="video-item">
                    <video src="assets/images/hair (4).mp4" controls preload="metadata" playsinline></video>
                </div>
                <div class="video-item">
                    <video src="assets/images/hair (5).mp4" controls preload="metadata" playsinline></video>
                </div>
                <div class="video-item">
                    <video src="assets/images/hair (6).mp4" controls preload="metadata" playsinline></video>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Preview Modal -->
    <div class="preview-modal">
        <div class="preview-content">
            <span class="preview-close">&times;</span>
            <img src="" alt="Preview">
            <div class="preview-nav">
                <button class="prev-btn"><i class="fas fa-chevron-left"></i></button>
                <button class="next-btn"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>

    <script src="assets/js/gallery.js"></script>
</body>

</html>