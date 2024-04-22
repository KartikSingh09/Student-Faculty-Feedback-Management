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
    $query = "SELECT * FROM feed WHERE faculty_id = '$faculty_id'";
    $result = mysqli_query($conn, $query);

    $query1 = "SELECT * FROM faculty_info WHERE faculty_id = '$faculty_id'";
    $result2 = mysqli_query($conn, $query1);
    $row2 = mysqli_fetch_assoc($result2);

    $name = $row2['faculty_name'];
    $id= $row2['faculty_id'];
    $subject = $row2['faculty_subject'];
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $total = 0;
            for ($i = 1; $i <= 10; $i++) {
                $total += $row["que$i"];
            }
             echo "<table border='1' align='center' style='border:3px solid #0066b2;text-align:center;font-size:17px;font-family:Verdana;margin-top:15px;'>
             <tr>
            <td colspan='3'><b>Faculty Name</b>:: $name<br>
            <b>Faculty ID</b>:: $id<br>
            <b>Assigned Subject</b>:: $subject<br>
            </td>
             </tr>
            <tr style='width:50%;'>
                <th>Sr No.</th>
                <th>Feedback Questions</th>
                <th>Rating</th>
            </tr>
            <tr>
            <td>1</td>
            <td> Description of course objectives & assignments</td>
            <td>{$row['que1']}</td>
            </tr>
            <tr>
            <td>2</td>
            <td>  Quality of teaching materials</td>
            <td>{$row['que2']}</td>
            </tr>
            <tr>
            <td>3</td>
            <td> Clarity of explanations</td>
            <td>{$row['que3']}</td>
            </tr>
            <tr>
            <td>4</td>
            <td> Availability and helpfulness of the instructor</td>
            <td>{$row['que4']}</td>
            </tr>
            <tr>
            <td>5</td>
            <td> Usefulness of practical exercises</td>
            <td>{$row['que5']}</td>
            </tr>
            <tr>
            <td>6</td>
            <td> Effectiveness of assessment methods</td>
            <td>{$row['que6']}</td>
            </tr>
            <tr>
            <td>7</td>
            <td> Encouragement of active participation</td>
            <td>{$row['que7']}</td>
            </tr>
            <tr>
            <td>8</td>
            <td> Opportunities for feedback and improvement</td>
            <td>{$row['que8']}</td>
            </tr>
            <td>9</td>
            <td> Relevance of the course to your goals</td>
            <td>{$row['que9']}</td>
            </tr>
            <td>10</td>
            <td> Overall satisfaction with the course</td>
            <td>{$row['que10']}</td>
            </tr>
            <tr>
            <td colspan='2'>Comments</td>
            <td>{$row['comment']}</td>
            </tr>
            <tr>
            <td colspan='2'>Total Rating (Out of 50)</td>
            <td>$total</td>
            </tr>
            </table>
            ";
        } else {            echo "<h1 style='font-family:Verdana;text-align:center;margin-top:10%;'>No Feedback Given...!!</h1>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
</body>
</html>