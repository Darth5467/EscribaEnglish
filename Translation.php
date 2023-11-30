<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'aprendaEnglish';

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$user_input = $_POST['word']; 


$sql = "SELECT * FROM words WHERE English = '$user_input' OR Spanish = '$user_input'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
    $row = $result->fetch_assoc();
    $English = $row['English'];
    $Spanish = $row['Spanish'];
    echo "English: $English, Spanish: $Spanish";
    echo '<p> Return to Word Translation? <a href="Words.html" id="ReturnW">Click here</a></p>';

} else {
    echo "Sorry, not found.";
    echo '<p> Return to Word Translation? <a href="Words.html" id="ReturnW">Click here</a></p>';
}


$conn->close();
?>