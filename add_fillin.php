<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'aprendaEnglish';

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["question"]) && isset($_POST["c_answer"])) {
    
    $English = filter_var($_POST["question"]);
    $Spanish = filter_var($_POST["c_answer"]);

  
    $query = "INSERT INTO fillinblanks (question, c_answer) VALUES (?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ss", $question, $c_answer);
        $stmt->execute();

        echo "Content added successfully.";
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}


$conn->close();
?>