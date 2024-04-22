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
       
    </ul>
</div>

<?php
$conn = new mysqli("localhost", "root", "", "feedback");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM faculty_info";
$result = mysqli_query($conn, $query);

echo "<u><h1 align='center'>Faculty Information</h1></u>";

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' align='center' style='border:3px solid #0066b2;text-align:center;font-size:20px;font-family:Verdana;'>
            <tr>
                <th>Faculty ID</th>
                <th>Faculty Name</th>
                <th>Subject Assigned</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Assigned Divisions</th>
                <th>Action</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr style='font-family:Verdana'>
                <td>{$row['faculty_id']}</td>
                <td>{$row['faculty_name']}</td>
                <td>{$row['faculty_subject']}</td>
                <td>{$row['faculty_email']}</td>
                <td>{$row['faculty_gender']}</td>
                <td>{$row['assign_division']}</td>
                <td>
                    <a href='edit_faculty.php?id={$row['faculty_id']}'><button>Edit</button></a>
                    |
                    <a href='view_faculty.php?id={$row['faculty_id']}'><button>Delete</button></a>
                </td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No records found";
}

mysqli_close($conn);
?>
<br><br>
<a href="add_faculty.php"><button style="margin:2% 0% 0% 80%;">Add New faculty</button></a>
<?php
$conn = new mysqli("localhost", "root", "", "feedback");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $faculty_id = $_GET['id'];
    $delete_query = "DELETE FROM faculty_info WHERE faculty_id = '$faculty_id'";
    if (mysqli_query($conn, $delete_query)) {
        echo "<script>alert('Record deleted successfully!')</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>