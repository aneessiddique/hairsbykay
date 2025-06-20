<?php
require_once 'includes/mail-handler.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = handleAppointment($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairsByKay - Modern Hair & Beauty Services</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" href="assets/images/hair-salon.png">

</head>

<body>
    <?php include 'components/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-carousel">
            <div class="hero-slide active" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('assets/images/hero-1.jpg');">
                <div class="hero-content">
                    <h1>Welcome to HairsByKay</h1>
                    <p>Where Style Meets Excellence</p>
                    <a href="book.php" class="cta-button">Book Appointment</a>
                </div>
            </div>
            <div class="hero-slide" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('assets/images/hero2.jpg');">
                <div class="hero-content">
                    <h1>Expert Stylists</h1>
                    <p>Professional Care for Your Beauty</p>
                    <a href="book.php" class="cta-button">Book Appointment</a>
                </div>
            </div>
            <div class="hero-slide" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('assets/images/hero3.jpg');">
                <div class="hero-content">
                    <h1>Premium Services</h1>
                    <p>Experience Luxury & Comfort</p>
                    <a href="book.php" class="cta-button">Book Appointment</a>
                </div>
            </div>
        </div>
        <button class="carousel-arrow prev" aria-label="Previous slide">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <div class="carousel-arrow next">
            <i class="fas fa-chevron-right"></i>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <h2 class="section-title">Our Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-cut"></i>
                    </div>
                    <h3>Cutting</h3>
                    <p>Precision cutting techniques tailored to your style. Our expert stylists create the perfect shape to enhance your natural features.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-magic"></i>
                    </div>
                    <h3>Styling</h3>
                    <p>Transform your look with professional styling. From elegant updos to modern waves, we create stunning styles for any occasion.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3>Coloring</h3>
                    <p>Discover your perfect shade with our expert colorists. From subtle highlights to bold transformations, using premium products.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-spa"></i>
                    </div>
                    <h3>Facials</h3>
                    <p>Rejuvenate your skin with our luxurious facial treatments. Customized care for a radiant, refreshed complexion.</p>
                </div>
            </div>
        </div>
    </section>

   <!-- Meet Our Expert Section -->
<section class="expert-section">
  <div class="container">

    <div class="expert-section-header">
      <h2>Meet Our Expert</h2>
    </div>

    <div class="expert-content">
      <div class="expert-image">
        <img src="assets/images/stylist.jpg" alt="Kay - Master Stylist">
      </div>
      <div class="expert-text">
        <h3>Kay</h3>
        <p class="expert-title">Master Stylist</p>
        <p class="expert-description">Kay is a Master Stylist renowned for precision haircuts and personalized styling for women. Her passion for beauty and attention to detail ensure every client leaves feeling confident and refreshed. From timeless classics to trendsetting looks, she blends creativity with expertise, delivering styles that perfectly suit individual personalities and lifestyles. Her loyal clientele speaks volumes about her talent and dedication.</p>
        <div class="expert-social-links">
          <a href="https://www.tiktok.com/@kaynaat.owais?_t=ZM-8wVFpCMMwVh&_r=1" target="_blank" class="expert-social-link"><i class="fa-brands fa-tiktok"></i></a>
          <a href="https://www.instagram.com/hairs_by_kay?igsh=MTNnejkweDhodGJqOA==" target="_blank" class="expert-social-link"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>

  </div>
</section>




    <!-- Google Reviews Section -->
    <section class="google-reviews">
        <div class="container">
            <div class="google-reviews-header">
                <div class="google-info">
                    <div class="google-logo-text">
                        <img src="assets/images/google-logo.png" alt="Google" class="google-icon">
                        <span>Reviews</span>
                    </div>
                    <div class="overall-rating">
                        <span class="rating-number">4.7</span>
                        <div class="stars overall-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <!-- <span class="review-count">(16,178)</span> -->
                    </div>
                </div>
                <a href="https://maps.app.goo.gl/vsD4uMmgMFiXjVtTA" target="_blank" class="review-on-google-button">Review us on Google</a>
            </div>

            <!-- <h2 class="section-title">What Our Customers Say</h2>
            <div class="reviews-slider-wrapper">
                <div class="reviews-slider" id="reviewsSlider">
                    Add more review cards here
                </div>
                <button class="slider-arrow prev" aria-label="Previous review" id="prevReview">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="slider-arrow next" aria-label="Next review" id="nextReview">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div> -->
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

    <script src="assets/js/hero-carousel.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-validation.js"></script>
</body>

</html>