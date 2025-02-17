<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Symptom Checker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="symptomsstyles.css">
       <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script defer src="symptomscript.js"></script>


<body>
<?php include 'header.php'; ?>
<section class="hero">
            <div class="hero-content">
                <img src="images\sit.jpg" alt="A calming image related to mental health" class="hero-image">
                <div class="quote-box">
                    <p class="quote">"Your health is a priority. Visit our sites and keep the track of your health</track>."</p>
                </div>
            </div>
        </section>

    <div class="container" id="page1">
        <h2>Symptom Checker</h2>
        <label for="age">Age:</label>
        <input type="number" id="age" placeholder="Enter your age">
        
        <label>Select Gender:</label>
        <div class="gender-selection">
            <button class="gender-btn" data-gender="Male">Male</button>
            <button class="gender-btn" data-gender="Female">Female</button>
        </div>

        <button class="continue-btn" id="toSymptoms">Continue</button>
    </div>

    <div class="container hidden" id="page2">
        <h2>What are your symptoms?</h2>
        <input type="text" id="symptomInput" placeholder="Enter a symptom">
        <ul id="suggestions"></ul>
        <div id="selectedSymptoms"></div>

        <button class="continue-btn" id="toConditions">Continue</button>
    </div>

    <!-- New Section: Split into Two Columns -->
    <div class="container hidden" id="page3">
        <div class="result-container">
            <!-- Left Side: User Info -->
            <div class="user-info">
                <h3>Your Information</h3>
                <p><strong>Age:</strong> <span id="userAge"></span></p>
                <p><strong>Gender:</strong> <span id="userGender"></span></p>
                <p><strong>Symptoms:</strong> <span id="userSymptoms"></span></p>
            </div>

            <!-- Right Side: Matching Conditions -->
            <div class="conditions-info">
                <h3>Matching Conditions</h3>
                <ul id="conditionsList"></ul>
            </div>
        </div>

        <button id="restart">Start Over</button>
    </div>
    <div>
</div>
<div style="backgroung-color:whiite;">
    <h2>Popular Specialties</h2>
    <div class="specialties">
        <div class="specialty" onclick="showBookingForm('Primary Care')">
            <img src="images/primarycare.png" alt="Primary Care">
            <p>PRIMARY CARE</p>
        </div>
        <div class="specialty" onclick="showBookingForm('Dentist')">
            <img src="images/dentist.png" alt="Dentist">
            <p>DENTIST</p>
        </div>
        <div class="specialty" onclick="showBookingForm('Dermatologist')">
            <img src="images/derma.jpg" alt="Dermatologist">
            <p>DERMATOLOGIST</p>
        </div>
        <div class="specialty" onclick="showBookingForm('Psychiatrist')">
            <img src="images/psychiatrist.png" alt="Psychiatrist">
            <p>PSYCHIATRIST</p>
        </div>
        <div class="specialty" onclick="showBookingForm('Eye Doctor')">
            <img src="images/eye.jpg" alt="Eye Doctor">
            <p>EYE DOCTOR</p>
        </div>
    </div>
</div>
    <footer>
    <div class="footer-content">
        <div class="footer-section footer-logo">
            <p>Find support for health maintenance. Help is just a click away!</p>
        </div>
        <div class="footer-section">
            <h3>Services</h3>
            <ul>
                <li><a href="#">Symptoms Tracker</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Contact</h3>
            <p><i class="fa fa-phone"></i> +9779840889988</p>
            <p><i class="fa fa-envelope"></i> anupagurung111@gmail.com</p>
            <p><i class="fa fa-map-marker"></i> Kathmandu</p>
        </div>
        <div class="footer-section">
            <h3>Links</h3>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Use</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Maps</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4042.7971339323767!2d85.32101341142905!3d27.708847925325205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1908ed7fbacd%3A0x49b04b284da7a96f!2sIIMS%20College!5e1!3m2!1sen!2snp!4v1729440780403!5m2!1sen!2snp"
                width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="social-icons">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
        <p>Copyright 2024 © Inner Calm All Rights Reserved</p>
    </div>
</footer>
</body>
</html>
