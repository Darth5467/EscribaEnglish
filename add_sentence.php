<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'aprendaEnglish';

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["EnglishS"]) && isset($_POST["SpanishS"])) {
    
    $EnglishS = filter_var($_POST["EnglishS"]);
    $SpanishS = filter_var($_POST["SpanishS"]);

  
    $query = "INSERT INTO sentences (EnglishS, SpanishS) VALUES (?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ss", $EnglishS, $SpanishS);
        $stmt->execute();

        echo "Content added successfully.";
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}


$conn->close();
?>
