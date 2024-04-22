<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - Feedback Management System</title>
    <link rel="stylesheet" type="text/css" href="style/logincss.css">
</head>
<body>
<div id="ab1" >
    <center><h1 style="font-size: 58px; font-style:arial;">FEEDBACK MANAGEMENT SYSTEM</h1></center>
    <p id="p1"><em>"An easier way to Manage and Give Feedbacks....!!"</em></p>
    </div>
    <ul class="active">
       <li> <a href="index.html">Home</a> </li>
       <li> <a href="view_faculty.php">Faculty Information </a></li>
    </ul>
</div>


<?php
$conn = new mysqli("localhost", "root", "", "feedback");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $faculty_id = $_GET['id'];
    $query = "SELECT * FROM faculty_info WHERE faculty_id = '$faculty_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            echo "<html>
                    <head></head>
                    <body>
                        <form method='post' action='' align='center'id='fr'>
                        <div class='container1'>
                            <h1 align='center'>Edit Faculty Details</h1>
                            <input type='hidden' name='faculty_id' value='{$row['faculty_id']}'>
                            <label>Faculty Name:</label><input type='text' name='faculty_name' value='{$row['faculty_name']}' required><br><br>
                            <label>Subject Assigned:</label><input type='text' name='faculty_subject' value='{$row['faculty_subject']}' required><br><br>
                            <label>Division:</label><input type='text' name='assign_division' value='{$row['assign_division']}' required><br><br>
                            <label>Email:</label><input type='email' name='faculty_email' value='{$row['faculty_email']}' required><br><br>
                            <label>Gender:</label>
                            <input type='radio' name='faculty_gender' value='Male' " . ($row['faculty_gender'] == 'Male' ? 'checked' : '') . " required>Male
                            <input type='radio' name='faculty_gender' value='Female' " . ($row['faculty_gender'] == 'Female' ? 'checked' : '') . " required>Female<br><br>
                            <input type='submit' name='submit' value='Update'><br><br>
                            </div>
                        </form>
                    </body>
                </html>";
        } else {            echo "Faculty not found.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
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
        echo "<script>alert('Record updated successfully!')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
