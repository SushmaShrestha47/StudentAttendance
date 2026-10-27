<?php
session_start();
include "db.php";

// Protect page
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Count students
$student_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM students");
$student_data = mysqli_fetch_assoc($student_count);

// Count attendance records
$att_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM attendance");
$att_data = mysqli_fetch_assoc($att_count);

// Present count
$present_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM attendance WHERE status='Present'");
$present_data = mysqli_fetch_assoc($present_count);

// Absent count
$absent_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM attendance WHERE status='Absent'");
$absent_data = mysqli_fetch_assoc($absent_count);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        .dashboard {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 20px;
}

.box {
    width: 200px;
    margin: 10px;
    padding: 20px;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

.box h2 {
    font-size: 28px;
    margin: 0;
    color: #007bff;
}

.box p {
    margin-top: 10px;
    font-weight: bold;
}
    </style>
</head>
<body>

<div class="container">

    <h1>Admin Dashboard</h1>

    <p>Welcome, <b><?php echo $_SESSION['user']; ?></b></p>

    <!-- Summary Boxes -->
    <div class="dashboard">

        <div class="box">
            <h2><?php echo $student_data['total']; ?></h2>
            <p>Total Students</p>
        </div>

        <div class="box">
            <h2><?php echo $att_data['total']; ?></h2>
            <p>Total Attendance Records</p>
        </div>

        <div class="box">
            <h2 style="color:green;"><?php echo $present_data['total']; ?></h2>
            <p>Present</p>
        </div>

        <div class="box">
            <h2 style="color:red;"><?php echo $absent_data['total']; ?></h2>
            <p>Absent</p>
        </div>

    </div>

    <br>

    <!-- Navigation -->
    <a href="add_student.php" class="btn">Add Student</a>
    <a href="view_students.php" class="btn">View Students</a>
    <a href="attendance.php" class="btn">Mark Attendance</a>
    <a href="report.php" class="btn">Reports</a>
    <a href="logout.php" class="btn">Logout</a>

</div>

</body>
</html>