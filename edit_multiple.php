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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["questionid"])) {
    $wordid = $_GET["questionid"];


    $query = "SELECT * FROM multiplechoice WHERE questionid = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $questionid);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($questionid, $question, $optionA, $optionB, $optionC, $optionD, $right_answer  );
            $stmt->fetch();

         
            ?>
            <h1>Edit Content</h1>
            <form action="update_word.php" method="post">
                <input type="hidden" name="questionid" value="<?php echo $wordid; ?>">

                <label for="question">Question:</label>
                <input type="text" name="question" value="<?php echo $question; ?>" required><br>

                <label for="optionA">Option A:</label>
                <input type="text" name="optionA" value="<?php echo $optionA; ?>" required><br>

                <label for="optionB">Option B:</label>
                <input type="text" name="optionB" value="<?php echo $optionB; ?>" required><br>

                <label for="optionC">Option C:</label>
                <input type="text" name="optionC" value="<?php echo $optionC; ?>" required><br>

                <label for="optionD">Option D:</label>
                <input type="text" name="optionD" value="<?php echo $optionD; ?>" required><br>

                <label for="right_answer">Right answer:</label>
                <input type="text" name="right_answer" value="<?php echo $right_answer; ?>" required><br>

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