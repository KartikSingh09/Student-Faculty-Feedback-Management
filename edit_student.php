<html>
<head>
    <title>Faculty Details - Feedback Management System</title>
    <link rel="stylesheet" type="text/css" href="style/logincss.css">
    <style>
    
    </style>
</head>
<body>
<div id="ab1" >
    <center><h1 style="font-size: 58px; font-style:arial;">FEEDBACK MANAGEMENT SYSTEM</h1></center>
    <p id="p1"><em>"An easier way to Manage and Give Feedbacks....!!"</em></p>
    </div>
    <ul class="active">
       <li> <a href="index.html">Home</a> </li>
       <li> <a href="view_student.php">Student Information </a></li>
    </ul>
</div>

<?php
$conn = new mysqli("localhost", "root", "", "feedback");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];
    $query = "SELECT * FROM student_info WHERE student_id = '$student_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            echo "<html>
                    <head></head>
                    <body>
                        <form method='post' action='update_student.php'align='center'id='fr'>
                        <div class='container1'>
                            <h1>Edit Student Details</h1>
                            <input type='hidden' name='student_id' value='{$row['student_id']}'>
                            <label>Student Name:</label><input type='text' name='student_name' value='{$row['student_name']}' required><br><br>
                            <label>Student Email:</label><input type='email' name='student_email' value='{$row['student_email']}' required><br><br>
                            <label>Division:</label><input type='text' name='division' value='{$row['division']}' required><br><br>
                            <label>Student Gender:</label>
                            <input type='radio' name='gender' value='Male' " . ($row['gender'] == 'Male' ? 'checked' : '') . " required>Male
                            <input type='radio' name='gender' value='Female' " . ($row['gender'] == 'Female' ? 'checked' : '') . " required>Female<br><br>
                            <input type='submit' name='submit' value='Update'>
                            </div>
                        </form>
                    </body>
                </html>";
        } else {
            echo "Student not found.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
