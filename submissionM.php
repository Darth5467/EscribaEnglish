<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $select_opt = $_POST['answer'];
    $correct_opt = $_POST['right_answer'];

 
    $mgrade = ($select_opt === $correct_opt) ? 5 : 1;

    
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'aprendaEnglish';

     $conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql = "INSERT INTO mgrade (select_opt, correct_opt, mgrade)
            VALUES ('$select_opt', '$correct_opt', $mgrade)";
    
    if ($conn->query($sql) === TRUE) {
        $result = "Scored $mgrade stars.";
        $cScore = "Currently you have: $mgrade stars";
    } else {
        $result = "No Store: " . $conn->error;
        $cScore = "No Grade";
    }


    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Result</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Test Result</h1>
    <p><?php echo $result; ?></p>
    <p><?php echo $cScore; ?></p>

    <form action="Multiple.php" method="get">
        <input type="submit" value="Next Question">
    </form>
</body>

<p>Return to Tests? <a href="Test.html" id="ReturnT">Click here</a></p>
</html>