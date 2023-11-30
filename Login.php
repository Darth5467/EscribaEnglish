<?php
session_start();


$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'aprendaenglish';

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
   

  
    $sql = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result -> fetch_assoc();
        if (password_verify($password, $row['password'])){
        echo "Login successful!";
        header("Location: Home.html");
        $_SESSION['username'] = $username;    
        }
        
    } else {
        
        echo "Invalid  password";
    }
}    else {
    echo "invalid username";
}



$conn->close();
?>