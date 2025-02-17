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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $telephone_number = mysqli_real_escape_string($conn, $_POST['telephone_number']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);

    // Handle file upload
    if (!empty($_FILES["profile_image"]["name"])) {
        $target_dir = "uploads/";
    
        // Create the directory if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
    
        $profile_image = time() . '_' . basename($_FILES["profile_image"]["name"]);
        $target_file = $target_dir . $profile_image;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        // Allow only certain file formats
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    
        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                // Update the database
                $query = "UPDATE users SET profile_image='$profile_image' WHERE id='$user_id'";
                mysqli_query($conn, $query);
            } else {
                echo "Error uploading the file.";
            }
        } else {
            echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }
    

    // Update user details
    $query = "UPDATE users SET 
                first_name='$first_name',
                last_name='$last_name',
                email='$email',
                address='$address',
                telephone='$telephone_number',
                dob='$dob' 
              WHERE id='$user_id'";

    if (mysqli_query($conn, $query)) {
        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Update Your Profile</h2>
        <form action="update_profile.php" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <input type="text" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required placeholder="First Name">
            </div>
            <div class="input-group">
                <input type="text" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required placeholder="Last Name">
            </div>
            <div class="input-group">
                <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required placeholder="Email">
            </div>
            <div class="input-group">
                <input type="text" name="address" value="<?php echo htmlspecialchars($user['address']); ?>" required placeholder="Address">
            </div>
            <div class="input-group">
                <input type="text" name="telephone_number" value="<?php echo htmlspecialchars($user['telephone']); ?>" required placeholder="Phone Number">
            </div>
            <div class="input-group">
                <input type="date" name="dob" value="<?php echo htmlspecialchars($user['dob']); ?>" required>
            </div>
            <div class="input-group">
                <label class="file-label">Profile Image:</label>
                <input type="file" name="profile_image" accept="image/*">
            </div>
            <a href="profile.php"><button type="submit" class="update-btn">Update Profile</button></a>
        </form>
    </div>

</body>
</html>
