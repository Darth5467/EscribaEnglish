<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Management</title>
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


$query = "SELECT * FROM sentences";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<h1>Manage Content</h1>";
    echo "<table border='1'>";
    echo "<tr><th>sentenceid</th><th>EnglishS</th><th>SpanishS</th><th>Edit</th><th>Delete</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['sentenceid']}</td>";
        echo "<td>{$row['EnglishS']}</td>";
        echo "<td>{$row['SpanishS']}</td>";
        echo "<td><a href='edit_sentence.php?id={$row['sentenceid']}'>Edit</a></td>";
        echo "<td><a href='delete_sentence.php?id={$row['sentenceid']}'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No content found.";
}


$conn->close();
?>


<h2>Add New Content</h2>
<form action="add_sentence.php" method="post">
    <label for="EnglishS">English Sentence:</label>
    <input type="text" name="EnglishS" required><br>

    <label for="SpanishS">Spanish Sentence:</label>
    <input type="text" name="SpanishS" required><br>

    <input type="submit" value="Add Content">
</form>

</body>
</html>