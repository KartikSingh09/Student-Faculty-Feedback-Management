<?php
$conn = new mysqli("localhost", "root", "", "feedback");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $student_division=$_POST['division'];
    $gender = $_POST['gender'];
    $query = "UPDATE student_info SET student_name='$student_name', student_email='$student_email', gender='$gender' WHERE student_id='$student_id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Record Updated successfully!')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
