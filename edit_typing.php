<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Content</title>
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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["textid"])) {
    $textid = $_GET["textid"];

 
    $query = "SELECT * FROM typing WHERE textid = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $textid);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($textid, $text);
            $stmt->fetch();

            
            ?>
            <h1>Edit Content</h1>
            <form action="update_typing.php" method="post">
                <input type="hidden" name="textid" value="<?php echo $textid; ?>">

                <label for="text">Text:</label>
                <input type="text" name="title" value="<?php echo $text; ?>" required><br>

              

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