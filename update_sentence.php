<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'aprendaEnglish';

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["word_id"])) {
    $sentenceid = filter_var($_POST["sentenceid"], FILTER_VALIDATE_INT);
    $EnglishS = filter_var($_POST["EnglishS"]);
    $SpanishS = filter_var($_POST["SpanishS"]);

  
    $query = "UPDATE sentences SET EnglishS = ?, SpanishS = ? WHERE sentenceid = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ssi", $EnglishS, $SpanishS, $sentenceid);
        $stmt->execute();

        echo "Content updated successfully.";
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}


$conn->close();
?>