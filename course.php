<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handmade Jewellery Course</title>
    <link rel="stylesheet" href="course-style.css">
</head>
<body>
<button class="back-button" onclick="history.back()">⬅</button>
    <header>
        <img src="logo.jpg" alt="Logo" class="logo">
        Handmade Jewellery Workshop
    </header>

    <div class="container">
        <div class="section">
            <h2>Types of Jewellery You Will Learn:</h2>
            <ul>
                <li>8 Types of Nose Rings (Nath)</li>
                <li>Mangalsutra Pendant</li>
                <li>Earrings</li>
                <li>Bugdi (Traditional Ear Jewellery)</li>
                <li>Hair Accessories (Khopa)</li>
                <li>Ear Cuffs</li>
            </ul>
        </div>

        <div class="section">
            <h2>What We Provide:</h2>
            <ul>
                <li>All Materials Will Be Provided</li>
                <li>Complete Information About Materials</li>
                <li>Necessary Tools Will Be Provided</li>
            </ul>
        </div>

        <div class="section highlight">
            <h2>Special Features:</h2>
            <ul>
                <li>You Can Take All Created Items Home</li>
                <li>3-Day Workshop</li>
                <li>Course Fee: ₹3500 + ₹300 for Tools</li>
                <li>Available Online and Offline</li>
            </ul>
        </div>

        <div class="section form-section">
            <h2>Enroll Now</h2>
            <form action="submit.php" method="POST">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="tel" name="phone" placeholder="Phone Number" required>
                <input type="text" name="address" placeholder="address" required>
                <p class="note">After submitting details, you will receive a WhatsApp message with a QR code for payment.</p>
                <button type="submit">Submit Details</button>
            </form>
        </div>
    </div>

    <footer>
        Join us and create beautiful handmade jewellery!
    </footer>
</body>
</html>
