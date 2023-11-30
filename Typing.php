
<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'aprendaEnglish';


$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "SELECT * FROM typing ORDER BY RAND() LIMIT 5";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $text = $row['text'];
} else {
    echo "Sorry, not found.";
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing Test</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Typing Test</h1>
    <p><?php echo $text; ?></p>
    <form action="submissionP.php" method="post">
        <label for="userInput">Type the text above:</label>
        <textarea name="userInput" rows="4" cols="50" required></textarea>
        <input type="hidden" name="text" value="<?php echo $text; ?>">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>

<p>Return to Tests? <a href="Test.html" id="ReturnT">Click here</a></p>
</html>