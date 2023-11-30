<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fillin Management</title>
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


$query = "SELECT * FROM fillinblanks";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<h1>Manage Content</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>question</th><th>c_answer</th><th>Edit</th><th>Delete</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['question']}</td>";
        echo "<td>{$row['c_answer']}</td>";
        echo "<td><a href='edit_fillin.php?id={$row['id']}'>Edit</a></td>";
        echo "<td><a href='delete_fillin.php?id={$row['id']}'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No content found.";
}


$conn->close();
?>


<h2>Add New Content</h2>
<form action="add_fillin.php" method="post">
    <label for="question">Question:</label>
    <input type="text" name="Question" required><br>

    <label for="c_answer">Answer:</label>
    <input type="text" name="c_answer" required><br>

    <input type="submit" value="Add Content">
</form>

</body>
</html>