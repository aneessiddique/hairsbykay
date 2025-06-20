<?php
require_once 'includes/mail-handler.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = handleAppointment($_POST);
    $message = $result['message'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Appointment - Salon</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" href="assets/images/hair-salon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body>
    <?php include 'components/header.php'; ?>

    <section class="booking-page">
        <div class="container">
            <h1 class="page-title">Book an Appointment</h1>
            <?php if ($message): ?>
                <div class="alert <?php echo strpos($message, 'error') !== false ? 'alert-error' : 'alert-success'; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <div class="booking-content">
                <div class="booking-info">
                    <h3>Our Services</h3>
                    <ul class="service-list">
                        <li>Hair Cutting</li>
                        <li>Hair Styling</li>
                        <li>Hair Coloring</li>
                        <li>Facials</li>
                        <li>Waxing</li>
                        <li>Makeup</li>
                    </ul>
                    <div class="booking-note">
                        <p>Please book your appointment at least 24 hours in advance.</p>
                        <p>For any special requests or questions, please contact us directly.</p>
                    </div>
                </div>
                <div class="booking-form" id="appointmentForm">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" name="name" placeholder="Your Name" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label>Your Email</label>
                            <input type="email" name="email" placeholder="Your Email" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label>Your Phone</label>
                            <input type="tel" name="phone" placeholder="Your Phone" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label>Select Service</label>
                            <select name="service" required>
                                <option value="">Select Service</option>
                                <!-- Haircut & Treatments -->
                                <option value="advanced-layered">Advanced Layered Hair Wash/Cut/Blowdry</option>
                                <option value="haircut">Haircut</option>
                                <option value="kids-haircut">Kids Haircut</option>
                                <option value="hair-botox">Hair Botox</option>
                                <option value="nanoplastia">Nanoplastia Treatment</option>
                                <option value="keratin">Keratin Treatment</option>
                                <option value="hair-spa">Hair Spa</option>
                                <option value="head-oil-massage">Head Oil Massage</option>

                                <!-- Hair Color Services -->
                                <option value="balayage">Balayage</option>
                                <option value="highlights">Highlights</option>
                                <option value="partial-highlights">Partial Highlights</option>
                                <option value="highlights-lowlights">Highlights & Lowlights</option>
                                <option value="global-color">Global Color / Solid Color</option>
                                <option value="roots-touchup">Roots Touchup</option>
                                <option value="toner">Toner</option>

                                <!-- Facials -->
                                <option value="basic-facial">Basic Facial</option>
                                <option value="cleanups">Cleanups</option>
                                <option value="brightening-facial">Brightening Facial / Acne Facial</option>
                                <option value="anti-ageing-facial">Anti Ageing Facial</option>
                                <option value="hydro-facial">Hydro Facial</option>
                                <option value="fruit-facial">Fruit Facial</option>

                                <!-- Make Up -->
                                <option value="bridal-makeup">Bridal Makeup</option>
                                <option value="party-makeup">Party Makeup & Hairdo</option>

                                <!-- Hair Styling -->
                                <option value="wash-blowdry">Wash & Blowdry</option>
                                <option value="wash-blowdry-style">Wash Blow Dry and Style</option>
                                <option value="updo">Up-do</option>
                                <option value="curls-waves">Curls / Waves / Flat Iron</option>

                                <!-- Waxing -->
                                <option value="full-body-wax">Full Body Wax</option>
                                <option value="full-arms">Full Arms</option>
                                <option value="full-legs">Full Legs</option>
                                <option value="under-arms">Under Arms</option>
                                <option value="full-face-wax">Full Face Wax</option>
                            </select>
                            <div class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label>Appointment Date</label>
                            <input type="date" name="date" placeholder="Appointment Date" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                            <div class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label>Appointment Time</label>
                            <input type="text" id="appointment-time" name="time" placeholder="Select Time" required>
                            <div class="error-message"></div>
                        </div>

                        <div class="form-group">
                            <label>Special Requests or Notes</label>
                            <textarea name="notes" placeholder="Special Requests or Notes"></textarea>
                            <div class="error-message"></div>
                        </div>
                        <button type="submit" class="submit-btn">Book Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#appointment-time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "h:i K",
            time_24hr: false,
            minTime: "09:00",
            maxTime: "20:00",
            minuteIncrement: 30
        });
    </script>

</body>

</html>