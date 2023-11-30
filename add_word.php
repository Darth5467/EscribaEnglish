<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'aprendaEnglish';

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["English"]) && isset($_POST["Spanish"])) {
    
    $English = filter_var($_POST["English"]);
    $Spanish = filter_var($_POST["Spanish"]);

  
    $query = "INSERT INTO words (English, Spanish) VALUES (?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ss", $English, $Spanish);
        $stmt->execute();

        echo "Content added successfully.";
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}


$conn->close();
?>