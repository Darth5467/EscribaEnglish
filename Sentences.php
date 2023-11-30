<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'aprendaEnglish';

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$result = $conn->query("SELECT * FROM sentences ORDER BY RAND() LIMIT 1");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = [
        'EnglishS' => $row["EnglishS"],
        'SpanishS' => $row["SpanishS"]
    ];
} else {
    $response = [
        'EnglishS' => 'INCORRECT',
        'SpanishS' => 'INCORRECT'
    ];
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>