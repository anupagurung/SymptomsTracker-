<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health</title>
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo"> 
            <h2>Helath Tracker </h2>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="aboutus.php"><i class="fas fa-info-circle"></i> About Us</a></li>
                <li><a href="symptomsChecker.php"><i class="fa-solid fa-notes-medical"></i> Symptoms Tracker</a></li>
                <li><a href="findDoctor.php"><i class="fa-solid fa-user-nurse"> </i>Contact Doctor</a></li>
                <li><a href="profile.php"><i class="fas fa-users"></i> Dashboard</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <a href="login.php" class="sign-in">Sign In</a>
            <a href="signup.php" class="sign-up">Sign Up</a>
        </div>
    </header>
    
    <main>
        <section class="hero">
            <div class="hero-content">
                <img src="images\sit.jpg" alt="A calming image related to mental health" class="hero-image">
                <div class="quote-box">
                    <p class="quote">"Your health is a priority. Visit our sites and keep the track of your health</track>."</p>
                </div>
            </div>
        </section>
        
        <section class="mood-tracker">
            <h2>How Are You Feeling Today?</h2>
            <div class="mood-options">
                <button aria-label="Feeling happy">😊</button>
                <button aria-label="Feeling neutral">😐</button>
                <button aria-label="Feeling sad">😢</button>
                <button aria-label="Feeling angry">😠</button>
                <button aria-label="Feeling sleepy">😴</button>
            </div>
        </section>
        
        <section class="mental-health-section">
            <div class="container">
                <div class="image-placeholder">
                    <img src="images\mental-health-7323725_1280.png" alt="Illustration related to mental health">
                </div>
                <div class="text-section">
                    <h1>You Deserve to be Healthy</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non aliquet habitasse nunc elementum mattis est neque ipsum. Varius aliquet dignissim.</p>
                    <a href="#" class="button">Get Started</a>
                </div>
            </div>
        </section>
        
              
        <section class="quiz-section">
            <h2>Discover Your Sites Features</h2>
            <p>Our websites features can make you stay up to date of your health</p>
            
            <div class="quiz-cards">
                <div class="quiz-card">
                    <img src="images\doctor.jpg" alt="Are You Ready For a Relationship? Quiz">
                    <p>Make an appointment and visit doctor</p>
                </div>
                <div class="quiz-card">
                    <img src="images\tracker.png" alt="The ACE Quiz">
                    <p>See the Match condition of your health Symptoms</p>
                </div>
                <div class="quiz-card">
                    <img src="images\update.jpg" alt="Love Language Quiz">
                    <p>Edit or update your prfoile through dashboard</p>
                </div>
                <div class="quiz-card">
                    <img src="images\report.png" alt="Am I Lonely? Quiz">
                    <p>Get health report of your health</p>
                </div>
            </div>
        
            <div class="quiz-navigation">
                <button class="prev-btn" aria-label="Previous quiz">←</button>
                <button class="next-btn" aria-label="Next quiz">→</button>
            </div>
        
            <button class="take-more-btn">Explore our features</button>
        </section>
        
    </main>
    
    <footer>
        <div class="footer-content">
            <div class="footer-section footer-logo">
                
                <p>Find support for health maintaince help is just a click away!</p>
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
                <p><i class="fa fa-map-marker"></i>  Kathmandu</p>
            </div>
            <div class="footer-section">
                <h3>Links</h3>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Term Of Use</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Maps</h3>
                <iframe
                    src=https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4042.7971339323767!2d85.32101341142905!3d27.708847925325205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1908ed7fbacd%3A0x49b04b284da7a96f!2sIIMS%20College!5e1!3m2!1sen!2snp!4v1729440780403!5m2!1sen!2snp"
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
            <p>Copyright 2024 ©Inner Calm All Right Reserved</p>
        </div>
    </footer>
</body>
</html>
