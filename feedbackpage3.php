<?php
session_start();
$sem = $_SESSION['selected_sem'];
$enrollment_number = $_POST['enrollment_number'];
$selected_subject = $_POST['subject'];

$conn = new mysqli('localhost', 'root', '', 'feedback');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT division FROM student_info WHERE student_id='$enrollment_number'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$division = $row['division'];

// Split assigned divisions by comma
$assigned_divisions = explode(',', $division);

$faculty_id = "";
$name = "";

// Loop through each assigned division
foreach ($assigned_divisions as $div) {
    // Check faculty info for each division
    $query2 = "SELECT faculty_name, faculty_id FROM faculty_info WHERE FIND_IN_SET('$div', assign_division) AND faculty_subject='$selected_subject'";
    $result2 = $conn->query($query2);
    if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
        $name = $row2['faculty_name'];
        $faculty_id = $row2['faculty_id'];
        // If found faculty for the division, break the loop
        break;
    }
}

if (isset($_POST['submit_feedback'])) {
        $fi=$_POST['fi'];
        $em=$_POST['em'];
         $que1 = $_POST['question1'];
        $que2 = $_POST['question2'];
        $que3 = $_POST['question3'];
        $que4 = $_POST['question4'];
        $que5 = $_POST['question5'];
        $que6 = $_POST['question6'];
        $que7 = $_POST['question7'];
        $que8 = $_POST['question8'];
        $que9 = $_POST['question9'];
        $que10 = $_POST['question10'];
        $comment = $_POST['com'];

        $query3 = "INSERT INTO feed VALUES ('', '$fi', '$em', '$que1', '$que2', '$que3', '$que4', '$que5', '$que6', '$que7', '$que8', '$que9', '$que10', '$comment')";

        if ($conn->query($query3) === TRUE) {
            echo "<script>alert('Feedback submitted successfully!')</script>";
            echo "<script>window.location = 'index.html';</script>";
            exit;
        } else {
            echo "Error: " . $query3 . "<br>" . $conn->error;
        }
    }
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Page 3</title>
    <link rel="stylesheet" type="text/css" href="style/feedback.css">

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
    <div class="container">
    <p><b>Semester:</b> <?php echo $sem; ?></p>   
    <p><b>Enrollment Number:</b> <?php echo $enrollment_number; ?></p>
    <p><b>Selected Subject:</b> <?php echo $selected_subject; ?></p>
    <p><b>Faculty Name:</b> <?php echo $name; ?></p>

    <form method="post" action="">
        <h1>Feedback Form</h1>
        <input type="hidden" name="em" value="<?php echo $enrollment_number;?>">
        <input type="hidden" name="fi" value="<?php echo $faculty_id;?>">
        <p style="border:2px solid black;padding:20px;margin-left:85px;margin-right:80px;text-align:center;">
        1. Description of course objectives & assignments<br>
       <input type='radio' name='question1' value='1'required> Poor 
        <input type='radio' name='question1' value='2'required> Fair 
       <input type='radio' name='question1' value='3'required> Good 
       <input type='radio' name='question1' value='4'required> Very Good 
       <input type='radio' name='question1' value='5'required> Excellent
       <br><br>
       2. Quality of teaching materials<br>
       <input type='radio' name='question2' value='1'required> Poor 
        <input type='radio' name='question2' value='2'required> Fair 
       <input type='radio' name='question2' value='3'required> Good 
       <input type='radio' name='question2' value='4'required> Very Good 
       <input type='radio' name='question2' value='5'required> Excellent
       <br><br>
       3. Clarity of explanations<br>
       <input type='radio' name='question3' value='1'required> Poor 
        <input type='radio' name='question3' value='2'required> Fair 
       <input type='radio' name='question3' value='3'required> Good 
       <input type='radio' name='question3' value='4'required> Very Good 
       <input type='radio' name='question3' value='5'required> Excellent
       <br><br>
       4.Availability and helpfulness of the instructor<br>
       <input type='radio' name='question4' value='1'required> Poor 
        <input type='radio' name='question4' value='2'required> Fair 
       <input type='radio' name='question4' value='3'required> Good 
       <input type='radio' name='question4' value='4'required> Very Good 
       <input type='radio' name='question4' value='5'required> Excellent
       <br><br>
       5.Usefulness of practical exercises<br>
       <input type='radio' name='question5' value='1'required> Poor 
        <input type='radio' name='question5' value='2'required> Fair 
       <input type='radio' name='question5' value='3'required> Good 
       <input type='radio' name='question5' value='4'required> Very Good 
       <input type='radio' name='question5' value='5'required> Excellent
       <br><br>
       6.Effectiveness of assessment methods<br>
       <input type='radio' name='question6' value='1'required> Poor 
        <input type='radio' name='question6' value='2'required> Fair 
       <input type='radio' name='question6' value='3'required> Good 
       <input type='radio' name='question6' value='4'required> Very Good 
       <input type='radio' name='question6' value='5'required> Excellent
       <br><br>
       7.Encouragement of active participation<br>
       <input type='radio' name='question7' value='1'required> Poor 
        <input type='radio' name='question7' value='2'required> Fair 
       <input type='radio' name='question7' value='3'required> Good 
       <input type='radio' name='question7' value='4'required> Very Good 
       <input type='radio' name='question7' value='5'required> Excellent
       <br><br>
       8.Opportunities for feedback and improvement<br>
       <input type='radio' name='question8' value='1'required> Poor 
        <input type='radio' name='question8' value='2'required> Fair 
       <input type='radio' name='question8' value='3'required> Good 
       <input type='radio' name='question8' value='4'required> Very Good 
       <input type='radio' name='question8' value='5'required> Excellent
       <br><br>
       9.Relevance of the course to your goals<br>
       <input type='radio' name='question9' value='1'required> Poor 
        <input type='radio' name='question9' value='2'required> Fair 
       <input type='radio' name='question9' value='3'required> Good 
       <input type='radio' name='question9' value='4'required> Very Good 
       <input type='radio' name='question9' value='5'required> Excellent
       <br><br>
       10.Overall satisfaction with the course<br>
       <input type='radio' name='question10' value='1'required> Poor 
        <input type='radio' name='question10' value='2'required> Fair 
       <input type='radio' name='question10' value='3'required> Good 
       <input type='radio' name='question10' value='4'required> Very Good 
       <input type='radio' name='question10' value='5'required> Excellent
    <br><br>
    Any Comment:: <textarea name="com" rows="3" cols="40"></textarea><br><br>
        <input type="submit" name="submit_feedback" value="Submit Feedback"> 
        <a href="feedbackpage2.php"><input type="button" value="Back"></a>
        </form>
        </p>
    </div>
    </div>
</body>
</html>