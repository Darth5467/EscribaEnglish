<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'aprendaEnglish';

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "SELECT * FROM fillinblanks ORDER BY RAND() LIMIT 5";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $question = $row['question'];
    $answer = $row['c_answer'];
} else {
    echo "No questions found in the database.";
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill-in-the-Blanks</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Fill-in-the-Blanks</h1>
    <form action="submissionF.php" method="post">
        <p><?php echo $question; ?></p>
        <label for="answer">Your Answer:</label>
        <input type="text" name="answer" required>
        <input type="hidden" name="c_answer" value="<?php echo $answer; ?>">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>