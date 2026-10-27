<?php
include "db.php";

// Fetch attendance with student details
$sql = "SELECT a.attendance_date, s.roll_no, s.name, s.class, a.status
        FROM attendance a
        JOIN students s ON a.student_id = s.id
        ORDER BY a.attendance_date DESC, s.roll_no ASC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Attendance Report</h1>

    <table class="table-box" border="1">
        <tr>
            <th>Date</th>
            <th>Roll No</th>
            <th>Name</th>
            <th>Class</th>
            <th>Status</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['attendance_date']; ?></td>
            <td><?php echo $row['roll_no']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['class']; ?></td>
            <td>
                <?php 
                    if ($row['status'] == "Present") {
                        echo "<span style='color:green;'>Present</span>";
                    } else {
                        echo "<span style='color:red;'>Absent</span>";
                    }
                ?>
            </td>
        </tr>
        <?php } ?>

    </table>

    <br>
    <a href="index.php" class="btn">Back to Home</a>

</div>

</body>
</html>