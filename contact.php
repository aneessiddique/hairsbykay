<?php
require_once 'includes/mail-handler.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = handleContact($_POST);
    $message = $result['message'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Beauty Salon</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" href="assets/images/hair-salon.png">
</head>
<body>
    <?php include 'components/header.php'; ?>

    <section class="contact-page">
        <div class="container">
            <div class="contact-hero">
                <h1 class="page-title">Contact Us</h1>
                <p class="subtitle">Get in Touch with Our Team</p>
            </div>

            <?php if ($message): ?>
                <div class="alert <?php echo strpos($message, 'error') !== false ? 'alert-error' : 'alert-success'; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <div class="contact-content">
                <div class="contact-info">
                    <div class="info-card">
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <h3>Address</h3>
                            <p>592 Rathburn Rd W, Mississauga, ON L5B 3A4, Canada</p>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone"></i>
                            <h3>Phone</h3>
                            <p><a href="tel:+14379924963">+1-437-992-4963</a></p>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-clock"></i>
                            <h3>Hours</h3>
                            <p>Mon-Sat: 9:00 AM - 7:00 PM</p>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope"></i>
                            <h3>Email</h3>
                            <p><a href="mailto:okaynaat@gmail.com">okaynaat@gmail.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <h2>Send us a Message</h2>
                    <form method="POST" action="">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" placeholder="Your Phone" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <textarea name="message" placeholder="Your Message" required></textarea>
                            <div class="error-message"></div>
                        </div>
                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-validation.js"></script>
</body>
</html> 