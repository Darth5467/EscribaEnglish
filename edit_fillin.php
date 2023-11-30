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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $wordid = $_GET["id"];


    $query = "SELECT * FROM fillinblanks WHERE id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $question, $c_answer);
            $stmt->fetch();

         
            ?>
            <h1>Edit Content</h1>
            <form action="update_fillin.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <label for="question">Question:</label>
                <input type="text" name="Question" value="<?php echo $question; ?>" required><br>

                <label for="c_answer">Answer:</label>
                <input type="text" name="c_answer" value="<?php echo $c_answer; ?>" required><br>

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