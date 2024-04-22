<?php
$conn = new mysqli("localhost", "root", "", "feedback");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $faculty_id = $_GET['id'];
    $delete_query = "DELETE FROM student_info WHERE student_id = '$faculty_id'";
    if (mysqli_query($conn, $delete_query)) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
