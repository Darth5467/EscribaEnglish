<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
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
    $id = $_GET["id"];

   
    $query = "SELECT * FROM accounts WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();


           
            ?>
            <h1>Delete User</h1>
            <p>Are you sure you want to delete the user id "<?php echo $id; ?>"?</p>
            <form action="confirmd.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" value="Confirm Delete">
            </form>
            <?php
        } else {
            echo "User not found.";
        }

       
    } else {
        echo "Error: " . $conn->error;
    }



$conn->close();
?>

</body>
</html>