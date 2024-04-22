<?php
session_start(); 
$sem=$_SESSION['selected_sem'];
if(isset($_SESSION['selected_enrollment_number'])) {
    $selected_enrollment_number = $_SESSION['selected_enrollment_number'];
} else {
    header("Location: feedbackpage1.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'feedback');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM semester WHERE sem='$sem'";
$result = mysqli_query($conn,$sql);
$row =mysqli_fetch_assoc($result);
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Page 2</title>
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
       <li> <a href="index.html">Home</a> </li>
    </ul>
</div>
<div id="fr">
    <?php echo "<b><font size='4'>Semester</font></b>: $sem"; ?><br><br>
    <?php echo "<b><font size='4'>Enrollment Number</font></b>: $selected_enrollment_number"; ?><br><br>
    <form method="post" action="feedbackpage3.php">
        <label for="subject"><b><font size='4'>Select Subject:</font></b></label>
        <select name="subject" id="subject">
        <option value="">Subjects</option>
            <?php
                echo "<option value=\"{$row['sub1']}\">{$row['sub1']}</option>";
                echo "<option value=\"{$row['sub2']}\">{$row['sub2']}</option>";
                echo "<option value=\"{$row['sub3']}\">{$row['sub3']}</option>";
                echo "<option value=\"{$row['sub4']}\">{$row['sub4']}</option>";
                echo "<option value=\"{$row['sub5']}\">{$row['sub5']}</option>";
             ?>
        </select>
        <br><br>
        <input type="hidden" name="enrollment_number" value="<?php echo $selected_enrollment_number; ?>">
        <input type="submit" name="submit" value="Submit">
        <a href="feedbackpage1.php"><input type="button" value="Back"></a>
    </form>
</div>
</body>
</html>
