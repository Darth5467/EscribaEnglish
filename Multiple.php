<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'aprendaEnglish';

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "SELECT * FROM multiplechoice ORDER BY RAND() LIMIT 5";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $question = $row['question'];
    $options = array($row['optionA'], $row['optionB'], $row['optionC'], $row['optionD']);
    shuffle($options);
    $right_answer = $row['right_answer'];
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
    <title>Multiple Choice</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Multiple Choice</h1>
    <form action="submissionM.php" method="post">
        <p><?php echo $question; ?></p>
        <?php foreach ($options as $key => $option) : ?>
            <label>
                <input type="radio" name="answer" value="<?php echo $option; ?>">
                <?php echo $option; ?>
            </label><br>
        <?php endforeach; ?>
        <input type="hidden" name="right_answer" value="<?php echo $right_answer; ?>">
        <br>
        <input type="submit" value="Submit">
    </form>

    <p>Return to Tests? <a href="Test.html" id="ReturnT">Click here</a></p>
</body>
</html>