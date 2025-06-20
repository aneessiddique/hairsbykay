<form method="POST" class="appointment-form">
    <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
    </div>

    <div class="form-group">
        <label for="service">Service:</label>
        <select id="service" name="service" required>
            <option value="">Select a service</option>
            <option value="haircut">Haircut</option>
            <option value="coloring">Hair Coloring</option>
            <option value="styling">Hair Styling</option>
            <option value="manicure">Manicure</option>
            <option value="pedicure">Pedicure</option>
        </select>
    </div>

    <div class="form-group">
        <label for="date">Preferred Date:</label>
        <input type="date" id="date" name="date" required>
    </div>

    <div class="form-group">
        <label for="time">Preferred Time:</label>
        <input type="time" id="time" name="time" required>
    </div>

    <div class="form-group">
        <label for="notes">Additional Notes:</label>
        <textarea id="notes" name="notes" rows="4"></textarea>
    </div>

    <button type="submit" class="submit-btn">Book Appointment</button>
</form> 