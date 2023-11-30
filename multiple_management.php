<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Choice Management</title>
</head>
<body>

<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'aprendaEnglish';

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "SELECT * FROM multiplechoice";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<h1>Manage Content</h1>";
    echo "<table border='1'>";
    echo "<tr><th>QUESTIONID</th><th>question</th><th>optionA</th><th>optionB</th><th>optionC</th><th>optionD</th><th>right_answer</th><th>Edit</th><th>Delete</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['questionid']}</td>";
        echo "<td>{$row['question']}</td>";
        echo "<td>{$row['optionA']}</td>";
        echo "<td>{$row['optionB']}</td>";
        echo "<td>{$row['optionC']}</td>";
        echo "<td>{$row['optionD']}</td>";
        echo "<td>{$row['right_answer']}</td>";
        echo "<td><a href='edit_multiple.php?id={$row['questionid']}'>Edit</a></td>";
        echo "<td><a href='delete_multiple.php?id={$row['questionid']}'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No content found.";
}


$conn->close();
?>


<h2>Add New Content</h2>
<form action="add_multiple.php" method="post">
    <label for="question">Question:</label>
    <input type="text" name="question" required><br>

    <label for="optionA">Option A:</label>
    <input type="text" name="optionA" required><br>

    <label for="optionB">Option B:</label>
    <input type="text" name="optionB" required><br>

    <label for="optionC">Option C:</label>
    <input type="text" name="optionC" required><br>

    <label for="optionD">Option D:</label>
    <input type="text" name="optionD" required><br>

    <label for="right_answer">Right answer:</label>
    <input type="text" name="right_answer" required><br>



    <input type="submit" value="Add Content">
</form>

</body>
</html>