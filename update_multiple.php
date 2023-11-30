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
    $questionid = filter_var($_POST["questionid"], FILTER_VALIDATE_INT);
    $question = filter_var($_POST["question"]);
    $optionA = filter_var($_POST["optionA"]);
    $optionB = filter_var($_POST["optionB"]);
    $optionC = filter_var($_POST["optionC"]);
    $optionC = filter_var($_POST["optionD"]);
    $right_answer = filter_var($_POST["right_answer"]);
  
    $query = "UPDATE multiple SET question = ?, optionA = ?, optionB = ?, optionC = ?, optionD = ?, right_answer = ? WHERE questionid = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ssssssi", $question, $optionA, $optionB, $optionC, $optionD, $right_answer,  $questionid);
        $stmt->execute();

        echo "Content updated successfully.";
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}


$conn->close();
?>