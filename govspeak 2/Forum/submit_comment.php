<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question_id = $_POST['question_id'];
    $text = $_POST['text'];

    $sql = "INSERT INTO comments (question_id, text) VALUES ('$question_id', '$text')";
    if ($conn->query($sql) === TRUE) {
        echo "New comment added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: index.php");
exit();
?>
