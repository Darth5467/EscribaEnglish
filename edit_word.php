<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Words</title>
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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["wordid"])) {
    $wordid = $_GET["wordid"];


    $query = "SELECT * FROM words WHERE wordid = ?";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
         
            ?>
            <h1>Edit Content</h1>
            <form action="update_word.php" method="post">
                <input type="hidden" name="wordid" value="<?php echo $row['wordid']; ?>">

                <label for="English">English:</label>
                <input type="text" name="English" value="<?php echo $row['English']; ?>" required><br>

                <label for="Spanish">Spanish:</label>
                <input type="text" name="Spanish" value="<?php echo $row['Spanish']; ?>" required><br>

                <input type="submit" value="Update Content">
            </form>
            <?php
        } else {
            echo "Content not found.";
        }

    }  
  
    



$conn->close();
?>

</body>
</html>