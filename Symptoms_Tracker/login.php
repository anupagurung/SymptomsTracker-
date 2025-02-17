<?php
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: profile.php");
        exit();
    } else {
        echo "<script>alert('Invalid email or password. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right,#10882a,#10882a);
        }

        .container {
            width: 350px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #0b5e42;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }

        .options {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .options a {
            color: #0b5e42;
            text-decoration: none;
        }

        .login-btn {
            width: 100%;
            background: #0b5e42;
            color: white;
            padding: 12px;
            border: none;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-btn:hover {
            background: #0b5e42;
        }

        .signup-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .signup-link a {
            color: #0d47a1;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="options">
                <label><input type="checkbox" name="remember"> Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="login-btn">LOGIN</button>
        </form>
        <div class="signup-link">
            Don't have an account? <a href="signup.php">Sign Up</a>
        </div>
    </div>

</body>
</html>
