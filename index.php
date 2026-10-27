<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Attendance System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Student Attendance System</h1>

    <div class="menu">
        <a href="add_student.php" class="btn">Add Student</a>
        <a href="view_students.php" class="btn">View Students</a>
        <a href="attendance.php" class="btn">Mark Attendance</a>
        <a href="report.php" class="btn">Attendance Report</a>
        <a href="logout.php" class="btn">Logout</a>
    </div>

</div>

</body>
</html>