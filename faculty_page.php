<!DOCTYPE html>
<html>

<head>
    <title>Faculty Page - Feedback Management System</title>
    <link rel="stylesheet" type="text/css" href="style/logincss.css">
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border:1px double black;
        }

        th {
            padding: 15px; 
            text-align: left;
            border-bottom: 1px solid #ddd;
            background-color: #f2f2f2;
            font-size: 20px; 
            font-family: Arial, sans-serif; 
            letter-spacing: 1px;
        }

        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-family: Arial, sans-serif;
            letter-spacing: 1px; 
        }
    </style>
</head>

<body>
    <div id="ab1">
        <center>
            <h1 style="font-size: 58px; font-style:arial;">FEEDBACK MANAGEMENT SYSTEM</h1>
        </center>
        <p id="p1"><em>"An easier way to Manage and Give Feedbacks....!!"</em></p>
    </div>
    <ul class="active">
        <li><a href="index.html">Home</a></li>
    </ul>

    <div>
        <h1 align="center">Faculty Information</h1>
        <table>
            <?php
            session_start();
            $fname = $_SESSION['username'];
            $conn = mysqli_connect('localhost', 'root', '', 'feedback');
            $query = "SELECT * FROM faculty_info WHERE faculty_id='$fname'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            ?>
            <tr>
                <th>Faculty ID</th>
                <td><?php echo $row['faculty_id']; ?></td>
            </tr>
            <tr>
                <th>Faculty Name</th>
                <td><?php echo $row['faculty_name']; ?></td>
            </tr>
            <tr>
                <th>Subject Assigned</th>
                <td><?php echo $row['faculty_subject']; ?></td>
            </tr>
            <tr>
                <th>Official Email</th>
                <td><?php echo $row['faculty_email']; ?></td>
            </tr>
            <tr>
                <th>Assigned Division</th>
                <td><?php echo $row['assign_division']; ?></td>
            </tr>
            <tr>
                <th>Feedbacks Given</th>
                <td>
                    <?php
                    $query1="SELECT * FROM feed where faculty_id='$fname'";
                    $result1= mysqli_query($conn,$query1);
                    $num_row = mysqli_num_rows($result);
                    echo $num_row;
                    ?>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
