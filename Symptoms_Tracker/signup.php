<?php
session_start();
include "db.php"; // Ensure database connection

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Show detailed errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect input values
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $telephone = trim($_POST['telephone']);
    $address = trim($_POST['address']);
    $dob = $_POST['dob'];

    // Check if email already exists
    $check_email = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Error: Email already exists! Please use a different email.');</script>";
    } else {
        // Insert user into database
        $insert = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, telephone, address, dob) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insert->bind_param("sssssss", $first_name, $last_name, $email, $password, $telephone, $address, $dob);

        if ($insert->execute()) {
            echo "<script>alert('Signup successful! Redirecting to login...'); window.location.href='login.php';</script>";
        } else {
            echo "Error: " . $insert->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            height: 100vh;
            width: 50%;
            margin-left:25%;
        }

        .left {
            width: 50%;
            background: #f4f4f4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 50px;
        }

        .left h2 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .left p {
            color: #666;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .signup-btn {
            width: 100%;
            background:#10882a;
            color: white;
            padding: 10px;
            border: none;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .social-login img {
            width: 60px;
            height: 40px;
            cursor: pointer;
        }

        .right {
            width: 50%;
            background: #10882a;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .right img {
            width: 80px;
            margin-bottom: 15px;
        }

        .right h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .right .signin-btn {
            background: none;
            color: white;
            border: 2px solid white;
            padding: 8px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .wel{
            height:150px;
            width:400px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <h2>Hello!</h2>
            <p>Please sign up to continue</p>
            <form action="signup.php" method="POST">
    <div class="form-group">
        <input type="text" name="first_name" placeholder="First Name" required>
    </div>
    <div class="form-group">
        <input type="text" name="last_name" placeholder="Last Name" required>
    </div>
    <div class="form-group">
        <input type="email" name="email" placeholder="Email Address" required>
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Password" required>
    </div>
    <div class="form-group">
        <input type="text" name="telephone" placeholder="Telephone Number" required>
    </div>
    <div class="form-group">
        <input type="text" name="address" placeholder="Address" required>
    </div>
    <div class="form-group">
        <input type="date" name="dob" required>
    </div>

    <button type="submit" class="signup-btn"><a href="login.php">Sign Up</a></button>
</form>

            <p style="text-align:center; margin-top:10px;">or Signup with</p>
            <div class="social-login">
                <img src="facebook.png" alt="Facebook">
                <img src="twitter.png" alt="Twitter">
            </div>
            <p style="text-align:center; margin-top:10px;">I'm already a member! <a href="#" style="color:#6c8c74;">Sign In</a></p>
        </div>
        <div class="right">
            <img src="back.png" alt="welcome" class="wel">
            <h2>Anupa Gurung</h2>
            <p>Already have an account?</p>
            <a href="login.php"><button class="signin-btn">Sign In</button></a>
        </div>
    </div>
</body>
</html>
