<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
if (!$data) {
    echo json_encode(["error" => "Invalid data"]);
    exit;
}

$age = filter_var($data['age'], FILTER_VALIDATE_INT);
$gender = htmlspecialchars($data['gender']);
$symptoms = array_map('htmlspecialchars', $data['symptoms']);

if (!$age || empty($gender) || empty($symptoms)) {
    echo json_encode(["error" => "Invalid input data"]);
    exit;
}

// Store user input in `symptoms` table
$symptomsText = implode(", ", $symptoms);
$query = "INSERT INTO symptoms (age, gender, symptoms) VALUES (:age, :gender, :symptoms)";
$stmt = $conn->prepare($query);
$stmt->execute([':age' => $age, ':gender' => $gender, ':symptoms' => $symptomsText]);

// Fetch matching conditions dynamically
$foundConditions = [];

foreach ($symptoms as $symptom) {
    $query = "SELECT conditions FROM symptom_mapping WHERE LOWER(symptom) LIKE LOWER(:symptom)";
    $stmt = $conn->prepare($query);
    $stmt->execute([':symptom' => "%".trim($symptom)."%"]);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $foundConditions = array_merge($foundConditions, explode(", ", $row['conditions']));
    }
}

$foundConditions = array_unique($foundConditions);

if (empty($foundConditions)) {
    echo json_encode(["message" => "No matching conditions found"]);
} else {
    echo json_encode(["conditions" => $foundConditions]);
}
?>
