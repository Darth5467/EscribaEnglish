<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'aprendaEnglish';

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["textid"])) {
   
    $textid = filter_var($_GET["textid"], FILTER_VALIDATE_INT);

    $query = "DELETE FROM typing WHERE textid = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $textid);
        $stmt->execute();

        echo "Content deleted successfully.";
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}


$conn->close();
?>