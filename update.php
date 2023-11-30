<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'aprendaEnglish';

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_var($_POST["id"]);
    $first_name = filter_var($_POST["first_name"]);
    $last_name = filter_var($_POST["last_name"]);
    $username = filter_var($_POST["username"]);
    $email = filter_var($_POST["email"]);
  
   
    $query = "UPDATE accounts SET first_name = ?, last_name = ?, username = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ssssi", $first_name, $last_name, $username, $email, $id);
        $stmt->execute();

        echo "User details updated successfully.";
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}


$conn->close();
?>