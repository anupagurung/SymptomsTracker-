<?php
session_start();
require_once "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

try {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    
    session_destroy();
    echo "<script>alert('Account deleted successfully.'); window.location.href='signup.php';</script>";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
