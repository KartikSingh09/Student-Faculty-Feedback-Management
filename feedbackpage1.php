<?php
session_start();
$sem=$_SESSION['selected_sem'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['enrollment_number'])) {
        $_SESSION['selected_enrollment_number'] = $_POST['enrollment_number'];
        header("Location: feedbackpage2.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Page 1</title>
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
<div id="fr">
<?php echo "<b><font size='4'>Semester</font></b>: $sem"; ?><br>
    <h3>Select Your Enrollment Number</h3>
    <form method="post" action="">
        <select name="enrollment_number">
            <?php
            $conn = new mysqli('localhost', 'root', '', 'feedback');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT student_id FROM student_info where sem='$sem'";
            $result = $conn->query($sql);
            echo "<option value=''>Select here</option>";
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $enrollment_number = $row["student_id"];
                    echo "<option value=\"$enrollment_number\">$enrollment_number</option>";
                }
            } else {
                echo "<option value=\"\">No enrollment numbers found</option>";
            }

            $conn->close();
            ?>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Submit">
        <a href="feedbackpage.php"><input type="button" value="Back"></a>
    </form>
</div>
</body>
</html>
