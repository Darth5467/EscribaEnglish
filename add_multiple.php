<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'aprendaEnglish';

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["question"]) && isset($_POST["optionA"]) && isset($_POST["optionB"]) && isset($_POST["optionC"]) && isset($_POST["optionD"])&& isset($_POST["right_answer"])) {
    
    $question = filter_var($_POST["question"]);
    $optionA = filter_var($_POST["optionA"]);
    $optionB = filter_var($_POST["optionB"]);
    $optionC = filter_var($_POST["optionC"]);
    $optionD = filter_var($_POST["optionD"]);
    $right_answer = filter_var($_POST["right_answer"]);

    $query = "INSERT INTO multiplechoice (question, optionA, optionB, optionC, optionD, right_answer  ) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ssssss", $question, $optionA, $optionB, $optionC, $optionD, $right_answer);
        $stmt->execute();

        echo "Content added successfully.";
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}


$conn->close();
?>