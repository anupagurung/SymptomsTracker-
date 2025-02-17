<?php
include 'db.php';

$query = isset($_GET['query']) ? trim($_GET['query']) : '';

if ($query) {
    $stmt = $conn->prepare("SELECT DISTINCT symptom FROM symptom_mapping WHERE symptom LIKE :query LIMIT 10");
    $stmt->execute([':query' => "%$query%"]);
    $symptoms = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode($symptoms);
} else {
    echo json_encode([]);
}
?>
