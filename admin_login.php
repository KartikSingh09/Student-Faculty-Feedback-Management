<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = mysqli_connect('localhost', 'root', '', 'feedback');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        header("Location: admin_page.php");
        exit;
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
    mysqli_close($conn);
}
?>
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
     
    </ul>
</div>

<div id="fr">
    <div class="container">
    <h1>Admin Login</h1>
    <form action="" method="post"> 
        Username::<input type="text" name="username"><br><br>
        Password::<input type="password" name="password"><br><br>
        <button class="btn2">Login</button>
    </form>
</div>
</div>
</body>
</html>
