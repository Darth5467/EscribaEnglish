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


$query = "SELECT * FROM words";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<h1>Manage Words</h1>";
    echo "<table border='1'>";
    echo "<tr><th>WORDID</th><th>English</th><th>Spanish</th><th>Edit</th><th>Delete</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['wordid']}</td>";
        echo "<td>{$row['English']}</td>";
        echo "<td>{$row['Spanish']}</td>";
        echo "<td><a href='edit_word.php?id={$row['wordid']}'>Edit</a></td>";
        echo "<td><a href='delete_word.php?id={$row['wordid']}'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No content found.";
}


$conn->close();
?>


<h2>Add New Content</h2>
<form action="add_word.php" method="post">
    <label for="English">English:</label>
    <input type="text" name="English" required><br>

    <label for="Spanish">Spanish:</label>
    <input type="text" name="Spanish" required><br>

    <input type="submit" value="Add Content">
</form>






</body>
</html>