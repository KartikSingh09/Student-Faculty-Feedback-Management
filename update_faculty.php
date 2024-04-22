<?php
$conn = new mysqli("localhost", "root", "", "feedback");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $faculty_id = $_POST['faculty_id'];
    $faculty_name = $_POST['faculty_name'];
    $faculty_subject = $_POST['faculty_subject'];
    $assign_division=$_POST['assign_division'];
    $faculty_email = $_POST['faculty_email'];
    $faculty_gender = $_POST['faculty_gender'];

    $query = "UPDATE faculty_info SET faculty_name='$faculty_name', faculty_subject='$faculty_subject', assign_division='$assign_division',faculty_email='$faculty_email', faculty_gender='$faculty_gender' WHERE faculty_id='$faculty_id'";

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
