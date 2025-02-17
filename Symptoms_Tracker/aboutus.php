<?php
// Add any PHP header includes or session handling here
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - SymptomTracker</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color:rgb(228, 206, 206);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .section {
    text-align: left;
    padding: 20px;
    background-color: white; /* Adding a white background */
    border-radius: 8px; /* Rounded corners for the box */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adding shadow effect */
    margin-bottom: 20px; /* Spacing between sections */
    margin-top: 60px;
}

h2 {
    font-size: 1.8rem;
    margin-bottom: 15px;
    color: black;
}

p {
    color: #333;
    line-height: 1.5;
    margin-bottom: 15px;
    font-size: 0.95rem;
}


        .team-section {
            grid-column: span 2;
            text-align: center;
            margin-top: 40px;
            margin-bottom: 60px;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
            margin-top: 25px;
        }

        .team-member {
            text-align: center;
        }

        .team-member img {
            width: 120px;
            height: 120px;
            border-radius: 8px;
            margin-bottom: 8px;
            object-fit: cover;
            background-color: #ddd;
        }

        .team-member h3 {
            font-size: 1rem;
            margin-bottom: 2px;
            color: black;
        }

        .team-member p {
            font-size: 0.9rem;
            color: #444;
            margin: 0;
        }
        
        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }
            .team-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <section class="section">
            <h2>About Us</h2>
            <p>At SymptomTracker, we are dedicated to making health monitoring effortless and insightful. Our platform allows users to track symptoms, recognize patterns, and connect with healthcare professionals seamlessly.</p>
            <p>We believe that understanding your health should be simple and accessible. SymptomTracker provides a user-friendly interface designed to help individuals log their symptoms, visualize trends over time, and receive tailored recommendations.</p>
        </section>

        <section class="section">
            <h2>Our Vision</h2>
            <p>We envision a world where individuals can take charge of their health journey. Through innovative design and smart analytics, we aim to provide users with meaningful insights that help them make informed health decisions.</p>
        </section>
    </div>

    <section class="team-section">
        <h2>Meet Our Team</h2>
        <p>Our team consists of passionate professionals dedicated to revolutionizing health tracking.</p>
        <div class="team-grid">
            <div class="team-member">
                <img src="images/anupa.jpg" alt="Anupa Gurung">
                <h3>Anupa</h3>
                <h3>Gurung</h3>
            </div>
            <div class="team-member">
                <img src="images/Rajita.jpg" alt="Rajita Khadgi">
                <h3>Rajita</h3>
                <h3>Khadgi</h3>
            </div>
            <div class="team-member">
                <img src="images/Smriti.jpg" alt="Smriti Bhattarai">
                <h3>Smriti</h3>
                <h3>Bhattarai</h3>
            </div>
            <div class="team-member">
                <img src="images/swaotika.jpg" alt="Swaotika Regmi">
                <h3>Swastika</h3>
                <h3>Regmi</h3>
            </div>
            <div class="team-member">
                <img src="images/bibek.jpg" alt="Bibek Khadka">
                <h3>Bibek</h3>
                <h3>Khadka</h3>
            </div>
        </div>
    </section>

<?php include 'footer.php'; ?>
</body>
</html>
