<html>
<head>
    <title>Student Details - Feedback Management System</title>
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
       
    </ul>
</div>
<?php
$conn = new mysqli("localhost", "root", "", "feedback");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM student_info";
$result = mysqli_query($conn, $query);

echo "<u><h1 align='center'>Student Information</h1></u>";

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' align='center' style='border:3px solid #0066b2;text-align:center;font-size:20px;font-family:Verdana;'>
            <tr>
            <th>Semester</th>
                <th>Student Permanent ID</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Division</th>
                <th>Student Gender</th>
                <th>Action</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['sem']}</td>
                <td>{$row['student_id']}</td>
                <td>{$row['student_name']}</td>
                <td>{$row['student_email']}</td>
                <td>{$row['division']}</td>
                <td>{$row['gender']}</td>
            
                <td>
                    <a href='edit_student.php?id={$row['student_id']}'><button>Edit</button></a>
                    |
                    <a href='delete_student.php?id={$row['student_id']}'><button>Delete</button></a>

                </td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No records found";
}

mysqli_close($conn);
?>
<a href="student_details.php"><button style="margin:2% 0% 0% 80%;"><b>Add New Student</b></button></a>