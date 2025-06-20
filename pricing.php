<?php
require_once 'includes/mail-handler.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing - HairsByKay</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" href="assets/images/hair-salon.png">
</head>

<body class="pricing-page">
    <?php include 'components/header.php'; ?>

    <!-- Pricing Hero Section -->
    <section class="pricing-hero">
        <div class="container">
            <h1 class="page-title">Our Services & Pricing</h1>
            <p class="subtitle">Professional hair services at competitive prices</p>
        </div>
    </section>

    <!-- Search Section -->
    <div class="pricing-search">
        <div class="container">
            <div class="search-wrapper">
                <input type="text" id="serviceSearch" placeholder="Search for services..." class="search-input">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <section class="pricing-section">
        <div class="container">
            <!-- Hair Services -->
            <div class="pricing-category">
                <h2 class="category-title">Haircut & Treatments</h2>
                <ul class="pricing-grid">
                    <li class="pricing-list-item">
                        <span class="service-name">Advanced Layered Hair Wash/Cut/Blowdry</span>
                        <span class="service-price">$75</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Haircut</span>
                        <span class="service-price">$65</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Kids Haircut</span>
                        <span class="service-price">$35</span>
                    </li>
                    <!-- <li class="pricing-list-item">
                        <span class="service-name">Hair Treatment</span>
                        <span class="service-price">$250</span>
                    </li> -->
                    <li class="pricing-list-item">
                        <span class="service-name">Hair Botox</span>
                        <span class="service-price">$250</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Nanoplastia Treatment</span>
                        <span class="service-price">$300</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Keratin Treatment</span>
                        <span class="service-price">$200</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Hair Spa</span>
                        <span class="service-price">$50</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Head Oil Massage</span>
                        <span class="service-price">$35</span>
                    </li>
                </ul>
            </div>

            <!-- Hair Color Services -->
            <div class="pricing-category">
                <h2 class="category-title">Hair Color Services</h2>
                <ul class="pricing-grid">
                    <li class="pricing-list-item">
                        <span class="service-name">Balayage</span>
                        <span class="service-price">$300</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Highlights</span>
                        <span class="service-price">$250</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Partial Highlights</span>
                        <span class="service-price">$150</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Highlights & Lowlights</span>
                        <span class="service-price">$350</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Global Color / Solid Color</span>
                        <span class="service-price">$120</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Roots Touchup</span>
                        <span class="service-price">$60</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Toner</span>
                        <span class="service-price">$50</span>
                    </li>
                </ul>
            </div>

            <!-- Facials -->
            <div class="pricing-category">
                <h2 class="category-title">Facials</h2>
                <ul class="pricing-grid">
                    <li class="pricing-list-item">
                        <span class="service-name">Basic Facial</span>
                        <span class="service-price">$60</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Cleanups</span>
                        <span class="service-price">$45</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Brightening Facial / Acne Facial</span>
                        <span class="service-price">$75</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Anti Ageing Facial</span>
                        <span class="service-price">$85</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Hydro Facial</span>
                        <span class="service-price">$130</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Fruit Facial</span>
                        <span class="service-price">$70</span>
                    </li>
                </ul>
            </div>

            <!-- Make Up -->
            <div class="pricing-category">
                <h2 class="category-title">Make Up</h2>
                <ul class="pricing-grid">
                    <li class="pricing-list-item">
                        <span class="service-name">Bridal Makeup</span>
                        <span class="service-price">$350</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Party Makeup & Hairdo</span>
                        <span class="service-price">$90</span>
                    </li>
                </ul>
            </div>

            <!-- Hair Styling -->
            <div class="pricing-category">
                <h2 class="category-title">Hair Styling</h2>
                <ul class="pricing-grid">
                    <li class="pricing-list-item">
                        <span class="service-name">Wash & Blowdry</span>
                        <span class="service-price">$40</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Wash Blow Dry &amp; Style</span>
                        <span class="service-price">$65</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Up-do</span>
                        <span class="service-price">$50</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Curls / Waves / Flat Iron</span>
                        <span class="service-price">$25</span>
                    </li>
                </ul>
            </div>

            <!-- Waxing -->
            <div class="pricing-category">
                <h2 class="category-title">Waxing</h2>
                <ul class="pricing-grid">
                    <li class="pricing-list-item">
                        <span class="service-name">Full Body Wax</span>
                        <span class="service-price">$120</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Full Arms</span>
                        <span class="service-price">$25</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Full Legs</span>
                        <span class="service-price">$40</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Under Arms</span>
                        <span class="service-price">$10</span>
                    </li>
                    <li class="pricing-list-item">
                        <span class="service-name">Full Face Wax</span>
                        <span class="service-price">$25</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Booking CTA Section -->
    <section class="pricing-cta">
        <div class="container">
            <h2>Ready to Transform Your Look?</h2>
            <p>Book your appointment today and experience the HairsByKay difference</p>
            <a href="book.php" class="cta-button">Book Now</a>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

    <script src="assets/js/main.js"></script>
</body>

</html> 