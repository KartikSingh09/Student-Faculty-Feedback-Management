<html>
<head>
    <title>Feedback Details - Feedback Management System</title>
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
       <li> <a href="view_faculty.php">Faculty Information </a></li>
    </ul>
</div>
<?php
$conn = new mysqli("localhost", "root", "", "feedback");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM faculty_info";
$result = mysqli_query($conn, $query);

echo "<u><h1 align='center'>Faculty Details</h1></u>";

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' align='center' style='border:3px solid  #0066b2;text-align:center;font-size:23px;font-family:Verdana;'>
            <tr>
                <th>Faculty Name</th>
                <th>Faculty ID</th>
                <th>Action</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['faculty_name']}</td>
                <td>{$row['faculty_id']}</td>            
                <td>
                    <a href='view_feed.php?id={$row['faculty_id']}'><button>View Feedback</button></a>
                </td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No records found";
}

mysqli_close($conn);
?>