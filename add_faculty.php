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
   <li> <a href="view_faculty.php">Faculty Information</a></li>
</ul>
</div>

<div id="fr">

<form method="post" action="">
<div class="container1">
    <h1>Faculty Details</h1>
    <label>Faculty ID:</label><input type="number" id="faculty_id" name="faculty_id" required><br><br>
    <label>Faculty Name:</label><input type="text" id="faculty_name" name="faculty_name" required><br><br>
    <label>Faculty Subject Assigned:</label><input type="text" id="faculty_subject" name="faculty_subject" required><br><br>
    <label>Faculty Email:</label><input type="email" id="faculty_email" name="faculty_email" required><br><br>
    <label>Assigned Division:</label><br>
    <input type="checkbox" id="division" name="division[]" value="A"> A
    <input type="checkbox" id="division" name="division[]" value="B"> B
    <input type="checkbox" id="division" name="division[]" value="C"> C
    <input type="checkbox" id="division" name="division[]" value="D"> D
    <input type="checkbox" id="division" name="division[]" value="E"> E
    <input type="checkbox" id="division" name="division[]" value="F"> F
    <input type="checkbox" id="division" name="division[]" value="G"> G
    <input type="checkbox" id="division" name="division[]" value="H"> H<br><br>
    <label>Faculty Gender:</label>
    <input type="radio" id="gender" name="gender" value="male" required>Male
    <input type="radio" id="gender" name="gender" value="female" required>Female<br><br>
    <input type="submit" name="submit" id="submit">
    <br><br><br>
</form>
</div>
</body>
</html>

<?php
    $conn = new mysqli("localhost", "root", "", "feedback");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['submit'])){
        $faculty_id = $_POST['faculty_id'];
        $faculty_name = $_POST['faculty_name'];
        $faculty_subject = $_POST['faculty_subject'];
        $faculty_email = $_POST['faculty_email'];
        $gender = $_POST['gender'];
        if(isset($_POST['division'])) {
            $divisions = implode(",", $_POST['division']);
        } else {
            $divisions = "No division assigned";
        }
        
        $query = "INSERT INTO faculty_info VALUES ('$faculty_id', '$faculty_name', '$faculty_subject', '$faculty_email', '$gender', '$divisions')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Record inserted successfully!')</script>";
        } else {
            echo "Error inserting record: " . mysqli_error($conn);
        }
    }
?>