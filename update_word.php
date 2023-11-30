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
    $wordid = filter_var($_POST["wordid"], FILTER_VALIDATE_INT);
    $English = filter_var($_POST["English"]);
    $Spanish = filter_var($_POST["Spanish"]);

  
    $query = "UPDATE words SET English = ?, Spanish = ? WHERE wordid = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ssi", $English, $Spanish, $wordid);
        $stmt->execute();

        echo "Content updated successfully.";
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}


$conn->close();
?>