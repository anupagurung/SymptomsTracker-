<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access.");
}

if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM symptoms WHERE id = ? AND user_id = ?");
    $stmt->execute([$_GET['id'], $_SESSION['user_id']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $symptoms = $_POST['symptoms'];

    $stmt = $conn->prepare("UPDATE symptoms SET age=?, gender=?, symptoms=? WHERE id=? AND user_id=?");
    $stmt->execute([$age, $gender, $symptoms, $id, $_SESSION['user_id']]);

    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Symptoms</title>
</head>
<body>
    <h2>Edit Symptoms</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Age:</label>
        <input type="number" name="age" value="<?php echo $row['age']; ?>" required>
        <label>Gender:</label>
        <select name="gender" required>
            <option value="Male" <?php if ($row['gender'] == "Male") echo "selected"; ?>>Male</option>
            <option value="Female" <?php if ($row['gender'] == "Female") echo "selected"; ?>>Female</option>
        </select>
        <label>Symptoms:</label>
        <input type="text" name="symptoms" value="<?php echo $row['symptoms']; ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
