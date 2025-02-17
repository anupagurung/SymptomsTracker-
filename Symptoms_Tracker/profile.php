<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: signup.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user details
$query = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Ensure correct image path
$profile_image_path = "uploads/" . $user['profile_image'];
$profile_image = (!empty($user['profile_image']) && file_exists($profile_image_path)) ? $profile_image_path : "default.png";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        /* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: linear-gradient(135deg, #10882a, #10882a);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 20px;
}

/* Navigation Bar */
.nav {
    width: 90%;
    max-width: 800px;
    display: flex;
    justify-content: space-between;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 15px 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.nav a {
    text-decoration: none;
    color: white;
    font-weight: bold;
    padding: 10px 15px;
    transition: all 0.3s ease-in-out;
}

.nav a:hover,
.nav a.active {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 5px;
}

/* Profile Container */
.profile-container {
    width: 90%;
    max-width: 500px;
    background: white;
    padding: 30px;
    margin-top: 20px;
    border-radius: 15px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    text-align: center;
    animation: fadeIn 0.8s ease-in-out;
}

/* Profile Picture */
.profile-pic {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 4px solid #10882a;
    margin-bottom: 15px;
    object-fit: cover;
    transition: transform 0.3s ease-in-out;
}

.profile-pic:hover {
    transform: scale(1.1);
}

/* Profile Info */
h2 {
    margin-bottom: 15px;
    font-size: 22px;
    color: #333;
}

.profile-info {
    text-align: left;
    margin-top: 20px;
}

.info-item {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #ddd;
    font-size: 16px;
}

/* Update Button */
.save-btn {
    margin-top: 20px;
    padding: 12px 18px;
    background: #10882a;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 8px;
    font-size: 16px;
    font-weight: bold;
    transition: background 0.3s ease-in-out, transform 0.2s;
}

.save-btn:hover {
    background: #10882a;
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .profile-container {
        width: 95%;
        padding: 20px;
    }

    .nav {
        width: 95%;
    }
}

/* Keyframe Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    </style>
</head>
<body>

    <div class="nav">
        <a href="home.php">Home</a>
        <a href="profile.php" class="active">Profile</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="profile-container">
        <img src="<?php echo $profile_image; ?>" alt="Profile Picture" class="profile-pic">
        <div class="profile-info">
            <div class="info-item"><label>First Name</label> <?php echo htmlspecialchars($user['first_name']); ?></div>
            <div class="info-item"><label>Last Name</label> <?php echo htmlspecialchars($user['last_name']); ?></div>
            <div class="info-item"><label>Email</label> <?php echo htmlspecialchars($user['email']); ?></div>
            <div class="info-item"><label>Address</label> <?php echo htmlspecialchars($user['address']); ?></div>
            <div class="info-item"><label>Telephone</label> <?php echo htmlspecialchars($user['telephone']); ?></div>
            <div class="info-item"><label>Date of Birth</label> <?php echo htmlspecialchars($user['dob']); ?></div>
        </div>

        <a href="update_profile.php">
            <button class="save-btn">Update Profile</button>
        </a>
    </div>

</body>
</html>
