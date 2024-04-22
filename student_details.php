<html>
<head>
    <title>Faculty Details - Feedback Management System</title>
    <link rel="stylesheet" type="text/css" href="style/logincss.css">
    <style>
    button {
    font-size: 20px;
    font-family: 'Times New Roman', Times, serif;
}
    </style>
</head>
<body>
<div id="ab1" >
    <center><h1 style="font-size: 58px; font-style:arial;">FEEDBACK MANAGEMENT SYSTEM</h1></center>
    <p id="p1"><em>"An easier way to Manage and Give Feedbacks....!!"</em></p>
    </div>
    <ul class="active">
       <li> <a href="index.html">Home </a> </li>
       <li> <a href="view_student.php">Student Information</a></li>
    </ul>
</div>
<div id="fr">
    <div style=" background-color: #f2f2f2;
    padding-left:20px;
    padding-right:20px;
    margin-left:390px;
    margin-right:390px;
    margin-top:25px;
    border:2px solid black;
    border-radius:5px;">
<form method="post" action="student_details.php">
    <h1>Student Details</h1>
    <label>Student Permanent ID:</label><input type="number" id="student_id" name="student_id" required><br><br>
    <label>Student Name:</label><input type="text" id="student_name" name="student_name" required><br><br>
    <label>Student Email:</label><input type="email" id="student_email" name="student_email" required><br><br>
    <label>Student Division:</label><input type="text" id="division" name="division" required><br><br>
    <label>Student Gender:</label><input type="radio"  name="gender" value="Male" required>Male
                                <input type="radio"  name="gender" value="Female" required>Female<br><br>
     <label>Student Semester:</label><input type="text" id="sem" name="sem" required><br><br>                        
    <input type="submit" name="submit" id="submit">
    <br><br><br>
    
</form>
</div>
</div>
</body>
</html>
<?php
    $conn = new mysqli("localhost","root","","feedback");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['submit'])){
        $student_id = $_POST['student_id'];
        $student_name = $_POST['student_name'];
        $student_email = $_POST['student_email'];
        $gender = $_POST['gender'];
        $division = $_POST['division'];
        $sem = $_POST['sem'];
        $query = "INSERT INTO student_info VALUES('$student_id','$student_name','$student_email','$gender','$division','$sem')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Record inserted successfully')</script>!";
        } else {
            echo "Error inserting record: " . mysqli_error($conn);
        }
    }
?>