<?php
session_start();

// Assuming the form data is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve all the submitted form data
    $enrollment_number = $_POST['enrollment_number'];
    $selected_subject = $_POST['subject'];
    $faculty_name = $_POST['faculty_name'];
    $faculty_id = $_POST['faculty_id'];
    $comments = $_POST['com'];

    // Assuming you have 10 feedback questions, retrieve all of them
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];
    $question4 = $_POST['question4'];
    $question5 = $_POST['question5'];
    $question6 = $_POST['question6'];
    $question7 = $_POST['question7'];
    $question8 = $_POST['question8'];
    $question9 = $_POST['question9'];
    $question10 = $_POST['question10'];

    // Processing of feedback data can be done here
    // For example, you can store it in the database

    // Assuming you have a database connection established already
    $conn = new mysqli('localhost', 'root', '', 'feedback');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert feedback data into the database
    $sql = "INSERT INTO feed  VALUES ('','$faculty_id', '$enrollment_number', '$question1', '$question2', '$question3', '$question4', '$question5', '$question6', '$question7', '$question8', '$question9', '$question10','$comments')";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
