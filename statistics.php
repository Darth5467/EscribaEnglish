<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
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


$userCountQuery = "SELECT COUNT(*) AS user_count FROM accounts";
$userCountResult = $conn->query($userCountQuery);


if ($userCountResult) {
    $userCount = $userCountResult->fetch_assoc()['user_count'];

    echo "<h1>Number of Users</h1>";
    echo "<p>Total Users: $userCount</p>";

} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

</body>
</html>