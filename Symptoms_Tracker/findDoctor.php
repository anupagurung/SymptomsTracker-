<?php
session_start();
require_once "db.php"; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        die("Error: User not logged in.");
    }

    $user_id = $_SESSION['user_id'];
    $counselor = $_POST['counselor'] ?? "";
    $date = $_POST['date'] ?? "";
    $time = $_POST['time'] ?? "";

    if (empty($counselor) || empty($date) || empty($time)) {
        die("Error: Please fill in all fields.");
    }

    if ($counselor == "Anupa Gurung") {
        $specialization = "Depression Specialist";
    } elseif ($counselor == "Astha Joshi") {
        $specialization = "Anxiety Specialist";
    } else {
        $specialization = "General Counseling";
    }

    try {
        // Check if user_id is being fetched correctly
        error_log("User ID: " . $user_id);

        $query = "INSERT INTO appointments (user_id, counselor, date, time, specialization) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

        if ($stmt->execute([$user_id, $counselor, $date, $time, $specialization])) {
            echo "Appointment booked successfully!";
        } else {
            echo "Failed to book appointment.";
        }
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popular Specialties</title>
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        
        /* Hero Section */
        .hero {
            background-color: #e0e0e0;
            width: 100%;
            height: 70vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        .hero-image {
            width: 100vw;
            height: 70vh;
            object-fit: cover;
        }
        .quote-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 12px;
        }
        .container {
            padding: 40px;
            margin-top: 80px;
        }
        h2 {
            color: #2c3e50;
        }
        .specialties {
            display: flex;
            justify-content: center;
            gap: 50px;
            flex-wrap: wrap;
        }
        .specialty {
            text-align: center;
            cursor: pointer;
        }
        .specialty img {
            width: 100px;
            height: 100px;
            transition: transform 0.3s ease;
        }
        .specialty img:hover {
            transform: scale(1.1);
        }
        .specialty p {
            margin-top: 10px;
            font-weight: bold;
            color: #2c3e50;
        }
        .main-content {
            display: none;
            margin-top: 20px;
        }
       /* Book Counselor Section */
.book-counselor {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 30px;
    padding: 30px;
    background-color: #ffffff;
    margin-top: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
}

.book-counselor.show {
    opacity: 1;
    transform: translateY(0);
}

/* Booking Form */
.booking-form {
    flex: 1;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    animation: fadeIn 0.5s ease-in-out;
}

.booking-form h2 {
    color: #333;
    margin-bottom: 15px;
}

.booking-form label {
    display: block;
    font-weight: bold;
    margin-top: 10px;
}

.booking-form input, 
.booking-form select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    transition: 0.3s ease-in-out;
}

.booking-form input:focus,
.booking-form select:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
}

.booking-form button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: bold;
    margin-top: 15px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.booking-form button:hover {
    background-color: #0056b3;
}

/* Upcoming Appointments */
.upcoming-appointments {
    flex: 1;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    animation: fadeIn 0.7s ease-in-out;
}

.upcoming-appointments h2 {
    color: #333;
    margin-bottom: 15px;
}

.upcoming-appointments table {
    width: 100%;
    border-collapse: collapse;
}

.upcoming-appointments th, 
.upcoming-appointments td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.upcoming-appointments th {
    background-color: #f0f0f0;
    font-weight: bold;
}

.upcoming-appointments tr:hover {
    background-color: #f9f9f9;
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    </style>
</head>
<body>
<?php include 'header.php'; ?>

</header>

<section class="hero">
    <img src="images/sit.jpg" alt="A calming image related to health" class="hero-image">
    <div class="quote-box">
        <p class="quote">Visit a Doctor to keep track of your health and Be healthy and fit</p>
    </div>
</section>
<form action="findDoctor.php" method="POST" style="width: 100%;">
<div class="container">
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
<main class="main-content" id="mainContent">
        <section class="book-counselor show">
            <div class="booking-form">
                <h2>Book a Counseling Session for <span id="selectedSpecialty"></span></h2>
                <form id="bookingForm" action="book_appointment.php" method="POST">
                    <label for="counselor">Choose a Counselor:</label>
                    <select id="counselor" name="counselor" required>
                        <option value="Astha Joshi">Smriti Bhattarai - Primary Care</option>
                        <option value="Anupa Gurung">Anupa Gurung - Densit Specialist</option>
                        <option value="Astha Joshi">Rajita Khadgi - DERMATOLOGIST Specialist </option>
                        <option value="Anupa Gurung">Swostika Regimi- Depression Specialist</option>
                    </select>
                    
                    <label for="date">Choose Date:</label>
                    <input type="date" id="date" name="date" required>
                    
                    <label for="time">Choose Time:</label>
                    <select id="time" name="time" required>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                    </select>
                    
                    <button type="submit" class="button">Book Appointment</button>
                </form>
            </div>

            <aside class="upcoming-appointments">
                <h2>Your Upcoming Appointments</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Counselor</th>
                            <th>Specialization</th>
                        </tr>
                    </thead>
                    <tbody id="appointmentsBody"></tbody>
                </table>
            </aside>
        </section>
    </main>
    <?php include 'footer.php'; ?>
<script>
function showBookingForm(specialty) {
    document.getElementById("selectedSpecialty").innerText = specialty;
    document.getElementById("mainContent").style.display = "block";
    const bookCounselorSection = document.querySelector(".book-counselor");
    bookCounselorSection.style.display = "flex"; 
    setTimeout(() => {
        bookCounselorSection.classList.add("show"); 
    }, 100);
}

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("bookingForm").addEventListener("submit", function (event) {
        event.preventDefault();
        const counselor = document.getElementById("counselor").value;
        const date = document.getElementById("date").value;
        const time = document.getElementById("time").value;
        let specialization = counselor.includes("Astha Joshi") ? "Anxiety Specialist" : "Depression Specialist";
        const newRow = `<tr><td>${date}</td><td>${time}</td><td>${counselor}</td><td>${specialization}</td></tr>`;
        document.getElementById("appointmentsBody").innerHTML += newRow;
        alert("Your appointment has been successfully booked!");
    });
});


</script>
</body>
</html>
