<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['sem'])) {
        $_SESSION['selected_sem'] = $_POST['sem'];
        header("Location: feedbackpage1.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Page</title>
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
    <h2>Select Your Semester</h2>
    <form method="post" action="">
        <select name="sem">
            <?php
            $conn = new mysqli('localhost', 'root', '', 'feedback');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT sem FROM semester";
            $result = $conn->query($sql);
            echo "<option value=''>Select here</option>";
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $sem = $row["sem"];
                    echo "<option value=\"$sem\">$sem</option>";
                }
            } else {
                echo "<option value=\"\">No enrollment numbers found</option>";
            }

            $conn->close();
            ?>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Submit">
        
    </form>
</div>
</body>
</html>
