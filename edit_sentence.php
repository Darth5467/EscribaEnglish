<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sentences</title>
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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["sentenceid"])) {
    $sentenceid = $_GET["sentenceid"];


    $query = "SELECT * FROM sentences WHERE sentenceid = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $sentenceid);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($sentenceid, $EnglishS, $SpanishS);
            $stmt->fetch();

         
            ?>
            <h1>Edit Content</h1>
            <form action="update_sentence.php" method="post">
                <input type="hidden" name="sentence_id" value="<?php echo $sentenceid; ?>">

                <label for="EnglishS">English Sentence:</label>
                <input type="text" name="EnglishS" value="<?php echo $EnglishS; ?>" required><br>

                <label for="SpanishS">Spanish Senetnce:</label>
                <input type="text" name="SpanishS" value="<?php echo $SpanishS; ?>" required><br>

                <input type="submit" value="Update Content">
            </form>
            <?php
        } else {
            echo "Content not found.";
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}


$conn->close();
?>

</body>
</html>